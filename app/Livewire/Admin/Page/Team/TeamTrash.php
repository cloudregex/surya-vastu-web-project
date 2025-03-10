<?php

namespace App\Livewire\Admin\Page\Team;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class TeamTrash extends Component
{
    use WithPagination;

    #[Title('Team Trash List')]

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
        if (!User::find(Auth::id())->can('admin.team.trash')) {
            abort(403); // You can customize this response
        }
    }

    public function render()
    {
        // Fetch trashed team
        $team = Team::query()
            ->when($this->Search, function ($query) {
                $query->where('team_profession', 'like', '%' . $this->Search . '%')
                    ->orWhere('team_user_name', 'like', '%' . $this->Search . '%');
            })
            ->onlyTrashed() // Fetch only trashed records
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.admin.page.team.team-trash', compact('team'));
    }
}
