<x-card-comp listRoute="admin.team.list" listButtonName="Go to Team List" title="Create Team">
    <x-slot name="CardBody">
        <div class="row">
            <x-input type="text" placeholder="Enter Team User Name" col="4" name="columns.team_user_name"
                value="" label="User Name" />
            <x-input type="text" placeholder="Enter Team Profession" col="4" name="columns.team_profession"
                value="" label="User Profession" />
            <x-input type="number" placeholder="Enter Service Sequence" col="4" name="columns.team_sequence"
                value="" label="Service Sequence" />
            <!-- Testimonial Image -->
            <x-file-upload name="columns.team_image" label="Upload Image (300x350)" col="12" :existingFile="$existingFile"
                previewWidth="200" previewHeight="60" />


        </div>
    </x-slot>
</x-card-comp>
