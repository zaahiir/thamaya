<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\UserController;
use App\Http\Middleware\IsLoggedIn;

Route::get('/', function () {
    return view('home');
});

// Public routes
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::any('/adminLogin', [UserController::class, 'adminLogin'])->name('admin.login');
Route::post('/adminAuth', [UserController::class, 'adminAuth'])->name('admin.auth');
Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');

// Protected routes
Route::middleware([IsLoggedIn::class])->group(function () {
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('cms.registrations');
    Route::get('/registrations/data', [RegistrationController::class, 'getData'])->name('registrations.data');
    Route::get('/registrations/{id}', [RegistrationController::class, 'show'])->name('registrations.show');
});
