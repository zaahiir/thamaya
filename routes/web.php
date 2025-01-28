<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\IsLoggedIn;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\UserController;

Route::get('/', function () {
    return view('home');
});

Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::any('/adminLogin', [UserController::class, 'adminLogin'])->name('admin.login');
Route::post('/adminAuth', [UserController::class, 'adminAuth'])->name('admin.auth');

// Protected routes
Route::middleware([IsLoggedIn::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('cms.registrations');
});
