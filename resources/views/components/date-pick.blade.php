<div class="mb-3 col-md-{{ $col }}">
    <label for="{{ $name }}" class="form-label">{{ $label }} @if ($required)
            <span class="text-danger">*</span>
        @endif </label>
    <div>
        @if ($icon)
            <span class="input-group-text">
                <i class="{{ $icon }}" style="font-size: 16px;"></i>
            </span>
        @endif
        <div wire:ignore>
            <input type="date" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
                id="datePick-{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value }}"
                data-name="{{ $name }}" data-liveon="{{ $liveOn }}">
        </div>
        @error($name)
            <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
        @enderror
    </div>
</div>

@push('scripts')
    <!-- Date & Time Picker JS -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script>
        function initializeFlatpickr(id, name, liveOn) {
            let parent = document.getElementById('FilterModal') || document.body;

            flatpickr("#datePick-" + id, {
                dateFormat: "Y-m-d", // Format for form submission
                altInput: true, // Use alternative input field
                altFormat: "d-m-Y", // Display format
                appendTo: parent,
                onChange: function(selectedDates, dateStr, instance) {
                    let formattedDate = instance.formatDate(selectedDates[0], "Y-m-d");
                    @this.set(name, formattedDate, liveOn);
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("[id^='datePick-']").forEach((el) => {
                let id = el.getAttribute("id").split('-')[1];
                let name = el.dataset.name;
                let liveOn = el.dataset.liveon;
                initializeFlatpickr(id, name, liveOn);
            });
        });

        // Reinitialize when modal is opened
        document.addEventListener('shown.bs.modal', function() {
            document.querySelectorAll("[id^='datePick-']").forEach((el) => {
                let id = el.getAttribute("id").split('-')[1];
                let name = el.dataset.name;
                let liveOn = el.dataset.liveon;
                initializeFlatpickr(id, name, liveOn);
            });
        });

        Livewire.on('clearDatepicker', function(datePickrId) {
            if (Array.isArray(datePickrId)) {
                datePickrId = datePickrId[0]; // Extract first item if it's an array
            }
            if (datePickrId) {
                let datepicker = document.querySelector(`[id="datePick-${datePickrId}"]`);
                if (datepicker && datepicker._flatpickr) {
                    datepicker.value = "";
                }
            }
        });
    </script>
@endpush
