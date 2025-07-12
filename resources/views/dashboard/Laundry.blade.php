@extends('layouts.app')

@section('title', 'Lacak Pesanan Anda')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        {{-- CONTOH DATA DARI CONTROLLER --}}
        {{-- @if($active_order) --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Status Pesanan: #{{-- $active_order->id --}}ORDER123</h4>
            </div>
            <div class="card-body">
                <p>Pesanan Anda saat ini dalam proses. Berikut adalah perkembangannya:</p>
                
                <ul class="timeline">
                    {{-- Status di-update oleh admin dan dibaca di sini --}}
                    @php $status = 'Proses Cuci'; /* Ganti dengan {{ $active_order->status }} */ @endphp

                    <li class="timeline-item {{ in_array($status, ['Proses Cuci', 'Proses Kering', 'Setrika', 'Siap Diantar', 'Selesai']) ? 'completed' : '' }} {{ $status == 'Diterima' ? 'active' : '' }}">
                        <div class="icon">✓</div>
                        <strong>Pesanan Diterima</strong>
                        <p class="text-muted mb-0">Kami telah menerima permintaan laundry Anda.</p>
                    </li>
                    <li class="timeline-item {{ in_array($status, ['Proses Kering', 'Setrika', 'Siap Diantar', 'Selesai']) ? 'completed' : '' }} {{ $status == 'Proses Cuci' ? 'active' : '' }}">
                        <div class="icon">✓</div>
                        <strong>Proses Pencucian</strong>
                        <p class="text-muted mb-0">Pakaian Anda sedang dicuci dengan bersih.</p>
                    </li>
                    <li class="timeline-item {{ in_array($status, ['Setrika', 'Siap Diantar', 'Selesai']) ? 'completed' : '' }} {{ $status == 'Proses Kering' ? 'active' : '' }}">
                        <div class="icon">✓</div>
                        <strong>Proses Pengeringan</strong>
                        <p class="text-muted mb-0">Pakaian Anda sedang dikeringkan.</p>
                    </li>
                    <li class="timeline-item {{ in_array($status, ['Siap Diantar', 'Selesai']) ? 'completed' : '' }} {{ $status == 'Setrika' ? 'active' : '' }}">
                        <div class="icon">✓</div>
                        <strong>Proses Setrika</strong>
                        <p class="text-muted mb-0">Pakaian Anda sedang disetrika agar rapi.</p>
                    </li>
                    <li class="timeline-item {{ $status == 'Selesai' ? 'completed' : '' }} {{ $status == 'Siap Diantar' ? 'active' : '' }}">
                        <div class="icon">✓</div>
                        <strong>Siap Diantar / Diambil</strong>
                        <p class="text-muted mb-0">Laundry Anda sudah selesai dan siap untuk diantar!</p>
                        
                        {{-- Tombol bayar muncul jika statusnya siap & belum lunas --}}
                        {{-- @if($active_order->payment_status == 'unpaid') --}}
                        <a href="{{-- route('payment.show', $active_order->id) --}}" class="btn btn-success mt-2">Bayar Sekarang</a>
                        {{-- @endif --}}
                    </li>
                </ul>
            </div>
        </div>
        {{-- @else --}}
        {{-- <div class="alert alert-info text-center">
            <h4>Anda tidak memiliki pesanan aktif saat ini.</h4>
            <a href="{{ route('order.create') }}" class="btn btn-primary mt-2">Pesan Laundry Sekarang</a>
        </div> --}}
        {{-- @endif --}}
    </div>
</div>
@endsection