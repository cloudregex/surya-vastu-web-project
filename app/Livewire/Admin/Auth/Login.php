<?php

namespace App\Livewire\Admin\Auth;

use App\Models\GlobalConstants;
use App\Models\AdminSetting;
use App\Models\AdminUploadLogo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Layout('livewire/admin/layouts/single')]
    #[Title('Login')]
    public $email;
    public $password;
    public $showRegister;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ];
    public $logos = [];

    public function mount()
    {
        $register = AdminSetting::first();
        $this->showRegister = $register->register;
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
        $user = User::where('email', $this->email)->first();
        // Check if the email exists in the soft-deleted users
        $softDeletedUser = User::withTrashed()->where('email', $this->email)->first();

        // If the user is soft-deleted, ask them to recover their account
        if ($softDeletedUser && $softDeletedUser->trashed()) {
            session()->flash('FAILED', 'Your account was previously deleted. Enter your Email to recover it.');
            return redirect()->route('auth.forgot-password')->with('TOAST_SUCCESS', 'Your account was previously deleted. Enter your Email to recover it.');
        }
        if ($user) {
            if ($user->status === 'ACTIVE') {
                if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                    session()->regenerate();
                    $this->dispatch(GlobalConstants::SHOW_SUCCESS_TOAST, 'Login Successfully');
                    return redirect()->route('admin.dashboard');
                }
            } else {
                session()->flash('FAILED', 'Your account is not active!');
                return;
            }
        }
        session()->flash('FAILED', 'Invalid credentials!');
    }

    public function render()
    {
        return view('livewire..admin.auth.login');
    }
}
