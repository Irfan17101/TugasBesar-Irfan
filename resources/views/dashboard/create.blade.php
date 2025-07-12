@extends('layouts.app')

@section('title', 'Pesan Laundry Baru')

@section('content')
<div class="container">
    <h3 class="mb-4">Buat Pesanan Laundry Baru</h3>

    {{-- ==================================================================== --}}
    {{-- BAGIAN PENTING: Untuk Menampilkan Pesan Error dari Validasi --}}
    {{-- ==================================================================== --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <h5 class="alert-heading">Terjadi Kesalahan!</h5>
            <p>Harap periksa kembali isian form Anda:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    {{-- ==================================================================== --}}


    {{-- Form utama yang membungkus semua pilihan --}}
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="row">
            {{-- Bagian Kiri: Pilihan Layanan dan Detail --}}
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">1. Pilih Jenis Layanan</h5>
                    </div>
                    <div class="card-body">
                        {{-- Navigasi Tab untuk Kiloan / Satuan --}}
                        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-kiloan-tab" data-bs-toggle="pill" data-bs-target="#pills-kiloan" type="button" role="tab">Laundry Kiloan</button>
                            </li>
                            {{-- Tab satuan bisa diaktifkan nanti --}}
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-satuan-tab" data-bs-toggle="pill" data-bs-target="#pills-satuan" type="button" role="tab" disabled>Laundry Satuan (Segera Hadir)</button>
                            </li>
                        </ul>

                        {{-- Isi dari setiap Tab --}}
                        <div class="tab-content" id="pills-tabContent">
                            {{-- TAB KILOAN --}}
                            <div class="tab-pane fade show active" id="pills-kiloan" role="tabpanel">
                                <input type="hidden" name="type" value="kiloan">
                                <p class="text-muted">Pilih paket dan masukkan estimasi berat. Harga final akan dikonfirmasi ulang di outlet kami.</p>
                                
                                {{-- PERBAIKAN 1: Mengubah 'value' menjadi nama layanan --}}
                                <div class="list-group mb-3">
                                    <label class="list-group-item">
                                        <input class="form-check-input me-2" type="radio" name="service_kiloan" value="Reguler (2-3 Hari)" {{ old('service_kiloan', 'Reguler (2-3 Hari)') == 'Reguler (2-3 Hari)' ? 'checked' : '' }}>
                                        <strong>Reguler (2-3 Hari)</strong> - Rp 8.000 / kg
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-2" type="radio" name="service_kiloan" value="Express (1 Hari)" {{ old('service_kiloan') == 'Express (1 Hari)' ? 'checked' : '' }}>
                                        <strong>Express (1 Hari)</strong> - Rp 12.000 / kg
                                    </label>
                                </div>

                                {{-- PERBAIKAN 2: Menambahkan Input untuk Berat (Weight) --}}
                                <div class="mb-3">
                                    <label for="weight" class="form-label fw-bold">Estimasi Berat (kg)</label>
                                    <input type="number" class="form-control" id="weight" name="weight" min="0.5" step="0.1" placeholder="Contoh: 3.5" value="{{ old('weight') }}" required>
                                    <div class="form-text">Masukkan perkiraan berat laundry Anda dalam kilogram (minimal 0.5 kg).</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                     <div class="card-header">
                        <h5 class="card-title mb-0">2. Jadwal & Alamat Penjemputan</h5>
                    </div>
                    <div class="card-body">
                         <div class="mb-3">
                            <label for="customer_name" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ auth()->user()->name ?? '' }}" readonly>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="pickup_date" class="form-label">Tanggal Penjemputan</label>
                                <input type="date" class="form-control" id="pickup_date" name="pickup_date" min="{{ date('Y-m-d') }}" value="{{ old('pickup_date') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="pickup_time" class="form-label">Slot Waktu</label>
                                <select class="form-select" id="pickup_time" name="pickup_time" required>
                                    <option value="Pagi (09:00-12:00)" @selected(old('pickup_time') == 'Pagi (09:00-12:00)')>Pagi (09:00 - 12:00)</option>
                                    <option value="Siang (12:00-15:00)" @selected(old('pickup_time') == 'Siang (12:00-15:00)')>Siang (12:00 - 15:00)</option>
                                    <option value="Sore (15:00-18:00)" @selected(old('pickup_time') == 'Sore (15:00-18:00)')>Sore (15:00 - 18:00)</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat Penjemputan</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required placeholder="Masukkan alamat lengkap Anda">{{ old('address', auth()->user()->address ?? '') }}</textarea>
                        </div>
                         <div class="mb-3">
                            <label for="notes" class="form-label">Catatan Tambahan (Opsional)</label>
                            <textarea class="form-control" id="notes" name="notes" rows="2" placeholder="Contoh: Baju merah mudah luntur, tolong pisahkan.">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian Kanan: Ringkasan Pesanan --}}
            <div class="col-lg-4">
                <div class="card position-sticky" style="top: 20px;">
                     <div class="card-header">
                        <h5 class="card-title mb-0">Ringkasan Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Total harga akan dihitung setelah Anda mengisi layanan dan berat. Klik tombol di bawah untuk melanjutkan.</p>
                    </div>
                    <div class="card-footer d-grid">
                         <button type="submit" class="btn btn-primary btn-lg">Konfirmasi & Buat Pesanan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
