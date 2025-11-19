@extends('layout')
@section('content')
<style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        width: 45px;
        height: 45px;
        background-size: 20px 20px;
    }
</style>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">{{ session('warning') }}</div>
@endif
<section>
    <div class="container-fluid p-0">
        <div class="banner position-relative text-center text-white animate-fade"
            style="background: url('{{ asset('image/beranda.jpeg') }}') no-repeat center center; background-size: cover; height: 400px;">
            <div class="overlay position-absolute w-100 h-100" style="background: rgba(0,0,0,0.5); top:0; left:0;"></div>
            <div class="banner-content position-relative d-flex flex-column justify-content-center align-items-center h-100">
                <h1 class="display-4 fw-bold animate-up">Selamat Datang di Marketplace SMK</h1>
                <p class="lead animate-up" style="animation-delay: .2s">Tempat untuk menjual dan menemukan produk yang anda inginkan</p>
                <a href="#produk-terbaru" class="btn btn-primary btn-lg mt-3 animate-up" style="animation-delay: .4s">Belanja Sekarang</a>
            </div>
        </div>
    </div>
</section>
<section class="produk-sect my-5 py-4 bg-light animate" id="produk-terbaru">
    <div class="container">
        <h2 class="section-title mb-4 text-center">
            <a href="{{ route('produk') }}" class="text-decoration-none text-dark">Produk Terbaru</a>
        </h2>
        @if ($produk->count() > 0)
        <div id="staffCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">

                @php
                    $perSlide = 4; // Agar Menampilkan 4 Menu Produk per-slide
                    $tProduk = $produk->count(); // Menghitung total guru
                    $totalSlides = ceil($tProduk / $perSlide); // Untuk Membulatkan ke atas jumlah slide yang dibutuhkan

                @endphp

                {{-- Carousel Item --}}
                @for ($i = 0; $i < $totalSlides; $i++)
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <div class="row g-3 justify-content-center">
                            {{-- Menampilkan produk per-slide --}}
                            @foreach ($produk->slice($i * $perSlide, $perSlide) as $item)
                                <div class="col-6 col-md-3 d-flex">
                        {{-- ketika di tampilan lebih kecil atau di hp akan responsive(Menyesuaikan Tampilan) --}}
                                    <div class="card h-100 w-100 shadow-sm">
                                        {{-- Untuk Berpindah ke hal produk ketika klik gambar --}}
                                        <a href="{{ route('produk') }}">
                                            <img src="{{ asset('storage/' . $item->gambarProduk->first()->nama_gambar) }}" class="card-img-top" alt="{{ $item->nama_produk }}" style="height: 200px; object-fit: cover;">
                                        </a>
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-text">{{ $item->nama_produk }}</h5>
                                            <p class="card-text text-success fw-bold mb-1">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                                            <p class="mb-1"><small class="text-base">{{ $item->kategori->nama_kategori }}</small></p>
                                            <p class="mb-2"><small class="text-muted">{{ $item->toko->nama_toko }}</small></p>
                                            <a href="{{ route('produk.toko', Crypt::encrypt($item->id_toko)) }}" class="btn btn-primary btn-sm">
                                                 <i class="bi bi-eye"></i> Kunjungi Toko</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endfor

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#staffCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#staffCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Berikutnya</span>
            </button>
            @else
            <div class="alert alert-warning text-center mt-4" role="alert">
                Belum ada produk yang diinput.
            </div>
        @endif
        </div>
    </div>
</section>

<section class="py-2 my-5">
    <div class="container rounded" id="kategori">
        <h2 class="mb-5 text-center ma-2 animate">Kategori</h2>
        <div class="row g-4 justify-content-center">
            @foreach($kategori as $k)
            <div class="col-6 col-md-3 text-center animate-fade">
                <a href="{{ route('kategori-show', Crypt::encrypt($k->id_kategori)) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-box-seam fs-1"></i>
                            <h5 class="card-title">{{ $k->nama_kategori }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
