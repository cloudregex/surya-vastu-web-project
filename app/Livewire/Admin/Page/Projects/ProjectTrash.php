<?php

namespace App\Livewire\Admin\Page\Projects;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectTrash extends Component
{
    use WithPagination;
    #[Title('Trash Projects')]
    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $Search = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    public function setSortBy($sortField)
    {
        if ($this->sortBy == $sortField) {
            $this->sortDir = $this->sortDir !== "ASC" ? "ASC" : "DESC";
        }
        $this->sortBy = $sortField;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedperPage()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.projects.trash')) {
            abort(403); // You can customize this response
        }
    }

    public function render()
    {
        // Fetch trashed projects
        $Project = Project::query()
            ->when($this->Search, function ($query) {
                $query->where('project_title', 'like', '%' . $this->Search . '%')
                    ->orWhere('project_user_name', 'like', '%' . $this->Search . '%');
            })
            ->onlyTrashed() // Fetch only trashed records
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.admin.page.projects.project-trash', [
            'projects' => $Project
        ]);
    }
}
