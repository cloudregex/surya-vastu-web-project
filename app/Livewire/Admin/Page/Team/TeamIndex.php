<?php

namespace App\Livewire\Admin\Page\Team;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class TeamIndex extends Component
{
    use WithPagination;

    #[Title('Team List')]
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
        'team_profession' => null,
        'team_user_name' => null,
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
        if (!User::find(Auth::id())->can('admin.team.list')) {
            abort(403);
        }
    }
    public function DeleteUser($encryptedId)
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.team.delete')) {
            abort(403);
        }
        // Decrypt the user ID
        $team = Team::withTrashed()->find(decryptData($encryptedId));
        return toggleTrash($team, 'team');
    }
    public function submitForm()
    {
        $this->resetPage();
    }
    public function render()
    {
        $team = Team::query()
            ->when($this->Search, function ($query) {
                $query->where('team_profession', 'like', '%' . $this->Search . '%')
                    ->orWhere('team_user_name', 'like', '%' . $this->Search . '%');
            })
            ->when($this->filters['team_user_name'], function ($query) {
                $query->where('team_user_name', 'like', '%' . $this->filters['team_user_name'] . '%');
            })
            ->when($this->filters['team_profession'], function ($query) {
                $query->where('team_profession', 'like', '%' . $this->filters['team_profession'] . '%');
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.admin.page.team.team-index', compact('team'));
    }
}
