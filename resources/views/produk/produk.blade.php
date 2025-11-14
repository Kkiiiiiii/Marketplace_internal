@extends('layout')
@section('content')
<div class="mb-4">
    <form action="{{ route('produk') }}" method="GET" class="d-flex">
        <select name="kategori" class="form-select me-2">
            <option value="">-- Semua Kategori --</option>
            @foreach($kategori as $k)
                <option value="{{  Crypt::encrypt($k->id_kategori) }}"
                    {{ request('kategori') == $k->id_kategori ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
</div>
    <div class="row">
    @foreach ($produk as $p)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if ($p->gambarProduk->count() > 0)
                    <img src="{{ asset('storage/' . $p->gambarProduk->first()->nama_gambar) }}" height="200px" style="object-fit: cover"
                         class="card-img-top" alt="{{ $p->nama_produk }}">
                @else
                    <img src="{{ asset('assets/img/no-image.png') }}" class="card-img-top" alt="No Image">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $p->nama_produk }}</h5>
                    <p class="card-text text-success"><strong> Rp {{ number_format($p->harga,0,',','.') }}</strong></p>
                    <p class="card-text"><strong>Stok:</strong> {{ $p->stok }}</p>
                    <p class="card-text">{{ Str::limit($p->deskripsi, 80) }}</p>
                    <p class="card-text">
                        <small class="text-muted">
                            Upload: {{ \Carbon\Carbon::parse($p->tanggal_upload)->format('d M Y') }}
                        </small>
                    </p>
                    <a href="{{ route('produk-detail', Crypt::encrypt($p->id_produk  )) }}" class="btn btn-primary mt-auto">
                        Detail Produk
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
