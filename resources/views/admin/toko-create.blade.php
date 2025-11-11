@extends('admin.layout')
@section('content')
<div class="container mt-4">
    <h2>Tambah Toko</h2>

    <form action="{{ route('toko-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_toko">Nama Toko</label>
            <input type="text" name="nama_toko" id="nama_toko" class="form-control" value="{{ old('nama_toko') }}" required>
            @error('nama_toko')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="kontak_toko">Kontak Toko</label>
            <input type="text" name="kontak_toko" id="kontak_toko" class="form-control" value="{{ old('kontak_toko') }}" required>
            @error('kontak_toko')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            @error('gambar')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-4">Simpan Toko</button>
    </form>
</div>
@endsection
