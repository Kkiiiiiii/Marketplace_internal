@extends('layout')
@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">{{ session('warning') }}</div>
@endif

<section class="py-5 my-5">
    <div class="container">
        <h2 class="mb-4">Toko</h2>
        <div class="row">
            @foreach ($toko as $t)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card shadow-sm h-100 text-center">
                    <div class="p-3">
                        <img src="{{ asset('storage/' . $t->gambar) }}"
                             alt="Gambar Toko"
                             class="rounded-circle border"
                             style="width: 140px; height: 140px; object-fit: cover;">
                    </div>

                    <div class="card-body">

                        <h5 class="card-title fw-bold">{{ $t->nama_toko }}</h5>

                        <p class="card-text text-muted" style="font-size: 14px;">
                            {{ Str::limit($t->deskripsi, 80) }}
                        </p>

                        <div class="row text-start mb-3">

                            <div class="col-6">
                                <p class="mb-1">
                                    <i class="fa fa-user"></i> {{ $t->user->name }}
                                </p>
                                <p class="mb-1">
                                    <i class="fa fa-phone"></i> {{ $t->kontak_toko }}
                                </p>
                            </div>

                            <div class="col-6">
                                <p class="mb-1">
                                    <i class="bi bi-geo-fill"></i>
                                    {{ Str::limit($t->alamat, 35) }}
                                </p>
                            </div>
                        </div>

                        <span class="badge bg-primary mb-3" style="font-size: 14px;">
                            {{ $t->produk->count() }} Produk
                        </span>

                        <a href="{{ route('produk.toko', Crypt::encrypt($t->id_toko)) }}"
                           class="btn btn-sm btn-success w-100">
                            Lihat Produk
                        </a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
