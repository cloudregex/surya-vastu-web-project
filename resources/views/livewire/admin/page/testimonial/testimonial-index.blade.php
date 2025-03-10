<x-dynamic-table icon='<i class="bi bi-plus-lg"></i>' createRoute="admin.testimonial.create"
    trashRoute="admin.testimonial.trash" createButton="Create Testimonial" listName="Testimonial List" :sortBy="$sortBy"
    :sortDir="$sortDir" :array="$testimonial" :arrayThead="[
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
                    @can('admin.testimonial.edit')
                        <x-a-link target="admin.testimonial.edit"
                            href="{{ route('admin.testimonial.edit', encryptData($item->testimonial_id)) }}" color="success"
                            icon="<i class='fa-regular fa-pen-to-square'></i>" />
                    @else
                        <button class="btn btn-success btn-raised-shadow btn-wave" disabled>
                            <i class="fa-solid fa-ban"></i></button>
                    @endcan
                    @can('admin.testimonial.delete')
                        <x-a-link target="admin.testimonial.delete"
                            href="{{ route('admin.testimonial.delete', encryptData($item->testimonial_id)) }}"
                            color="danger" icon="<i class='fa-solid fa-trash-can'></i>" />
                    @else
                        <button class="btn btn-danger btn-raised-shadow btn-wave" disabled>
                            <i class="fa-solid fa-ban"></i></button>
                    @endcan
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
