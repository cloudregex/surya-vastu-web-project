@if (session('SUCCESS'))
    <span style="margin: 6px 6px 0px 6px;">
        <x-success message="{{ session('SUCCESS') }}" />
    </span>
@endif
@if (session('FAILED'))
    <span style="margin: 6px 6px 0px 6px;">
        <x-failure message="{{ session('FAILED') }}" />
    </span>
@endif
