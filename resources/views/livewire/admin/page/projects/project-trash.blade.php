<x-dynamic-table icon='<i class="bi bi-arrow-left"></i>' createRoute="admin.projects.list"
    createButton="Go to Project List" listName="Trash List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$projects"
    :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Title', 'sort' => 'project_title'],
        ['th' => 'Location', 'sort' => 'project_location'],
        ['th' => 'Project User', 'sort' => 'project_user_name'],
        ['th' => 'Date', 'sort' => 'project_date'],
        ['th' => 'Image', 'sort' => 'project_image'],
        ['th' => 'Action'],
    ]">
    <x-slot name="tbody">
        @foreach ($projects as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->project_title }}</td>
                <td>{{ $item->project_location }}</td>
                <td>{{ $item->project_user_name }}</td>
                <td>{{ format_date($item->project_date, 'short') }}</td>
                <td>
                    @if ($item->project_image)
                        <img src="{{ asset('storage/' . $item->project_image) }}" alt="Project Image"
                            style="width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <x-a-link target="admin.projects.delete"
                        href="{{ route('admin.projects.delete', encryptData($item->project_id)) }}" color="success"
                        icon="<i class='fa-solid fa-trash-can-arrow-up'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
