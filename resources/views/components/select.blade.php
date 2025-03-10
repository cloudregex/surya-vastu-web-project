<div class="mb-3 col-md-{{ $col }}">
    <div wire:ignore>
        <label class="form-label">{{ $label }}</label>
        <select class="{{ $className }} js-states is-invalid" name="{{ $name }}" single="single">
            <option value="">
                {{ $placeholder }}
            </option>
            @foreach ($options as $key => $option)
                <option value="{{ $option->$optionsid }}" {{ $option->$optionsid == $value ? 'selected' : '' }}>
                    {{ trim(strval($option->$optionsName)) }}
                </option>
            @endforeach
        </select>
    </div>
    @error($name)
        <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
    @enderror
</div>

@push('scripts')
    <script>
        $(function() {
            const dropdownParent = @json($dropdownParent) != null ? '#' + @json($dropdownParent) : $(
                document
                .body)

            const roleSelect = $(".{{ $className }}");
            roleSelect.select2({
                placeholder: "{{ $placeholder }}",
                dropdownParent: dropdownParent,

            }).on('change', function(e) {
                @this.set("{{ $name }}", $(this).val(), '{{ $shouldLive }}');
            });
            $('.js-example-placeholder-single option').each(function() {
                $(this).text($(this).text().trim());
            });
        })
    </script>
@endpush
