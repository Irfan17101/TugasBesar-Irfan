<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Order; 
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{

    public function lacakPesanan()
    {
        $orders = \App\Models\Order::where('user_id', auth()->id())
                                    ->latest()
                                    ->get();

        
        return view('dashboard.lacak', ['orders' => $orders]);
    }

    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('dashboard.create', compact('pelanggan'));
    }

    public function customerDashboard() {
        return view('dashboard.customer');
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:pelanggan,email'],
            'telepon' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Pelanggan berhasil didaftarkan!');
    }

    public function track($id)
    {
    $order = \App\Models\Order::where('id', $id)
        ->where('user_id', auth()->id()) 
        ->firstOrFail();

    return view('orders.track', compact('order')); 
    }


    public function edit(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('dashboard.edit', compact('pelanggan'));
    }

    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:pelanggan,email,' . $id],
            'telepon' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Data pelanggan berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('dashboard')->with('success', 'Pelanggan berhasil dihapus!');
    }

    public function pembayaran()
    {
        $order = Order::all();
        return view('dashboard.lacak', compact('lacak'));
    }


}
