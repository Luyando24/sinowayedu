<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\programController;
use App\Http\Controllers\ProgramDetailsController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UniversityDetails;
use App\Http\Controllers\UniversityDetailsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WhyController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\JobApplicationController;
use App\Models\Hero;
use App\Models\University;
use App\Models\Degree;
use App\Models\City;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Language switcher route
Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('language.switch');

Route::get('/membership-notice', [ProgramController::class, 'membershipNotice'])->name('membership-notice');
Route::get('/membership-application', [ProgramController::class, 'membershipApplication'])->name('membership-application');
//post route to submit new membership application
Route::post('/submit-membership-application', [MembershipController::class, 'submitMembershipApplication'])->name('membership.submit');
    
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/universities', [UniversityController::class, 'universities'])->name('universities');
Route::get('/cities', [CityController::class, 'cities'])->name('cities');

// Subscription required notice
Route::get('/subscription-required', function() {
    return view('subscription.required');
})->name('subscription.required');

// Payment instructions page
Route::get('/payment-instructions', function() {
    return view('subscription.payment-instructions');
})->name('payment.instructions');

// Routes that require subscription
Route::middleware(['auth', \App\Http\Middleware\EnsureUserIsSubscribed::class])->group(function () {
    Route::get('/programs/{program}', [ProgramDetailsController::class, 'ProgramDetails'])->name('program');
    Route::get('/university.details/{university}', [UniversityDetails::class, 'UniversityDetails'])->name('university');
});

// Routes that require authentication but not subscription
Route::middleware('auth')->group(function () {
    // Your existing authenticated routes
});

// About page
Route::get('/about', [AboutController::class, 'about'])->name('about');

// Why us page
Route::get('/why-us', [WhyController::class, 'why'])->name('why');

// Contact page
Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact');

// Send message from contact form
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Blog
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/blog', [PostController::class, 'store'])->name('posts.store');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// view city
Route::get('/city/{city}', [CityController::class, 'cityDetails'])->name('city.view');

// Display news page
Route::get('/news', [PostController::class, 'newsPage'])->name('news');

// Display post details
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

// Dashboard (auth protected)

// Display career page
Route::get('/careers', [CareerController::class, 'careerPage'])->name('careers');
// Display career details
Route::get('/career/{career}', [CareerController::class, 'careerDetails'])->name('job.show');
//submit job application
Route::post('/job/{career:slug}/apply', [JobApplicationController::class, 'store'])->name('job.apply');

// Debug route to check language settings
Route::get('/debug-language', function () {
    return [
        'session_locale' => session('locale'),
        'app_locale' => app()->getLocale(),
        'config_locale' => config('app.locale'),
        'all_session_data' => session()->all()
    ];
});







