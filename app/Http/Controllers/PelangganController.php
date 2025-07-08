<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('dashboard.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggan,email',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pelanggan berhasil didaftarkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('dashboard.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('dashboard.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggan,email,' . $id,
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        $pelanggan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data pelanggan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('dashboard')->with('success', 'Pelanggan berhasil dihapus!');
    }

    /**
     * Show the order form for laundry service.
     */
    public function order()
    {
        // Ambil semua pelanggan untuk dropdown
        $pelanggan = Pelanggan::all();
        return view('dashboard.order', compact('pelanggan'));
    }

    /**
     * Process the laundry order.
     */
    public function processOrder(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'jenis_layanan' => 'required|string',
            'berat' => 'required|numeric|min:1',
            'tanggal_ambil' => 'required|date|after:today',
            'catatan' => 'nullable|string',
        ]);

        // Di sini Anda bisa menambahkan logic untuk menyimpan order
        // Misalnya ke tabel 'orders' atau 'pesanan'
        
        return redirect()->route('dashboard')->with('success', 'Pesanan laundry berhasil dibuat!');
    }
}