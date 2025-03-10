@push('styles')
    <!-- intl-tel-input CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/phone_js/intlTelInput.min.css') }}">
@endpush

<div class="mb-3 col-md-6">
    <div class="form-group">
        <div wire:ignore>
            <label for="phone" class="form-label">Enter your phone number:</label> <br>
            <input id="phoneNumber" type="tel" class="form-control" onkeyup="validatePhone()"
                placeholder="Enter your phone number">
        </div>

        <div id="validationMessage" class="d-none" style="color: var(--bs-form-invalid-color);font-size: .875em;">
            Invalid phone number. Please try again.
        </div>
        @error($name)
            <div id="livewireValidationMessage" style="color: var(--bs-form-invalid-color);font-size: .875em;">
                Invalid phone number. Please try again.
            </div>
        @enderror

    </div>
</div>

@push('scripts')
    <!-- intl-tel-input JS -->
    <script src="{{ asset('assets/js/phone_js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/phone_js/utils.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.querySelector("#phoneNumber");
            // Initialize intl-tel-input
            const iti = window.intlTelInput(input, {
                initialCountry: "in", // Default country
                separateDialCode: true,
                preferredCountries: ["in", "us", "gb", "ca", "au", "de", "fr", "it", "za"],
            });

            // Function to validate phone number
            window.validatePhone = function() {
                if (iti.isValidNumber()) {
                    validationMessage.classList.add("d-none");
                    input.classList.remove("is-invalid");
                    const countryCode = iti.getSelectedCountryData().iso2.toUpperCase();
                    const countryDigit = `+${iti.getSelectedCountryData().dialCode}`;
                    const mobileNumber = input.value.replace(/\s/g, '');
                    @this.set('columns.ab_number', mobileNumber, false);
                } else {
                    validationMessage.classList.remove("d-none");
                    input.classList.add("is-invalid");
                    @this.set('columns.ab_number', "", false);
                    const livewireValidationMessage = document.getElementById("livewireValidationMessage");
                    if (livewireValidationMessage) {
                        livewireValidationMessage.classList.add("d-none");
                    }
                }
            };
            input.addEventListener("countrychange", function() {
                validatePhone();
            });
        });
    </script>
@endpush
