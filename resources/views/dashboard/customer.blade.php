@extends('layouts.app')

@section('content')
    <h3>Dashboard <small>pelanggan</small></h3>

    <div class="bg-white p-4 rounded">
        <p><strong>Selamat Datang Pelanggan,</strong></p>
        <p class="text-muted">
            &lowast; Silahkan Daftar Pelanggan Jika Pertamakali<br> 
            &lowast; Pesan Laundry untuk penginputan pesanan laundry
        </p>

        <div class="row mt-4">
            <div class="col-md-6 mb-2">
                <a href="{{ route('pelanggan.create') }}" class="btn btn-lg btn-block" style="background-color:#F65314; color:white;">
                    <i class="fa fa-edit"></i> Daftar Baru
                </a>
            </div>
            <div class="col-md-6 mb-2">
                <a href="" class="btn btn-lg btn-block" style="background-color:#7CBB00; color:white;">
                    <i class="fa fa-save"></i> Pesan Laundry
                </a>
            </div>
        </div>
    </div>
@endsection
