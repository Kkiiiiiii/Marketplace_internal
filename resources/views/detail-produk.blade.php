@extends('layout')
@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-sm">
        <div class="row g-0 p-3 align-items-center">

          <!-- Gambar Produk -->
          <div class="col-md-4 text-center">
            <img src="produk.png" class="img-fluid rounded" alt="Produk Xiaomi 14T Pro">
          </div>

          <!-- Detail Produk -->
          <div class="col-md-8">
            <h2 class="fw-semibold">Xiaomi 14T Pro</h2>
            <p class="text-muted fs-5">Rp 200.000</p>
            <p class="fs-6">Performa Terbaik: Ditenagai oleh Snapdragon 8 Gen 3, Xiaomi 14T Pro memberikan kecepatan dan....</p>
            <a href="https://wa.me/1234567890" class="btn btn-success">
              <i class="bi bi-whatsapp"></i> Pesan via WhatsApp
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
