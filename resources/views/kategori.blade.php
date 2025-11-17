@extends('layout')
@section('content')
<div class="row mt-5">
    <h2>Daftar Kategori</h2>
  @foreach($kategori as $k)
    <div class="col-md-3 mb-3 mt-5">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <i class="bi bi-box-seam fs-1"></i>
          <h5 class="card-title mt-2">{{ $k->nama_kategori }}</h5>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
