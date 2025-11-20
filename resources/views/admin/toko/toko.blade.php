@extends('admin.layout')
@section('content')
<style>
         table#tableToko thead th {
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
<div class="container my-5">
    <h2 class="mb-4">Tabel Toko</h2>
    <hr>
    <a href="{{ route('toko-create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Toko</a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- @if(session('toko_pending'))
    <div class="alert alert-warning text-center">
        Toko Anda masih pending. Harap tunggu persetujuan admin.
    </div>
    @endif --}}

    <table class="table table-striped table-cust" id="tableToko">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Toko</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Kontak Toko</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($toko as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $t->nama_toko }}</td>
                <td>{{ Str::limit($t->deskripsi, 50) }}</td>
                <td>
                        @if($t->gambar)
                            <img src="{{ asset('storage/' . $t->gambar) }}" alt="{{ $t->nama_toko }}" width="80">
                         @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>{{ $t->kontak_toko }}</td>
                    <td>{{ $t->alamat }}</td>
                <td>
                    <a href="{{ route('toko-edit', Crypt::encrypt($t->id_toko)) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('toko-delete', Crypt::encrypt($t->id_toko)) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus?')">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('#tableToko').DataTable({
        "ordering": false,
        "searching": true,
        "lengthChange": false,
        "info": false,
        });
    });
</script>
@endpush
@endsection
