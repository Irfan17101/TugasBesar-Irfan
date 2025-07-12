@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="container mt-4">
    <h3>Detail Transaksi #{{ $order->id }}</h3>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Nama Pelanggan:</strong> {{ $order->user->name }}</p>
            <p><strong>Alamat:</strong> {{ $order->address ?? 'Bandung jawa barat' }}</p>
            <p><strong>Jenis Layanan:</strong> {{ $order->service_name }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Tanggal Pemesanan:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
            <p><strong>Catatan Tambahan:</strong> {{ $order->notes ?? '-' }}</p>
        </div>
    </div>
</div>
@endsection
