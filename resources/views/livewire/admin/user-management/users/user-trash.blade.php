<x-dynamic-table icon='<i class="bi bi-arrow-left"></i>' createRoute="admin.user.list" createButton="Go Back"
    listName="Trash List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$users" :arrayThead="[
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
                    <span
                        class="badge bg-{{ $user->status == 'ACTIVE' ? 'success' : 'danger' }}">{{ $user->status }}</span>
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
                    <x-a-link target="admin.user.delete" href="{{ route('admin.user.delete', encryptData($user->id)) }}"
                        color="success" icon="<i class='fa-solid fa-trash-can-arrow-up'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
