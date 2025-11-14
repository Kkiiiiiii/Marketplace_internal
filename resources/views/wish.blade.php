@extends('layout')
@section('content')
<div class="container mt-5">
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
                            <img src="{{ asset('storage/'.$w->produk->gambarProduk->first()->nama_gambar) }}"
                                 class="card-img-top"
                                 alt="{{ $w->produk->nama_produk }}"
                                 style="height:200px; object-fit:cover;">
                        {{-- @else --}}
                            <img src="{{ asset('image/no_image.png') }}"
                                 class="card-img-top"
                                 alt="Tidak ada gambar"
                                 style="height:200px; object-fit:cover;">
                        {{-- @endif --}}

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $w->produk->nama_produk }}</h5>
                            <p class="text-success fw-bold mb-1">Rp. {{ number_format($w->produk->harga, 0, ',', '.') }}</p>
                            <p class="text-muted mb-1">Stok: {{ $w->produk->stok }}</p>
                            <p class="card-text text-truncate" style="max-height: 3.6em; overflow: hidden;">
                                {{ $w->produk->deskripsi }}
                            </p>
                            <p class="mb-1"><small class="text-muted">{{ $w->produk->kategori->nama_kategori }}</small></p>

                            <div class="mt-auto d-flex flex-column gap-2 mb-2">
                                <!-- Detail Produk -->
                                <a href="{{ route('produk-detail', Crypt::encrypt($w->produk->id_produk)) }}" class="btn btn-success btn-sm w-auto">
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
