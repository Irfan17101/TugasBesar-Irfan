@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('content')
<div class="container-fluid mt-4">
    <h3 class="mb-4">Laporan Transaksi Laundry</h3>

    {{-- Form Filter --}}
    <form method="GET" action="{{ route('admin.laporan') }}" class="mb-4">
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
                <button type="submit" class="btn btn-primary"><i class="fas fa-search me-1"></i> Tampilkan</button>
            </div>
        </div>
    </form>

    {{-- Area Chart --}}
    <div class="row mb-4">
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Pendapatan (Line Chart)</h5>
                    <canvas id="lineChartPendapatan"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pesanan (Bar Chart)</h5>
                    <canvas id="barChartPesanan"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Status Pesanan (Pie Chart)</h5>
                    <canvas id="pieChartStatus"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Area Tabel --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h5>Total Pendapatan: <strong>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</strong></h5>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover">
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
                            <td>{{ $trx->service_name ?? 'N/A' }}</td>
                            <td>Rp {{ number_format($trx->total_price, 0, ',', '.') }}</td>
                            <td><span class="badge bg-info text-dark">{{ ucfirst($trx->status) }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data transaksi pada periode ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ---- Data dari Controller ----
    const pendapatan = @json($pendapatanHarian ?? []);
    const status = @json($statusDistribusi ?? []);
    const pesanan = @json($pesananHarian ?? []);

    // ---- 1. LINE CHART ----
    if (Object.keys(pendapatan).length > 0) {
        new Chart(document.getElementById('lineChartPendapatan'), {
            type: 'line',
            data: {
                labels: Object.keys(pendapatan),
                datasets: [{ label: 'Pendapatan', data: Object.values(pendapatan), borderColor: 'rgba(54, 162, 235, 1)', tension: 0.1 }]
            }
        });
    }

    // ---- 2. BAR CHART ----
    if (Object.keys(pesanan).length > 0) {
        new Chart(document.getElementById('barChartPesanan'), {
            type: 'bar',
            data: {
                labels: Object.keys(pesanan),
                datasets: [{ label: 'Jumlah Pesanan', data: Object.values(pesanan), backgroundColor: 'rgba(75, 192, 192, 0.8)' }]
            }
        });
    }

    // ---- 3. PIE CHART ----
    if (Object.keys(status).length > 0) {
        new Chart(document.getElementById('pieChartStatus'), {
            type: 'pie',
            data: {
                labels: Object.keys(status),
                datasets: [{ data: Object.values(status), backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff'] }]
            }
        });
    }
});
</script>
@endpush