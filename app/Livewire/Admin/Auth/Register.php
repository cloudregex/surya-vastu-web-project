<?php

namespace App\Livewire\Admin\Auth;

use App\Models\AdminSetting;
use App\Models\AdminUploadLogo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
    #[Layout('livewire/admin/layouts/single')]
    #[Title('Register')]
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $logos = [];
    public function mount()
    {
        $register = AdminSetting::first();
        if (!$register->register) {
            return redirect()->route('auth.login');
        }
        $this->logos = AdminUploadLogo::whereIn('logo_name', [
            'desktop_white',
            'desktop_dark',
        ])->pluck('Logo_path', 'logo_name')->toArray();
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
    }


    public function submitForm()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->whereNull('deleted_at'),  // Check for unique emails excluding soft-deleted ones
            ],
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
        $this->validate($rules);
        // Check if the email exists in the soft-deleted users
        $softDeletedUser = User::withTrashed()->where('email', $this->email)->first();

        // If the user is soft-deleted, ask them to recover their account
        if ($softDeletedUser && $softDeletedUser->trashed()) {
            session()->flash('FAILED', 'Your account was previously deleted. Enter your Email to recover it.');
            return redirect()->route('auth.forgot-password')->with('TOAST_SUCCESS', 'Your account was previously deleted. Enter your Email to recover it.');
        }
        if (User::count() == 0) {
            $user =  User::create([
                'name' => $this->name,
                'email' => $this->email,
                'status' => 'ACTIVE',
                'password' => Hash::make($this->password),
            ]);
            $user->syncRoles(["Super Admin"]);
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
        }


        session()->flash('SUCCESS', 'User registered successfully!');
        return redirect()->route('auth.login')->with('TOAST_SUCCESS', "User registered successfully!");
    }

    public function render()
    {
        return view('livewire..admin.auth.register');
    }
}
