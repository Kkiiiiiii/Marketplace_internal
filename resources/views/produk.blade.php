@extends('layout')
@section('content')
@foreach($produk as $p)
<section class="mb-5">
    <h3>{{ $p->nama_produk }}</h3>

    @if($p->gambarProduk->count() > 0)
    <div id="carousel{{ $p->id_produk }}" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($p->gambarProduk as $gambar)
                <button type="button" data-bs-target="#carousel{{ $p->id_produk }}" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $loop->iteration }}"></button>
            @endforeach
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            @foreach($p->gambarProduk as $gambar)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $gambar->gambar_produk) }}" class="d-block w-100" alt="Gambar Produk">
            </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $p->id_produk }}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $p->id_produk }}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    @else
        <p class="text-muted">Tidak ada gambar untuk produk ini</p>
    @endif
</section>
@endforeach
@endsection
