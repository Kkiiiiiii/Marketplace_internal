@extends('admin.layout')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">📦 Daftar Produk</h1>
    <a href="{{ route('produk-create') }}" class="btn btn-md btn-success mb-3">Tambah Produk</a>
    <table class="table table-bordered table-striped shadow-sm table-cust">
        <thead class="table-dark">
            <tr>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produk as $p)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Rp</td>
                    <td></td>
                    <td></td>
                    <td>
                        @if($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" width="80">
                         @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produk-create') }}">Edit</a>
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
{{-- @extends('admin.layout')
@section('content')
<style>
    .carousel {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
}

.carousel-inner {
    position: relative;
    width: 100%;
    height: 100%;
}

.carousel-item {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.carousel-item.active {
    opacity: 1;
}

.carousel-control-prev, .carousel-control-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    cursor: pointer;
    z-index: 10;
}

.carousel-control-prev {
    left: 10px;
}

.carousel-control-next {
    right: 10px;
}

.carousel-control-prev-icon, .carousel-control-next-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 20px;
    height: 20px;
    background-color: #fff;
    border-radius: 50%;
}

/* Panah kiri */
.carousel-control-prev-icon {
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M12 5l-5 5 5 5" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>');
}

/* Panah kanan */
.carousel-control-next-icon {
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M8 5l5 5-5 5" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>');
}

</style>
<div class="carousel">
    <div class="carousel-inner">
        @foreach($produk->gambarProduk as $gambar)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('storage/'.$gambar->nama_gambar) }}" alt="Gambar Produk">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>

    </a>
    <a class="carousel-control-next" href="#">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<script>
    let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');
const prevButton = document.querySelector('.carousel-control-prev');
const nextButton = document.querySelector('.carousel-control-next');

function showSlide(index) {
    slides.forEach((slide, i) => {
        if (i === index) {
            slide.classList.add('active');
        } else {
            slide.classList.remove('active');
        }
    });
}

prevButton.addEventListener('click', () => {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
});

nextButton.addEventListener('click', () => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
});
</script>
@endsection --}}
