<?php

namespace App\Livewire\Admin\Auth\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class UpdatePassword extends Component
{
    public $old_password;
    public $new_password;
    public $confirm_password;
    public $users;

    public function mount()
    {
        $this->users = Auth::user();
    }
    public function submitForm()
    {
        // Validate the input data
        if ($this->users->password) {
            $this->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ]);
        } else {
            $this->validate([
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ]);
        }



        $user = User::find(Auth::id());
        if ($this->users->password) {
            if (!Hash::check($this->old_password, $user->password)) {
                throw ValidationException::withMessages(['old_password' => 'The old password does not match our records.']);
            }
        }
        $user->password = Hash::make($this->new_password);
        $user->save();
        // Provide feedback to the user
        session()->flash('SUCCESS', 'Your password has been updated successfully!');
        $this->reset(['old_password', 'new_password', 'confirm_password']);
    }

    public function render()
    {
        return view('livewire..admin.auth.profile.update-password');
    }
}
