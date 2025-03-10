<div class="row bg-white">
    <!-- The image half -->
    <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent-3">
        <div class="row w-100 mx-auto text-center">
            <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto w-100">
                <img src="{{ asset('assets/images/media/pngs/11.png') }}"
                    class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" style="width: 70% !important" alt="logo">
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
                            <div class="card-sigin">
                                <div class="text-center">
                                    @if ($status)
                                        <h4 class="text-success">{{ $status }}</h4>
                                    @else
                                        <h4 class="text-info">Processing your email verification...</h4>
                                    @endif
                                    <!-- Optional: Add a button or link if you want users to take any action -->
                                    <div class="mt-4">
                                        <a href="{{ route('auth.profile') }}" class="btn btn-primary">Return to Home</a>
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
