<x-card-comp listRoute="admin.side.bar.list" listButtonName="Go Sliders List" title="Slider Create">
    <x-slot name="CardBody">
        <div class="row">
            <x-input type="text" placeholder="Enter your title" col="6" name="columns.slider_title" value=""
                label="Title" />
            <x-input type="text" placeholder="Enter your sub-title" col="6" name="columns.slider_sub_title"
                value="" label="Sub Title" />
            <x-input type="number" placeholder="Enter Slider Sequence" col="6" name="columns.slider_sequence"
                value="" label="Slider Sequence" />
            <!-- Testimonial Image -->
            <x-file-upload name="columns.slider_image" label="Upload Image (1920x1080)" col="6" :existingFile="$existingFile"
                previewWidth="200" previewHeight="60" />
        </div>
    </x-slot>
</x-card-comp>
