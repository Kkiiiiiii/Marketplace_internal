@extends('admin.layout')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container mt-5">
        <h2 class="mb-4">Tambah Produk</h2>
        <form action="{{ route('produk-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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

            <div class="mb-3">
                   <label for="id_toko" class="form-label">Toko</label>
                   <select name="id_toko" id="id_toko" class="form-control" required>
                    <option value="">-- Pilih Toko --</option>
                    @foreach($toko as $t)
                        <option value="{{ $t->id_toko }}">{{ $t->nama_toko }}</option>
                    @endforeach
                </select>
                </div>

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

            <div class="mb-3">
                <label for="gambar_produk" class="form-label">Gambar Produk</label>
                <input type="file" name="gambar_produk[]" class="form-control" id="gambar_produk" multiple required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
