@extends('admin.layout')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tabel Toko</h2>
    <hr>
    {{-- <a href="{{ route('toko-create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Toko</a> --}}

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-cust">
        <thead>
            <tr>
                <th>ID Toko</th>
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
                <td>{{ $t->deskripsi }}</td>
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
@endsection
