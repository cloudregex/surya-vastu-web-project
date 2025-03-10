<x-dynamic-table icon='<i class="bi bi-plus-lg"></i>' createRoute="admin.services.create" trashRoute="admin.services.trash"
    createButton="Create Service" filter="true" listName="Service List" :filters="$filters" :sortBy="$sortBy"
    :sortDir="$sortDir" :array="$services" :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Title', 'sort' => 'service_name'],
        ['th' => 'Image', 'sort' => 'service_image'],
        ['th' => 'Created At', 'sort' => 'created_at'],
        ['th' => 'Action'],
    ]">
    <x-slot name="filter_data">
        <div class="row">
            <x-input type="text" placeholder="Enter Service Title" col="6" name="filters.service_name"
                value="{{ $filters['service_name'] }}" label="Title" modelOn='true' />
            <x-input type="text" placeholder="Enter Service Description" col="6"
                name="filters.service_description" value="{{ $filters['service_description'] }}" label="Description"
                modelOn='true' />
        </div>
    </x-slot>
    <x-slot name="tbody">
        @foreach ($services as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->service_name }}</td>
                <td>
                    @if ($item->service_image)
                        <img src="{{ asset('storage/' . $item->service_image) }}" alt="Service Image"
                            style="width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                <td>
                    <x-a-link target="admin.services.edit"
                        href="{{ route('admin.services.edit', encryptData($item->service_id)) }}" color="success"
                        icon="<i class='fa-regular fa-pen-to-square'></i>" />
                    <x-a-link target="admin.services.delete"
                        href="{{ route('admin.services.delete', encryptData($item->service_id)) }}" color="danger"
                        icon="<i class='fa-solid fa-trash-can'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
