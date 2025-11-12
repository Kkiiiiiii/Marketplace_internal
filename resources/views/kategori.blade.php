@extends('layout')
@section('content')
<div class="row">
  @foreach($kategori as $k)
    <div class="col-md-3 mb-3">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <i class="bi bi-box-seam fs-1"></i> <!-- icon bisa disesuaikan -->
          <h5 class="card-title mt-2">{{ $k->nama_kategori }}</h5>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection
