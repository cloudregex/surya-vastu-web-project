<?php

namespace App\Livewire\Admin\Auth;

use App\Models\AdminUploadLogo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ResetPassword extends Component
{
    #[Layout('livewire/admin/layouts/single')]
    #[Title('Reset Password')]
    public $token;
    public $email;
    public $password;
    public $password_confirmation;
    public $logos = [];
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required|min:8',
    ];

    public function mount($token, $email)
    {
        $this->logos = AdminUploadLogo::whereIn('logo_name', [
            'desktop_white',
            'desktop_dark',
        ])->pluck('Logo_path', 'logo_name')->toArray();

        $this->token = $token;
        $this->email = $email;
    }

    public function submitForm()
    {
        $this->validate();

        $response = Password::reset(
            [
                'email' => $this->email,
                'token' => $this->token,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
            ],
            function ($user) {
                // Update user's password
                $user->password = Hash::make($this->password);
                // Reset 2FA settings if applicable
                $user->two_factor_confirmed_at = null;
                $user->two_factor_secret = null;
                $user->two_factor_recovery_codes = null;
                // Save changes
                $user->save();
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            session()->flash('SUCCESS', 'Password reset successfully! Please log in with your new password.');
            return redirect()->route('auth.login');
        } else {
            session()->flash('FAILED', 'Failed to reset password.');
        }
    }
    public function render()
    {
        return view('livewire..admin.auth.reset-password');
    }
}
