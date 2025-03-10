<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Our Services</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route('index') }}">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Our Services</h6>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Services Start -->
    <div class="container-fluid bg-light py-6 px-sm-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Our <span class="text-primary">Services</span></h1>
        </div>
        <div class="row g-5">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="{{ asset('storage/' . $service->service_image) }}"
                            alt="{{ $service->service_name }}">
                        <div class="px-4 pb-4 mt-4">
                            <h4 class="text-uppercase mb-3">{{ $service->service_name }}</h4>
                            <a class="btn text-primary"
                                href="{{ route('service-details', $service->service_slug) }}">Read More
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginate mt-3">
            {!! $services->links() !!}
        </div>
    </div>
    <!-- Services End -->
</div>
