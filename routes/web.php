<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
        return redirect()->route('customer.dashboard');
    })->name('dashboard');

    // Rute Khusus Pelanggan
    Route::get('/customer/dashboard', [App\Http\Controllers\PelangganController::class, 'customerDashboard'])->name('customer.dashboard');
    Route::get('/pesan-laundry', [PelangganController::class, 'create'])->name('laundry.pesan');
    Route::get('/lacak-pesanan', [PelangganController::class, 'lacakPesanan'])->name('laundry.lacak');
    Route::get('/payment/{order}', [PaymentController::class, 'create'])->name('payment.create');

    // Rute pembayaran untuk halaman sukses 
    Route::get('/payment/success', function () {
        return '<h1>Pembayaran Berhasil!</h1>'; 
    })->name('payment.success');
});



// RUTE  UNTUK ADMIN
// ======================================================================
// SEMUA RUTE KHUSUS ADMIN DILETAKKAN DI DALAM SATU GRUP INI
// ======================================================================
Route::prefix('admin')
    ->middleware(['auth']) // ← Hapus 'admin' sementara
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
        Route::get('/kelola-pengguna', [AdminController::class, 'kelolaPengguna'])->name('kelola-pengguna');
        Route::get('/lihat-transaksi', [AdminController::class, 'lihatTransaksi'])->name('lihat-transaksi');
        Route::get('/status-pemesanan', [AdminController::class, 'statusPemesanan'])->name('status-pemesanan');
        Route::patch('/transaksi/{transaksi}/update-status', [AdminController::class, 'updateStatus'])->name('transaksi.updateStatus');
        Route::get('/transaksi/{transaksi}/track', [AdminController::class, 'trackTransaksi'])->name('transaksi.track');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    });