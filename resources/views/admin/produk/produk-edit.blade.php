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
    <h2 class="mb-4">Edit Produk</h2>

    <form action="{{ route('produk-update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" id="nama_produk"
                   value="{{ $produk->nama_produk }}" required>
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control" required>
                @foreach($kategori as $k)
                    <option value="{{ $k->id_kategori }}"
                        {{ old('id_kategori', $produk->id_kategori) == $k->id_kategori ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_toko" class="form-label">Toko</label>
            <select name="id_toko" id="id_toko" class="form-control" required>
                @foreach($toko as $t)
                    <option value="{{ $t->id_toko }}"
                        {{ old('id_toko', $produk->id_toko) == $t->id_toko ? 'selected' : '' }}>
                        {{ $t->nama_toko }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga"
                   value="{{ $produk->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" id="stok"
                   value="{{ $produk->stok }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required>{{ $produk->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            @if($produk->gambarProduk->count() > 0)
                <label class="form-label">Gambar Lama</label><br>
                @foreach($produk->gambarProduk as $g)
                    <img src="{{ asset('storage/' . $g->nama_gambar) }}"
                         alt="{{ $produk->nama_produk }}"
                         width="100" class="mb-2 me-1">
                @endforeach
            @endif
            <label for="gambar_produk" class="form-label">Ganti / Tambah Gambar Produk</label>
            <input type="file" name="gambar_produk[]" class="form-control" id="gambar_produk" multiple>
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        <button type="submit" class="btn btn-primary">Update Produk</button>
    </form>
</div>
@endsection
