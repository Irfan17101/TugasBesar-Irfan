@extends('layouts.app')

@section('content')
<h3>Dashboard <small>pelanggan</small></h3>

<div class="bg-white p-4 rounded">
    <h4>Daftar Pelanggan <small class="text-muted">tambah data</small></h4>
    <hr>

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        <table class="table border-0" style="max-width: 700px;">
            <tr>
                <td><strong>Kode Pelanggan *</strong></td>
                <td>
                    <input type="text" name="kode_pelanggan" class="form-control" value="M-{{ sprintf('%04d', rand(1, 9999)) }}" readonly>
                </td>
            </tr>
            <tr>
                <td><strong>Nama Pelanggan *</strong></td>
                <td>
                    <input type="text" name="nama_pelanggan" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td><strong>Alamat *</strong></td>
                <td>
                    <input type="text" name="alamat_pelanggan" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td><strong>No Telp *</strong></td>
                <td>
                    <input type="text" name="no_telp" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="pt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Cancel</a>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
