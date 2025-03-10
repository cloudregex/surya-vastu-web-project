<div>
    <!-- row -->
    <div class="row my-4">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="px-3 pt-3 pb-2">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL BLOGS</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $totalBlogs }}</h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">Total Blog Posts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="px-3 pt-3 pb-2">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL PROJECTS</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $totalProjects }}</h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">Total Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="px-3 pt-3 pb-2">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL SERVICES</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $totalServices }}</h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">Total Services</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="px-3 pt-3 pb-2">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TEAM MEMBERS</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $totalTeams }}</h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">Total Team Members</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- Second row -->
    <div class="row my-4">
        <div class="col-xl-4 col-lg-4 col-md-4 col-xm-12">
            <div class="card overflow-hidden sales-card bg-info-gradient">
                <div class="px-3 pt-3 pb-2">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL SLIDERS</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $totalSliders }}</h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">Active Sliders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-xm-12">
            <div class="card overflow-hidden sales-card bg-secondary-gradient">
                <div class="px-3 pt-3 pb-2">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL QUOTES</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $totalQuotes }}</h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">Quote Requests</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="px-3 pt-3 pb-2">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL Gallery Image</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $totalGallery }}</h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">Gallery Images</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Quotes Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest Quote Requests</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Project Type</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestQuotes as $quote)
                                    <tr>
                                        <td>{{ $quote->full_name }}</td>
                                        <td>{{ $quote->email }}</td>
                                        <td>{{ $quote->phone }}</td>
                                        <td>{{ $quote->project_type }}</td>
                                        <td>{{ $quote->project_location }}</td>
                                        <td>{{ $quote->created_at->format('d M, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
