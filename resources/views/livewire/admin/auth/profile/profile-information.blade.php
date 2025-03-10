<div class="container">
    @if (session('SUCCESS'))
        <x-success message="{{ session('SUCCESS') }}" />
    @endif
    @if (session('FAILED'))
        <x-failure message="{{ session('FAILED') }}" />
    @endif
    @if (!Auth::user()->hasVerifiedEmail())
        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="flex-shrink-0 me-2 svg-danger" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000">
                <g>
                    <rect fill="none" height="24" width="24" />
                </g>
                <g>
                    <g>
                        <g>
                            <path
                                d="M15.73,3H8.27L3,8.27v7.46L8.27,21h7.46L21,15.73V8.27L15.73,3z M19,14.9L14.9,19H9.1L5,14.9V9.1L9.1,5h5.8L19,9.1V14.9z" />
                            <rect height="6" width="2" x="11" y="7" />
                            <rect height="2" width="2" x="11" y="15" />
                        </g>
                    </g>
                </g>
            </svg>
            <div>
                Send Verification Email <x-button color="success" class="btn-sm" name="Click"
                    wire:click="sendVerificationEmail" />
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                    class="bi bi-x"></i></button>
        </div>
    @endif

    <form wire:submit.prevent="submitForm" enctype="multipart/form-data">
        <div class="row">
            <x-input type="text" placeholder="Enter your first name" col="12" icon="fa-regular fa-user"
                name="name" value="{{ $name }}" label="Name" />

            <x-input type="email" placeholder="Enter your email" col="12" icon="fa-regular fa-envelope"
                name="email" value="{{ $email }}" label="Email" />

            <x-file-upload name="profile_picture" label="Upload Profile Picture" col="12" previewWidth="200"
                previewHeight="60" :existingFile="$oldfile_picture" />

            <div class="col-md-12 text-center">
                <x-button color="primary" name="Update" class="w-100" />
            </div>
        </div>
    </form>
</div>
