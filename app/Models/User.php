<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Support\Str;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Contracts\Encryption\DecryptException;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        "profile_picture",
        "google_id"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // Send Email Reset Password
    public function sendPasswordResetNotification($token)
    {
        $name = $this->name;
        $profilePhotoUrl = AdminUploadLogo::where('logo_name', 'desktop_white')->value('Logo_path');
        $this->notify(new ResetPasswordNotification($token, $name, $profilePhotoUrl));
    }
    public function qrCodeUrl()
    {
        $qrcode = $this->two_factor_secret;
        if (!$qrcode) {
            $qrcode = $this->generateTwoFactorSecret();
            $this->two_factor_recovery_codes = $this->generateTwoFactorRecoveryCodes();
            $this->two_factor_secret = $qrcode;
            $this->save();
        }
        return app('pragmarx.google2fa')->getQRCodeInline(
            config('app.name'),
            $this->email,
            $this->two_factor_secret
        );
    }

    // Generate a new 2FA secret key
    protected function generateTwoFactorSecret()
    {
        $google2fa = new Google2FA();
        return $google2fa->generateSecretKey();
    }

    // Generate recovery codes
    protected function generateTwoFactorRecoveryCodes()
    {
        return implode("\n", array_map(function () {
            return Str::random(10);
        }, range(1, 8)));
    }

    // Verify Two-Factor Code
    public function verifyTwoFactorCode($code)
    {
        $google2fa = new Google2FA();
        try {
            $secret = $this->two_factor_secret;
            $isValid = $google2fa->verifyKey($secret, $code);
            return $isValid;
        } catch (DecryptException $e) {
            return false;
        }
    }

    // Disable 2FA
    public function disableTwoFactorAuthentication()
    {
        $this->two_factor_secret = null;
        $this->two_factor_recovery_codes = null;
        $this->two_factor_confirmed_at = null;
        $this->save();
    }
}