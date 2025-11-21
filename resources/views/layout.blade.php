<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('image/logo_hd.png') }}">
</head>

<body>
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

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 20px;"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

                            {{-- Toko Saya / Buka Toko --}}
                            @if (Auth::check())
                                @if (auth()->user()->toko)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('produk.toko', Crypt::encrypt(auth()->user()->toko->id_toko)) }}">
                                            <i class="bi bi-shop me-2"></i> Toko Saya
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item" href="{{ route('buka-toko') }}">
                                            <i class="bi bi-shop me-2"></i> Buka Toko
                                        </a>
                                    </li>
                                @endif
                                @php
                                    $toko = auth()->user()->toko ?? null;
                                @endphp

                                @if ($toko && $toko->status === 'disetujui')
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('bproduk', Crypt::encrypt($toko->id_toko)) }}">
                                            <i class="bi bi-plus me-2"></i> Tambah Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('member.toko-edit', Crypt::encrypt($toko->id_toko)) }}">
                                            <i class="bi bi-pencil me-2"></i> Edit Toko
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            @else
                                {{-- Guest --}}
                                <li>
                                    <a href="{{ route('indexLog') }}" class="dropdown-item">
                                        <i class="bi bi-door-open-fill me-2"></i> Login
                                    </a>
                                </li>
                            @endif

                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container p-0 mt-4">
        @yield('content')
    </div>
    @include('footer')
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(ent => {
                    if (ent.isIntersecting) {
                        ent.target.classList.add('show');
                    }
                });
            }, {
                threshold: 0.2
            });

            document.querySelectorAll('.animate').forEach(el => observer.observe(el));
        });
    </script>
    @stack('scripts')
</body>

</html>
