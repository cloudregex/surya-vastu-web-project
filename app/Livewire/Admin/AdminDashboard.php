<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminDashboard extends Component
{
    #[Title('Dashboard')]

    public function mount()
    {

        if (!User::find(Auth::id())->can('admin.dashboard')) {
            return redirect()->route('auth.profile');
        }
    }
    public function render()
    {
        return view('livewire..admin.admin-dashboard');
    }
}
