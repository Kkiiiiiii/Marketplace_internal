@extends('layout')
@section('content')
<section class="py-2 my-5">
    <div class="container rounded" id="kategori-detail">
        <h2 class="mb-5 text-center animate">{{ $kategori->nama_kategori }}</h2>
        <div class="row g-4 justify-content-center">
            @forelse($produk as $p)
                <div class="col-6 col-md-3 text-center animate-fade">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            @if ($p->gambarProduk->count() > 0)
                                <img src="{{ asset('storage/' . $p->gambarProduk->first()->nama_gambar) }}"
                                     height="200px"
                                     style="object-fit: cover"
                                     class="card-img-top"
                                     alt="{{ $p->nama_produk }}">
                            @else
                                <img src="{{ asset('assets/img/no-image.png') }}"
                                     class="card-img-top"
                                     alt="No Image">
                            @endif

                            <h5 class="card-title mt-2">{{ $p->nama_produk }}</h5>
                            <p class="card-text text-success fw-bolder">Rp. {{ number_format($p->harga, 0, ',', '.') }}</p>
                            <p class="card-text">{{ Str::limit($p->deskripsi, 50) }}</p>
                            <a href="{{ route('produk-detail', Crypt::encrypt($p->id_produk)) }}" class="btn btn-sm btn-primary d-grid">Beli</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center rounded-pill bg-warning w-25 mw-5"><i class="fa-solid fa-triangle-exclamation"></i> Belum ada produk untuk kategori ini.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
