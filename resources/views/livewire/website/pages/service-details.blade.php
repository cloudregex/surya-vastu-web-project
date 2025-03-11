<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Service Detail</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Service Detail</h6>
        </div>
    </div>
    <!-- Page Header Start -->

    <!-- Blog Start -->
    <div class="container-fluid py-6 px-sm-5 text-center">
        <div class="row ">
            <div class="col-lg-12 mx-auto">
                <div class="mb-5">
                    <img class="img-fluid w-80 rounded mb-5 img-thumbnail"
                        src="{{ Storage::url($service->service_image) }}" alt="">
                    <h1 class="text-uppercase mb-4">{{ $service->service_name }}</h1>
                    <hr/>
                    <p>{!! $service->service_description !!}</p>
                    <br/>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#quoteModal">
                    Book Appointment
                </button>
                </div>
            </div>

        </div>
    </div>
    <!-- Service End -->
</div>
