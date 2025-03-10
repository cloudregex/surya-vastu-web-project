<x-dynamic-table icon='<i class="bi bi-plus-lg"></i>' createRoute="admin.permission.create"
    createButton="Create Permission" listName="Permission List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$permissions"
    :arrayThead="[['th' => 'Sr.No', 'sort' => 'id'], ['th' => 'Name', 'sort' => 'name']]">
    <x-slot name="tbody">
        @foreach ($permissions as $key => $permission)
            <tr wire:key="{{ $permission->id }}">
                <td>
                    {{ SortSrNo($permissions->currentPage(), $permissions->perPage(), $key, $sortDir, $permissions->total()) }}
                </td>
                <td>{{ $permission->title_name }}</td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
