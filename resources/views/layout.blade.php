<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-utama">
    <div class="container">
        <a class="navbar-brand" href="{{ route('beranda') }}">
                    <i class="bi bi-shop-window" style="font-size: 20px;"></i>
            Marketplace SMK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}"
                       href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('toko') ? 'active' : '' }}"
                       href="{{ route('toko') }}">Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('produk') ? 'active' : '' }}"
                       href="{{ route('produk') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kategori') ? 'active' : '' }}"
                       href="{{ route('kategori') }}">Kategori</a>
                </li>
                <li class="nav-item">
                         <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="nav-link {{ request()->routeIs('logout') ? 'active' : '' }}" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </form>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>
