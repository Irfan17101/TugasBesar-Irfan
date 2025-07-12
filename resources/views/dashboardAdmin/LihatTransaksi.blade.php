@extends('layouts.admin') {{-- Sesuaikan dengan layout admin Anda --}}

@section('title', 'Lihat Transaksi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Semua Transaksi Pesanan</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                                    {{-- Mengambil nama dari relasi user --}}
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
                                        <a href="{{ route('admin.transaksi.show', $transaksi->id) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>                                        
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada data transaksi pesanan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
