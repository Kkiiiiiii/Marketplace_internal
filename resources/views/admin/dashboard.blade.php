@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <h3 class="fw-bold mb-4">Dashboard</h3>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="shadow-sm rounded bg-white p-4 d-flex justify-content-between align-items-center border-start border-4 border-primary">
                <div>
                    <h6 class="text-muted mb-1">Total Produk</h6>
                    <h2 class="mb-0">{{ $produk->count() }}</h2>
                </div>
                <div class="text-primary">
                    <i class="bi bi-box-seam-fill" style="font-size: 55px;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="shadow-sm rounded bg-white p-4 d-flex justify-content-between align-items-center border-start border-4 border-success">
                <div>
                    <h6 class="text-muted mb-1">Total Kategori</h6>
                    <h2 class="mb-0">{{ $kategori->count() }}</h2>
                </div>
                <div class="text-success">
                    <i class="bi bi-tag-fill" style="font-size: 55px;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="shadow-sm rounded bg-white p-4 d-flex justify-content-between align-items-center border-start border-4 border-warning">
                <div>
                    <h6 class="text-muted mb-1">Total Toko</h6>
                    <h2 class="mb-0">{{ $toko->count() }}</h2>
                </div>
                <div class="text-warning">
                    <i class="bi bi-shop" style="font-size: 55px;"></i>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
