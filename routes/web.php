    <?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NTokoConntoller;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

    Route::get('/',[BerandaController::class, 'index'])->name('beranda');
    // Login / Register - Member
    Route::get('/login/tampil',[AuthController::class, 'indexLog'])->name('indexLog');
    Route::post('/login',[AuthController::class, 'login'])->name('login');
    Route::get('/register/tampil',[AuthController::class, 'regis'])->name('register-tampil');
    Route::post('/register',[AuthController::class, 'register'])->name('register-post');

    // Login - Admin
    Route::get('/admin/login/tampil',[AuthController::class, 'AdminLog'])->name('AdminLog');
    Route::post('/admin/login',[AuthController::class, 'Alogin'])->name('Alogin');

    Route::middleware(['admin'])->group(function(){
        Route::get('/admin/dash',[AdminController::class, 'dash'])->name('dashboard');
        Route::post('/admin/toko/{id}/approve', [AdminController::class, 'approveToko'])->name('admin.toko.approve');
        Route::post('/admin/toko/{id}/reject', [AdminController::class, 'rejectToko'])->name('admin.toko.reject');
        //Produk
        Route::get('/admin/produk',[AdminController::class, 'produk'])->name('admin-produk');
        // Route::get('/admin/produk/create',[ProdukController::class, 'create'])->name('produk-create');
        // Route::post('/admin/produk/store',[ProdukController::class, 'store'])->name('produk-store');
        Route::get('/admin/produk/edit/{id}',[ProdukController::class, 'edit'])->name('produk-edit');
        Route::post('/admin/produk/update/{id}',[ProdukController::class, 'update'])->name('produk-update');
        Route::post('/admin/produk/delete/{id}',[ProdukController::class, 'delete'])->name('produk-delete');

        //User
        Route::get('/admin/user', [AdminController::class, 'user'])->name('admin-user');
        Route::get('/admin/user/create',[UserController::class, 'create'])->name('user-create');
        Route::post('/admin/user/store',[UserController::class, 'store'])->name('user-store');
        Route::get('/admin/user/edit/{id}',[UserController::class, 'edit'])->name('user-edit');
        Route::post('/admin/user/update/{id}',[UserController::class, 'update'])->name('user-update');
        Route::post('/admin/user/delete/{id}',[UserController::class, 'delete'])->name('user-delete');

        //Kategori
        Route::get('/admin/kategori',[AdminController::class, 'kategori'])->name('admin-kategori');
        Route::post('/admin/kategori/store',[KategoriController::class, 'store'])->name('kategori-store');
        Route::post('/admin/kategori/update/{id}',[KategoriController::class, 'update'])->name('kategori-update');
        Route::post('/admin/kategori/delete/{id}',[KategoriController::class, 'delete'])->name('kategori-delete');

        //Toko
        Route::get('/admin/toko',[AdminController::class, 'toko'])->name('admin-toko');
        Route::get('/admin/toko/edit/{id}',[NTokoConntoller::class, 'editA'])->name('toko-edit');
        Route::post('/admin/toko/update-admin/{id}',[NTokoConntoller::class, 'updateAdmin'])->name('update-admin');
        // Route::get('/admin/toko/approve', [NTokoConntoller::class, 'daftarToko']);
        Route::post('/admin/toko/approve/{id}', [NTokoConntoller::class, 'approve'])->name('admin.toko.approve');
        Route::get('/admin/toko/create',[NTokoConntoller::class, 'create'])->name('toko-create');
        Route::post('/admin/toko/store',[NTokoConntoller::class, 'store'])->name('toko-store');
        Route::post('/admin/toko/delete/{id}',[NTokoConntoller::class, 'delete'])->name('toko-delete');
    });

    Route::post('/admin/logout', [AuthController::class, 'Alogout'])->name('admin-logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/produk',[ProdukController::class, 'index'])->name('produk');
    Route::get('/kategori',[KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori-show');
    Route::get('/produk/detail/{id}',[ProdukController::class, 'detail'])->name('produk-detail');


    Route::middleware( ['member'])->group( function(){
        Route::get('/toko/buat', [NTokoConntoller::class, 'buka'])->name('buka-toko');
        Route::post('/toko/store', [NTokoConntoller::class,  'buat' ])->name('store-toko');
        Route::get('/toko/edit/{id}',[NTokoConntoller::class, 'edit'])->name('toko-edit');
        Route::post('/toko/update/{id}',[NTokoConntoller::class, 'update'])->name('toko-update');

        Route::get('/produk/buat',[ProdukController::class, 'bproduk'])->name('bproduk');
        Route::post('/produk/store', [ProdukController::class,  'sproduk' ])->name('Sproduk');
        Route::get('/produk/edit/{id}',[ProdukController::class, 'proEdit'])->name('pEdit');
        Route::post('/produk/update/{id}',[ProdukController::class, 'pUpdate'])->name('pUpdate');
        Route::post('/produk/delete/{id}',[ProdukController::class, 'pdelete'])->name('pdelete');
        Route::get('/wishlist', [BerandaController::class, 'wish'])->name('wishlist');
    });
    // Route untuk menampilkan produk berdasarkan toko
    Route::get('/toko/produk/{id}', [ProdukController::class, 'produkByToko'])->name('produk.toko');
    Route::get('/toko',[NTokoConntoller::class, 'index'])->name('toko');
    // Route::middleware(['auth','CekToko'])->group( function() {
    // });


