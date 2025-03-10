<x-dynamic-table icon='<i class="bi bi-arrow-left"></i>' createRoute="admin.services.index" trashRoute=""
    createButton="Back to Services" filter="true" listName="Trashed Services List" :sortBy="$sortBy" :sortDir="$sortDir"
    :array="$services" :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Title', 'sort' => 'service_name'],
        ['th' => 'Image', 'sort' => 'service_image'],
        ['th' => 'Created At', 'sort' => 'created_at'],
        ['th' => 'Action'],
    ]">

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
                    <x-a-link target="admin.services.delete"
                        href="{{ route('admin.services.delete', encryptData($item->service_id)) }}" color="success"
                        icon="<i class='fa-solid fa-trash-can-arrow-up'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
