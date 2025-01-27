<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\IsLoggedIn;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\UserController;

Route::get('/', function () {
    return view('home');
});

// This route should be OUTSIDE the middleware group
Route::get('/registrations', [RegistrationController::class, 'index'])->name('cms.registrations');

Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

// Other authenticated routes can stay in the middleware group
Route::middleware([IsLoggedIn::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});
