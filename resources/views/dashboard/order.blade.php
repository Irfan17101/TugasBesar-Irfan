@extends('layouts.app')

@section('title', 'Lacak Pesanan Anda')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h4 class="card-title mb-0">Lacak Status Pesanan Anda</h4>
                
                    <i class="fas fa-plus me-1"></i> Buat Pesanan Baru
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag me-1 text-muted"></i>ID Pesanan</th>
                                <th><i class="fas fa-calendar-alt me-1 text-muted"></i>Tanggal Pesan</th>
                                <th><i class="fas fa-tshirt me-1 text-muted"></i>Layanan</th>
                                <th><i class="fas fa-wallet me-1 text-muted"></i>Total Harga</th>
                                <th><i class="fas fa-info-circle me-1 text-muted"></i>Status Pesanan</th>
                                <th class="text-center"><i class="fas fa-cogs me-1 text-muted"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop menggunakan variabel $orders, setiap item disebut $pesanan --}}
                            @forelse ($orders as $pesanan)
                                <tr>
                                    <td><strong>#{{ $pesanan->id }}</strong></td>
                                    <td>{{ $pesanan->created_at->format('d M Y') }}</td>
                                    <td>{{ $pesanan->service_name ?? 'N/A' }}</td>
                                    <td>
                                        @if($pesanan->total_price > 0)
                                            <span class="fw-bold">Rp {{ number_format($pesanan->total_price) }}</span>
                                        @else
                                            <span class="text-muted fst-italic">- Menunggu Harga -</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Logika untuk menampilkan badge status yang berbeda warna dan ikon --}}
                                        @php
                                            $statusConfig = match(strtolower($pesanan->status)) {
                                                'selesai' => ['class' => 'success', 'icon' => 'fa-check-circle'],
                                                'diterima' => ['class' => 'secondary', 'icon' => 'fa-inbox'],
                                                'siap diantar' => ['class' => 'primary', 'icon' => 'fa-truck'],
                                                'dibatalkan' => ['class' => 'danger', 'icon' => 'fa-times-circle'],
                                                default => ['class' => 'info', 'icon' => 'fa-sync-alt']
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $statusConfig['class'] }} fs-6">
                                            <i class="fas {{ $statusConfig['icon'] }} me-1"></i>
                                            {{ $pesanan->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        {{-- Tombol Aksi yang berubah sesuai kondisi --}}
                                        @if($pesanan->status == 'Siap Diantar' && $pesanan->payment_status == 'Belum Lunas')
                                            <a href="{{ route('laundry.pembayaran', $pesanan->id) }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-money-bill-wave me-1"></i> Bayar Sekarang
                                            </a>
                                        @elseif($pesanan->status == 'Selesai')
                                             <button class="btn btn-sm btn-outline-secondary" disabled>Selesai</button>
                                        @else
                                            {{-- Tombol ini bisa diarahkan ke halaman detail timeline di masa depan --}}
                                            <a href="{{ route('order.track', $pesanan->id) }}" class="btn btn-sm btn-info text-white">
                                                <i class="fas fa-search me-1"></i> Lacak Status
                                            </a>                                            
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="fas fa-box-open fa-3x mb-3"></i>
                                            <h5 class="mb-1">Anda belum memiliki pesanan.</h5>
                                            <p>Mari buat pesanan pertama Anda!</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .badge {
        padding: 0.5em 0.75em;
        font-weight: 500;
        font-size: 0.8rem;
    }
</style>
@endsection
