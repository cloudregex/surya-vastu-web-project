<x-card-comp listRoute="admin.user.list" listButtonName="Go Users List" title="User Create">
    <x-slot name="CardBody">
        <div class="row">
            <x-input type="text" placeholder="Enter your name" col="12" name="name" value=""
                label="Name" />
            <x-input type="email" placeholder="Enter your email" col="12" name="email" value=""
                label="Email" />
            <x-input type="text" placeholder="Enter your password" col="12" name="password" value=""
                label="Password" />
            <x-select-two placeholder="Select Role" col="12" name="selectedOptions" :value="$selectedOptions"
                label="Select your Role" :options="$availableRoles" optionsid="id" optionsName="name" />
        </div>
    </x-slot>
</x-card-comp>
