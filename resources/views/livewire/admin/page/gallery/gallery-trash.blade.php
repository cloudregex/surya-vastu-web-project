<x-dynamic-table icon='<i class="bi bi-arrow-left"></i>' createRoute="admin.gallery.list" createButton="Go to Gallery List"
    listName="Trash List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$gallery" :arrayThead="[['th' => 'Sr.No'], ['th' => 'Image', 'sort' => 'gallery_image'], ['th' => 'Action']]">
    <x-slot name="tbody">
        @foreach ($gallery as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    @if ($item->gallery_image)
                        <img src="{{ asset('storage/' . $item->gallery_image) }}" alt="Gallery Image"
                            style="width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <x-a-link target="admin.gallery.delete"
                        href="{{ route('admin.gallery.delete', encryptData($item->gallery_id)) }}" color="success"
                        icon="<i class='fa-solid fa-trash-can-arrow-up'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
