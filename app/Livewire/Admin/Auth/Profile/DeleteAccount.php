<?php

namespace App\Livewire\Admin\Auth\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class DeleteAccount extends Component
{
    public function deleteAccount()
    {
        $user = User::find(Auth::id());

        // Perform soft delete
        $user->delete();

        // Logout user after account deletion
        Auth::logout();

        // Redirect to homepage or login page
        return redirect()->route('auth.login')->with('SUCCESS', 'Your account has been successfully deleted.');
    }
    public function render()
    {
        return view('livewire..admin.auth.profile.delete-account');
    }
}
