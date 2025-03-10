<?php

use App\Http\Controllers\BaseController;
use App\Livewire\Admin\Auth\Forgot;
use App\Livewire\Admin\Auth\GoogleLogin;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Auth\Profile\EmailVerification;
use App\Livewire\Admin\Auth\Profile\TwoFactorCodeEntry;
use App\Livewire\Admin\Auth\Register;
use App\Livewire\Admin\Auth\ResetPassword;
use App\Livewire\Website\Page\AboutUs;
use App\Livewire\Website\Page\Blog;
use App\Livewire\Website\Page\BlogDetails;
use App\Livewire\Website\Page\ContactUs;
use App\Livewire\Website\Page\Index;
use App\Livewire\Website\Page\Nocapcha;
use App\Livewire\Website\Page\Services;
use App\Livewire\Website\Page\ServicesDetails;
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
Route::get('/services', Services::class)->name('services');
Route::get('/service-details/{slug}', ServicesDetails::class)->name('service-details');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/blog-details/{slug}', BlogDetails::class)->name('blog-details');

Route::get('/google', Nocapcha::class)->name('google');


//===================================================== END FRONT END ROUTES =======================================================