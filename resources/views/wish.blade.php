@extends('layout')
@section('content')
<div class="container mt-5 mb-5">
    <h2 class="mb-4">Wishlist Saya</h2>

    {{-- @if($wishlist->isEmpty())
        <div class="alert alert-info text-center">
            Wishlist kamu kosong 😔. Yuk, tambahkan produk favoritmu!
        </div>
    @else --}}
        <div class="row g-4">
            {{-- @foreach($wishlist as $w) --}}
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        {{-- @if($w->produk->gambarProduk->first()) --}}
                            <img src=""
                                 class="card-img-top"
                                 alt=""
                                 style="height:200px; object-fit:cover;">
                        {{-- @else --}}
                            <img src="{{ asset('image/no_image.png') }}"
                                 class="card-img-top"
                                 alt="Tidak ada gambar"
                                 style="height:200px; object-fit:cover;">
                        {{-- @endif --}}

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">/h5>
                            <p class="text-success fw-bold mb-1">Rp. </p>
                            <p class="text-muted mb-1">Stok: </p>
                            <p class="card-text text-truncate" style="max-height: 3.6em; overflow: hidden;">

                            </p>
                            <p class="mb-1"><small class="text-muted"></small></p>

                            <div class="mt-auto d-flex flex-column gap-2 mb-2">
                                <!-- Detail Produk -->
                                <a href="" class="btn btn-success btn-sm w-auto">
                                    <i class="bi bi-info-circle"></i> Detail Produk
                                </a>
                            </div>

                            <div class="d-flex justify-content-between">
                                <!-- Hapus dari Wishlist -->
                                <form action="" method="POST" class="w-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini dari wishlist?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
        </div>
    {{-- @endif --}}
</div>
@endsection
