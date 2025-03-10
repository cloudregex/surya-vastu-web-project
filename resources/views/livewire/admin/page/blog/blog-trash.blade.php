<x-dynamic-table icon='<i class="bi bi-arrow-left"></i>' createRoute="admin.blog.list" createButton="Go to Blog List"
    listName="Trash List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$blogs" :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Title', 'sort' => 'blog_title'],
        ['th' => 'Blog User', 'sort' => 'blog_user_name'],
        ['th' => 'Date', 'sort' => 'blog_date'],
        ['th' => 'Image', 'sort' => 'blog_image'],
        ['th' => 'Action'],
    ]">
    <x-slot name="tbody">
        @foreach ($blogs as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->blog_title }}</td>
                <td>{{ $item->blog_user_name }}</td>
                <td>{{ format_date($item->blog_date, 'short') }}</td>
                <td>
                    @if ($item->blog_image)
                        <img src="{{ asset('storage/' . $item->blog_image) }}" alt="Side Bar Image"
                            style="width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <x-a-link target="admin.blog.delete"
                        href="{{ route('admin.blog.delete', encryptData($item->blog_id)) }}" color="success"
                        icon="<i class='fa-solid fa-trash-can-arrow-up'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
