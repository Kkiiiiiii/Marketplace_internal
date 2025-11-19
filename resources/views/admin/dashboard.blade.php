@extends('admin.layout')
@section('content')
<div class="">
    <h3 class="fw-bold mb-4">Dashboard</h3>
    <hr>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="shadow-sm rounded bg-white p-4 d-flex justify-content-between align-items-center border-start border-4 border-primary">
                <div>
                    <h6 class="text-muted mb-1">Daftar Produk</h6>
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
                    <h6 class="text-muted mb-1">Toko Aktif</h6>
                    <h2 class="mb-0">{{ $toko->count() }}</h2>
                </div>
                <div class="text-warning">
                    <i class="bi bi-shop" style="font-size: 55px;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="shadow-sm rounded bg-white p-4 d-flex justify-content-between align-items-center border-start border-4 border-danger">
                <div>
                    <h6 class="text-muted mb-1">Total User</h6>
                    <h2 class="mb-0">{{ $user->count() }}</h2>
                </div>
                <div class="text-warning">
                    <i class="bi bi-user" style="font-size: 55px;"></i>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-4">
    <!-- Kotak Approve Toko -->
    <div class="col-12">
        <div class="card shadow-sm rounded">
            <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Toko Pending ({{ $pendingToko }})</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Toko</th>
                            <th>Nama Member</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tokoPendingList as $index => $toko)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $toko->nama_toko }}</td>
                                <td>{{ $toko->user->name }}</td>
                                <td>
                                    <form action="{{ route('admin.toko.approve', $toko->id_toko) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Setujui toko ini?')">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.toko.reject', $toko->id_toko) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tolak toko ini?')">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada toko pending</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
