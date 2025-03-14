<x-dynamic-table icon='<i class="bi bi-plus-lg"></i>' createRoute="admin.projects.create" trashRoute="admin.projects.trash"
    createButton="Create Project" filter="true" listName="Project List" :filters="$filters" :sortBy="$sortBy"
    :sortDir="$sortDir" :array="$Project" :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Title', 'sort' => 'project_title'],
        ['th' => 'Location', 'sort' => 'project_location'],
        ['th' => 'Project User', 'sort' => 'project_user_name'],
        ['th' => 'Date', 'sort' => 'project_date'],
        ['th' => 'Image', 'sort' => 'project_image'],
        ['th' => 'Action'],
    ]">
    <x-slot name="filter_data">
        <div class="row">
            <x-input type="text" placeholder="Enter Project Title" col="6" name="filters.project_title"
                value="{{ $filters['project_title'] }}" label="Title" modelOn='true' />
            <x-input type="text" placeholder="Enter Project Location" col="6" name="filters.project_location"
                value="{{ $filters['project_location'] }}" label="Location" modelOn='true' />
            <x-input type="text" placeholder="Enter Project Author Name" col="6"
                name="filters.project_user_name" value="{{ $filters['project_user_name'] }}" label="Project Author"
                modelOn='true' />
            <x-date-pick placeholder="Select Date" col="6" name="filters.project_date"
                value="{{ $filters['project_date'] }}" label="Date" modelOn='true' />
        </div>
    </x-slot>
    <x-slot name="tbody">
        @foreach ($Project as $key => $item)
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
                    <x-a-link target="admin.projects.edit"
                        href="{{ route('admin.projects.edit', encryptData($item->project_id)) }}" color="success"
                        icon="<i class='fa-regular fa-pen-to-square'></i>" />
                    <x-a-link target="admin.projects.delete"
                        href="{{ route('admin.projects.delete', encryptData($item->project_id)) }}" color="danger"
                        icon="<i class='fa-solid fa-trash-can'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
