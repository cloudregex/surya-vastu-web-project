<?php

namespace App\Livewire\Admin\UserManagement\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserTrash extends Component
{
    use WithPagination;
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
        if (!User::find(Auth::id())->can('admin.user.trash')) {
            abort(403); // You can customize this response
        }
    }
    public function render()
    {
        $users = User::with('roles')
            ->onlyTrashed()
            ->where('id', '!=', Auth::id())
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->Search . '%')
                    ->orWhereHas('roles', function ($roleQuery) {
                        $roleQuery->where('name', 'like', '%' . $this->Search . '%');
                    });
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.admin.user-management.users.user-trash', compact('users'));
    }
}