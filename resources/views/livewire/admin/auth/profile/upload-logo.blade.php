<div class="container">
    @if (session('SUCCESS'))
        <x-success message="{{ session('SUCCESS') }}" />
    @endif
    <form wire:submit="submitForm">
        <div class="row">
            <x-file-upload name="desktop_white" label="Desktop Logo White" col="6" :existingFile="$existingDesktopWhite"
                previewWidth="200" previewHeight="60" />

            <x-file-upload name="desktop_dark" label="Desktop Logo Dark" col="6" :existingFile="$existingDesktopDark"
                previewWidth="200" previewHeight="60" />

            <x-file-upload name="toggle_white" label="Toggle Logo White" col="6" :existingFile="$existingToggleWhite"
                previewWidth="200" previewHeight="60" />

            <x-file-upload name="toggle_dark" label="Toggle Logo Dark" col="6" :existingFile="$existingToggleDark"
                previewWidth="200" previewHeight="60" />

            <div class="col-md-12 text-center">
                <x-button color="primary" name="Update" class="w-100" />
            </div>
        </div>
    </form>
</div>
