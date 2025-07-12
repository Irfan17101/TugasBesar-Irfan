<?php

// Memuat autoloader Composer dari Laravel
require __DIR__.'/../vendor/autoload.php';

echo "<h1>Tes Koneksi Langsung ke Midtrans</h1>";

// ====================================================================
// KONFIGURASI LANGSUNG (HARDCODE)
// Ganti dengan API Key terbaru Anda
// ====================================================================
$serverKey = 'Mid-server-Jvr-97yItV8jSgCHy3HILtvlO'; // Ganti jika Anda generate ulang
$isProduction = false;
// ====================================================================


try {
    // Set konfigurasi langsung ke library Midtrans
    \Midtrans\Config::$serverKey = $serverKey;
    \Midtrans\Config::$isProduction = $isProduction;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    echo "<p style='color:green;'>Konfigurasi Midtrans berhasil di-set.</p>";
    echo "<p>Server Key yang digunakan: <strong>" . \Midtrans\Config::$serverKey . "</strong></p>";

    // Membuat parameter transaksi dummy
    $params = [
        'transaction_details' => [
            'order_id' => 'TES-' . time(),
            'gross_amount' => 50000, // Harga dummy
        ],
        'customer_details' => [
            'first_name' => 'Budi',
            'last_name' => 'Prasetyo',
            'email' => 'budi.prasetyo@example.com',
            'phone' => '08123456789',
        ],
    ];

    echo "<p>Mencoba meminta Snap Token ke Midtrans...</p>";

    // Meminta Snap Token
    $snapToken = \Midtrans\Snap::getSnapToken($params);

    echo "<p style='color:green; font-weight:bold;'>BERHASIL! Snap Token berhasil didapatkan.</p>";
    echo "<p>Snap Token: " . $snapToken . "</p>";
    echo "<h3>Jika Anda melihat ini, artinya API Key dan koneksi Anda VALID. Masalahnya ada di dalam instalasi Laravel Anda.</h3>";

} catch (\Exception $e) {
    echo "<h2 style='color:red;'>GAGAL! Terjadi Error.</h2>";
    echo "<p>Pesan Error dari Midtrans:</p>";
    echo "<pre style='background-color:#ffecec; border:1px solid red; padding:10px;'>" . $e->getMessage() . "</pre>";
    echo "<h3>Jika Anda melihat ini, artinya masalah ada pada API Key, Akun Midtrans, atau koneksi jaringan Anda.</h3>";
}
