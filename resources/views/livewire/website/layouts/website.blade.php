<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Page Title' }} | Surya Vastu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Vastu, Construction, Architecture" name="keywords">
    <meta content="Surya Vastu - Expert Vastu Consultation and Architectural Solutions" name="description">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Favicon -->
    <link href="{{ asset('website/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('website/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">

    <!-- Toastify CSS & JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <style>
        p,
        h1,
        p,
        span,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        input,
        a,
        button,
        label, small {
            font-family: "Sora", serif !important;
            font-weight: 400;
            font-style: normal;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 600;
        }

        .top-60 {
            top: 80% !important;
        }

       
    /* Add indicator styles */
    .indicator {
        width: 10px;
        height: 10px;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        transition: background-color 0.3s ease;
    }

    .indicator.active {
        background-color: #fff;
    }
  /* Add indicator styles */
  .indicator {
        width: 10px;
        height: 10px;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        transition: background-color 0.3s ease;
    }

    .indicator.active {
        background-color: #fff;
    }

    /* Customize navigation buttons */
    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
        border-radius: 5px;
        opacity: 0.8;
        transition: opacity 0.3s ease;
        color:white;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        opacity: 1;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(1);
        color: white !important;
    }
    </style>
</head>

<body>
    <!-- Loader -->
    <div id="loader">
        <img src="{{ asset('website/img/logo.jpg') }}" alt="Surya Vastu">
        <div class="loader-text">
            <h5>Surya Vastu</h5>
            <small>Vastu Consultant</small>
        </div>
        <div class="loading-line"></div>
    </div>

    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block">
        <div class="row gx-5">
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Our Office</h6>
                        <span>Baramati, Pandare, Maharashtra 413110</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Email Us</h6>
                        <a href="mailto:suryavastu6147@gmail.com" class="text-body">suryavastu6147@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-telephone text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Call Us</h6>
                        <a href="tel:+918087316147" class="text-body">+91 8087316147</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm px-2 pe-lg-0">
        <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-2 py-lg-0">
            <a href="{{ route('index') }}" class="navbar-brand">
                <div class="d-flex align-items-center">
                   <img height="50" width="50" src="{{asset('website/img/logo.jpg')}}" alt="Surya Vastu"/>
                   <div>
                    <h5 class="m-0 text-uppercase text-white">Surya Vastu</h5>
                    <small>Vastu Consultant</small>
                   </div>
                </div>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('index') }}"
                        class="nav-item nav-link {{ request()->routeIs('index*') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about-us') }}"
                        class="nav-item nav-link {{ request()->routeIs('about-us*') ? 'active' : '' }}">About</a>
                    <a href="{{ route('services') }}"
                        class="nav-item nav-link {{ request()->routeIs('services*') || request()->routeIs('service-details') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('projects') }}"
                        class="nav-item nav-link {{ request()->routeIs('projects*') || request()->routeIs('project-details') ? 'active' : '' }}">Projects</a>
                    <a href="{{ route('gallery') }}"
                        class="nav-item nav-link {{ request()->routeIs('gallery*') ? 'active' : '' }}">Gallery</a>
                    <!-- <a href="{{ route('team') }}"
                        class="nav-item nav-link {{ request()->routeIs('team*') ? 'active' : '' }}">Team</a> -->
                    <a href="{{ route('contact-us') }}"
                        class="nav-item nav-link {{ request()->routeIs('contact-us*') ? 'active' : '' }}">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    {{ $slot }}

    <!-- Footer Start -->
    <div class="footer container-fluid position-relative bg-dark bg-light-radial text-white-50 py-5 px-5">
        <div class="row g-5">
            <div class="col-lg-6 pe-lg-5">
                <a href="{{ route('index') }}" class="navbar-brand">
                    <div class="d-flex align-items-center">
                       <img height="80" width="80" src="{{asset('website/img/logo.jpg')}}" alt="Surya Vastu"/>
                       <div>
                        <h5 class="m-0 text-uppercase text-white">Surya Vastu</h5>
                        <small class="text-white">Vastu Consultant</small>
                       </div>
                    </div>
    
                </a>
                <p class="mt-1 mb-2">Expert Vastu Consultation and Architectural Solutions for harmonious living spaces.</p>
                <p><i class="fa fa-map-marker-alt me-2"></i>Baramati, Pandare, Maharashtra 413110</p>
                <p><i class="fa fa-phone-alt me-2"></i>
                    <a href="tel:+918087316147" class="text-white-50">+91 8087316147</a>
                </p>
                <p><i class="fa fa-envelope me-2"></i><a href="mailto:suryavastu6147@gmail.com"
                        class="text-white-50">suryavastu6147@gmail.com</a></p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="https://www.facebook.com/share/15uroGRxhY/"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="https://g.page/r/CfkZJ6GvYSJBEBM/review"><i
                            class="fab fa-google"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-0" href="https://www.instagram.com/_suryavastu_6147/"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <div class="row g-5">
                    <div class="col-sm-6">
                        <h4 class="text-white text-uppercase mb-4">Quick Links</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white-50 mb-2" href="{{ route('index') }}"><i
                                    class="fa fa-angle-right me-2"></i>Home</a>
                            <a class="text-white-50 mb-2" href="{{ route('about-us') }}"><i
                                    class="fa fa-angle-right me-2"></i>About Us</a>
                            <a class="text-white-50 mb-2" href="{{ route('services') }}"><i
                                    class="fa fa-angle-right me-2"></i>Services</a>
                            <a class="text-white-50 mb-2" href="{{ route('projects') }}"><i
                                    class="fa fa-angle-right me-2"></i>Projects</a>
                            <a class="text-white-50 mb-2" href="{{ route('gallery') }}"><i
                                    class="fa fa-angle-right me-2"></i>Gallery</a>
                            <!-- <a class="text-white-50 mb-2" href="{{ route('team') }}"><i
                                    class="fa fa-angle-right me-2"></i>Team</a> -->
                            <a class="text-white-50 mb-2" href="{{ route('blog') }}"><i
                                    class="fa fa-angle-right me-2"></i>Blogs</a>
                            <a class="text-white-50" href="{{ route('contact-us') }}"><i
                                    class="fa fa-angle-right me-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="text-white text-uppercase mb-4">Business Hours</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <p class="text-white-50">Monday - Saturday</p>
                            <p class="text-white-50">9:00 AM - 7:00 PM</p>
                            <p class="text-white-50">Sunday: Closed</p>
                            <p class="text-white-50 mt-3">Emergency Contact:</p>
                            <p class="text-white-50"><a href="tel:+918087316147" class="text-white-50">+91
                                    8087316147</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark bg-light-radial text-white border-top border-primary px-0">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="py-4 px-5 text-center text-md-start">
                <p class="mb-0">&copy; <a class="text-primary" href="https://suryavastu.com">Surya Vastu</a>. All Rights
                    Reserved.</p>
            </div>
            <div class="py-4 px-5 bg-primary footer-shape position-relative text-center text-md-end">
                <p class="mb-0 text-dark">Developed by <a class="text-white" href="https://cloudregex.com">CloudRegex
                        Infotech
                        Pvt Ltd</a></p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="display: inline;"><i
            class="bi bi-arrow-up"></i></a> --}}

    <!-- Fixed Quote Button -->
    <div class="position-fixed top-60 end-0 mb-4 me-4" style="z-index: 1000;">
        <button type="button" class="btn btn-primary py-md-3 px-md-5 mt-2" data-bs-toggle="modal"
            data-bs-target="#quoteModal">
            Get a Quote
        </button>
    </div>

    <!-- Quote Modal -->
    <div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="quoteModalLabel">Request a Quote</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            <div class="modal-body">
                    <livewire:website.components.quote-form />
                </div>
            </div>
        </div>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('website/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('website/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('website/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('website/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('website/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('website/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('website/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('website/js/main.js') }}"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('close-modal', () => {
                bootstrap.Modal.getInstance(document.getElementById('quoteModal')).hide();
            });

            // Toast notification handler
            Livewire.on('showToast', (data) => {
                Toastify({
                    text: data[0].message,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: data[0].type === 'success' ? "#28a745" : "#dc3545",
                    },
                    onClick: function() {} // Callback after click
                }).showToast();
            });
        });

        // Hide loader when page is fully loaded
        window.addEventListener('load', function() {
            document.getElementById('loader').style.display = 'none';
        });
    </script>
</body>

</html>
