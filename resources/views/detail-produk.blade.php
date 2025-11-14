@extends('layout')
@section('content')

<style>
    .produk-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 8px;
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm p-3">

                <div class="row g-0 align-items-center">

                    <div class="col-md-4 text-center">

                        @if($produk->gambarProduk->count() > 0)
                        <div id="carouselProduk{{ $produk->id_produk }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($produk->gambarProduk as $gambar)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $gambar->nama_gambar) }}"
                                             class="produk-image d-block w-100"
                                             alt="Gambar Produk">
                                    </div>
                                @endforeach
                            </div>

                            @if($produk->gambarProduk->count() > 1)
                                <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselProduk{{ $produk->id_produk }}"
                                        data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>

                                <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselProduk{{ $produk->id_produk }}"
                                        data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            @endif
                        </div>

                        @else
                            <img src="{{ asset('produk.png') }}" class="produk-image" alt="Produk">
                        @endif

                    </div>

                    <div class="col-md-8 ps-3">
                        <h2 class="fw-semibold">{{ $produk->nama_produk }}</h2>

                        <p class="text-muted fs-5">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>

                        <p class="fs-6">{{ $produk->deskripsi }}</p>

                        <p class="text-muted">Stok: {{ $produk->stok }}</p>

                        <p class="text-muted">
                            Upload:
                            {{ $produk->tanggal_upload
                                ? \Carbon\Carbon::parse($produk->tanggal_upload)->format('d M Y')
                                : '-' }}
                        </p>

                        <a href="https://wa.me/1234567890" class="btn btn-success mt-2">
                            <i class="bi bi-whatsapp"></i> Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
