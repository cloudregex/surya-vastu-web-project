<x-dynamic-table icon='<i class="bi bi-plus-lg"></i>' createRoute="admin.blog.create" trashRoute="admin.blog.trash"
    createButton="Create Blog" filter="true" listName="Blog List" :filters="$filters" :sortBy="$sortBy" :sortDir="$sortDir"
    :array="$Blog" :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Title', 'sort' => 'blog_title'],
        ['th' => 'Blog User', 'sort' => 'blog_user_name'],
        ['th' => 'Date', 'sort' => 'blog_date'],
        ['th' => 'Image', 'sort' => 'blog_image'],
        ['th' => 'Action'],
    ]">
    <x-slot name="filter_data">
        <div class="row">
            <x-input type="text" placeholder="Enter Blog Title" col="6" name="filters.blog_title"
                value="{{ $filters['blog_title'] }}" label="Title" modelOn='true' />
            <x-input type="text" placeholder="Enter Blog Auther Name" col="6" name="filters.blog_user_name"
                value="{{ $filters['blog_user_name'] }}" label="Blog Auther" modelOn='true' />
        </div>
    </x-slot>
    <x-slot name="tbody">
        @foreach ($Blog as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->blog_title }}</td>
                <td>{{ $item->blog_user_name }}</td>
                <td>{{ format_date($item->blog_date, 'short') }}</td>
                <td>
                    @if ($item->blog_image)
                        <img src="{{ asset('storage/' . $item->blog_image) }}" alt="Blog Image"
                            style="width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <x-a-link target="admin.blog.edit"
                        href="{{ route('admin.blog.edit', encryptData($item->blog_id)) }}" color="success"
                        icon="<i class='fa-regular fa-pen-to-square'></i>" />
                    <x-a-link target="admin.blog.delete"
                        href="{{ route('admin.blog.delete', encryptData($item->blog_id)) }}" color="danger"
                        icon="<i class='fa-solid fa-trash-can'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
