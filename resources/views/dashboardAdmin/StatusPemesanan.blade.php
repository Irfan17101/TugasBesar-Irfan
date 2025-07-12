@extends('layouts.admin')

@section('title', 'Status Pemesanan')

@section('content')
<div class="container-fluid mt-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1 text-primary">
                                <i class="fas fa-clipboard-list me-2"></i>
                                Status Pemesanan
                            </h3>
                            <p class="text-muted mb-0">Kelola dan pantau status pemesanan laundry</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="text-warning mb-2">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                    <h5 class="card-title">Dijemput</h5>
                    <h3 class="text-warning mb-0">100</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="text-info mb-2">
                        <i class="fas fa-sync-alt fa-2x"></i>
                    </div>
                    <h5 class="card-title">Dicuci</h5>
                    <h3 class="text-info mb-0">12</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="text-primary mb-2">
                        <i class="fas fa-truck fa-2x"></i>
                    </div>
                    <h5 class="card-title">Dikirim</h5>
                    <h3 class="text-primary mb-0">19</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="text-success mb-2">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                    <h5 class="card-title">Selesai</h5>
                    <h3 class="text-success mb-0">10</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Daftar Pemesanan</h5>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control form-control-sm" placeholder="Cari pesanan..." style="width: 200px;">
                            <select class="form-select form-select-sm" style="width: 150px;">
                                <option value="">Semua Status</option>
                                <option value="dijemput">Dijemput</option>
                                <option value="dicuci">Dicuci</option>
                                <option value="dikirim">Dikirim</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                            </thead>
                            <tbody>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Transaksi</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Layanan</th>
                                            <th>Total Bayar</th>
                                            <th>Status Pesanan</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($transaksis as $index => $transaksi)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>#{{ $transaksi->id }}</td>
                                            <td>{{ $transaksi->user->name ?? 'Pelanggan Dihapus' }}</td>
                                            <td>{{ $transaksi->service_name }}</td>
                                            <td>Rp {{ number_format($transaksi->total_price, 0, ',', '.') }}</td>
                                            <td>
                                                @if(strtolower($transaksi->status) == 'selesai')
                                                    <span class="badge bg-success">{{ $transaksi->status }}</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">{{ $transaksi->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $transaksi->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <form action="{{ route('admin.transaksi.updateStatus', $transaksi->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                                        <option value="dijemput" {{ $transaksi->status == 'dijemput' ? 'selected' : '' }}>Dijemput</option>
                                                        <option value="dicuci" {{ $transaksi->status == 'dicuci' ? 'selected' : '' }}>Dicuci</option>
                                                        <option value="dikirim" {{ $transaksi->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                                        <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                    </select>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Belum ada data transaksi pesanan.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    
                                </table>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Menampilkan 5 dari 100 pesanan</small>
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-sm {
    width: 32px;
    height: 32px;
    font-size: 12px;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 25px rgba(0,0,0,0.15) !important;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
}

.badge {
    font-size: 0.75rem;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
}

.dropdown-toggle::after {
    display: none;
}

@media (max-width: 768px) {
    .container-fluid {
        padding: 0.5rem;
    }
    
    .card-body {
        padding: 1rem !important;
    }
    
    .table-responsive {
        font-size: 0.875rem;
    }
}
</style>
@endsection