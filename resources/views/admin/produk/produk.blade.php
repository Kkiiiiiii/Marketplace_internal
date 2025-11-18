@extends('admin.layout')
@section('content')
<div class="container mt-5">
    <h3 class="mb-4">📦 Daftar Produk</h3>
    <hr>
    <table id="produkTable" class="table table-bordered table-striped shadow-sm table-cust">
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
                    <td>{{ Str::limit($p->deskripsi, 50) }}</td>
                    <td>Rp.{{ number_format($p->harga,0,',','.') }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>{{ $p->kategori->nama_kategori }}</td>
                    <td>
                        @if($p->gambarProduk->count() > 0)
                            @foreach($p->gambarProduk as $g)
                                <img src="{{ asset('storage/' . $g->nama_gambar) }}"
                                     alt="{{ $p->nama_produk }}"
                                     width="80"
                                     class="me-1 mb-1 rounded">
                            @endforeach
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produk-edit', Crypt::encrypt($p->id_produk)) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit</a>
                        <a href="{{ route('produk-delete', Crypt::encrypt($p->id_produk)) }}" class="btn btn-sm btn-danger"
                           onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            <i class="bi bi-trash"></i> Hapus</a>
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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#produkTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "lengthChange": true,
            });
        });
    </script>
@endpush

