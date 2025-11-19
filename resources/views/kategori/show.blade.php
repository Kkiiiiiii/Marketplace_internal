@extends('layout')
@section('content')
    <div class="container rounded my-5" id="kategori-detail">
        <h2 class="mb-5 text-center fw-bold animate">{{ $kategori->nama_kategori }}</h2>
        <div class="row g-4 justify-content-center">
            @forelse($produk as $p)
                <div class="col-md-3 text-center animate-fade">
                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden hover-shadow">
                        @if ($p->gambarProduk->count() > 0)
                            <img src="{{ asset('storage/' . $p->gambarProduk->first()->nama_gambar) }}"
                                 height="200" style="object-fit: cover; width: 100%;"
                                 class="card-img-top"
                                 alt="{{ $p->nama_produk }}">
                        @else
                            <img src="{{ asset('assets/img/no-image.png') }}"
                                 class="card-img-top"
                                 alt="No Image" style="height: 200px; object-fit: cover; width: 100%;">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mt-2 text-truncate" title="{{ $p->nama_produk }}">{{ $p->nama_produk }}</h5>
                            <p class="card-text text-success fw-bold mb-2">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                            <p class="card-text text-muted mb-3">{{ Str::limit($p->deskripsi, 60) }}</p>
                            <small class="text-secondary mb-3">{{ \Carbon\Carbon::parse($p->tanggal_upload)->format('d M Y') }}</small>
                            <a href="{{ route('produk-detail', Crypt::encrypt($p->id_produk)) }}" class="btn btn-primary btn-sm mt-auto">Beli</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center rounded-pill bg-warning px-4 py-2 w-auto mx-auto">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i> Belum ada produk untuk kategori ini.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
