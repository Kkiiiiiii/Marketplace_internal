@extends('layout')
@section('content')
<div class="container mt-3 mb-5">
    <div class="d-flex mb-4 align-items-center flex-column text-center">
        @if (Auth::check() && Auth::id() == $toko->id_user)
            <h2>Toko Saya</h2>
        @endif
        <img src="{{ asset('storage/'. $toko->gambar) }}"
             alt="Foto Toko"
             class="rounded-circle img-thumbnail mb-3"
             style="width: 150px; height: 150px; object-fit: cover;">
        <h2>{{ $toko->nama_toko }}</h2>
        <p>{{ Str::limit($toko->deskripsi, 100) }}</p>
        <h5>Kontak : {{ $toko->kontak_toko }}</h5>
        <p class="text-muted">Alamat Toko : {{ $toko->alamat }}</p>

        @if(Auth::check() && Auth::id() == $toko->id_user)
            <div class="d-flex gap-2 mt-3 flex-wrap justify-content-center">
                <a href="{{ route('bproduk', $toko->id) }}" class="btn btn-success btn-sm text-white">Tambah Produk</a>
                <a href="{{ route('toko-edit', Crypt::encrypt($toko->id_toko)) }}" class="btn btn-warning btn-sm text-white">Edit Toko</a>
            </div>
        @endif
    </div>

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
                        <p class="text-success fw-bold mb-1">Rp. {{ number_format($p->harga, 0, ',', '.') }}</p>
                        <p class="text-muted mb-1">Stok: {{ $p->stok }}</p>
                        <p class="card-text text-truncate" style="max-height: 3.6em; overflow: hidden;">
                            {{ $p->deskripsi }}
                        </p>
                        <p class="mb-1"><small class="text-muted">{{ $p->kategori->nama_kategori }}</small></p>

                <div class="mt-auto d-flex flex-column gap-2 mb-4">
                    <a href="{{ route('produk-detail', Crypt::encrypt($p->id_produk)) }}" class="btn btn-success btn-sm w-auto">
                        <i class="bi bi-info-circle"></i> Detail Produk
                    </a>
                </div>

                <div class="d-flex justify-content-between">
                    @if (Auth::check() && Auth::id() == $toko->id_user)
                        <a href="{{ route('pEdit', Crypt::encrypt($p->id_produk)) }}" class="btn btn-warning btn-md text-white w-auto">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('pdelete', Crypt::encrypt($p->id_produk)) }}" method="POST" class="w-auto">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-md" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    @endif
                </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
