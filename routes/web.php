<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    // Registration Routes
    Route::get('/register/applicant', [AuthController::class, 'showApplicantRegisterForm'])->name('register.applicant');
    Route::post('/register/applicant', [AuthController::class, 'registerApplicant']);
    
    Route::get('/register/company', [AuthController::class, 'showCompanyRegisterForm'])->name('register.company');
    Route::post('/register/company', [AuthController::class, 'registerCompany']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['rolemanager:admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index']);
});

// for applicant
Route::middleware(['rolemanager:applicant'])->group(function () {
    Route::get('/applicant/home', [ApplicantController::class, 'index'])->name('applicant.home');
});

// for company
Route::middleware(['rolemanager:company'])->group(function () {
    Route::get('/company/home', [CompanyController::class, 'index'])->name('company.home');
});
});

// Error Handling
Route::fallback(function () {
    return view('errors.404');
});

require __DIR__.'/auth.php';