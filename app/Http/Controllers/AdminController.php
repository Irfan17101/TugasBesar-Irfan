<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// Tambahkan import model yang dibutuhkan
// use App\Models\Transaction; // Jika Anda punya model Transaction
// use App\Models\Order; // Jika Anda punya model Order

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::where('role', 'pelanggan')->count();
        $transactionCount = 0; // Sesuaikan dengan model transaksi Anda
        $orderCount = 0; // Sesuaikan dengan model pemesanan Anda
        
        return view('dashboardAdmin.admin', compact('userCount', 'transactionCount', 'orderCount'));
    }

    public function kelolaPengguna()
    {
        $users = User::where('role', 'pelanggan')
                    ->orderBy('created_at', 'desc')
                    ->get();
        
        return view('dashboardAdmin.KelolaPengguna', compact('users'));
    }

    public function lihatTransaksi()
    {
        // Jika Anda belum punya model Transaction, buat data dummy dulu
        $transaksis = collect([
            (object)[
                'id' => 1,
                'user_name' => 'John Doe',
                'service' => 'Cuci Kering',
                'amount' => 25000,
                'status' => 'Selesai',
                'created_at' => now()->subDays(1),
            ],
            (object)[
                'id' => 2,
                'user_name' => 'Jane Smith',
                'service' => 'Cuci Setrika',
                'amount' => 35000,
                'status' => 'Proses',
                'created_at' => now()->subDays(2),
            ],
            (object)[
                'id' => 3,
                'user_name' => 'Bob Johnson',
                'service' => 'Cuci Kering',
                'amount' => 20000,
                'status' => 'Pending',
                'created_at' => now()->subDays(3),
            ],
        ]);

        // Jika Anda sudah punya model Transaction, gunakan ini:
        // $transaksis = Transaction::with('user')->orderBy('created_at', 'desc')->get();
        
        return view('dashboardAdmin.LihatTransaksi', compact('transaksis'));
    }

    public function statusPemesanan()
    {
        $pesanans = collect([
            (object)[
                'id' => 1,
                'kode' => 'ORD001',
                'customer' => 'John Doe',
                'service' => 'Cuci Kering',
                'weight' => 3,
                'status' => 'Dijemput',
                'pickup_date' => now()->subDays(1),
                'delivery_date' => now()->addDays(1),
                'total' => 25000,
                'created_at' => now()->subDays(1),
            ],
            // ... tambahkan data lainnya
        ]);
        
        // Debug: pastikan data ada
        if ($pesanans->isEmpty()) {
            dd('Data pesanan kosong');
        }
        
        // Debug: cek view path
        if (!view()->exists('dashboardAdmin.StatusPemesanan')) {
            dd('View tidak ditemukan');
        }
        
        return view('dashboardAdmin.StatusPemesanan', compact('pesanans'));
    }
    
}