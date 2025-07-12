<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create(Order $order)
    {

        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        if ($order->total_price <= 0) {
            return redirect()->route('laundry.lacak')->with('error', 'Pesanan tidak bisa dibayar karena total harga Rp 0.');
        }
        if ($order->status == 'dibayar') {
            return redirect()->route('laundry.lacak')->with('info', 'Pesanan ini sudah dibayar.');
        }
        
        if ($order->snap_token) {
            return view('payment.checkout', [
                'order' => $order,
                'snapToken' => $order->snap_token,
            ]);
        }

        $params = [
            'transaction_details' => [
                'order_id' => $order->id . '-' . time(), 
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->user->name ?? 'Pelanggan',
                'email' => $order->user->email ?? 'email-tidak-ada@laundry.com',
                'phone' => $order->user->phone ?? '08123456789', 
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            $order->snap_token = $snapToken;
            $order->save();

            return view('payment.checkout', [
                'order' => $order,
                'snapToken' => $snapToken,
            ]);

        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            Log::error('Midtrans Snap Token Error: ' . $errorMessage);
            return redirect()->route('laundry.lacak')->with('error', 'Midtrans Error: ' . $errorMessage);
        }
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function callback(Request $request)
    {

    }
}
