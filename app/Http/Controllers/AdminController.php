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

    public function lihatTransaksi()
    {
        $transaksis = Order::with('user')->latest()->get();
        return view('dashboardAdmin.LihatTransaksi', compact('transaksis'));
    }

    public function statusPemesanan()
    {
        $transaksis = Order::with('user')->latest()->get();
        return view('dashboardAdmin.StatusPemesanan', compact('transaksis'));
    }
    
    public function laporan(Request $request)
    {
    $query = Transaksi::query();

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('dari') && $request->filled('sampai')) {
        $query->whereBetween('created_at', [$request->dari, $request->sampai]);
    }

    $transaksis = $query->latest()->get();
    $totalPendapatan = $query->sum('total_price');

    return view('dashboardAdmin.laporan', compact('transaksis', 'totalPendapatan'));
    }


}