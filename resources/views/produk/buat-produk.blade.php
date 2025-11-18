@extends('layout')
@section('content')
<div class="container mb-5">
    <h2>Buat Produk</h2>
    <form action="{{ route('Sproduk') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="gambar_produk" class="form-label">Gambar Produk</label>
            <input type="file" name="gambar_produk[]" class="form-control" id="gambar_produk" multiple required>
        </div>

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        {{-- Input hidden untuk id_toko otomatis sesuai user --}}
        <input type="hidden" name="id_toko" value="{{ auth()->user()->toko->id_toko }}">

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" id="stok" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
