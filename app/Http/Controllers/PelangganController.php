<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function create()
    {
        return view('dashboard.create'); // pastikan view ini ada
    }

    public function store(Request $request)
    {
        // proses simpan data pelanggan ke database
    }
}
