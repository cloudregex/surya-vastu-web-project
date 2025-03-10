<div class="mb-3 col-md-{{ $col }}">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <div class="input-group">
        @if ($icon)
            <span class="input-group-text">
                <i class="{{ $icon }}" style="font-size: 16px;"></i>
            </span>
        @endif
        <textarea class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}"
            placeholder="{{ $placeholder }}" rows="{{ $rows }}" wire:model.lazy="{{ $name }}">{{ $value }}</textarea>
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
