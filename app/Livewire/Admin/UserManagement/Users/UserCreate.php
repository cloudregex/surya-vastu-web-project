<?php

namespace App\Livewire\Admin\UserManagement\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $availableRoles = [];
    public $selectedOptions = [];

    public function mount()
    {
        if (!User::find(Auth::id())->can('admin.user.create')) {
            abort(403); // You can customize this response
        }
        $this->availableRoles = Role::all();
        // $this->selectedOptions = ['3', '2'];
    }
    public function submitForm()  // Fix: Match the form method name
    {
        // dd($this->selectedOptions);
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'selectedOptions' => 'required|array',
        ]);

        // Create the user
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Convert selected role IDs to role names
        $roles = Role::whereIn('id', $this->selectedOptions)->pluck('name')->toArray();

        // Sync roles with the selected options (role names)
        $user->syncRoles($roles);

        session()->flash('SUCCESS', 'User created successfully.');
        return redirect()->route('admin.user.list');
    }
    public function render()
    {
        return view('livewire.admin.user-management.users.user-create');
    }
}