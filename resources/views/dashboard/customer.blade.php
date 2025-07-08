@extends('layouts.app')

@section('content')
{{-- Kontainer utama untuk memastikan layout full-height dan centering --}}
<div class="dashboard-wrapper">
    <div class="container">
        
        <div class="dashboard-header text-center mb-5">
            <h1 class="display-4 fw-bold">Selamat Datang!</h1>
            <p class="fs-5 text-muted">Siap untuk memulai? Pilih salah satu opsi di bawah ini.</p>
        </div>

        <div class="row g-4 justify-content-center">

            {{-- Kartu 1: Daftar Pelanggan Baru --}}
            <div class="col-md-6 col-lg-5">
                <a href="{{ route('pelanggan.create') }}" class="action-card card-daftar h-100">
                    <div class="card-icon">
                        <i class="fas fa-user-plus fa-3x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Daftar Baru</h3>
                        <p class="card-description">Belum terdaftar? Mulai di sini untuk mendaftarkan diri Anda sebagai pelanggan baru.</p>
                    </div>
                    <div class="card-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>

            {{-- Kartu 2: Pesan Layanan Laundry --}}
            <div class="col-md-6 col-lg-5">
                {{-- Ganti '#' dengan route yang sesuai, contoh: {{ route('laundry.create') }} --}}
                <a href="#" class="action-card card-pesan h-100">
                    <div class="card-icon">
                        <i class="fas fa-tshirt fa-3x"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Pesan Laundry</h3>
                        <p class="card-description">Sudah menjadi pelanggan? Buat pesanan laundry Anda sekarang juga.</p>
                    </div>
                    <div class="card-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>
            
        </div>

    </div>
</div>

<style>
    /* * PERBAIKAN UTAMA ADA DI SINI 
     */
    .dashboard-wrapper {
        width: 100%;
        /* Menggunakan min-height 80vh agar tidak mentok ke bawah */
        min-height: 80vh; 
        
        /* Menggunakan Flexbox untuk menengahkan konten secara vertikal */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        /* Padding vertikal untuk memberi jarak dari nav-bar */
        padding: 40px 0; 
        
        /* Background pattern tetap dipertahankan */
        background-color: #f8f9fa;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23e9ecef' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    /* Styling Kartu Aksi (tidak banyak berubah, hanya penyesuaian kecil) */
    .action-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-decoration: none;
        background-color: #ffffff;
        border-radius: 12px;
        border: 1px solid #dee2e6;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .action-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
    }
    
    .action-card .card-icon {
        margin-bottom: 20px;
        transition: transform 0.3s ease;
    }

    .action-card:hover .card-icon {
        transform: scale(1.1);
    }
    
    .action-card .card-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 8px;
    }
    
    .action-card .card-description {
        font-size: 1rem;
        color: #6c757d;
        line-height: 1.6;
    }

    .action-card .card-arrow {
        position: absolute;
        bottom: 20px;
        right: 30px;
        font-size: 1.5rem;
        opacity: 0;
        transform: translateX(-20px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .action-card:hover .card-arrow {
        opacity: 1;
        transform: translateX(0);
    }

    /* Warna Kustom */
    .card-daftar {
        border-left: 5px solid #6f42c1; /* Ungu */
    }
    .card-daftar .card-icon,
    .card-daftar .card-title,
    .card-daftar .card-arrow {
        color: #6f42c1;
    }
    .action-card.card-daftar:hover {
        border-color: #6f42c1;
    }

    .card-pesan {
        border-left: 5px solid #198754; /* Hijau */
    }
    .card-pesan .card-icon,
    .card-pesan .card-title,
    .card-pesan .card-arrow {
        color: #198754;
    }
    .action-card.card-pesan:hover {
        border-color: #198754;
    }

</style>
@endsection