{{-- resources/views/dashboardAdmin/admin.blade.php --}}
@extends('layouts.admin') 

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="mb-0">Dashboard Admin</h2>
            <p class="text-muted">Selamat datang, {{ Auth::user()->name }}. Kamu login sebagai <strong>admin</strong>.</p>
        </div>
    </div>

    {{-- Ringkasan Kartu --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow mb-4">
                <div class="card-body">
                    <h5>Total Pengguna</h5>
                    <h3>123</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success shadow mb-4">
                <div class="card-body">
                    <h5>Total Transaksi</h5>
                    <h3>456</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning shadow mb-4">
                <div class="card-body">
                    <h5>Produk Aktif</h5>
                    <h3>78</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Menu Akses Admin --}}
    <div class="row mt-4">
        <div class="col-md-12">
            <h4 class="mb-3">Menu Akses Cepat</h4>
            <div class="list-group">
                <a href="/kelola-user" class="list-group-item list-group-item-action">
                    <i class="fas fa-users mr-2"></i> Kelola Pengguna
                </a>
                <a href="/transaksi" class="list-group-item list-group-item-action">
                    <i class="fas fa-file-invoice-dollar mr-2"></i> Lihat Transaksi
                </a>
                <a href="/produk" class="list-group-item list-group-item-action">
                    <i class="fas fa-box-open mr-2"></i> Kelola Produk
                </a>
            </div>
        </div>
    </div>
    <script src="..."></script>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        @stack('scripts')   

    {{-- Logout Section --}}
    <div class="row mt-5">
        <div class="col text-end">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
@endsection
