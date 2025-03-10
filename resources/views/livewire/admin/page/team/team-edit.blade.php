<x-card-comp listRoute="admin.team.list" listButtonName="Go to Team List" title="Create Team">
    <x-slot name="CardBody">
        <div class="row">
            <x-input type="text" placeholder="Enter Team User Name" col="6" name="columns.team_user_name"
                value="{{ $columns['team_user_name'] }}" label="User Name" />
            <x-input type="text" placeholder="Enter Team Profession" col="6" name="columns.team_profession"
                value="{{ $columns['team_profession'] }}" label="User Profession" />
            <!-- Testimonial Image -->
            <x-file-upload name="columns.team_image" label="Upload Image (300x350)" col="12" :existingFile="$existingFile"
                previewWidth="200" previewHeight="60" />
        </div>
    </x-slot>
</x-card-comp>
