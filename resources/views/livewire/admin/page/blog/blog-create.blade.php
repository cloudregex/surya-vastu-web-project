<x-card-comp listRoute="admin.blog.list" listButtonName="Go to Blog List" title="Create Blog">
    <x-slot name="CardBody">
        <div class="row">
            <x-input type="text" placeholder="Enter Blog Title" col="5" name="columns.blog_title" value=""
                label="Title" />
            <x-input type="text" placeholder="Enter Blog Author Name" col="5" name="columns.blog_user_name"
                value="" label="Blog Author" />
            <x-input type="number" placeholder="Enter Blog Sequence" col="2" name="columns.blog_sequence"
                value="" label="Blog Sequence" />
            <x-date-pick placeholder="Select Date" id="12" col="6" name="columns.blog_date"
                value="{{ $columns['blog_date'] }}" label="Date" />
            <!-- Testimonial Image -->
            <x-file-upload name="columns.blog_image" label="Upload Image (500x350)" col="6" :existingFile="$existingFile"
                previewWidth="200" previewHeight="60" />
            <x-summer-note name="columns.blog_description" label="Description" placeholder="Enter Blog Description...."
                col="12" />
        </div>
    </x-slot>
</x-card-comp>
