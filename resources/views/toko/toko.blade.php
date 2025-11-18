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
        <h2>Toko</h2>
        <div class="row">
            @foreach ($toko as $t)
            <div class="col-md-6 mb-4">
                <div class="card h-100 animate">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-center align-items-center p-3">
                            <img src="{{ asset('storage/'.$t->gambar) }}" alt="Logo Toko" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"><b>{{ $t->nama_toko }}</b></h4>
                                <p class="card-text">{{ Str::limit($t->deskripsi, 150) }}</p>
                                <p class="mb-1"><i class="fa fa-phone"></i> {{ $t->kontak_toko }}</p>
                                <p class="mb-1"><i class="fa fa-map-marker"></i> {{ $t->alamat }}</p>
                                <p class="mb-3"><i class="fa fa-user"></i> {{ $t->user->name }}</p>
                                <a href="{{ route('produk.toko', Crypt::encrypt($t->id_toko)) }}" class="btn btn-primary btn-sm">Lihat Produk</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

{{-- @extends('layout')
@section('content')
<div class="container my-5">
    <h2>Toko Saya</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-3 p-3">
        <div class="row">
            <div class="col-md-4">
                @if($toko->gambar)
                    <img src="{{ asset('storage/'.$toko->gambar) }}" alt="Gambar Toko" class="img-fluid rounded">
                @else
                    <img src="{{ asset('image/no_image.png') }}" alt="No Image" class="img-fluid rounded">
                @endif
            </div>
            <div class="col-md-8">
                <h3>{{ $toko->nama_toko }}</h3>
                <p>{{ $toko->deskripsi }}</p>
                <p><strong>Kontak:</strong> {{ $toko->kontak_toko }}</p>
                <p><strong>Alamat:</strong> {{ $toko->alamat }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}
