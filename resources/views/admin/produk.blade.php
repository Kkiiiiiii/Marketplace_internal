@extends('admin.layout')
@section('content')
<div class="container mt-5">
    <h3 class="mb-4">📦 Daftar Produk</h3>
    <a href="{{ route('produk-create') }}" class="btn btn-md btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Produk</a>
    <table class="table table-bordered table-striped shadow-sm table-cust">
        <thead class="table-dark">
            <tr>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produk as $p)
                <tr>
                    <td>{{ $p->nama_produk }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>Rp.{{ $p->harga }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>{{ $p->kategori->nama_kategori }}</td>
                    <td>
                        @if($p->gambar)
                            <img src="{{ asset('storage/' . $p->gambar_produk) }}" alt="{{ $p->nama_produk }}" width="80">
                         @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                        <a href="" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

