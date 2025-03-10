<?php

namespace App\Livewire\Admin\UserManagement\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
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
        if (!User::find(Auth::id())->can('admin.user.list')) {
            abort(403); // You can customize this response
        }
    }
    public function DeleteUser($encryptedId)
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.user-delete')) {
            abort(403); // You can customize this response
        }

        // Decrypt the user ID
        $user = User::withTrashed()->find(decryptData($encryptedId));
        if ($user) {
            // Check if the user is not deleted
            if ($user->deleted_at == null) {
                // Deactivate and soft-delete the user
                $user->status = 'DEACTIVE';
                $user->save();
                $user->delete();
                session()->flash('FAILED', 'User deactivated and deleted successfully.');
            } else {
                // If the user is soft-deleted, restore the user and activate them
                $user->restore(); // Restore the soft-deleted user
                $user->status = 'ACTIVE';
                $user->save();
                session()->flash('SUCCESS', 'User restored and activated successfully.');
            }

            return redirect()->back();
        }

        // If the user is not found, show an error message
        session()->flash('FAILED', 'User not found.');
        return redirect()->route('admin.user.list');
    }
    public function StatusUpdate($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->status = $user->status == 'ACTIVE' ? 'DEACTIVE' : 'ACTIVE';
            $user->save();
            session()->flash('SUCCESS', 'User Status Update Successfully.');
        }
    }
    public function render()
    {
        $users = User::with('roles')
            ->where('id', '!=', Auth::id())
            ->where('id', '!=', 1)
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->Search . '%')
                    ->orWhereHas('roles', function ($roleQuery) {
                        $roleQuery->where('name', 'like', '%' . $this->Search . '%');
                    });
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.admin.user-management.users.user-index', compact('users'));
    }
}