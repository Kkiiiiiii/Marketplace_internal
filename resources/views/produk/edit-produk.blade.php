@extends('layout')
@section('content')
<div class="container mb-5">
    <h2>Edit Produk</h2>
    <form action="{{ route('pUpdate', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            @if($produk->gambarProduk->count() > 0)
                <label class="form-label">Gambar Lama</label><br>
                @foreach($produk->gambarProduk as $g)
                    <img src="{{ asset('storage/' . $g->nama_gambar) }}"
                         alt="{{ $produk->nama_produk }}"
                         width="100" class="mb-2 me-1">
                @endforeach
            @endif
            <input type="file" name="gambar_produk[]" class="form-control" id="gambar_produk" multiple>
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="{{ $produk->nama_produk }}" required>
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

        {{-- Input hidden untuk id_toko otomatis sesuai user --}}
        <input type="hidden" name="id_toko" value="{{ auth()->user()->toko->id_toko }}">

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" value="{{ $produk->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" id="stok" value="{{ $produk->stok }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required>{{ $produk->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
