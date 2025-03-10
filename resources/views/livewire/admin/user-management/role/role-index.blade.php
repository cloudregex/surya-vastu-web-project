<x-dynamic-table icon='<i class="bi bi-plus-lg"></i>' createRoute="admin.role.create" createButton="Create Role"
    listName="Role List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$roles" :arrayThead="[['th' => 'Sr.No'], ['th' => 'Name', 'sort' => 'name'], ['th' => 'Action']]">
    <x-slot name="tbody">
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @if ($role->name == 'Super Admin')
                        <button class="btn btn-success btn-raised-shadow btn-wave" disabled><i
                                class="fa-solid fa-ban"></i></button>
                    @else
                        <x-a-link target="admin.role.edit" href="{{ route('admin.role.edit', encryptData($role->id)) }}"
                            color="success" icon="<i class='fa-regular fa-pen-to-square'></i>" />
                    @endif
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
