<div class="row bg-white">
    <!-- The image half -->
    <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent-3">
        <div class="row w-100 mx-auto text-center">
            <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto w-100">
                <img src="{{ asset('assets/images/media/pngs/3.png') }}"
                    class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
            </div>
        </div>
    </div>
    <!-- The content half -->
    <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
        <div class="login d-flex align-items-center py-2">
            <!-- Demo content-->
            <div class="container p-0">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                        <div class="card-sigin">
                            <div class="mb-5 d-flex">
                                <a href="/admin" class="header-logo">
                                    <img src="{{ asset(isset($logos['desktop_white']) ? 'storage/' . $logos['desktop_white'] : 'assets/images/brand-logos/desktop-white.png') }}"
                                        alt="logo" class="desktop-white ht-40">
                                    <img src="{{ asset(isset($logos['desktop_dark']) ? 'storage/' . $logos['desktop_dark'] : 'assets/images/brand-logos/desktop-logo.png') }}"
                                        alt="logo" class="desktop-logo ht-40">
                                </a>
                            </div>
                            <div class="card-sigin">
                                @if (session('SUCCESS'))
                                    <x-success message="{{ session('SUCCESS') }}" />
                                @endif
                                @if (session('FAILED'))
                                    <x-failure message="{{ session('FAILED') }}" />
                                @endif
                                <div class="main-signup-header">
                                    <h3>Forgot Password!</h3>
                                    <h6 class="fw-medium mb-4 fs-17">Please Enter Your Email</h6>
                                    <form wire:submit.prevent="submitForm">

                                        <x-input type="email" placeholder="Enter your email" col="12"
                                            icon="fa-regular fa-envelope" name="email" value=""
                                            label="Email" />

                                        <x-button color="primary" name="Send Password Reset Link" class="w-100" />

                                    </form>
                                    <div class="main-signin-footer mt-3">
                                        <p>Forget it, <a href="/admin"> Send me back</a> to the sign in screen.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End -->
        </div>
    </div><!-- End -->
</div>
