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

    <div class="row mt-4">
        <!-- Kotak Approve Toko -->
        <div class="col-md-3">
    <div class="card text-white bg-warning mb-3">
        <div class="card-body">
            <h5 class="card-title">Toko Pending</h5>
            <p class="card-text display-6">{{ $pendingToko }}</p>

            <ul class="list-group list-group-flush">
                @forelse($tokoPendingList as $toko)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $toko->nama_toko }}
                        <form action="{{ route('admin.toko.approve', $toko->id_toko) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-light">Approve</button>
                        </form>
                    </li>
                @empty
                    <li class="list-group-item">Tidak ada toko pending</li>
                @endforelse
            </ul>

        </div>
    </div>
</div>
    </div>
</div>
@endsection
