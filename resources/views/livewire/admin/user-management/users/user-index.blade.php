<x-dynamic-table icon='<i class="bi bi-plus-lg"></i>' createRoute="admin.user.create" trashRoute="admin.user.trash"
    createButton="Create User" listName="User List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$users"
    :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Name', 'sort' => 'name'],
        ['th' => 'Email', 'sort' => 'email'],
        ['th' => 'Account Status', 'sort' => 'status'],
        ['th' => 'Role Name'],
        ['th' => 'Action'],
    ]">
    <x-slot name="tbody">
        @foreach ($users as $key => $user)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="badge bg-{{ $user->status == 'ACTIVE' ? 'success' : 'danger' }}" style="cursor: pointer"
                        wire:click="StatusUpdate({{ $user->id }})">{{ $user->status }}</span>
                </td>
                <td>
                    @if ($user->roles->isNotEmpty())
                        @foreach ($user->roles as $item)
                            <span class="badge bg-outline-primary">{{ $item->name }}</span>
                        @endforeach
                    @else
                        <span class="badge bg-outline-danger">No roles assigned</span>
                    @endif
                </td>
                <td>
                    <x-a-link target="admin.user.edit" href="{{ route('admin.user.edit', encryptData($user->id)) }}"
                        color="success" icon="<i class='fa-regular fa-pen-to-square'></i>" />
                    <x-a-link target="admin.user.delete" href="{{ route('admin.user.delete', encryptData($user->id)) }}"
                        color="danger" icon="<i class='fa-solid fa-trash-can'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
