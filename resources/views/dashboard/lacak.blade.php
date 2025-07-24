@extends('layouts.app')

@section('title', 'Lacak Pesanan Saya')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Daftar Pesanan Laundry Saya</h2>
                <a href="{{ route('laundry.pesan') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Buat Pesanan Baru
                </a>
            </div>

            {{-- Menampilkan pesan sukses atau error --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('info'))
                <div class="alert alert-info">{{ session('info') }}</div>
            @endif


            {{-- Loop untuk setiap pesanan yang dimiliki pengguna --}}
            @forelse ($orders as $order)
                <div class="card shadow-sm mb-3">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            {{-- Kolom Kiri: Detail Pesanan --}}
                            <div class="col-md-8">
                                <h5 class="card-title fw-bold">Pesanan #{{ $order->id }}</h5>
                                <p class="card-text mb-1">
                                    <strong>Layanan:</strong> {{ $order->service_name }} ({{ $order->type }})
                                </p>
                                <p class="card-text mb-1">
                                    <strong>Tanggal Pesan:</strong> {{ $order->created_at->format('d F Y') }}
                                </p>
                                <p class="card-text">
                                    <strong>Total Tagihan:</strong> 
                                    <span class="fw-bold text-primary">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                </p>
                            </div>

                            {{-- Kolom Kanan: Status & Tombol Aksi --}}
                            <div class="col-md-4 text-md-end">
                                <p class="mb-2">
                                    <strong>Status:</strong>
                                    @if($order->status == 'pending')
                                        <span class="badge bg-warning text-dark">Menunggu Pembayaran</span>
                                    @elseif($order->status == 'dibayar')
                                        <span class="badge bg-success">Sudah Dibayar</span>
                                    @elseif($order->status == 'dicuci' || $order->status == 'dijemput' || $order->status == 'dikirim')
                                        <span class="badge bg-info">Diproses</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                    @endif
                                </p>

                                {{-- ======================================================= --}}
                                {{-- INI ADALAH PERBAIKAN UTAMA PADA LOGIKA TOMBOL --}}
                                {{-- ======================================================= --}}
                                @if ($order->status == 'pending')
                                    {{-- Jika status pending, tampilkan tombol Bayar Sekarang --}}
                                    <a href="{{ route('payment.create', ['order' => $order->id]) }}" class="btn btn-success">
                                        <i class="fas fa-money-bill-wave me-2"></i>Bayar Sekarang
                                    </a>
                                    @else
                                    {{-- Jika status BUKAN pending, tampilkan tombol Lacak Status --}}
                                    <a href="{{ route('laundry.lacak') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-search-location me-2"></i>Lacak Status
                                    </a>
                                    @endif
                                {{-- ======================================================= --}}

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Tampilan jika pengguna belum punya pesanan --}}
                <div class="card text-center py-5">
                    <div class="card-body">
                        <h4 class="card-title">Anda belum memiliki pesanan.</h4>
                        <p class="card-text">Ayo mulai memesan layanan laundry terbaik dari kami!</p>
                        <a href="{{ route('laundry.pesan') }}" class="btn btn-primary mt-2">Pesan Sekarang</a>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection
