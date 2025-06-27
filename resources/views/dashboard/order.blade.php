@extends('layouts.app')

@section('content')
    <h3>Dashboard <small>pelanggan</small></h3>

    <div class="bg-white p-4 rounded">
        <p><strong>Pesan Laundry</strong></p>

        <form action="{{ route('laundry.store') }}" method="POST" class="mt-4">
            @csrf
            <table class="table border-0" style="max-width: 700px;">
                <tr>
                    <td><strong>Kode Order *</strong></td>
                    <td>
                        <input type="text" name="kode_order" class="form-control" value="L-{{ date('His') }}" readonly>
                    </td>
                </tr>
                <tr>
                    <td><strong>Jenis Layanan *</strong></td>
                    <td>
                        <select name="layanan" class="form-control" required>
                            <option value="">-- Pilih Layanan --</option>
                            <option value="Cuci Kering">Cuci Kering</option>
                            <option value="Cuci Setrika">Cuci Setrika</option>
                            <option value="Setrika Saja">Setrika Saja</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Jumlah Kilo *</strong></td>
                    <td>
                        <input type="number" name="jumlah_kilo" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td><strong>Catatan</strong></td>
                    <td>
                        <textarea name="catatan" class="form-control" rows="3" placeholder="Contoh: Harus selesai besok."></textarea>
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
