<div class="header-element country-selector">
    <div id="google_translate_element" style="display:none;"></div>
    <!-- Start::header-link|dropdown-toggle -->
    <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
        data-bs-toggle="dropdown">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-world text-secondary">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
            <path d="M3.6 9h16.8" />
            <path d="M3.6 15h16.8" />
            <path d="M11.5 3a17 17 0 0 0 0 18" />
            <path d="M12.5 3a17 17 0 0 1 0 18" />
        </svg>
    </a>
    <!-- End::header-link|dropdown-toggle -->
    <ul class="main-header-dropdown dropdown-menu dropdown-menu-end country-dropdown" data-popper-placement="none">
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="translateLanguage('en')">English</a></li>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="translateLanguage('mr')">Marathi</a></li>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="translateLanguage('hi')">Hindi</a></li>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="translateLanguage('ur')">Urdu</a></li>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="translateLanguage('gu')">Gujarati</a></li>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="translateLanguage('kn')">Kannada</a></li>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="translateLanguage('te')">Telugu</a></li>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="translateLanguage('ta')">Tamil</a></li>
    </ul>
    @push('scripts')
        {{-- google translate --}}
        <script type="text/javascript" src="{{ asset('assets/js/google-translate.js') }}"></script>
    @endpush
</div>
