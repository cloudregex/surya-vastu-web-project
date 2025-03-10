<?php

namespace App\Livewire\Website\Pages;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Projects extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Projects')]
    public function render()
    {
        $projects = Project::latest()->paginate(9);
        return view('livewire.website.pages.projects', [
            'projects' => $projects
        ]);
    }
}