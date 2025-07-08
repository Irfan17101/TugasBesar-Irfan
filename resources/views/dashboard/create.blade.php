@extends('layouts.app')

@section('content')
{{-- Latar belakang menggunakan warna abu-abu sangat muda untuk kontras yang lembut --}}
<div class="bg-body-tertiary min-vh-100 d-flex align-items-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            {{-- Tata letak satu kolom untuk fokus maksimal --}}
            <div class="col-12 col-md-10 col-lg-8">

                <div class="text-center mb-5">
                    <h1 class="fw-bold display-5">Pendaftaran Pelanggan</h1>
                    <p class="text-muted fs-5">Silakan isi detail pelanggan pada form di bawah ini.</p>
                </div>

                {{-- Card dengan shadow & padding yang lebih halus untuk tampilan yang bersih --}}
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-sm-5">
                        
                        <form action="{{ route('pelanggan.store') }}" method="POST" id="customerForm">
                            @csrf

                            <div class="row g-4">
                                <div class="col-12">
                                    <h5 class="fw-semibold border-bottom pb-2 mb-4">
                                        <i class="fas fa-user-circle text-primary me-2"></i>
                                        Informasi Pribadi
                                    </h5>
                                </div>

                                <div class="col-md-6">
                                    <label for="kode" class="form-label">Kode Pelanggan</label>
                                    <input type="text" id="kode" class="form-control" value="{{ $kode ?? 'M-0018' }}" readonly disabled>
                                    <div class="form-text">Kode dibuat otomatis.</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" id="nama" class="form-control" required placeholder="Cth: Budi Santoso">
                                </div>

                                <div class="col-12 mt-5">
                                     <h5 class="fw-semibold border-bottom pb-2 mb-4">
                                        <i class="fas fa-address-book text-primary me-2"></i>
                                        Info Kontak & Alamat
                                    </h5>
                                </div>

                                <div class="col-md-6">
                                    <label for="telepon" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                                    <input type="tel" name="telepon" id="telepon" class="form-control" required placeholder="08xxxxxxxxxx" pattern="[0-9]{10,13}">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status Pelanggan</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="aktif" selected>Aktif</option>
                                        <option value="tidak_aktif">Tidak Aktif</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="alamat" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="3" required placeholder="Masukkan alamat jalan, kota, dan kode pos"></textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-5 pt-4 border-top">
                                <a href="{{ route('dashboard') }}" class="btn btn-light">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-2"></i>Simpan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

                <p class="text-center text-muted mt-4"><small>Sistem Manajemen Pelanggan &copy; {{ date('Y') }}</small></p>

            </div>
        </div>
    </div>
</div>

<style>
    /* Kustomisasi minimal untuk menyempurnakan Bootstrap */
    .form-control:disabled, .form-control[readonly] {
        background-color: #e9ecef;
        opacity: 1;
        cursor: not-allowed;
    }
    .form-label {
        font-weight: 500; /* Sedikit lebih tebal dari normal */
    }
    .btn {
        border-radius: 0.5rem; /* Sedikit lebih rounded */
    }
</style>

{{-- Script tetap sama, fungsionalitasnya sudah bagus --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('customerForm');
    if (!form) return;

    const submitBtn = form.querySelector('button[type="submit"]');
    const namaInput = document.getElementById('nama');

    form.addEventListener('submit', function(e) {
        if (form.checkValidity()) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Menyimpan...';
        }
    });

    namaInput.addEventListener('blur', function(e) {
        e.target.value = e.target.value.split(' ')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
            .join(' ');
    });

    namaInput.focus();
});
</script>
@endsection