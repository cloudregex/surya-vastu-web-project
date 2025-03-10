<div class="col-md-{{ $col }} mb-3">
    <div class="row">
        <div wire:ignore.self class="col-12 col-md-{{ $existingFile ? 8 : 12 }}"
            id="preview-cols-{{ str_replace('.', '-', $name) }}">
            <label for="{{ $name }}" class="form-label">{{ $label }}</label>
            <input class="form-control @error($name) is-invalid @enderror" accept="image/png, image/jpeg, image/jpg"
                type="file" id="{{ $name }}" name="{{ $name }}" wire:model.lazy="{{ $name }}"
                onchange="previewImage(event, '{{ str_replace('.', '-', $name) }}')">
            @error($name)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Image Preview Column -->
        <div wire:ignore class="col {{ $existingFile ? '' : 'd-none' }}"
            id="preview-col-{{ str_replace('.', '-', $name) }}">
            <a href="{{ $existingFile ? asset('storage/' . $existingFile) : '#' }}"
                id="preview-link-{{ str_replace('.', '-', $name) }}" target="_blank">
                <img id="preview-img-{{ str_replace('.', '-', $name) }}"
                    src="{{ $existingFile ? asset('storage/' . $existingFile) : '' }}"
                    class="img-thumbnail mt-2 bg-danger-gradient"
                    style="width: {{ $previewWidth }}px; height: {{ $previewHeight }}px;" />
            </a>
        </div>
    </div>
</div>
