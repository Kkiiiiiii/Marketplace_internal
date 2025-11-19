@extends('layout')
@section('content')
<div class="row mt-5 animate">
    <h2 class="mb-4">Daftar Kategori</h2>

    @foreach($kategori as $k)
        <div class="col-md-3 mb-5">
            <a href="{{ route('kategori-show', Crypt::encrypt($k->id_kategori)) }}" class="text-decoration-none text-dark">
                <div class="card text-center shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-box-seam fs-1 mb-2"></i>
                        <h5 class="card-title">{{ $k->nama_kategori }}</h5>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection
