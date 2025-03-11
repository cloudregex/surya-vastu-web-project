<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Quote;
use App\Models\Slider;
use App\Models\Team;

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
        return view('livewire.admin.admin-dashboard', [
            'totalBlogs' => Blog::count(),
            'totalProjects' => Project::count(),
            'totalServices' => 0,
            'totalGallery' => Gallery::count(),
            'totalTeams' => Team::count(),
            'totalSliders' => Slider::count(),
            'totalQuotes' => Quote::count(),
            'latestQuotes' => Quote::latest()->take(5)->get()
        ]);
    }
}
