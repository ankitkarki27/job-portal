<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ApplicantProfileController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/register/applicant', [AuthController::class, 'showApplicantRegisterForm'])->name('register.applicant');
    Route::post('/register/applicant', [AuthController::class, 'registerApplicant']);
    
    Route::get('/register/company', [AuthController::class, 'showCompanyRegisterForm'])->name('register.company');
    Route::post('/register/company', [AuthController::class, 'registerCompany']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Resume Update Routes
    Route::get('/profile/resume/edit', [ProfileController::class, 'editResume'])->name('profile.resume.edit');
    Route::put('/profile/resume/update', [ProfileController::class, 'updateResume'])->name('profile.resume.update');
    
    // Logo Update Routes
    Route::get('/profile/logo/edit', [ProfileController::class, 'editLogo'])->name('profile.logo.edit');
    Route::put('/profile/logo/update', [ProfileController::class, 'updateLogo'])->name('profile.logo.update');
    
    Route::get('/profile/delete', [ProfileController::class, 'confirmDelete'])->name('profile.delete');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Admin Routes
Route::middleware(['rolemanager:admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index']);
});

// Applicant Routes
Route::middleware(['rolemanager:applicant'])->group(function () {
    Route::get('/applicant/home', [ApplicantController::class, 'index'])->name('applicant.home');
});





// Company Routes
Route::middleware(['rolemanager:company'])->group(function () {
    Route::get('/company/home', [CompanyController::class, 'index'])->name('company.home');

    // Job Listings
    Route::get('/job_listings', [JobListingController::class, 'index'])->name('job_listings.index');
    Route::get('/job_listings/create', [JobListingController::class, 'create'])->name('job_listings.create');
    Route::post('/job_listings', [JobListingController::class, 'store'])->name('job_listings.store');
    Route::get('/job_listings/{id}', [JobListingController::class, 'show'])->name('job_listings.show');
    Route::get('/job_listings/{id}/edit', [JobListingController::class, 'edit'])->name('job_listings.edit');
    Route::put('/job_listings/{id}', [JobListingController::class, 'update'])->name('job_listings.update');
    Route::delete('/job_listings/{id}', [JobListingController::class, 'destroy'])->name('job_listings.destroy');

    // Company Profile Management
    Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
});

// Applicant Job Listings
Route::middleware(['rolemanager:applicant'])->group(function () {
    Route::get('/jobs', [JobListingController::class, 'publicIndex'])->name('jobs.index');
    Route::get('/jobs/{id}', [JobListingController::class, 'publicShow'])->name('jobs.show');
});

// Applicant Profile Routes


// Error Handling
Route::fallback(function () {
    return view('errors.404');
});

require __DIR__.'/auth.php';
