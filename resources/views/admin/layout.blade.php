    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="icon" type="image/png" href="{{ asset('image/logo_hd.png') }}">


    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        overflow-x: hidden;
    }

    .sidebar {
        min-height: 100vh;
        background-color: #1b3b6f;
        padding: 1rem;
        transition: all 0.3s ease;
        color: #fff;
    }

    .sidebar .nav-link {
        color: #fff;
        display: flex;
        align-items: center;
        padding: 10px 15px;
        border-radius: 5px;
        margin-bottom: 5px;
        transition: background 0.2s;
    }

    .sidebar .nav-link i {
        margin-right: 10px;
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
    }

    /* Mobile Sidebar */
    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            z-index: 999;
            width: 250px;
            transform: translateX(-260px);
        }
        .sidebar.show {
            transform: translateX(0);
        }
        .content {
            margin-left: 0 !important;
        }
    }

    /* Desktop Sidebar */
    @media (min-width: 769px) {
        .sidebar {
            position: relative;
            transform: none !important;
        }
        .content {
            margin-left: 0;
        }
    }
    .sidebar .nav-link {
    display: flex;
    align-items: center;
    gap: 12px; /* jarak antara icon dan teks */
    padding: 10px 15px;
}

    </style>
    </head>
    <body>

    <!-- Toggle Button (Mobile) -->
    <nav class="navbar navbar-light bg-light d-md-none">
        <div class="container-fluid">
            <button class="btn btn-outline-secondary" id="toggleSidebar">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar" id="sidebar">
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

                <hr style="border-color: rgba(255,255,255,0.2);">

                <form id="logout-form" action="{{ route('admin-logout') }}" method="POST">
                    @csrf
                    <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>

                <input type="checkbox" onclick="document.body.classList.toggle('dark')">
            </div>

            <!-- Content -->
            <div class="col-md-10 offset-md-2 content pt-4">
                @yield('content')
            </div>
        </div>
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

toggleSidebarBtn?.addEventListener('click', function() {
    sidebar.classList.toggle('show');
});
    </script>

    @stack('scripts')
