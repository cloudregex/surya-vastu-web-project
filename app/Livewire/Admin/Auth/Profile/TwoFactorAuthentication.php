<?php

namespace App\Livewire\Admin\Auth\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class TwoFactorAuthentication extends Component
{
    public $twoFactorEnabled = false;
    public $twoCheckedIsEnabled = false;
    public $qrCodeUrl;
    public $verificationCode;
    public $recoveryCodes;

    public function mount()
    {
        $user = User::find(Auth::id()); // Directly get the authenticated user
        if ($user->two_factor_confirmed_at) {
            $this->recoveryCodes = $user->two_factor_recovery_codes;
            $this->twoCheckedIsEnabled = true;
        }
    }

    public function enableTwoFactor()
    {
        $this->twoFactorEnabled = true;
        $user = User::find(Auth::id());
        $this->qrCodeUrl = $user->qrCodeUrl();
    }

    public function Cancelled()
    {
        $this->twoFactorEnabled = false;
    }

    public function submitForm()
    {
        $user = User::find(Auth::id()); // Directly get the authenticated user
        if ($user->verifyTwoFactorCode($this->verificationCode)) {
            $user->two_factor_confirmed_at = now();
            $user->save();
            $this->twoFactorEnabled = false;
            $this->mount();
            session()->flash('SUCCESS', 'Two-Factor Authentication verified successfully.');
        } else {
            session()->flash('FAILED', 'Invalid two-factor authentication code.');
        }
    }

    public function disableTwoFactor()
    {
        $user = User::find(Auth::id());
        $user->disableTwoFactorAuthentication();
        $this->twoFactorEnabled = true;
        $this->twoCheckedIsEnabled = false;
        session()->flash('SUCCESS', 'Two-Factor Authentication disabled successfully.');
        $this->mount(); // Refresh the component
    }
    public function render()
    {
        return view('livewire.admin.auth.profile.two-factor-authentication');
    }
}
