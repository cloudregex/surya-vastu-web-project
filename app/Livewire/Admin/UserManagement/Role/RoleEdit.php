<?php

namespace App\Livewire\Admin\UserManagement\Role;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleEdit extends Component
{
    public $role;
    public $roleId;
    public $roleName;
    public $permissions = [];
    public $availablePermissions = []; // Initialize as an array

    public function mount($encryptedId)
    {
        if (!User::find(Auth::id())->can('admin.role.edit')) {
            abort(403); // You can customize this response
        }
        $decryptedID = decryptData($encryptedId);
        $this->role = Role::find($decryptedID);
        $this->roleName = $this->role->name;

        // Change this line to get the permission IDs instead of names
        $this->permissions = $this->role->permissions()->pluck('id')->toArray(); // Get IDs

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

    protected $rules = [
        'roleName' => 'required|unique:roles,name',
        'permissions' => 'required|array|min:1',
    ];

    public function submitForm()
    {
        $this->rules['roleName'] .= ',' . ($this->role->id ?? 'NULL');
        $this->validate();

        $this->role->update(['name' => $this->roleName]);
        $this->role->permissions()->sync($this->permissions);

        session()->flash('SUCCESS', 'Role updated successfully!');
        return redirect()->route('admin.user.edit');
    }

    public function render()
    {
        return view('livewire.admin.user-management.role.role-edit');
    }
}