<div class="container">
    @if (session('SUCCESS'))
        <x-success message="{{ session('SUCCESS') }}" />
    @endif
    <form wire:submit="submitForm">
        <div class="row">
            @if ($users->password)
                <x-input type="password" placeholder="Enter your old password" col="12" icon="mdi mdi-lock"
                    name="old_password" label="Old Password" value="" />
            @endif

            <x-input type="password" placeholder="Enter new password" col="12" icon="mdi mdi-lock-reset"
                name="new_password" label="New Password" value="" />

            <x-input type="password" placeholder="Confirm password" col="12" icon="mdi mdi-lock-reset"
                name="confirm_password" label="Confirm Password" value="" />

            <div class="col-md-12 text-center">
                <x-button color="primary" name="Update" class="w-100" />
            </div>
        </div>
    </form>
</div>
