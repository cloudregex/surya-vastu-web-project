<div>
    <!-- Start::row-1 -->
    <div class="row row-sm my-4">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body d-flex justify-content-center text-center">
                    <div class="ps-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user user-profile">
                                @if ($profile->profile_picture)
                                    @if (substr($profile->profile_picture, 0, 16) != 'profile_pictures')
                                        <img alt="logo" src="{{ $profile->profile_picture }}">
                                    @else
                                        <img alt="logo" src="{{ url('/storage/' . $profile->profile_picture) }}">
                                    @endif
                                @else
                                    <img src="{{ asset('assets/images/faces/6.jpg') }}" alt="img">
                                @endif
                            </div>
                            <div class="d-flex justify-content-center">
                                <div>
                                    <h5 class="main-profile-name">{{ $profile->name }}</h5>
                                </div>
                            </div>
                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                            <li class="mt-sm-4">
                                <a href="#ProfileInfo" data-bs-toggle="tab" class="active" aria-expanded="true"> <span
                                        class="visible-xs"><i class="las la-user-circle fs-16 me-1"></i></span> <span
                                        class="hidden-xs">PROFILE INFORMATION</span> </a>
                            </li>
                            <li class="mt-sm-4">
                                <a href="#UpdatePassword" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="las la-lock fs-16 me-1"></i></span>
                                    <span class="hidden-xs">UPDATE PASSWORD</span> </a>
                            </li>
                            <li class="mt-sm-4">
                                <a href="#TwoFactorAuth" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="las la-key fs-16 me-1"></i></span>
                                    <span class="hidden-xs">TWO FACTOR AUTHENTICATION</span> </a>
                            </li>
                            <li class="mt-sm-4">
                                <a href="#BrowserSessions" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="lab la-chrome fs-16 me-1"></i></span>
                                    <span class="hidden-xs">BROWSER SESSIONS</span> </a>
                            </li>
                            <li class="mt-sm-4">
                                <a href="#DeleteAccount" data-bs-toggle="tab" aria-expanded="false"> <span
                                        class="visible-xs"><i class="las la-trash fs-16 me-1"></i></span>
                                    <span class="hidden-xs">DELETE ACCOUNT</span>
                                </a>
                            </li>

                            @role('Super Admin')
                                <li class="mt-sm-4">
                                    <a href="#AppLogo" data-bs-toggle="tab" aria-expanded="false"> <span
                                            class="visible-xs"><i class="bi bi-images"></i></span>
                                        <span class="hidden-xs">Add WEB LOGOS</span> </a>
                                </li>
                            @endrole
                        </ul>
                    </div>
                    <div class="tab-content border border-top-0 p-md-4 br-dark">
                        <div class="tab-pane border-0 p-0 active" id="ProfileInfo">
                            <livewire:admin.auth.profile.profile-information />
                        </div>
                        <div class="tab-pane border-0 p-0" id="UpdatePassword">
                            <livewire:admin.auth.profile.update-password />
                        </div>
                        <div class="tab-pane border-0 p-0" id="TwoFactorAuth" role="tabpanel">
                            <livewire:admin.auth.profile.two-factor-authentication />
                        </div>
                        <div class="tab-pane border-0 p-0" id="BrowserSessions">
                            <livewire:admin.auth.profile.device-sessions />
                        </div>
                        <div class="tab-pane border-0 p-0" id="DeleteAccount">
                            <livewire:admin.auth.profile.delete-account />
                        </div>
                        @role('Super Admin')
                            <div class="tab-pane border-0 p-0" id="AppLogo">
                                <livewire:admin.auth.profile.upload-logo />
                            </div>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->
</div>
