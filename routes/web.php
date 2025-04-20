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
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Models\Hero;
use App\Models\University;
use App\Models\Degree;
use App\Models\City;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/programs', [ProgramController::class, 'programs'])->name('programs');
    Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
    Route::get('/programs/{program}', [ProgramDetailsController::class, 'ProgramDetails'])->name('program');
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    
    // List of universities (only accessible to authenticated users)
    Route::get('/universities', [UniversityController::class, 'universities'])->name('universities');
    Route::get('/university.details/{university}', [UniversityDetails::class, 'UniversityDetails'])->name('university');
// Programs (only accessible to authenticated users)
Route::middleware('auth')->group(function () {
    
});

// Display all cities
Route::get('/cities', [CityController::class, 'cities'])->name('cities');

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

// Dashboard (auth protected)

