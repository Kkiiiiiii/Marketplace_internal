{{-- @extends('layout')
@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-sm">
        <div class="row g-0 p-3 align-items-center">

          <!-- Gambar Produk -->
          <div class="col-md-4 text-center">
            <img src="produk.png" class="img-fluid rounded" alt="Produk Xiaomi 14T Pro">
          </div>

          <div class="col-md-8">
            <h2 class="fw-semibold">Xiaomi 14T Pro</h2>
            <p class="text-muted fs-5">Rp 200.000</p>
            <p class="fs-6">Performa Terbaik: Ditenagai oleh Snapdragon 8 Gen 3, Xiaomi 14T Pro memberikan kecepatan dan....</p>
            <a href="https://wa.me/1234567890" class="btn btn-success">
              <i class="bi bi-whatsapp"></i> Pesan via WhatsApp
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection --}}
@extends('layout')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm p-3">

                <div class="row g-0 align-items-center">

                    <!-- Gambar Produk (Carousel jika lebih dari 1) -->
                    <div class="col-md-4">
                        @if($produk->gambarProduk->count() > 0)
                        <div id="carouselProduk{{ $produk->id_produk }}" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                @foreach($produk->gambarProduk as $gambar)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $gambar->nama_gambar) }}" class="d-block w-100 rounded" alt="Gambar Produk">
                                </div>
                                @endforeach
                            </div>

                            @if($produk->gambarProduk->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduk{{ $produk->id_produk }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProduk{{ $produk->id_produk }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            @endif
                        </div>
                        @else
                            <img src="{{ asset('produk.png') }}" class="img-fluid rounded" alt="Produk">
                        @endif
                    </div>

                    <!-- Info Produk -->
                    <div class="col-md-8">
                        <h2 class="fw-semibold">{{ $produk->nama_produk }}</h2>
                        <p class="text-muted fs-5">Rp {{ number_format($produk->harga,0,',','.') }}</p>
                        <p class="fs-6">{{ $produk->deskripsi }}</p>
                        <p class="text-muted">Stok: {{ $produk->stok }}</p>
                        <p class="text-muted">
                            Upload: {{ $produk->tanggal_upload ? \Carbon\Carbon::parse($produk->tanggal_upload)->format('d M Y') : '-' }}
                        </p>
                        <a href="https://wa.me/1234567890" class="btn btn-success">
                            <i class="bi bi-whatsapp"></i> Pesan via WhatsApp
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

