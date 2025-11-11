<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[BerandaController::class, 'index'])->name('beranda');
Route::get('/login/tampil',[AuthController::class, 'indexLog'])->name('indexLog');
Route::post('/login',[AuthController::class, 'login'])->name('login');

Route::get('/admin/dash',[AdminController::class, 'dash'])->name('dashboard');

Route::get('/admin/produk',[AdminController::class, 'produk'])->name('admin-produk');
Route::get('/produk/detail',[ProdukController::class, 'detail'])->name('produk-detail');
Route::get('/admin/produk/create',[ProdukController::class, 'create'])->name('produk-create');
Route::post('/admin/produk/store',[ProdukController::class, 'store'])->name('produk-store');

Route::get('/admin/kategori',[AdminController::class, 'kategori'])->name('admin-kategori');
Route::post('/admin/kategori/store',[KategoriController::class, 'store'])->name('kategori-store');

Route::get('/admin/toko',[AdminController::class, 'toko'])->name('admin-toko');
Route::get('/admin/toko/create',[TokoController::class, 'create'])->name('toko-create');
Route::post('/admin/toko/store',[TokoController::class, 'store'])->name('toko-store');

Route::get('/produk',[ProdukController::class, 'index'])->name('produk');


