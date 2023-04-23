<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\analyticsController;
use App\Http\Controllers\chartController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\EnergyController;
use App\Http\Controllers\FarmerAuthController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\WaterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    // Admin login route
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    // Admin logout route
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

Route::prefix('farmer')->group(function () {
    // Farmer login route
    Route::get('/login', [FarmerAuthController::class, 'showLoginForm'])->name('farmer.login');
    Route::post('/login', [FarmerAuthController::class, 'login'])->name('farmer.login.submit');

    // Farmer register route
    Route::get('/register', [FarmerAuthController::class, 'showRegistrationForm'])->name('farmer.register');
    Route::post('/register', [FarmerAuthController::class, 'register'])->name('farmer.register.submit');

    // Farmer logout route
    Route::get('/logout', [FarmerAuthController::class, 'logout'])->name('farmer.logout');
});

// FARMER PROTECTED ROUTES
Route::prefix('farmer')->middleware(['auth:farmer'])->group(function () {
    Route::get('/dashboard', [analyticsController::class, 'farmerData']);
    Route::get('/crops', [CropController::class, 'index'])->name('crops.index');
    Route::post('/crops', [CropController::class, 'store'])->name('crops.store');
    Route::get('/water', [WaterController::class, 'index'])->name('water.index');
    Route::post('/water', [WaterController::class, 'store'])->name('water.store');
    Route::get('/energy', [EnergyController::class, 'index'])->name('energy.index');
    Route::post('/energy', [EnergyController::class, 'store'])->name('energy.store');
    Route::get('/finance', [FinanceController::class,'index'])->name('finance.index');
    Route::post('/finance', [FinanceController::class,'store'])->name('finance.store');
});

// ADMIN PROTECTED ROUTES
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [analyticsController::class, 'index']);
    Route::post('/seasons', [SeasonController::class, 'store']);
    Route::get('/seasons', [SeasonController::class, 'index']);
    Route::get('/crops', [CropController::class, 'cropAdmin'])->name('crops.index');
    Route::get('/water', [WaterController::class, 'waterAdmin'])->name('water.index');
    Route::get('/energy', [EnergyController::class, 'energyAdmin'])->name('energy.index');
    Route::get('/finance', [FinanceController::class,'financeAdmin'])->name('finance.index');

    
});
