<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeliController;

// Landing page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Form kirim pesan
Route::get('/kirim-pesan', function () {
    return view('kirimpesan');
});

// Fitur Beli
Route::resource('beli', BeliController::class);

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard berdasarkan role
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'checkRole:user'])->group(function () {
    Route::get('/dashboard/user', function () {
        return view('dashboard.user');
    })->name('user.dashboard');
});
