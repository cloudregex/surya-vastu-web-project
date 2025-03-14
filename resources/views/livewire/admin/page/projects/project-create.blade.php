<x-card-comp listRoute="admin.projects.list" listButtonName="Go to Project List" title="Create Project">
    <x-slot name="CardBody">
        <div class="row">
            <x-input type="text" placeholder="Enter Project Title" col="4" name="columns.project_title"
                value="" label="Title" />
            <x-input type="text" placeholder="Enter Project Location" col="4" name="columns.project_location"
                value="" label="Project Location" />
            <x-input type="text" placeholder="Enter Project Author Name" col="4"
                name="columns.project_user_name" value="" label="Project Author" />
            <x-date-pick placeholder="Select Date" id="12" col="4" name="columns.project_date"
                value="{{ $columns['project_date'] }}" label="Date" />
            <!-- Testimonial Image -->
            <x-file-upload name="columns.project_image" label="Upload Image (600x500)" col="4" :existingFile="$existingFile"
                previewWidth="200" previewHeight="60" />
            <x-input type="number" placeholder="Enter Project Sequence" col="4" name="columns.project_sequence"
                value="" label="Project Sequence" />
            <x-summer-note name="columns.project_description" label="Description"
                placeholder="Enter Project Description...." col="12" />
        </div>
    </x-slot>
</x-card-comp>
