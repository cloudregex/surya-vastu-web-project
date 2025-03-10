<?php

namespace App\Livewire\Admin\Components;

use App\Models\GlobalConstants;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoAvatar extends Component
{
    public $profile;
    protected $listeners = ['UpdateProfile' => 'UpdateProfiles'];

    public function UpdateProfiles()
    {
        $this->profile =  Auth::user();
    }
    public function mount()
    {
        $this->profile =  Auth::user();
    }
    public function Logout()
    {
        Auth::logout();
        $this->dispatch(GlobalConstants::SHOW_ERROR_TOAST, 'Logout Successfully');
        session()->invalidate();
        session()->regenerateToken();
        session()->forget('2fa_verified');
        return redirect()->route('auth.login');
    }
    public function render()
    {
        return view('livewire.admin.components.logo-avatar');
    }
}