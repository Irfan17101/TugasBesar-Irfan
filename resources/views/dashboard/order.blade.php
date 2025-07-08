@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10"> {{-- Increased column width for better layout --}}
                <div class="card shadow-lg border-0 rounded-lg"> {{-- Added shadow and rounded corners --}}
                    <div class="card-header bg-primary text-white text-center py-3"> {{-- Styled header --}}
                        <h3 class="mb-0">{{ __('Buat Pesanan Laundry Baru') }}</h3> {{-- More engaging title --}}
                    </div>
                    <div class="card-body p-4"> {{-- Added padding --}}
                        <form method="POST" action="{{ route('order.store') }}">
                            @csrf

                            {{-- Pilih Pelanggan --}}
                            <div class="mb-4"> {{-- Increased margin-bottom --}}
                                <label for="pelanggan_id" class="form-label fw-bold">Pilih Pelanggan <span class="text-danger">*</span></label>
                                <select id="pelanggan_id" class="form-select form-select-lg @error('pelanggan_id') is-invalid @enderror" name="pelanggan_id" required>
                                    <option value="">-- Cari atau Pilih Pelanggan --</option>
                                    @foreach($pelanggan as $p)
                                        <option value="{{ $p->id }}" {{ old('pelanggan_id') == $p->id ? 'selected' : '' }}>
                                            {{ $p->nama }} ({{ $p->telepon }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('pelanggan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Jenis Layanan --}}
                            <div class="mb-4">
                                <label for="jenis_layanan" class="form-label fw-bold">Jenis Layanan <span class="text-danger">*</span></label>
                                <select id="jenis_layanan" class="form-select form-select-lg @error('jenis_layanan') is-invalid @enderror" name="jenis_layanan" required>
                                    <option value="">-- Pilih Jenis Layanan --</option>
                                    <option value="cuci_kering" {{ old('jenis_layanan') == 'cuci_kering' ? 'selected' : '' }}>Cuci Kering (Reguler)</option>
                                    <option value="cuci_setrika" {{ old('jenis_layanan') == 'cuci_setrika' ? 'selected' : '' }}>Cuci + Setrika (Lengkap)</option>
                                    <option value="setrika_saja" {{ old('jenis_layanan') == 'setrika_saja' ? 'selected' : '' }}>Setrika Saja</option>
                                    <option value="dry_clean" {{ old('jenis_layanan') == 'dry_clean' ? 'selected' : '' }}>Dry Clean (Khusus)</option>
                                </select>
                                @error('jenis_layanan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Berat --}}
                            <div class="mb-4">
                                <label for="berat" class="form-label fw-bold">Berat Pakaian (kg) <span class="text-danger">*</span></label>
                                <input id="berat" type="number" step="0.5" min="0.5" class="form-control form-control-lg @error('berat') is-invalid @enderror" name="berat" value="{{ old('berat') }}" placeholder="Contoh: 2.5" required>
                                @error('berat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Tanggal Ambil --}}
                            <div class="mb-4">
                                <label for="tanggal_ambil" class="form-label fw-bold">Tanggal Pengambilan <span class="text-danger">*</span></label>
                                <input id="tanggal_ambil" type="date" class="form-control form-control-lg @error('tanggal_ambil') is-invalid @enderror" name="tanggal_ambil" value="{{ old('tanggal_ambil', date('Y-m-d', strtotime('+3 days')) ) }}" required> {{-- Default to 3 days from now --}}
                                @error('tanggal_ambil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Catatan --}}
                            <div class="mb-4">
                                <label for="catatan" class="form-label fw-bold">Catatan Tambahan (Opsional)</label>
                                <textarea id="catatan" class="form-control @error('catatan') is-invalid @enderror" name="catatan" rows="4" placeholder="Contoh: Pisahkan baju putih, atau perbaiki kancing yang lepas.">{{ old('catatan') }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4"> {{-- Aligned buttons to end with gap --}}
                                <button type="submit" class="btn btn-primary btn-lg px-4">
                                    <i class="fas fa-check-circle me-2"></i>Buat Pesanan
                                </button>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-lg px-4">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                            </div>
                        </form>
                    </div> {{-- card-body --}}
                </div> {{-- card --}}
            </div>
        </div>
    </div>
</div> {{-- main-content --}}

@endsection

@push('scripts')
<script>
    // Optional: Add JavaScript for dynamic date minimum or enhanced select
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 1);
        const minDate = tomorrow.toISOString().split('T')[0];
        document.getElementById('tanggal_ambil').setAttribute('min', minDate);
    });
</script>
@endpush