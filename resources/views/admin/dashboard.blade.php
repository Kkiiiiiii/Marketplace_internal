@extends('admin.layout')
@section('content')
   <h3>Dashboard</h3>
    <hr>
 <div class="d-flex gap-3">
    <div class="card bg-success" style="width: 300px">
        <div class="card-body text-white d-flex justify-content-between align-items-center">
            <div class="text-start">
                <h6>Data Produk</h6>
                <span>{{ $produk->count() }}</span>
            </div>
            <i class="bi bi-box-seam-fill" style="font-size: 50px;"></i>
        </div>
    </div>

    <div class="card bg-danger" style="width: 300px">
        <div class="card-body text-white d-flex justify-content-between align-items-center">
            <div class="text-start">
                <h6>Data Kategori</h6>
                <span>{{ $kategori->count() }}</span>
            </div>
            <i class="bi bi-tag-fill" style="font-size: 50px;"></i>
        </div>
    </div>

    <div class="card bg-info" style="width: 300px">
        <div class="card-body text-white d-flex justify-content-between align-items-center">
            <div class="text-start">
                <h6>Data Toko</h6>
                <span>{{ $toko->count() }}</span>
            </div>
            <i class="bi bi-shop" style="font-size: 50px;"></i>
        </div>
    </div>
</div>
@endsection
