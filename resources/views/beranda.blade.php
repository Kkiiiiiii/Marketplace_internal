@extends('layout')
@section('content')
{{-- Banner --}}
<section>
    <div class="container-fluid p-0">
        <div class="banner position-relative text-center text-white" style="background: url('{{ asset('image/beranda.jpeg') }}') no-repeat center center; background-size: cover; height: 400px;">
            <div class="overlay position-absolute w-100 h-100" style="background: rgba(0,0,0,0.5); top:0; left:0;"></div>
            <div class="banner-content position-relative d-flex flex-column justify-content-center align-items-center h-100">
                <h1 class="display-4 fw-bold">Selamat Datang di Marketplace SMK</h1>
                <p class="lead">Tempat untuk menjual dan menemukan produk yang anda inginkan</p>
                <a href="#produk-terbaru" class="btn btn-primary btn-lg mt-3">Belanja Sekarang</a>
            </div>
        </div>
    </div>
</section>

{{-- Produk Terbaru --}}
<section class="py-3 my-3" id="produk-terbaru">
    <div class="container">
        <h2 class="mb-5 text-center ma-2">Produk Terbaru</h2>
        <div class="row g-4">
            @foreach($produk as $p)
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm">
                    {{-- Gambar Produk --}}
                    @if($p->gambarProduk->first())
                    <img src="{{ asset('storage/'.$p->gambarProduk->first()->nama_gambar) }}"
                         class="card-img-top"
                         alt="{{ $p->nama_produk }}"
                         style="height:200px; object-fit:cover;">
                    @else
                    <img src="{{ asset('image/no_image.png') }}"
                         class="card-img-top"
                         alt="Tidak ada gambar"
                         style="height:200px; object-fit:cover;">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $p->nama_produk }}</h5>
                        <p class="text-success fw-bold mb-1">Rp. {{ number_format($p->harga, 0, ',', '.') }}</p>
                        <p class="text-muted mb-1">Stok: {{ $p->stok }}</p>
                        <p class="card-text text-truncate" style="max-height: 3.6em; overflow: hidden;">
                            {{ $p->deskripsi }}
                        </p>
                        <p class="mb-1"><small class="text-muted">{{ $p->kategori->nama_kategori }}</small></p>
                        <p class="mb-2"><small class="text-muted">{{ $p->toko->nama_toko }}</small></p>
                        <a href="{{ route('produk.toko', Crypt::encrypt($p->id_toko)) }}" class="btn btn-primary btn-sm">Kunjungi Toko</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Section --}}
<section class="py-2 my-5 bg-light ">
    <div class="container-fluid rounded" id="kategori">
        <h2 class="mb-5 text-center ma-2">Kategori</h2>
        <div class="row g-4 justify-content-center">
            @foreach($kategori as $k)
            <div class="col-6 col-md-3 text-center">
                <a href="{{ route('kategori', $k->id) }}" class="text-decoration-none text-dark">
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
