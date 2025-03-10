<x-dynamic-table icon='<i class="bi bi-arrow-left"></i>' createRoute="admin.testimonial.list" createButton="Go Back"
    listName="Trash List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$testimonial" :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Title', 'sort' => 'testimonial_name'],
        ['th' => 'Profession', 'sort' => 'testimonial_Profession'],
        ['th' => 'Image'],
        ['th' => 'Action'],
    ]">
    <x-slot name="tbody">
        @foreach ($testimonial as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->testimonial_name }}</td>
                <td>{{ $item->testimonial_profession }}</td>
                <td>
                    @if ($item->testimonial_image)
                        <img src="{{ asset('storage/' . $item->testimonial_image) }}" alt="Side Bar Image"
                            style="width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <x-a-link target="admin.testimonial.delete"
                        href="{{ route('admin.testimonial.delete', encryptData($item->testimonial_id)) }}"
                        color="success" icon="<i class='fa-solid fa-trash-can-arrow-up'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
