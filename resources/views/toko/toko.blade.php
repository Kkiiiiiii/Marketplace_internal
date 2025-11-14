@extends('layout')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Toko</h2>    </div>

    <div class="row">
        @foreach ($toko as $t)
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center p-3">
                        <img src="{{ asset('storage/'.$t->gambar) }}" alt="Logo Toko" class="rounded-circle img-fluid">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title"><b>{{ $t->nama_toko }}</b></h4>
                            <p class="card-text">{{ $t->deskripsi }}</p>
                            <p class="mb-1"><i class="fa fa-phone"></i> {{ $t->kontak_toko }}</p>
                            <p class="mb-1"><i class="fa fa-map-marker"></i> {{ $t->alamat }}</p>
                            <p class="mb-3"><i class="fa fa-user"></i> {{ $t->user->name }}</p>
                            <a href="{{ route('produk.toko', $t->id_toko) }}" class="btn btn-primary btn-sm">Lihat Produk</a>
                            @if(Auth::check() && Auth::id() == $t->id_user)
                            <a href="{{ route('toko-edit', Crypt::encrypt($t->id_toko)) }}" class="btn btn-warning btn-sm text-white">Edit Toko</a>
                            <a href="{{ route('bproduk', $t->id) }}" class="btn btn-warning btn-sm text-white">Tambah Produk</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
