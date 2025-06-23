{{-- resources/views/dashboard/admin.blade.php --}}
@extends('layouts.app') 

@section('content')
<div class="container mt-5">
    <h1>Dashboard Admin</h1>
    <p>Halo, {{ Auth::user()->name }}! Kamu login sebagai admin.</p>

    {{-- Tambahkan konten khusus admin di sini --}}
    <ul>
        <li><a href="#">Kelola Pengguna</a></li>
        <li><a href="#">Lihat Transaksi</a></li>
        <li><a href="#">Kelola Produk</a></li>
    </ul>
    <div class="ms-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
</div>
@endsection
