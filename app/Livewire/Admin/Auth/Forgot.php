<?php

namespace App\Livewire\Admin\Auth;

use App\Models\AdminUploadLogo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Forgot extends Component
{
    #[Layout('livewire/admin/layouts/single')]
    #[Title(content: 'Forgot Password')]

    public $email;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
    ];
    public $logos = [];

    public function mount()
    {
        $this->logos = AdminUploadLogo::whereIn('logo_name', [
            'desktop_white',
            'desktop_dark',
        ])->pluck('Logo_path', 'logo_name')->toArray();
        if (Auth::check()) {
            return redirect()->to('/admin/dashboard');
        }
    }

    public function submitForm()
    {
        $this->validate();

        // Find the user, including soft-deleted ones
        $user = User::withTrashed()->where('email', $this->email)->first();

        if (!$user) {
            session()->flash('FAILED', 'The email address is not registered.');
            return;
        }
        if ($user->trashed()) {
            $user->restore();
        }


        $response = Password::sendResetLink(['email' => $this->email]);
        if ($response == Password::RESET_LINK_SENT) {
            session()->flash('SUCCESS', 'Password reset link sent!');
            return redirect()->route('auth.login');
        } else {
            session()->flash('FAILED', 'Unable to send reset link.');
        }
    }
    public function render()
    {
        return view('livewire..admin.auth.forgot');
    }
}
