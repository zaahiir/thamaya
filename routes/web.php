<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('home');
});

Route::get('/test-db', function() {
    try {
        DB::connection()->getPdo();
        return "Connected successfully to: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

// Add this route to your routes/web.php
Route::get('/check-tables', function() {
    $tables = DB::select('SHOW TABLES');
    return $tables;
});

Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::get('/cms/registrations', [RegistrationController::class, 'index'])->name('cms.registrations');
