<?php

namespace App\Livewire\Admin\UserManagement\Role;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    public $roleName;
    public $permissions = [];
    public $availablePermissions = [];

    protected $rules = [
        'roleName' => 'required|unique:roles,name',
        'permissions' => 'required|array|min:1',
    ];

    public function mount()
    {

        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.role.create')) {
            abort(403); // You can customize this response
        }
        // Fetch all permissions
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $prefix = explode(' ', $permission->title_name)[0];
            // Initialize the array for this prefix if it doesn't exist
            if (!isset($this->availablePermissions[$prefix])) {
                $this->availablePermissions[$prefix] = [
                    'prefix_name' => $prefix,
                    'data' => [],
                ];
            }
            // Add the permission to the 'data' array under the correct prefix
            $this->availablePermissions[$prefix]['data'][] = [
                'id' => $permission->id,
                'name' => $permission->name,
                'guard_name' => $permission->guard_name,
                'title_name' => $permission->title_name,
            ];
        }
    }


    public function submitForm()
    {
        $this->validate();

        $role = Role::create(['name' => $this->roleName]);
        $role->syncPermissions($this->permissions);

        session()->flash('message', 'Role created successfully.');

        // Redirect back to the roles list
        return redirect()->route('admin.user.edit');
    }
    public function render()
    {
        return view('livewire.admin.user-management.role.role-create');
    }
}