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
        * {
            box-sizing: border-box;
        }
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .wrapper {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        /* ===== Sidebar Styles ===== */
        .sidebar {
            width: 250px;
            background: #33AADD;
            min-height: 100vh;
            padding: 20px;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            transition: 0.3s ease;
        }

        .sidebar.collapsed {
            width: 80px;
            text-align: center;
        }

        .sidebar img {
            width: 150px;
            margin: 20px auto;
            display: block;
            transition: 0.3s;
        }

        .sidebar.collapsed img {
            width: 50px;
        }

        .sidebar a {
            color: #fff;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 15px 0;
            transition: 0.3s;
        }

        .sidebar.collapsed a {
            justify-content: center;
        }

        .sidebar p,
        .sidebar a span {
            transition: 0.3s;
        }

        .sidebar.collapsed p,
        .sidebar.collapsed a span {
            display: none;
        }

        .main {
            margin-left: 250px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .main.shifted {
            margin-left: 80px;
        }

        /* ===== Topbar ===== */
        .topbar {
            background: #eee;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            border-bottom: 1px solid #ccc;
        }
        .topbar i {
            font-size: 22px;
            cursor: pointer;
        }
        .topbar .dropdown {
            position: relative;
        }
        .topbar .dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 5px;
            min-width: 120px;
            z-index: 1000;
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
    <div id="sidebar" class="sidebar">
        <div class="text-center">
            <img src="{{ asset('template/img/logo.jpg') }}" alt="Laundrapp Logo">
        </div>
        <p>Selamat Datang, <br><strong>Admin</strong></p>
        <a href="/dashboard" 
            class="nav-link">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>

        <a href="{{ route('kelola-pengguna') }}" 
        class="nav-link">
            <i class="fas fa-users me-2"></i> Kelola Pengguna
        </a>

        <a href="{{ route('lihat-transaksi') }}" 
        class="nav-link">
            <i class="fas fa-file-invoice-dollar me-2"></i> Lihat Transaksi
        </a>

        <a href="{{ route('status-pemesanan') }}" 
        class="nav-link {{ request()->is('Admin/status-pemesanan') ? 'active' : '' }}">
            <i class="fas fa-shipping-fast me-2"></i> Status Pemesanan
        </a>
        <a href="{{ route('admin.laporan') }}" 
        class="nav-link {{ request()->is('admin/laporan') ? 'active' : '' }}">
         <i class="fas fa-file-alt me-2"></i> Laporan
        </a>                             
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger mt-3 w-100">Logout</button>
        </form>
    </div>
     

    {{-- Main Content --}}
    <div id="mainContent" class="main">
        {{-- Topbar --}}
        <div class="topbar">
            <i class="fas fa-bars" id="toggleSidebar"></i>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-dark dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-user-circle fa-2x text-secondary mr-2"></i>
                    <span>Admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <a class="dropdown-item" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt mr-2"></i> Log In
                    </a>
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>
</div>

{{-- JS --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle sidebar
    $('#toggleSidebar').on('click', function () {
        $('#sidebar').toggleClass('collapsed');
        $('#mainContent').toggleClass('shifted');
    });
</script>
</body>
</html>
