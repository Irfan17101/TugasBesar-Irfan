<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\PaymentController;



Route::get('/', function () {
    return view('pages.index'); 
})->name('home');

Route::post('/order' , [OrderController::class,'store'])->name('order.store');

// Halaman Statis
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/services', 'pages.services')->name('services');
Route::view('/pricing', 'pages.pricing')->name('pricing');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/blog-detail', 'pages.blog-detail')->name('blog.detail');
require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    
    // Route Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', function() {
        if (auth()->user()->role == 'admin') {
            return view('dashboardAdmin.admin');
        }
        return redirect()->route('laundry.lacak');
    })->name('dashboard');

    // Rute Khusus Pelanggan
    Route::get('/pesan-laundry', [PelangganController::class, 'create'])->name('laundry.pesan');
    Route::get('/lacak-pesanan', [PelangganController::class, 'lacakPesanan'])->name('laundry.lacak');
    Route::get('/payment/{order}', [PaymentController::class, 'create'])->name('payment.create');

    // Rute pembayaran untuk halaman sukses 
    Route::get('/payment/success', function () {
        return '<h1>Pembayaran Berhasil!</h1>'; 
    })->name('payment.success');
});



// RUTE  UNTUK ADMIN
Route::get('kelola-pengguna', [AdminController::class, 'kelolaPengguna'])->name('kelola-pengguna');
Route::get('lihat-transaksi', [AdminController::class, 'lihatTransaksi'])->name('lihat-transaksi');
Route::get('/status-pemesanan', [AdminController::class, 'statusPemesanan'])->name('status-pemesanan');
Route::get('/customer-dashboard', [PelangganController::class, 'customerDashboard'])->name('dashboard.customer');
Route::get('/order/{id}/track', [OrderController::class, 'track'])->name('order.track');
Route::get('/pembayaran/laundry/{id}', [App\Http\Controllers\OrderController::class, 'pembayaran'])->name('laundry.pembayaran');
Route::get('/admin/transaksi/{id}', [OrderController::class, 'show'])->name('admin.transaksi.show');
Route::patch('/admin/transaksi/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.transaksi.updateStatus');
Route::post('/admin/user', [userController::class, 'store'])->name('user.store');
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
});