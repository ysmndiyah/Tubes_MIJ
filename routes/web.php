<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PageController;


// Landing page
Route::get('/', [LandingPageController::class, 'index'])->name('home');

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
// Admin routes
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    // Langsung redirect ke produk
    Route::get('/dashboard/admin', fn () => redirect()->route('produk.index'))->name('admin.dashboard');

    // CRUD produk
    Route::resource('/admin/produk', ProductController::class)->names([
        'index' => 'produk.index',
        'create' => 'produk.create',
        'store' => 'produk.store',
        'edit' => 'produk.edit',
        'update' => 'produk.update',
        'destroy' => 'produk.destroy',
    ]);
});

Route::post('/beli-produk', [ProductController::class, 'beli'])->name('produk.beli');
Route::get('/', [PageController::class, 'index'])->name('home');

    









