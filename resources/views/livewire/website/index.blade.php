<div>
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-nav="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('website/img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <i class="fa fa-home fa-4x text-primary mb-4 d-none d-sm-block"></i>
                            <h5 class="text-white text-uppercase">Building Excellence</h5>
                            <h1 class="display-3  text-white text-uppercase mb-md-4">PNP Infra Projects</h1>
                            <a href="#quote" class="btn btn-primary py-md-3 px-md-5 mt-2">Get A Quote</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('website/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <i class="fa fa-tools fa-4x text-primary mb-4 d-none d-sm-block"></i>
                            <h1 class="display-3 text-uppercase text-white mb-md-4">Shaping the Future, Today</h1>

                            <a href="{{ route('contact-us') }}" class="btn btn-primary py-md-3 px-md-5 mt-2">Contact
                                Us</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> --}}
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5 px-sm-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <h1 class="display-5 text-uppercase mb-4">We are <span class="text-primary">the Leaders</span> in
                    Infrastructure Development</h1>
                <h4 class="text-uppercase mb-3 text-body">Delivering Excellence in Construction and Infrastructure
                    Projects Since 2010</h4>
                <p>At PNP Infra Projects, we specialize in delivering high-quality infrastructure solutions that stand
                    the test of time. Our commitment to excellence and innovation has made us a trusted name in the
                    construction industry.</p>
                <div class="row gx-5 py-2">
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Expert Project Planning</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Skilled Engineering Team
                        </p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Quality Construction</p>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Timely Delivery</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Safety Compliance</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Cost Effectiveness</p>
                    </div>
                </div>
                <p class="mb-4">With over a decade of experience, we have successfully completed numerous projects
                    across residential, commercial, and industrial sectors. Our team of experts ensures that every
                    project meets the highest standards of quality and safety.</p>
            </div>
            <div class="col-lg-5 pb-5" style="min-height: 400px;">
                <div class="position-relative bg-dark-radial h-100 ms-5">
                    <img class="position-absolute w-100 h-100 mt-5 ms-n5" src="{{ asset('website/img/about.jpg') }}"
                        style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

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
    </div>
    <!-- Services End -->


    <!-- Appointment Start -->
    <div class="container-fluid py-6 px-sm-5" id="quote">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h1 class="display-5 text-uppercase mb-4">Get A <span class="text-primary">Quote</span></h1>
                </div>
                <p class="mb-5">Request a detailed quote for your construction project. Our team will analyze your
                    requirements and provide a comprehensive cost estimation along with project timeline.</p>
                <a class="btn btn-primary py-3 px-sm-5" href="{{ route('contact-us') }}">Contact Us</a>
            </div>
            <div class="col-lg-8 col-12">
                <div class="bg-light p-3">
                    <form wire:submit.prevent="submitForm">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" wire:model="full_name"
                                    placeholder="Full Name *" style="height: 55px;">
                                @error('full_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" wire:model="email"
                                    placeholder="Email Address *" style="height: 55px;">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="tel" class="form-control border-0" wire:model="phone"
                                    placeholder="Phone Number *" style="height: 55px;">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" wire:model="project_type" style="height: 55px;">
                                    <option value="">Select Project Type *</option>
                                    <option value="Commercial">Commercial Construction</option>
                                    <option value="Residential">Residential Project</option>
                                    <option value="Industrial">Industrial Project</option>
                                    <option value="Infrastructure">Infrastructure Development</option>
                                    <option value="Renovation">Renovation</option>
                                </select>
                                @error('project_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" wire:model="project_location"
                                    placeholder="Project Location *" style="height: 55px;">
                                @error('project_location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" wire:model="estimated_budget"
                                    style="height: 55px;">
                                    <option value="">Estimated Budget</option>
                                    <option value="Below 50L">Below 50 Lakhs</option>
                                    <option value="50L-1Cr">50 Lakhs - 1 Crore</option>
                                    <option value="1Cr-5Cr">1 Crore - 5 Crore</option>
                                    <option value="Above 5Cr">Above 5 Crore</option>
                                </select>
                                @error('estimated_budget')
                                    <span class="text-danger badge">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <select class="form-select border-0" wire:model="expected_timeline"
                                    style="height: 55px;">
                                    <option value="">Expected Timeline</option>
                                    <option value="3-6 months">3-6 months</option>
                                    <option value="6-12 months">6-12 months</option>
                                    <option value="1-2 years">1-2 years</option>
                                    <option value="2+ years">More than 2 years</option>
                                </select>
                                @error('expected_timeline')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" wire:model="project_description" rows="5"
                                    placeholder="Project Description *"></textarea>
                                @error('project_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit" wire:loading.remove
                                    wire:target="submitForm">
                                    Request Quote
                                </button>
                                <button class="btn btn-primary w-100 py-3" type="button" wire:loading
                                    wire:target="submitForm">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Processing...
                                </button>
                                <br />
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


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
    </div>
    <!-- Portfolio End -->

    <!-- Team Start -->
    <div class="container-fluid py-6 px-sm-5 d-none">
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

    <!-- Testimonial Start -->
    <div class="container-fluid bg-light py-6 px-sm-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">What Our <span class="text-primary">Valued Clients</span> Say
            </h1>
        </div>
        <div class="row gx-0 align-items-center">
            <div class="col-xl-4 col-lg-5 d-none d-lg-block">
                <img class="img-fluid w-100 h-100" src="{{ asset('website/img/testimonial.jpg') }}">
            </div>
            <div class="col-xl-8 col-lg-7 col-md-12">
                <div class="testimonial bg-light">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($testimonials as $testimonial)
                            <div class="row gx-4 align-items-center">
                                <div class="col-xl-4 col-lg-5 col-md-5">
                                    <img class="img-fluid w-100 h-100 bg-light p-lg-3 mb-4 mb-md-0"
                                        src="{{ asset('storage/' . $testimonial->testimonial_image) }}"
                                        alt="{{ $testimonial->testimonial_name }}">
                                </div>
                                <div class="col-xl-8 col-lg-7 col-md-7">
                                    <h4 class="text-uppercase mb-0">{{ $testimonial->testimonial_name }}</h4>
                                    <p>{{ $testimonial->testimonial_profession }}</p>
                                    <p class="fs-5 mb-0">
                                        <i class="fa fa-2x fa-quote-left text-primary me-2"></i>
                                        {{ $testimonial->testimonial_description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-fluid py-6 px-sm-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Latest From <span class="text-primary">Our Blog</span></h1>
        </div>
        <div class="row g-5">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="bg-light">
                        <img class="img-fluid" src="{{ asset('storage/' . $blog->blog_image) }}"
                            alt="{{ $blog->blog_title }}">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="d-flex align-items-center">
                                    <i class="far fa-user text-primary me-2"></i>
                                    <span>{{ $blog->blog_user_name }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="ms-3"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>{{ $blog->blog_date }}</span>
                                </div>
                            </div>
                            <h5 class="text-uppercase mb-3">{{ substr($blog->blog_title, 0, 40) }}...</h5>
                            <a class="text-uppercase fw-bold"
                                href="{{ route('blog-details', $blog->blog_slug) }}">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Blog End -->

    <!-- Contact Info Start -->
    <div class="container-fluid bg-light py-6 px-sm-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Contact <span class="text-primary">Information</span></h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-6 col-md-6">
                <div class="bg-white p-5 h-100">
                    <i class="fa fa-map-marker-alt fa-3x text-primary mb-3"></i>
                    <h3 class="text-uppercase">Our Office</h3>
                    <p class="m-0">FLAT NO. B-1, Sunrise Apartment,</p>
                    <p class="m-0">SR NO 46/3, Bombay shopper,</p>
                    <p class="m-0">Wadgaon Seri, PUNE- 411014</p>
                    <p class="mt-3 m-0"><strong>Email:</strong></p>
                    <p class="m-0">pnpinfraprojects@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="bg-white p-5 h-100">
                    <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                    <h3 class="text-uppercase">Contact Details</h3>
                    <p class="m-0"><strong>Phone:</strong></p>
                    <p class="m-0">+91 7387747503</p>
                    <p class="m-0">+91 9850029403</p>
                    <p class="m-0">+91 8600549090</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="bg-white p-5 h-100">
                    <i class="fa fa-id-card fa-3x text-primary mb-3"></i>
                    <h3 class="text-uppercase">GST Details</h3>
                    <p class="m-0">GST: PNP Infra Projects</p>
                    <p class="m-0">GSTIN: 27AAHFP6682Q1ZV</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="bg-white p-5 h-100">
                    <i class="fa fa-clock fa-3x text-primary mb-3"></i>
                    <h3 class="text-uppercase">Working Hours</h3>
                    <p class="m-0">Monday - Saturday</p>
                    <p class="m-0">9:00 AM - 7:00 PM</p>
                    <p class="m-0">Sunday: Closed</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->

</div>
