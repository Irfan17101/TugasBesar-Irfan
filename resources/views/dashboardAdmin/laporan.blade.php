@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('content')
<div class="container-fluid mt-4">
    <h3 class="mb-4">Laporan Transaksi Laundry</h3>

    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label>Dari Tanggal</label>
                <input type="date" name="dari" class="form-control" value="{{ request('dari') }}">
            </div>
            <div class="col-md-3">
                <label>Sampai Tanggal</label>
                <input type="date" name="sampai" class="form-control" value="{{ request('sampai') }}">
            </div>
            <div class="col-md-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="">Semua</option>
                    <option value="dijemput" {{ request('status') == 'dijemput' ? 'selected' : '' }}>Dijemput</option>
                    <option value="dicuci" {{ request('status') == 'dicuci' ? 'selected' : '' }}>Dicuci</option>
                    <option value="dikirim" {{ request('status') == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Tampilkan</button>
            </div>
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5>Total Pendapatan: <strong>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</strong></h5>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pelanggan</th>
                            <th>Layanan</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis as $index => $trx)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $trx->created_at->format('d M Y') }}</td>
                            <td>{{ $trx->user->name ?? '-' }}</td>
                            <td>{{ $trx->service_name }}</td>
                            <td>Rp {{ number_format($trx->total_price, 0, ',', '.') }}</td>
                            <td><span class="badge badge-info">{{ ucfirst($trx->status) }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
