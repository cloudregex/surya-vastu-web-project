<?php

namespace App\Livewire\Admin\UserManagement\Permission;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionCreate extends Component
{
    public $permissions = [];
    public $formattedRoutes = [];

    public function mount()
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.permission.create')) {
            abort(403); // You can customize this response
        }
        // Fetching all named routes
        $routes = app('router')->getRoutes();

        // Get existing permissions from the database
        $existingPermissions = Permission::pluck('name')->toArray();

        foreach ($routes as $route) {
            if (str_starts_with($route->getName(), 'admin')) {
                $titleName = str_replace(['.', '_', '-'], ' ', str_replace('admin.', '', $route->getName()));
                $permissionName = $route->getName();

                // Only add to formattedRoutes if the permission does not already exist
                if (!in_array($permissionName, $existingPermissions)) {
                    $this->formattedRoutes[] = [
                        'name' => $permissionName,
                        'title_name' => trim($titleName),
                    ];
                }
            }
        }
    }


    public function submitForm()
    {
        // Validate the permissions array
        $this->validate([
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'string|distinct',
        ]);

        try {
            foreach ($this->permissions as $permissionName) {
                // Get the corresponding title name
                $titleName = $this->formattedRoutes[array_search($permissionName, array_column($this->formattedRoutes, 'name'))]['title_name'] ?? null;

                // Create the new permission with title_name
                Permission::create(['name' => $permissionName, 'title_name' => $titleName]);
            }

            session()->flash('SUCCESS', 'Permissions created successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            session()->flash('FAILED', 'Failed to create permissions. Please try again.');
        }

        return redirect()->route('admin.permission.list');
    }

    public function render()
    {
        return view('livewire.admin.user-management.permission.permission-create');
    }
}