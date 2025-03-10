<?php

namespace App\Livewire\Admin\UserManagement\Permission;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionIndex extends Component
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

    public function mount()
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.permission.list')) {
            abort(403); // You can customize this response
        }
    }
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
    public function render()
    {
        $permissions = Permission::where('name', 'like', '%' . $this->Search . '%')->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);

        return view('livewire.admin.user-management.permission.permission-index',  [
            'permissions' => $permissions,
        ]);
    }
}