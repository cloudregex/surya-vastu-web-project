<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Blogs</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route('index') }}">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Blogs</h6>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Blog Start -->
    <div class="container-fluid py-6 px-sm-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Latest From <span class="text-primary">Our Blog</span></h1>
        </div>
        <div class="row ">
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
                            <a class="text-uppercase fw-bold" href="">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginate mt-3">
            {!! $blogs->links() !!}
        </div>
    </div>
    <!-- Blog End -->
</div>
