<div class="mb-3 col-md-{{ $col }}">
    <div wire:ignore>
        <label class="form-label">{{ $label }}</label>
        <select class="{{ $className }} js-states" name="{{ $name }}" multiple="multiple">
            @foreach ($options as $key => $option)
                <option value="{{ $option->$optionsid }}"
                    {{ in_array($option->$optionsid, $value ?? []) ? 'selected' : '' }}>
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
                dropdownPosition: 'below',
            }).on('change', function(e) {
                @this.set('{{ $name }}', $(this).val(), '{{ $shouldLive }}');
            });
            // Trim whitespace from each option
            $('.{{ $className }} option').each(function() {
                $(this).text($(this).text().trim());
            });
            Livewire.on('clearSelect2', () => {
                $(".{{ $className }}").val(null).trigger('change');
            });

        })
    </script>
@endpush
