<x-card-comp listRoute="admin.team.list" listButtonName="Go to Team List" title="Create Team">
    <x-slot name="CardBody">
        <div class="row">
            <!-- Testimonial Image -->
            <x-file-upload name="columns.gallery_image" label="Upload Image (600x500)" col="6" :existingFile="$existingFile"
                previewWidth="200" previewHeight="60" />
            <x-input type="number" placeholder="Enter Testimonial Sequence" col="6"
                name="columns.gallery_sequence" value="{{ $columns['gallery_sequence'] }}"
                label="Testimonial Sequence" />
        </div>
    </x-slot>
</x-card-comp>
