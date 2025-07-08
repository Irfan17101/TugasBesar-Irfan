<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;


// =========================
// Halaman Utama
// =========================
Route::get('/', function () {
    return view('pages.index'); 
});

// =========================
// Halaman Statis
// =========================
Route::view('/about', 'pages.about');
Route::view('/contact', 'pages.contact');
Route::view('/services', 'pages.services');
Route::view('/pricing', 'pages.pricing');
Route::view('/blog', 'pages.blog');
Route::view('/blog-detail', 'pages.blog-detail');

// =========================
// Autentikasi
// =========================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// =========================
// Dashboard
// =========================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// =========================
// Profile (User Setting)
// =========================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route test login (opsional)
    Route::get('/test', function () {
        return 'Login berhasil!';
    });

    // =========================
    // Pelanggan & Laundry
    // =========================
    Route::resource('pelanggan', PelangganController::class);
    Route::get('/pesan-laundry', [PelangganController::class, 'order'])->name('pelanggan.order');
    Route::post('/pesan-laundry', [PelangganController::class, 'processOrder'])->name('pelanggan.process-order');
});

// =========================
// Include Auth Routes
// =========================
require __DIR__.'/auth.php';

// pesan laundry
Route::middleware('auth')->group(function () {
    Route::get('/pesan-laundry', [OrderController::class, 'order'])->name('order.form');
    Route::post('/pesan-laundry', [OrderController::class, 'store'])->name('order.store');
});

Route::get('/lacak-pesanan', [OrderController::class, 'showLacakForm'])->name('order.lacak-form');
Route::post('/lacak-pesanan', [OrderController::class, 'lacakPesanan'])->name('order.lacak');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/kelola-pengguna', [AdminController::class, 'kelolaPengguna'])->name('pengguna');
    Route::post('/kelola-pengguna', [AdminController::class, 'storeUser'])->name('pengguna.store');
    Route::get('/lihat-transaksi', [AdminController::class, 'lihatTransaksi'])->name('transaksi');
    Route::get('/admin/status-pemesanan', [AdminController::class, 'statusPemesanan'])->name('admin.status-pemesanan');
});
