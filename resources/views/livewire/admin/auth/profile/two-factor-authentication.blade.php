<div class="container">
    @if (session('SUCCESS'))
        <x-success message="{{ session('SUCCESS') }}" />
    @endif
    @if (session('FAILED'))
        <x-failure message="{{ session('FAILED') }}" />
    @endif
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
            <h1 class="h5 mb-0">Two-Factor Authentication</h1>
            @if (!$twoCheckedIsEnabled)
                <button class="btn btn-primary btn-raised-shadow btn-wave" wire:click="enableTwoFactor">Enable
                    2FA</button>
            @endif
            @if ($twoCheckedIsEnabled)
                <button class="btn btn-danger btn-raised-shadow btn-wave" wire:click="disableTwoFactor">Enable
                    2FA</button>
            @endif
        </div>
        <div class="card-body">
            @if ($twoFactorEnabled)
                <div class="text-center mb-4">
                    <div class="mb-3">{!! $qrCodeUrl !!}</div>
                    <p class="text-muted">Scan the QR code with your authenticator app</p>
                </div>

                <!-- Verification Code Form -->
                <form wire:submit.prevent="submitForm">
                    <div class="mb-4">
                        <h5 class="text-center">Verify Code</h5>
                        <p class="text-center">Enter the code from your authenticator app:</p>
                        <input type="text" wire:model="verificationCode" class="form-control text-center mb-3"
                            placeholder="Enter 6-digit code" required>
                    </div>
                    <x-button color="primary" name="Verify Code" class="w-100" />
                </form>
                <button class="btn btn-danger btn-raised-shadow btn-wave w-100 mt-3"
                    wire:click="Cancelled">Cancelled</button>
            @endif
            @if ($twoCheckedIsEnabled)
                <div class="mb-4">
                    <h2 class="h5">Recovery Codes</h2>
                    <p>Use these recovery codes to access your account if you lose your device:</p>
                    <div class="row">
                        @foreach (explode("\n", $recoveryCodes) as $code)
                            <div class="col-md-3 mb-3">
                                <div class="card text-center shadow-sm border-light">
                                    <div class="card-body">
                                        <span class="d-block fs-5 rounded border p-3 bg-light text-dark"
                                            id="code-{{ $loop->index }}">
                                            {{ $code }}
                                        </span>
                                        <button class="btn btn-outline-primary btn-sm mt-3"
                                            onclick="copyToClipboard('code-{{ $loop->index }}')">
                                            <i class="fas fa-copy"></i> Copy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    @push('scripts')
        <script>
            function copyToClipboard(id) {
                var codeElement = document.getElementById(id);
                var codeText = codeElement.textContent || codeElement.innerText;
                var tempTextArea = document.createElement("textarea");
                tempTextArea.value = codeText;
                document.body.appendChild(tempTextArea);
                tempTextArea.select();
                document.execCommand("copy");
                document.body.removeChild(tempTextArea);
                // toast show
                var toastElement = document.getElementById("successToasts");
                var toastMessage = document.getElementById("successMessage").textContent = "Text Copy Successfully";
                new bootstrap.Toast(toastElement).show();
            }
        </script>
    @endpush
</div>
