<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <!-- Bootstrap & Icons -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #f1f1f1;
            padding: 1rem;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link {
            color: #000;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #6F9496;
            color: #fff;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .brand-logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .brand-logo h5 {
            margin-left: 10px;
            margin-top: 10px;
        }

        /* Mobile Agar responsive (sidebar tersembunyi default) */
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
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

        /* Desktop (tampilkan sidebar seperti biasa) */
        @media (min-width: 769px) {
            .sidebar {
                position: relative;
                transform: none !important;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>

</head>

<body>
    <!-- Toggle Button (Mobile) -->
    <nav class="navbar navbar-light bg-light d-md-none">
        <div class="container-fluid">
            <button class="btn btn-outline-secondary" id="toggleSidebar">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar bg-light" id="sidebar">
                <div class="brand-logo">
                    {{-- <img src="{{ asset('assets/image/logo_sekolah.png') }}" alt="Logo"> --}}
                    <h5>SMK Marketplace  Admin</h5>
                </div>

                <a href="{{ route('dashboard') }}"
                class="nav-link">Dashboard</a>
                <a href=""
                class="nav-link ">User</a>
                <a href="{{ route('admin-toko') }}"
                class="nav-link">Toko</a>
                <a href="{{ route('admin-produk') }}"
                class="nav-link">Produk</a>
                <a href="{{ route('admin-kategori') }}"
                class="nav-link">Kategori</a>

                <hr>
                <form id="logout-form" action="" method="POST">
                    @csrf
                    <a class="nav-link text-danger" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </form>
            </div>

            <!-- Content -->
            <div class="col-md-10 offset-md-2 content pt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Sidebar Toggle -->
    <script>
        const toggleSidebarBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleSidebarBtn?.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    </script>

    @stack('scripts')
</body>

</html>

