<div class="container">
    @if (session('SUCCESS'))
        <x-success message="{{ session('SUCCESS') }}" />
    @endif

    <div class="row">
        <h3 class="mb-4">Active Sessions</h3>

        @forelse ($sessions as $key=>$session)
            <div class="col-md-4 mb-4 text-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Session ID: {{ $key + 1 }}</h5>
                        <p class="card-text">
                            <strong>IP Address:</strong> {{ $session->ip_address }}<br>
                            <strong>Browser:</strong> {{ $session->browser }}<br>
                            <strong>Last Activity:</strong> {{ $session->last_activity_formatted }}
                        </p>
                        <div>
                            <x-button color="primary" name="Remove Session"
                                wire:click="removeSession('{{ $session->id }}')" />
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 col-xl-4">
                    <div class="card mb-4 text-center">
                        <div class="card-body h-100">
                            <img src="{{ asset('assets/images/svgicons/no-data.svg') }}" alt="" class="w-35">
                            <h5 class="mt-3 tx-18">Sessions Not Found</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse

        @if ($sessions->count())
            <hr>
            <div class="col-12 mt-2 text-center">
                <x-button color="danger" name="Remove All Sessions" wire:click="removeAllSessions()" />
            </div>
        @endif
    </div>
</div>
