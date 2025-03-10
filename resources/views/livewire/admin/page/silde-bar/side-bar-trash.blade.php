<x-dynamic-table icon='<i class="bi bi-arrow-left"></i>' createRoute="admin.side.bar.list" createButton="Go Back"
    listName="Trash List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$sideBar" :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Title', 'sort' => 'slider_title'],
        ['th' => 'Sub Title', 'sort' => 'slider_sub_title'],
        ['th' => 'Image', 'sort' => 'slider_image'],
        ['th' => 'Action'],
    ]">
    <x-slot name="tbody">
        @foreach ($sideBar as $key => $sideBar)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $sideBar->slider_title }}</td>
                <td>{{ $sideBar->slider_sub_title }}</td>
                <td>
                    @if ($sideBar->slider_image)
                        <img src="{{ asset('storage/' . $sideBar->slider_image) }}" alt="Side Bar Image"
                            style="width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <x-a-link target="admin.side.bar.delete"
                        href="{{ route('admin.side.bar.delete', encryptData($sideBar->slider_id)) }}" color="success"
                        icon="<i class='fa-solid fa-trash-can-arrow-up'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
