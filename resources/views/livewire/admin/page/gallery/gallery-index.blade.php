<x-dynamic-table icon='<i class="bi bi-plus-lg"></i>' createRoute="admin.gallery.create" trashRoute="admin.gallery.trash"
    createButton="Create Gallery" listName="Gallery List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$gallery"
    :arrayThead="[['th' => 'Sr.No'], ['th' => 'gallery_image', 'sort' => 'gallery_image'], ['th' => 'Action']]">
    <x-slot name="tbody">
        @foreach ($gallery as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    @if ($item->gallery_image)
                        <img src="{{ asset('storage/' . $item->gallery_image) }}" alt="Gallery Image"
                            style="width: 100px; height: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <x-a-link target="admin.gallery.edit"
                        href="{{ route('admin.gallery.edit', encryptData($item->gallery_id)) }}" color="success"
                        icon="<i class='fa-regular fa-pen-to-square'></i>" />
                    <x-a-link target="admin.gallery.delete"
                        href="{{ route('admin.gallery.delete', encryptData($item->gallery_id)) }}" color="danger"
                        icon="<i class='fa-solid fa-trash-can'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
