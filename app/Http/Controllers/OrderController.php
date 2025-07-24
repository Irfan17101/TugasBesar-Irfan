<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $validator = Validator::make($request->all(), [
            'service_kiloan' => 'required|string', 
            'weight' => 'required|numeric|min:0.5', 
            'type' => 'required|in:kiloan',
            'pickup_date' => 'required|date|after_or_equal:today',
            'pickup_time' => 'required|string',
            'address' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      
        $service_name = $request->service_kiloan;
        $weight = $request->weight;
        $harga_per_kg = 0;
        
        
        if ($service_name == 'Reguler (2-3 Hari)') {
            $harga_per_kg = 8000;
        } elseif ($service_name == 'Express (1 Hari)') {
            $harga_per_kg = 12000; 
        } else {            
            return redirect()->back()->with('error', 'Layanan yang dipilih tidak valid.')->withInput();
        }

        
        $total_price = $harga_per_kg * $weight;

        try {
            Order::create([
                'user_id' => auth()->id(),
                'service_name' => $service_name,
                'type' => $request->type,
                'weight' => $weight,
                'total_price' => $total_price,
                'pickup_date' => $request->pickup_date,
                'pickup_time' => $request->pickup_time,
                'address' => $request->address,
                'notes' => $request->notes,
                'status' => 'pending', 
            ]);

            return redirect()->route('laundry.lacak')->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat pesanan: ' . $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id); 
        return view('dashboardAdmin.detail', compact('order')); 
    }

    
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'status' => 'required|in:dijemput,dicuci,dikirim,selesai,dibayar', 
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    
    public function track($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', auth()->id()) 
            ->firstOrFail();

        return view('dashboard.track', compact('order'));
    }
}
