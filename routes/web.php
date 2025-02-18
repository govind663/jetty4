<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\PreventBackHistoryMiddleware;
use App\Http\Middleware\PreventCitizenBackHistoryMiddleware;

// ===== Frontend Controllers
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;

// ===== Backend Controllers
use App\Http\Controllers\backend\Auth\RegisterController;
use App\Http\Controllers\backend\Auth\LoginController;
use App\Http\Controllers\backend\Auth\ForgotPasswordController;
use App\Http\Controllers\backend\Auth\ResetPasswordController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\StatisticsController;
use App\Http\Controllers\backend\ConstructionSolutionsController;
use App\Http\Controllers\backend\TeamsController;
use App\Http\Controllers\backend\ClientController;
use App\Http\Controllers\backend\AssociateController;
use App\Http\Controllers\backend\AboutJ4cController;
use App\Http\Controllers\backend\WhoWeAreController;
use App\Http\Controllers\backend\OurMissionController;
use App\Http\Controllers\backend\OurVisionController;
use App\Http\Controllers\backend\CertificationController;
use App\Http\Controllers\backend\AwardController;
use App\Http\Controllers\backend\OurUspController;

Route::get('/login', function () {
    // check if the user session expire web guard then redirect to admin.login page else redirect to frontend.login page
    if (Auth::guard('web')->check()) {
        return redirect()->route('admin.login');
    } else {
        return redirect()->route('frontend.home');
    }
})->name('login');


// ==== Frontend
Route::group(['prefix'=> '', 'middleware' => [PreventCitizenBackHistoryMiddleware::class]],function(){

    // ==== Home
    Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.home');

    // ==== About Us
    Route::get('about-us', [FrontendHomeController::class, 'aboutUs'])->name('frontend.about-us');

    // === Mission & Vision
    Route::get('mission-vision', [FrontendHomeController::class, 'missionVision'])->name('frontend.mission-vision');

    // === Awards & Certifications
    Route::get('awards-certifications', [FrontendHomeController::class, 'awardsCertifications'])->name('frontend.awards-certifications');

    // ==== Our USP
    Route::get('our-usp', [FrontendHomeController::class, 'ourUsp'])->name('frontend.our-usp');

    // ==== Sustainability
    Route::get('sustainability', [FrontendHomeController::class, 'sustainability'])->name('frontend.sustainability');

    // ==== Careers
    Route::get('careers', [FrontendHomeController::class, 'careers'])->name('frontend.careers');

    // ==== Media & Events
    Route::get('media-events', [FrontendHomeController::class, 'mediaEvents'])->name('frontend.media-events');

    // ==== Contact Us
    Route::get('contact', [FrontendHomeController::class, 'contact'])->name('frontend.contact');

});


// ===== Admin Register
Route::get('admin/register', [RegisterController::class,'register'])->name('admin.register');
Route::post('admin/register/store', [RegisterController::class,'store'])->name('admin.register.store');

// ===== Admin Login/Logout
Route::get('admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('admin/login/store', [LoginController::class, 'authenticate'])->name('admin.login.store');

// ===== Send Password Reset Link
Route::get('admin/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.forget-password.request');
Route::post('admin/forgot-password/send-email-link', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.forget-password.send-email-link.store');

// ===== Reset Password
Route::get('admin/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('admin/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('admin.password.update');


Route::group(['prefix' => 'admin', 'middleware' => ['auth:web', PreventBackHistoryMiddleware::class]], function () {

    // ===== Admin Dashboard
    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.dashboard');

    // ==== Update Password
    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('update-password');

    // ==== Logout
    Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // ==== Banner Management
    Route::resource('banner', BannerController::class);

    // ==== Statistics Management
    Route::resource('statistics', StatisticsController::class);

    // ===== Construction Solutions Management
    Route::resource('construction-solutions', ConstructionSolutionsController::class);

    // ===== Teams Management
    Route::resource('teams', TeamsController::class);

    // ==== Clients Management
    Route::resource('clients', ClientController::class);

    // ==== Associates Management
    Route::resource('associates', AssociateController::class);

    // ==== About J4C Management
    Route::resource('about-j4c', AboutJ4cController::class);

    // ==== Who We Are Management
    Route::resource('who-we-are', WhoWeAreController::class);

    // ==== Our Mission Management
    Route::resource('our-mission', OurMissionController::class);

    // ==== Our Vision Management
    Route::resource('our-vision', OurVisionController::class);

    // ==== Our Certification Management
    Route::resource('certification', CertificationController::class);

    // ==== Our Award Management
    Route::resource('award', AwardController::class);

    // ==== Our USP Management
    Route::resource('our-usp', OurUspController::class);

});

// ==== Robots
Route::get('/robots.txt', function () {
    return response("User-agent: *\nDisallow:", 200)
    ->header('Content-Type', 'text/plain')
    ->header('X-Robots-Tag', 'noindex')
    ->header('X-Content-Type-Options', 'nosniff')
    ->header('X-XSS-Protection', '1; mode=block')
    ->header('X-Frame-Options', 'SAMEORIGIN');
});

// ==== Sitemap
Route::get('/sitemap.xml', function () {
    return response()->view('sitemap')
    ->header('Content-Type', 'text/xml')
    ->header('X-Robots-Tag', 'noindex')
    ->header('X-Content-Type-Options', 'nosniff')
    ->header('X-XSS-Protection', '1; mode=block')
    ->header('X-Frame-Options', 'SAMEORIGIN')
    ->header('Content-Type', 'application/xml')
    ->header('Content-Disposition', 'attachment; filename="sitemap.xml"')
    ->header('Content-Transfer-Encoding', 'binary');
});
