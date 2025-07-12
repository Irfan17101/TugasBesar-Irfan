@extends('layouts.app')

@section('title', 'Lacak Status Pesanan')

@section('content')
<div class="container mt-5">
    <h4 class="mb-4">Lacak Status Pesanan</h4>

    <div class="card">
        <div class="card-body">
            <p><strong>ID Pesanan:</strong> {{ $order->id }}</p>
            <p><strong>Jenis Layanan:</strong> {{ ucfirst($order->type) }} - {{ $order->service_name }}</p>
            <p><strong>Tanggal Penjemputan:</strong> {{ \Carbon\Carbon::parse($order->pickup_date)->format('d M Y') }}</p>
            <p><strong>Waktu Penjemputan:</strong> {{ $order->pickup_time }}</p>
            <p><strong>Alamat:</strong> {{ $order->address }}</p>
            <p><strong>Catatan:</strong> {{ $order->notes ?? '-' }}</p>

            <hr>

            <h5>Status Saat Ini:</h5>
            @switch($order->status)
                @case('pending')
                    <span class="badge bg-warning text-dark">Belum Dibayar</span>
                    @break
                @case('dibayar')
                    <span class="badge bg-info">Sudah Dibayar</span>
                    @break
                @case('pesanan_dibuat')
                    <span class="badge bg-primary">Sedang Diproses</span>
                    @break
                @case('selesai')
                    <span class="badge bg-success">Selesai</span>
                    @break
                @default
                    <span class="badge bg-secondary">Tidak Diketahui</span>
            @endswitch
        </div>
    </div>
</div>
@endsection
