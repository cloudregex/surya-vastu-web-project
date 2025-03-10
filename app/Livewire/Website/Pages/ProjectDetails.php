<?php

namespace App\Livewire\Website\Pages;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProjectDetails extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Project Details')]

    public $project;
    public $slug;
    public $recentProjects;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->project = Project::where('project_slug', $slug)
            ->firstOrFail();
        $this->recentProjects = Project::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }
    public function render()
    {
        return view('livewire.website.pages.project-details');
    }
}