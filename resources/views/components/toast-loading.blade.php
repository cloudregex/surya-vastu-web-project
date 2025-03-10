<div class="toast-container position-fixed top-0 end-0 p-3">
    <!-- Success Toast -->
    <div id="successToast" class="toast colored-toast bg-success-transparent" role="alert" aria-live="assertive"
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
    <div id="errorToast" class="toast colored-toast bg-danger-transparent" role="alert" aria-live="assertive"
        aria-atomic="true" data-bs-delay="4000" data-bs-autohide="true">
        <div class="toast-header bg-danger text-fixed-white">
            <i class="fa-sharp fa-regular fa-circle-xmark me-2 fs-4"></i>
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="errorMessage"></div>
    </div>

    <!-- Loading Toast -->
    <div id="loadingToasts" class="toast colored-toast bg-primary-transparent" role="alert" aria-live="assertive"
        aria-atomic="true" data-bs-delay="4000" data-bs-autohide="true">
        <div class="toast-header bg-primary text-fixed-white">
            <!-- Spinner Icon -->
            <div class="spinner-border spinner-border-sm me-2" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <strong class="me-auto">Loading</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="loadingMessages"></div>
    </div>


</div>


@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Listen for success toast events
            Livewire.on('ToastSuccess', function(message) {

                var loadingEl = document.getElementById("loadingToasts");
                var loadingToast = bootstrap.Toast.getInstance(loadingEl);
                if (loadingToast) {
                    loadingToast.hide();
                }

                var toastElement = document.getElementById("successToast");
                var toastMessage = document.getElementById("successMessage");
                toastMessage.textContent = message;

                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            });

            // Listen for error toast events
            Livewire.on('ToastError', function(message) {

                var loadingEl = document.getElementById("loadingToasts");
                var loadingToast = bootstrap.Toast.getInstance(loadingEl);
                if (loadingToast) {
                    loadingToast.hide();
                }

                var toastElement = document.getElementById("errorToast");
                var toastMessage = document.getElementById("errorMessage");
                toastMessage.textContent = message;

                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            });

            // Listen for loading toasts
            Livewire.on('ToastLoading', function(message) {
                var toastElement = document.getElementById("loadingToasts");
                var toastMessage = document.getElementById("loadingMessages");
                toastMessage.textContent = message;

                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            });
        });
    </script>
@endpush
