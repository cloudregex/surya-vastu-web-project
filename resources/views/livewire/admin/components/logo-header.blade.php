@if ($type != 'vertical')
    <div class="header-element">
        <div class="horizontal-logo">
            <a href="/" class="header-logo">
                {{-- Big size Logo --}}
                <img src="{{ asset(isset($logos['desktop_white']) ? 'storage/' . $logos['desktop_white'] : 'assets/images/brand-logos/desktop-white.png') }}"
                    alt="logo" class="desktop-white">
                <img src="{{ asset(isset($logos['desktop_dark']) ? 'storage/' . $logos['desktop_dark'] : 'assets/images/brand-logos/desktop-logo.png') }}"
                    alt="logo" class="desktop-logo">

                {{-- Small size Logo --}}
                <img src="{{ asset(isset($logos['toggle_white']) ? 'storage/' . $logos['toggle_white'] : 'assets/images/brand-logos/toggle-white.png') }}"
                    alt="logo" class="toggle-white">
                <img src="{{ asset(isset($logos['toggle_dark']) ? 'storage/' . $logos['toggle_dark'] : 'assets/images/brand-logos/toggle-logo.png') }}"
                    alt="logo" class="toggle-logo">
            </a>
        </div>
    </div>
@else
    <div class="main-sidebar-header">
        <a href="/" class="header-logo">
            {{-- Big size Logo --}}
            <img src="{{ asset(isset($logos['desktop_white']) ? 'storage/' . $logos['desktop_white'] : 'assets/images/brand-logos/desktop-white.png') }}"
                alt="logo" class="desktop-white">
            <img src="{{ asset(isset($logos['desktop_dark']) ? 'storage/' . $logos['desktop_dark'] : 'assets/images/brand-logos/desktop-logo.png') }}"
                alt="logo" class="desktop-logo">

            {{-- Small size Logo --}}
            <img src="{{ asset(isset($logos['toggle_white']) ? 'storage/' . $logos['toggle_white'] : 'assets/images/brand-logos/toggle-white.png') }}"
                alt="logo" class="toggle-white">
            <img src="{{ asset(isset($logos['toggle_dark']) ? 'storage/' . $logos['toggle_dark'] : 'assets/images/brand-logos/toggle-logo.png') }}"
                alt="logo" class="toggle-logo">
        </a>
    </div>
@endif
