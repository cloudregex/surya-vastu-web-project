<?php

use App\Http\Controllers\BaseController;
use App\Livewire\Admin\Auth\Forgot;
use App\Livewire\Admin\Auth\GoogleLogin;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Auth\Profile\EmailVerification;
use App\Livewire\Admin\Auth\Profile\TwoFactorCodeEntry;
use App\Livewire\Admin\Auth\Register;
use App\Livewire\Admin\Auth\ResetPassword;
use App\Livewire\Website\Index;
use App\Livewire\Website\Pages\AboutUs;
use App\Livewire\Website\Pages\Blog;
use App\Livewire\Website\Pages\BlogDetails;
use App\Livewire\Website\Pages\ContactUs;
use App\Livewire\Website\Pages\Gallery;
use App\Livewire\Website\Pages\ProjectDetails;
use App\Livewire\Website\Pages\Projects;
use App\Livewire\Website\Pages\ServiceDetails;
use App\Livewire\Website\Pages\Services;
use App\Livewire\Website\Pages\Team;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

//================================================= TEMPLATE ADMIN AUTH ROUTE ======================================================
Route::middleware(['auth', '2FA'])->group(base_path('routes/admin.php'));

// Routes that do not require authentication
Route::get('/admin', Login::class)->name('auth.login');
Route::get('/admin/two-factor-authentication/verify', TwoFactorCodeEntry::class)->name('auth.two-factor-authentication.verify');
Route::get('/admin/forgot', Forgot::class)->name('auth.forgot-password');
Route::get('/admin/password/reset/{token}/{email}', ResetPassword::class)->name('auth.password.reset');
Route::get('/email/verify/{id}/{hash}', EmailVerification::class)->name('auth.verification.verify');
Route::get('/admin/register', Register::class)->name('auth.register');
Route::get('/login', [BaseController::class, 'Redirect'])->name('login');
Route::get('/auth/google/redirect', [GoogleLogin::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleLogin::class, 'handleGoogleCallback'])->name('google.callback');
//===================================================== END ADMIN AUTH ROUTE =======================================================

//======================================================= FRONT END PAGE ROUTES =========================================================

Route::get('/', Index::class)->name('index');
Route::get('/about-us', AboutUs::class)->name('about-us');
Route::get('/contact-us', ContactUs::class)->name('contact-us');
Route::get('/projects', Projects::class)->name('projects');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/blog-details/{slug}', BlogDetails::class)->name('blog-details');
Route::get('/project-details/{slug}', ProjectDetails::class)->name('project-details');
Route::get('/services', Services::class)->name('services');
Route::get('/service-details/{slug}', ServiceDetails::class)->name('service-details');
Route::get('/gallery', Gallery::class)->name('gallery');
Route::get('/team', Team::class)->name('team');

Route::get('/storage-link', function () {
    try {
        Artisan::call('storage:link');
        return 'Storage link has been created successfully';
    } catch (\Exception $e) {
        return 'Storage link creation failed: ' . $e->getMessage();
    }
})->name('storage.link');


//===================================================== END FRONT END ROUTES =======================================================