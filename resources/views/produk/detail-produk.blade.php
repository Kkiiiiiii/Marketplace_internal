@extends('layout')
@section('content')
<div class="container my-5 product-detail-page">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm p-4">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="border rounded overflow-hidden">
                            @if($produk->gambarProduk->count() > 0)
                                <div class="ratio ratio-4x3">
                                <img id="main-product-image"
                                    src="{{ asset('storage/' . $produk->gambarProduk->first()->nama_gambar) }}"
                                    class="w-100 h-100 object-fit-cover rounded"
                                    alt="{{ $produk->nama_produk }}">
                            </div>

                            @else
                                <img id="main-product-image"
                                     src="{{ asset('produk.png') }}"
                                     class="img-fluid"
                                     alt="{{ $produk->nama_produk }}">
                            @endif
                        </div>

                        @if($produk->gambarProduk->count() > 1)
                            <div class="d-flex gap-2 mt-3 overflow-auto">
                                @foreach($produk->gambarProduk as $gambar)
                                    <div class="thumbnail {{ $loop->first ? 'active border border-primary' : '' }}"
                                         onclick="changeImage('{{ asset('storage/' . $gambar->nama_gambar) }}', this)">
                                        <img src="{{ asset('storage/' . $gambar->nama_gambar) }}"
                                             class="img-thumbnail p-0 rounded"
                                             style="width: 80px; height: 80px; object-fit: cover;">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>

                    <div class="col-lg-6 ps-lg-4">
                        <div class="d-flex justify-content-between">
                            <h2 class="fw-bold">{{ $produk->nama_produk }}</h2>
                            <a href="{{ route('wishlist') }}" onclick="toggleWishlist()">
                                <i class="bi bi-heart text-danger" style="font-size: 20px"  id="wish"></i></a>
                        </div>

                        <div class="text-warning mb-2 d-flex align-items-center">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span class="text-muted ms-1">(4.5) | 123 Terjual</span>
                        </div>
                        
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <h3 class="fw-bold text-success mb-0">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </h3>

                            <div>
                                @if($produk->stok > 10)
                                    <span class="badge bg-success"><i class="bi bi-check-circle"></i> Tersedia</span>
                                @elseif($produk->stok > 0)
                                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle"></i> Stok Terbatas</span>
                                @else
                                    <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Habis</span>
                                @endif
                            </div>
                        </div>

                        <p class="mb-3"><strong>Kategori:</strong> {{ $produk->kategori->nama_kategori }}</p>

                        <hr>

                        <h5 class="fw-semibold">Deskripsi</h5>
                        <p class="text-muted">{{ $produk->deskripsi }}</p>

                        <h5 class="fw-semibold mt-4">Keterangan</h5>

                        <dl class="row">

                            <dt class="col-sm-4 fw-semibold">Stok</dt>
                            <dd class="col-sm-8">{{ $produk->stok }}</dd>

                            <dt class="col-sm-4 fw-semibold">Etalase</dt>
                            <dd class="col-sm-8">{{ $produk->kategori->nama_kategori }}</dd>
                        </dl>

                        <div class="p-3 bg-light rounded mt-4">
                            <h6 class="fw-semibold mb-2"><i class="bi bi-shop"></i> Informasi Toko</h6>
                            <p class="mb-1 fw-semibold">{{ $produk->toko->nama_toko }}</p>
                            <p class="text-muted mb-0"><i class="bi bi-person"></i> {{ $produk->toko->user->name }}</p>
                        </div>

                        <div class="mt-4 pt-3 border-top">
                            <a href="https://wa.me/1234567890?text=Halo%2C+saya+tertarik+dengan+produk+{{ urlencode($produk->nama_produk) }}"
                               class="btn btn-success w-100 fw-semibold py-2"
                               target="_blank">
                                <i class="bi bi-whatsapp"></i> Pesan Via WhatsApp
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function changeImage(imageSrc, thumbnailElement) {
        const mainImage = document.getElementById('main-product-image');
        mainImage.src = imageSrc;

        const thumbnails = document.querySelectorAll('.thumbnail');
        thumbnails.forEach(thumb => thumb.classList.remove('border', 'border-primary'));

        thumbnailElement.classList.add('border', 'border-primary');
    }

    function toggleWishlist() {
        const wishIcon = document.getElementById('wish');
        wishIcon.classList.toggle('bi-heart');
        wishIcon.classList.toggle('bi-heart-fill');
    }
</script>

@endsection
