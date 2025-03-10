<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Gallery</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route('index') }}">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Gallery</h6>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Portfolio Start -->
    <div class="container-fluid bg-light py-6 px-sm-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Image <span class="text-primary">Gallery</span></h1>
        </div>
        <div class="row gx-5">

        </div>
        <div class="row g-5 portfolio-container">
            @foreach ($galleries as $gallery)
                <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first">
                    <div class="position-relative portfolio-box">
                        <img class="img-thumbnail" src="{{ asset('storage/' . $gallery->gallery_image) }}"
                            alt="" style="width: 100%; height: 300px; object-fit: cover;">
                        <a class="portfolio-btn" href="{{ asset('storage/' . $gallery->gallery_image) }}"
                            data-lightbox="portfolio">
                            <i class="bi bi-plus text-white"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginate mt-3">
            {!! $galleries->links() !!}
        </div>
    </div>
    <!-- Portfolio End -->

</div>
