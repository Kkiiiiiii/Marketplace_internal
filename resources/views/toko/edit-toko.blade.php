@extends('layout')
@section('content')
<div class="container mt-4 mb-5">
    <h2>Edit Toko</h2>

    <form action="{{ route('toko-update', Crypt::encrypt($toko->id_toko)) }}" method="POST" enctype="multipart/form-data" id="formToko">
        @csrf

        <div class="form-group">
            <label for="nama_toko">Nama Toko</label>
            <input type="text" name="nama_toko" id="nama_toko" class="form-control" value="{{ $toko->nama_toko }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ $toko->deskripsi }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="kontak_toko">Kontak Toko</label>
            <input type="text" name="kontak_toko" id="kontak_toko" class="form-control" value="{{ $toko->kontak_toko }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ $toko->alamat }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="gambar">Gambar</label>
            <img src="{{ asset('storage/' . $toko->gambar) }}" alt="{{ $toko->nama_toko }}" width="100" class="mb-2">
            <input type="file" name="gambar" id="gambar" class="form-control" value="{{ $toko->gambarProduk }}">
        </div>

        <button type="submit" class="btn btn-primary mt-4 w-100">Simpan Toko</button>
    </form>
</div>
@endsection
