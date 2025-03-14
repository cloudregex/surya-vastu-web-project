<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Project Details</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Project Detail</h6>
        </div>
    </div>
    <!-- Page Header Start -->

    <!-- Blog Start -->
    <div class="container-fluid py-6 px-sm-5">
        <div class="row ">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img class="img-thumbnail w-100 rounded mb-5" src="{{ Storage::url($project->project_image) }}"
                        style="height: 500px;" alt="">
                    <h1 class="text-uppercase mb-4">{{ $project->project_title }}</h1>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fa fa-map-marker-alt text-primary me-3"></i>
                        <p class="mb-0">{{ $project->project_location }}</p>
                    </div>
                    <p>{!! $project->project_description !!}</p>
                </div>
                <!-- Blog Detail End -->
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4">Recent Projects</h3>
                    @foreach ($recentProjects as $recentProject)
                        <div class="bg-light p-2 w-100">
                            <div class="d-flex mb-3">
                                <img class="img-thumbnail" src="{{ Storage::url($recentProject->project_image) }}"
                                    style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                <a href=""
                                    class="h6 d-flex align-items-center bg-white text-uppercase px-3 mb-0">
                                    {{ $recentProject->project_title }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Recent Post End -->

                <!-- Image Start -->
                <div class="mb-5">
                    <img src="{{ asset('website/img/blog-1.jpg') }}" alt="" class="img-fluid rounded">
                </div>
                <!-- Image End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->

</div>
