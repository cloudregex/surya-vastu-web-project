<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Team</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route('index') }}">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Team</h6>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Team Start -->
    <div class="container-fluid py-6 px-sm-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Our <span class="text-primary">Team</span></h1>
        </div>
        <div class="row g-5">
            @foreach ($teams as $team)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="row g-0">
                        <div class="col-12" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100"
                                    src="{{ asset('storage/' . $team->team_image) }}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light p-4">
                                <h4 class="text-uppercase">{{ $team->team_user_name }}</h4>
                                <span>{{ $team->team_profession }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Team End -->

</div>
