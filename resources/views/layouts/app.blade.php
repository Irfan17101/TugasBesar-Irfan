<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laundrapp Dashboard</title>
    <link href="{{ asset('template/img/favicon.ico') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #33AADD;
            min-height: 100vh;
            padding: 20px;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            display: block;
            margin: 15px 0;
        }
        .sidebar img {
            width: 150px;
            margin: 20px auto;
            display: block;
        }
        .content {
            flex: 1;
            padding: 40px;
            background: #f5f5f5;
        }
    </style>
</head>
<body>
  <div class="wrapper">
    {{-- Sidebar --}}
    <div class="sidebar">
      <div class="text-center">
        <img src="{{ asset('template/img/logo.jpg') }}" alt="Laundrapp Logo">
      </div>
      <p>Selamat Datang, <br><strong>Pelanggan</strong></p>
      <a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a>
      <a href="/pelanggan/create"><i class="fa fa-edit"></i> Daftar Baru</a>
      <a href="/laundry/create"><i class="fa fa-save"></i> Pesan Laundry</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </div>

    {{-- Konten --}}
    <div class="content">
      @yield('content')
    </div>
  </div>
</body>
</html>
