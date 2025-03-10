<div class="modal fade effect-rotate-left" id="{{ $id }}">
    <div class="modal-dialog {{ $size }} modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="submitForm">
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    @if (isset($footer))
                        {{ $footer }}
                    @else
                        <button type="button" class="btn btn-danger btn-raised-shadow btn-wave"
                            data-bs-dismiss="modal">Close</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
