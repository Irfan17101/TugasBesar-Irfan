<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LaundryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/auth.php';


Route::view('/', 'pages.index');
Route::view('/about', 'pages.about');
Route::view('/contact', 'pages.contact');
Route::view('/services', 'pages.services');
Route::view('/pricing', 'pages.pricing');
Route::view('/blog', 'pages.blog');
Route::view('/blog-detail', 'pages.blog-detail');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Proses login
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/test', function () {
    return 'Login berhasil!';
})->middleware('auth');


Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/laundry/create', [PelangganController::class, 'order'])->name('pelanggan.order');

// Tampilkan form input laundry
Route::get('/laundry/create', [LaundryController::class, 'create'])->name('pelanggan.order');

// Simpan data laundry
Route::post('/laundry/store', [LaundryController::class, 'store'])->name('laundry.store');
