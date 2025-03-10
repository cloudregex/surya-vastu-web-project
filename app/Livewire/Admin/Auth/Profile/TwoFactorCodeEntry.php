<?php

namespace App\Livewire\Admin\Auth\Profile;

use App\Models\AdminUploadLogo;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class TwoFactorCodeEntry extends Component
{
    #[Layout('livewire/admin/layouts/single')]
    public $code;

    public $logos = [];

    public function mount()
    {
        $this->logos = AdminUploadLogo::whereIn('logo_name', [
            'desktop_white',
            'desktop_dark',
        ])->pluck('Logo_path', 'logo_name')->toArray();
    }
    public function submitForm()
    {
        $user = User::find(Auth::id());
        if ($user->verifyTwoFactorCode($this->code)) {
            Session::put('2fa_verified', true);
            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('FAILED', 'Invalid two-factor authentication code.');
        }
    }
    public function render()
    {
        return view('livewire..admin.auth.profile.two-factor-code-entry');
    }
}
