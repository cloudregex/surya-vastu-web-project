<x-card-comp listRoute="admin.services.index" listButtonName="Go to Service List" title="Edit Service">
    <x-slot name="CardBody">
        <div class="row">
            <x-input type="text" placeholder="Enter Service Title" col="5" name="columns.service_name"
                value="{{ $columns['service_name'] }}" label="Title" />
            <!-- Service Image -->
            <x-file-upload name="columns.service_image" label="Upload Image (600x400)" col="5" :existingFile="$existingFile"
                previewWidth="200" previewHeight="60" />

            <x-input type="number" placeholder="Enter Service Sequence" col="2" name="columns.service_sequence"
                value="{{ $columns['service_sequence'] }}" label="Service Sequence" />

            <x-summer-note name="columns.service_description" label="Description"
                placeholder="Enter Service Description...." col="12" :value="$columns['service_description']" />
        </div>
    </x-slot>
</x-card-comp>
