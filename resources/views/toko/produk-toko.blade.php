@extends('layout')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Produk dari {{ $toko->nama_toko }}</h2>

    <div class="row g-4">
        @foreach($produk as $p)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm">
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
                    <p class="text-primary fw-bold mb-1">Rp. {{ number_format($p->harga, 0, ',', '.') }}</p>
                    <p class="text-muted mb-1">Stok: {{ $p->stok }}</p>
                    <p class="card-text text-truncate" style="max-height: 3.6em; overflow: hidden;">
                        {{ $p->deskripsi }}
                    </p>
                    <p class="mb-1"><small class="text-muted">{{ $p->kategori->nama_kategori }}</small></p>
                    <a href="{{ route('produk-detail', Crypt::encrypt($p->id_produk)) }}" class="btn btn-success btn-sm mt-auto">Beli</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
