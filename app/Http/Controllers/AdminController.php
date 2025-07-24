<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\orderr;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::where('role', 'pelanggan')->count();
        $transactionCount = 0; 
        $orderCount = 0; 
        
        return view('dashboardAdmin.admin', compact('userCount', 'transactionCount', 'orderCount'));
    }

    public function kelolaPengguna()
    {
        $users = User::where('role', 'pelanggan')
                    ->orderBy('created_at', 'desc')
                    ->get();
        
        return view('dashboardAdmin.KelolaPengguna', compact('users'));
    }

    // app/Http/Controllers/AdminController.php

public function lihatTransaksi()
{
    // Ambil data dari database
    $transaksis = Order::with('user')->latest()->get();
 
    // ↓↓↓ UBAH BAGIAN INI ↓↓↓
    // Sesuaikan nama 'LihatTransaksi' agar sama persis dengan nama file
    // dan kirim variabel $transaksis ke view.
    return view('dashboardAdmin.LihatTransaksi', compact('transaksis')); 
}

    public function statusPemesanan()
    {
        $transaksis = Order::with('user')->latest()->get();
        return view('dashboardAdmin.StatusPemesanan', compact('transaksis'));
    }
    
    // app/Http/Controllers/AdminController.php

// app/Http/Controllers/AdminController.php

// app/Http/Controllers/AdminController.php

// Pastikan use App\Models\Order; ada di bagian atas file Anda
// dan hapus 'use App\Models\Transaksi;' jika tidak diperlukan lagi.

public function laporan(Request $request)
{
    // Menggunakan Model 'Order' untuk mengakses tabel 'orders'
    $query = Order::query()->with('user');

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('dari') && $request->filled('sampai')) {
        $query->whereBetween('created_at', [$request->dari . ' 00:00:00', $request->sampai . ' 23:59:59']);
    }

    $transaksis = $query->latest()->get();
    
    // Asumsikan nama kolom di tabel 'orders' Anda adalah 'total_price'
    $totalPendapatan = $transaksis->sum('total_price');

    // Persiapan data chart
    $pendapatanHarian = $transaksis
        ->groupBy(fn($order) => $order->created_at->format('d M Y'))
        ->map(fn($day) => $day->sum('total_price'));

    $statusDistribusi = $transaksis->countBy('status');

    $pesananHarian = $transaksis
        ->groupBy(fn($order) => $order->created_at->format('d M Y'))
        ->map(fn($day) => $day->count());

    // PENTING: Jangan lupa hapus `dd()` jika masih ada
    
    return view('dashboardAdmin.laporan', [
        'transaksis' => $transaksis,
        'totalPendapatan' => $totalPendapatan,
        'pendapatanHarian' => $pendapatanHarian,
        'statusDistribusi' => $statusDistribusi,
        'pesananHarian' => $pesananHarian,
    ]);
}
    public function trackTransaksi(Order $transaksi)
    {
        // Mengirim variabel '$transaksi' ke view dengan nama baru '$order'
        return view('dashboard.track', ['order' => $transaksi]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        // 1. Validasi data yang dikirim dari form
        $request->validate([
            'status' => 'required|string|in:pending,dijemput,dicuci,dikirim,selesai,dibatalkan',
        ]);

        // 2. Update kolom 'status' pada data order yang ditemukan
        $order->status = $request->status;

        // 3. Simpan perubahan ke database
        $order->save();

        // 4. Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }

}