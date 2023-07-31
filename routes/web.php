<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\analyticsController;
use App\Http\Controllers\chartController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\EnergyController;
use App\Http\Controllers\FarmerAuthController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\WaterController;
use App\Http\Controllers\RecommendationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ResetPasswordController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Farmer routes
Route::prefix('farmer')->group(function () {
    Route::get('/login', [FarmerAuthController::class, 'showLoginForm'])->name('farmer.login');
    Route::post('/login', [FarmerAuthController::class, 'login'])->name('farmer.login.submit');

    Route::get('/register', [FarmerAuthController::class, 'showRegistrationForm'])->name('farmer.register');
    Route::post('/register', [FarmerAuthController::class, 'register'])->name('farmer.register.submit');

    Route::get('/logout', [FarmerAuthController::class, 'logout'])->name('farmer.logout');

   
    // Password reset routes for farmers
    Route::get('passwords/reset', [FarmerAuthController::class, 'showResetForm'])->name('farmer.passwords.reset');
    Route::post('passwords/email', [FarmerAuthController::class, 'sendResetLinkEmail'])->name('farmer.passwords.email');
    Route::post('passwords/reset', [FarmerAuthController::class, 'resetPassword'])->name('farmer.passwords.update');



    // Email verification routes
    Route::get('/email/verify', function () {
        return view('farmer.verify-email');
    })->middleware('auth:farmer')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/farmer/dashboard');
    })->middleware(['auth:farmer', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth:farmer', 'throttle:6,1'])->name('verification.send');
});

// Recommendation route
Route::post('/recommendation', [RecommendationController::class, 'getRecommendation'])->name('recommendation');

// Farmer protected routes
Route::prefix('farmer')->middleware(['auth:farmer', 'verified'])->group(function () {
    Route::get('/dashboard', [analyticsController::class, 'farmerData']);
    Route::get('/crops', [CropController::class, 'index'])->name('crops.index');
    Route::post('/crops', [CropController::class, 'store'])->name('crops.store');
    Route::get('/water', [WaterController::class, 'index'])->name('water.index');
    Route::post('/water', [WaterController::class, 'store'])->name('water.store');
    Route::get('/energy', [EnergyController::class, 'index'])->name('energy.index');
    Route::post('/energy', [EnergyController::class, 'store'])->name('energy.store');
    Route::get('/finance', [FinanceController::class, 'index'])->name('finance.index');
    Route::post('/finance', [FinanceController::class, 'store'])->name('finance.store');
});

// Admin protected routes
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [analyticsController::class, 'index']);
    Route::post('/seasons', [SeasonController::class, 'store']);
    Route::get('/seasons', [SeasonController::class, 'index']);
    Route::get('/crops', [CropController::class, 'cropAdmin'])->name('crops.index');
    Route::get('/water', [WaterController::class, 'waterAdmin'])->name('water.index');
    Route::get('/energy', [EnergyController::class, 'energyAdmin'])->name('energy.index');
    Route::get('/finance', [FinanceController::class, 'financeAdmin'])->name('finance.index');
});

// Report generation routes
Route::get('/generate-report-pdf', [WaterController::class, 'generatePDF'])->middleware('auth:admin');
Route::get('/generate-crops-report-pdf', [CropController::class, 'generateCropsPDF'])->middleware('auth:admin');
Route::get('/generate-energy-report-pdf', [EnergyController::class, 'generateEnergyPDF'])->middleware('auth:admin');
Route::get('/generate-finance-report-pdf', [FinanceController::class, 'generateFinancePDF'])->middleware('auth:admin');
Route::get('/generate-farmer-finance-report-pdf', [FinanceController::class, 'generateFarmerFinancePDF'])->middleware('auth:farmer');
Route::get('/generate-farmer-energy-report-pdf', [EnergyController::class, 'generateFarmerEnergyPDF'])->middleware('auth:farmer');
Route::get('/generate-farmer-water-report-pdf', [WaterController::class, 'generateFarmerWaterPDF'])->middleware('auth:farmer');
Route::get('/generate-farmer-crop-report-pdf', [CropController::class, 'generateFarmerCropPDF'])->middleware('auth:farmer');

// Season routes
Route::get('/seasons', [SeasonController::class, 'index'])->name('admin.seasons.index');
Route::post('/seasons', [SeasonController::class, 'store'])->name('admin.seasons.store');
