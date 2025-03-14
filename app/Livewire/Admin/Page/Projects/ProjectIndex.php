<?php

namespace App\Livewire\Admin\Page\Projects;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectIndex extends Component
{
    use WithPagination;
    #[Title('Projects')]
    #[Url(history: true)]
    public $perPage = 10;
    #[Url(history: true)]
    public $Search = '';
    #[Url(history: true)]
    public $sortBy = 'created_at';
    #[Url(history: true)]
    public $sortDir = 'DESC';

    #[Url(history: true)]
    public $filters = [
        'project_title' => null,
        'project_user_name' => null,
        'project_location' => null,
        'project_date' => null
    ];

    public function setSortBy($sortField)
    {
        if ($this->sortBy == $sortField) {
            $this->sortDir = $this->sortDir !== "ASC" ? "ASC" : "DESC";
        }
        $this->sortBy = $sortField;
    }
    public function resetFilters($key = null)
    {
        if ($key) {
            $this->filters[$key] = null;
        } else {
            $this->reset([
                'Search',
                'sortBy',
                'sortDir',
            ]);
            foreach ($this->filters as $key => $value) {
                $this->filters[$key] = null;
            }
        }
        $this->dispatch('clearSelect2');
    }
    public function updatedperPage()
    {
        $this->resetPage();
    }
    public function mount()
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.projects.list')) {
            abort(403);
        }
    }
    public function DeleteUser($encryptedId)
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.projects.delete')) {
            abort(403);
        }
        // Decrypt the user ID
        $projects = Project::withTrashed()->find(decryptData($encryptedId));
        return toggleTrash($projects, 'projects');
    }
    public function submitForm()
    {
        $this->resetPage();
    }
    public function render()
    {
        $Project = Project::query()
            ->when($this->Search, function ($query) {
                $query->where('project_title', 'like', '%' . $this->Search . '%')
                    ->orWhere('project_user_name', 'like', '%' . $this->Search . '%')
                    ->orWhere('project_location', 'like', '%' . $this->Search . '%');
            })
            ->when($this->filters['project_title'], function ($query) {
                $query->where('project_title', 'like', '%' . $this->filters['project_title'] . '%');
            })
            ->when($this->filters['project_user_name'], function ($query) {
                $query->where('project_user_name', 'like', '%' . $this->filters['project_user_name'] . '%');
            })
            ->when($this->filters['project_user_name'], function ($query) {
                $query->where('project_user_name', 'like', '%' . $this->filters['project_user_name'] . '%');
            })
            ->when($this->filters['project_date'], function ($query) {
                $query->where('project_date',  $this->filters['project_date']);
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.admin.page.projects.project-index', compact('Project'));
    }
}
