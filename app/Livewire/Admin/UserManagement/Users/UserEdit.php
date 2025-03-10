<?php

namespace App\Livewire\Admin\UserManagement\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public $name;
    public $email;
    public $password;
    public $id;
    public $availableRoles = [];
    public $selectedOptions = [];

    public function mount($encryptedId)
    {

        if (!User::find(Auth::id())->can('admin.user.edit')) {
            abort(403); // You can customize this response
        }
        // Retrieve the user by ID
        $this->id = decryptData($encryptedId);
        $user = User::find($this->id);
        // Initialize user data
        $this->name = $user->name;
        $this->email = $user->email;

        // Get available roles
        $this->availableRoles = Role::all();

        // Get the currently assigned roles for the user
        $this->selectedOptions = $user->roles->pluck('id')->toArray();
    }

    public function submitForm()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' .  $this->id, // Make sure to use the correct ID for uniqueness check
            'selectedOptions' => 'required|array',
        ]);

        // Find the user by ID
        $user = User::findOrFail($this->id); // Use the user instance that you retrieved

        // Update user details
        $user->name = $this->name;
        $user->email = $this->email;

        // If you want to update the password, you can check if it has been changed
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        // Save the updated user
        $user->save();

        // Sync roles with the selected options
        $validRoles = Role::whereIn('id', $this->selectedOptions)->pluck('name')->toArray();

        // Sync the roles for the user
        $user->syncRoles($validRoles);

        session()->flash('SUCCESS', 'User updated successfully.');
        return redirect()->route('admin.user.list');
    }

    protected function save()
    {
        $user = User::findOrFail($this->id);
        $user->name = $this->name;
        $user->email = $this->email;

        // If password is set, hash it and update
        if ($this->password) {
            $user->password = bcrypt($this->password);
        }

        $user->save();
    }

    public function render()
    {
        return view('livewire.admin.user-management.users.user-edit');
    }
}