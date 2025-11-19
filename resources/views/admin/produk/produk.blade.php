@extends('admin.layout')
@section('content')
<style>
         table#produkTable thead th {
            text-align: center;
            /* rata tengah horizontal */
            vertical-align: middle;
            /* rata tengah vertikal */
        }

        /* Styling untuk badge oval di dalam tabel */
        .circle-bg {
            background-color: #111;
            color: white;
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            min-width: 60px;
            text-align: center;
            font-weight: 600;
            font-size: 0.9rem;
            white-space: nowrap;
            /* supaya teks tidak pecah ke baris baru */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            /* efek sedikit shadow supaya naik */
            transition: background-color 0.3s ease;
        }
</style>
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
                <th>Tanggal Upload</th>
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
                    <td>{{ $p->tanggal_upload }}</td>
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

