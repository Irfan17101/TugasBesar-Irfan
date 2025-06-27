<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function create()
    {
        return view('dashboard.order'); // Pastikan file order.blade.php ada
    }

    public function store(Request $request)
    {
        // Simpan data laundry ke database (contoh sederhana)
        // Validasi dan logika penyimpanan bisa kamu tambahkan sesuai kebutuhan

        return redirect()->route('dashboard')->with('success', 'Pesanan laundry berhasil dikirim.');
    }
}
