<x-card-comp listRoute="admin.testimonial.list" listButtonName="Go to Testimonial List" title="Edit Testimonial">
    <x-slot name="CardBody">
        <div class="row">
            <!-- Testimonial Name -->
            <x-input type="text" placeholder="Enter testimonial user name" col="6" name="columns.testimonial_name"
                label="User Name" value="{{ $columns['testimonial_name'] }}" />

            <!-- Testimonial Profession -->
            <x-input type="text" placeholder="Enter profession" col="6" name="columns.testimonial_profession"
                label="Profession" value="{{ $columns['testimonial_profession'] }}" />

            <!-- Testimonial Image -->
            <x-file-upload name="columns.testimonial_image" label="Upload Image (400x400)" col="6"
                :existingFile="$existingFile" previewWidth="200" previewHeight="60" />

            <x-input type="number" placeholder="Enter Testimonial Sequence" col="6"
                name="columns.testimonial_sequence" value="{{ $columns['testimonial_sequence'] }}"
                label="Testimonial Sequence" />
            <!-- Testimonial Description -->
            <x-textarea name="columns.testimonial_description" label="Description" placeholder="Enter description"
                rows="5" col="12" value="{{ $columns['testimonial_description'] }}" />

        </div>
    </x-slot>
</x-card-comp>
