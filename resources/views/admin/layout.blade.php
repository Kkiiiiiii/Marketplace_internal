<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />
    <link rel="icon" type="image/png" href="{{ asset('image/logo_hd.png') }}" />

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            overflow-x: hidden;
        }

        /* Sidebar styling */
        .sidebar {
            min-height: 100vh;
            background-color: #1b3b6f;
            padding: 1rem;
            transition: transform 0.3s ease;
            color: #fff;
            position: fixed;
            z-index: 1030;
            width: 250px;
            top: 0;
            left: 0;
            transform: translateX(0);
            overflow-y: auto;
        }

        /* Sidebar hidden */
        .sidebar.hide {
            transform: translateX(-260px);
        }

        /* Sidebar nav links */
        .sidebar .nav-link {
            color: #fff;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 5px;
            transition: background 0.2s;
            text-decoration: none;
        }

        .sidebar .nav-link i {
            font-size: 18px;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #0d2755;
            color: #fff;
            text-decoration: none;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .brand-logo i {
            font-size: 50px;
        }

        .brand-logo h5 {
            margin-left: 10px;
            font-weight: 700;
        }

       /* Hapus posisi fixed dari toggleSidebar */
    #toggleSidebar {
        position: static; /* dulu fixed */
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        border: none;
        background-color: #1b3b6f;
        color: white;
        cursor: pointer;
    }
    #toggleSidebar:hover {
        background-color: #0d2755;
    }

    /* Content agar tidak tertutup header */
    .content {
        padding: 80px 20px 20px 20px; /* sesuai tinggi header */
        margin-left: 0;
        transition: margin-left 0.3s ease;
    }
    @media (min-width: 769px) {
        .content {
            margin-left: 250px;
        }
    }

    </style>
</head>
<body>
<div class="header-navbar d-flex justify-content-between align-items-center px-3" style="position: fixed; top:0; left:0; width:100%; z-index:1040; height:60px; background:#f8f9fa; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
    <button id="toggleSidebar" aria-label="Toggle sidebar" class="btn btn-primary btn-sm">
        <i class="fas fa-bars"></i>
    </button>
    <h5 class="mb-0">@yield('title', 'MarketPlace SMK')</h5>
    <div class="d-flex align-items-center gap-2">
        <!-- Logout Button -->
        <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" style="margin:0;">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </form>

    </div>
</div>


    <div class="sidebar" id="sidebar">
        <div class="brand-logo">
            <i class="fas fa-store"></i>
            <h5>SMK Marketplace</h5>
        </div>

        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="{{ route('admin-user') }}" class="nav-link {{ request()->routeIs('admin-user') ? 'active' : '' }}">
            <i class="fas fa-user"></i> User
        </a>
        <a href="{{ route('admin-toko') }}" class="nav-link {{ request()->routeIs('admin-toko') ? 'active' : '' }}">
            <i class="fas fa-store-alt"></i> Toko
        </a>
        <a href="{{ route('admin-produk') }}" class="nav-link {{ request()->routeIs('admin-produk') ? 'active' : '' }}">
            <i class="fas fa-box"></i> Produk
        </a>
        <a href="{{ route('admin-kategori') }}" class="nav-link {{ request()->routeIs('admin-kategori') ? 'active' : '' }}">
            <i class="fas fa-tags"></i> Kategori
        </a>

        <hr style="border-color: rgba(255,255,255,0.2);" />

        <form id="logout-form" action="{{ route('admin-logout') }}" method="POST">
            @csrf
            <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>

    <script>
        const toggleSidebarBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleSidebarBtn.addEventListener('click', function () {
            sidebar.classList.toggle('hide');
        });
    </script>

    @stack('scripts')

</body>
</html>
