<div class="toast-container position-fixed top-0 end-0 p-3">
    <!-- Success Toast -->
    <div id="successToasts" class="toast colored-toast bg-success-transparent" role="alert" aria-live="assertive"
        aria-atomic="true" data-bs-delay="4000" data-bs-autohide="true">
        <div class="toast-header bg-success text-fixed-white">
            <svg class="bd-placeholder-img rounded me-2 svg-white" xmlns="http://www.w3.org/2000/svg" height="1.5rem"
                viewBox="0 0 24 24" width="1.5rem" fill="#000000">
                <path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none" />
                <path
                    d="M16.59 7.58L10 14.17l-3.59-3.58L5 12l5 5 8-8zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
            </svg>
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="successMessage"></div>
    </div>

    <!-- Error Toast -->
    <div id="errorToasts" class="toast colored-toast bg-danger-transparent" role="alert" aria-live="assertive"
        aria-atomic="true" data-bs-delay="4000" data-bs-autohide="true">
        <div class="toast-header bg-danger text-fixed-white">
            <!-- Inline SVG for the close or error icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="me-2 fs-4" fill="currentColor" viewBox="0 0 24 24"
                width="24" height="24">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm4.95 6.95a.75.75 0 0 0-1.06-1.06L12 10.94 8.11 6.95a.75.75 0 0 0-1.06 1.06L10.94 12l-3.9 3.9a.75.75 0 0 0 1.06 1.06l3.9-3.9 3.9 3.9a.75.75 0 0 0 1.06-1.06L13.06 12l3.9-3.9Z">
                </path>
            </svg>
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="errorMessage"></div>
    </div>
</div>


@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Listen for success toast events
            Livewire.on('ToastSuccess', function(message) {
                var toastElement = document.getElementById("successToasts");
                var toastMessage = document.getElementById("successMessage");
                toastMessage.textContent = message;

                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            });

            // Listen for error toast events
            Livewire.on('ToastError', function(message) {
                var toastElement = document.getElementById("errorToasts");
                var toastMessage = document.getElementById("errorMessage");
                toastMessage.textContent = message;

                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            });
        });
    </script>
@endpush
