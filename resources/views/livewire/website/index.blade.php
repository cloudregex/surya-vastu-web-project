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
                            <h1 class="display-3 text-uppercase text-white mb-md-4">Transform Your Space</h1>
                            <!-- Indicators -->
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                <div class="indicator active"></div>
                                <div class="indicator"></div>
                            </div>
                            <a href="#quote" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('website/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <i class="fa fa-tools fa-4x text-primary mb-4 d-none d-sm-block"></i>
                            <h1 class="display-3 text-uppercase text-white mb-md-4">Shaping the Future, Today</h1>
                            <!-- Indicators -->
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                <div class="indicator"></div>
                                <div class="indicator active"></div>
                            </div>
                            <a href="{{ route('contact-us') }}" class="btn btn-primary py-md-3 px-md-5 mt-2">Contact
                                Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Navigation Buttons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5 px-sm-5">
        <div class="row">
            <div class="col-lg-7">
                <h1 class="display-5 text-uppercase mb-4">Expert <span class="text-primary">Vastu</span> Consultation
                </h1>
                <h4 class="text-uppercase mb-3 text-body">Creating Harmonious Living and Working Spaces</h4>
                <p>At Suryya Vastu, we combine ancient Vastu principles with modern architectural solutions to create
                    spaces that promote positivity, prosperity, and well-being. Our expertise in Vastu Shastra has
                    helped numerous clients achieve balance in their lives.</p>
                <div class="row  py-2">
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Expert Vastu Analysis</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Space Optimization</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Energy Flow Enhancement</p>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Architectural Solutions</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Personalized Consultations
                        </p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Remedial Measures</p>
                    </div>
                </div>
                <p class="mb-4">With a deep understanding of Vastu principles and their practical applications, we
                    provide customized solutions for homes, offices, and commercial spaces. Our approach ensures that
                    every space we work on radiates positive energy and supports your goals.</p>
            </div>
            <div class="col-lg-5 pb-5" style="min-height: 400px;">
                <div class="position-relative bg-dark-radial h-100 ms-5">
                    <img class="position-absolute w-100 mt-5 ms-n5" src="{{ asset('website/img/about.jpg') }}"
                    style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Services Start -->
    <div class="container-fluid bg-light py-6 px-sm-5 mt-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Our <span class="text-primary">Services</span></h1>
        </div>
        <div class="row g-3">
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
     <div class="container-fluid py-5 px-sm-5" id="quote">
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h1 class="display-5 text-uppercase mb-4">Book <span class="text-primary">Appointment</span></h1>
                </div>
                <p class="mb-5">Request a personalized Vastu consultation for your space. Our experts will analyze
                    your requirements and provide tailored solutions to enhance the energy flow and harmony in your
                    environment.</p>
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
                                    <option value="">Select Service Type *</option>
                                    <option value="Residential">Residential Vastu</option>
                                    <option value="Commercial">Commercial Vastu</option>
                                    <option value="Industrial">Industrial Vastu</option>
                                    <option value="Land">Land Vastu</option>
                                    <option value="Renovation">Vastu for Renovation</option>
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
                            <div class="col-12  col-sm-6">
                                <input type="date" class="form-control border-0 @error('project_date') is-invalid @enderror"
                                    wire:model.defer="project_date" id="project_date" style="height: 55px" value="{{ $project_date }}">
                                @error('project_date')
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
                                    Book Appointment
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
        <div class="row g-3 portfolio-container">
            @foreach ($projects as $project)
                <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first ">
                    <div class="position-relative portfolio-box">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $project->project_image) }}"
                            alt="{{ $project->project_title }}">
                        <a class="portfolio-title shadow-sm"
                            href="{{ route('project-details', $project->project_slug) }}">
                            <p class="h4 text-uppercase">{{ $project->project_title }}</p>
                            <span class="text-body"><i
                                    class="fa fa-calendar text-primary me-2"></i>{{ $project->project_date }}</span>
                            <span class="text-body d-block mt-1"><i
                                    class="fa fa-map-marker text-primary me-2"></i>{{ $project->project_location }}</span>
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

     <!-- Image Gallery Start -->
     <div class="container-fluid py-6 px-sm-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Image <span class="text-primary">Gallery</span></h1>
        </div>
        <div class="row ">

        </div>
        <div class="row g-3 portfolio-container">
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
    </div>
    <!-- Image Gallery End -->

    <!-- Team Start -->
    <div class="container-fluid py-6 px-sm-5 d-none">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Our <span class="text-primary">Team</span></h1>
        </div>
        <div class="row ">
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
    <div class="container-fluid bg-light py-6 px-sm-5 mt-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">What Our <span class="text-primary">Valued Clients</span> Say
            </h1>
        </div>
        <div class="row gx-0 align-items-center">
            <div class="col-xl-4 col-lg-5 d-none d-lg-block">
                <img class="img-fluid w-100 h-100" src="{{ asset('website/img/about.jpg') }}">
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
        <div class="row g-3">
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
        <div class="row g-3">
            <div class="col-lg-6 col-md-6">
                <div class="bg-white p-5 h-100">
                    <i class="fa fa-map-marker-alt fa-3x text-primary mb-3"></i>
                    <h3 class="text-uppercase">Our Office</h3>
                    <p class="m-0">Baramati, Pandare, Maharashtra 413110</p>
                    <p class="mt-3 m-0"><strong>Email:</strong></p>
                    <p class="m-0">suryavastu6147@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="bg-white p-5 h-100">
                    <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                    <h3 class="text-uppercase">Contact Details</h3>
                    <p class="m-0"><strong>Phone:</strong></p>
                    <p class="m-0"><a href="tel:+918087316147" class="text-body">+91 8087316147</a></p>
                    <a href="tel:+918087316147" class="btn btn-primary btn-sm mt-2">Call Now</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="bg-white p-5 h-100">
                    <i class="fa fa-share-alt fa-3x text-primary mb-3"></i>
                    <h3 class="text-uppercase">Follow Us</h3>
                    <div class="d-flex justify-content-start">
                        <a href="https://www.facebook.com/share/15uroGRxhY/"
                            class="btn btn-primary btn-lg-square rounded-0 me-2 d-flex align-items-center justify-content-center"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://g.page/r/CfkZJ6GvYSJBEBM/review"
                            class="btn btn-primary btn-lg-square rounded-0 me-2 d-flex align-items-center justify-content-center"><i
                                class="fab fa-google"></i></a>
                        <a href="https://www.instagram.com/_suryavastu_6147/"
                            class="btn btn-primary btn-lg-square rounded-0 d-flex align-items-center justify-content-center"><i
                                class="fab fa-instagram"></i></a>
                    </div>
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
