    <?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\BerandaController;
    use App\Http\Controllers\KategoriController;
    use App\Http\Controllers\ProdukController;
    use App\Http\Controllers\TokoController;
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
        Route::get('/admin/produk',[AdminController::class, 'produk'])->name('admin-produk');
        Route::get('/produk/detail',[ProdukController::class, 'detail'])->name('produk-detail');
        Route::get('/admin/produk/create',[ProdukController::class, 'create'])->name('produk-create');
        Route::post('/admin/produk/store',[ProdukController::class, 'store'])->name('produk-store');

        Route::get('/admin/kategori',[AdminController::class, 'kategori'])->name('admin-kategori');
        Route::post('/admin/kategori/store',[KategoriController::class, 'store'])->name('kategori-store');
        Route::post('/admin/kategori/update{id}',[KategoriController::class, 'update'])->name('kategori-update');
        Route::post('/admin/kategori/delete{id}',[KategoriController::class, 'delete'])->name('kategori-delete');

        Route::get('/admin/toko',[AdminController::class, 'toko'])->name('admin-toko');
        Route::get('/admin/toko/create',[TokoController::class, 'create'])->name('toko-create');
        Route::post('/admin/toko/store',[TokoController::class, 'store'])->name('toko-store');
    });

    Route::get('/admin/logout', [AuthController::class, 'Alogout'])->name('admin-logout');

    Route::middleware( ['member'])->group( function(){
        Route::get('/produk',[ProdukController::class, 'index'])->name('produk');

    });


