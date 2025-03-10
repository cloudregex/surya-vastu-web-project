<button {{ $attributes->merge(['class' => "btn btn-{$color} btn-raised-shadow btn-wave {$class}"]) }}
    wire:loading.attr="disabled" wire:target="submitForm" data-bs-toggle="tooltip" title="{{ $title }}">
    <span wire:loading.remove wire:target="submitForm">{{ $name }}</span>
    <span wire:loading wire:target="submitForm">
        <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>
        <span class="visually-hidden">Loading...</span>
    </span>
</button>
