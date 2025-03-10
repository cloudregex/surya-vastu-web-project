<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Projects</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route('index') }}">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Projects</h6>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Portfolio Start -->
    <div class="container-fluid bg-light py-6 px-sm-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Our <span class="text-primary">Projects</span>
            </h1>
        </div>
        <div class="row g-5 portfolio-container">
            @foreach ($projects as $project)
                <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first">
                    <div class="position-relative portfolio-box">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $project->project_image) }}"
                            alt="{{ $project->project_title }}">
                        <a class="portfolio-title shadow-sm"
                            href="{{ route('project-details', $project->project_slug) }}">
                            <p class="h4 text-uppercase">{{ $project->project_title }}</p>
                            <span class="text-body"><i
                                    class="fa fa-calendar text-primary me-2"></i>{{ $project->project_date }}</span>
                        </a>
                        <a class="portfolio-btn" href="{{ asset('storage/' . $project->project_image) }}"
                            data-lightbox="portfolio">
                            <i class="bi bi-plus text-white"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginate mt-3">
            {!! $projects->links() !!}
        </div>
    </div>
    <!-- Portfolio End -->

</div>
