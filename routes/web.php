
<?php

use App\Http\Controllers\CabangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StokMasukController;
use App\Http\Controllers\StokKeluarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {
    // Index dan create stok keluar (untuk kebutuhan navigasi dan tampilan lama)
    Route::get('stok-keluar', [StokKeluarController::class, 'index'])->name('stok-keluar.index');
    Route::get('stok-keluar/create', [StokKeluarController::class, 'createStep1'])->name('stok-keluar.create');

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::controller(KurirController::class)->prefix('kurir')->name('kurir.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{kurir}/edit', 'edit')->name('edit');
        Route::put('{kurir}', 'update')->name('update');
        Route::delete('{kurir}', 'destroy')->name('destroy');
    });

    // Stok Masuk
    Route::resource('stok-masuk', StokMasukController::class)->except(['show']);

    // Stok Keluar Multi Step
    Route::get('stok-keluar/create-step1', [StokKeluarController::class, 'createStep1'])->name('stok-keluar.create-step1');
    Route::post('stok-keluar/create-step1', [StokKeluarController::class, 'postStep1'])->name('stok-keluar.create-step1.post');
    Route::get('stok-keluar/create-step2', [StokKeluarController::class, 'createStep2'])->name('stok-keluar.create-step2');
    Route::post('stok-keluar/add-barang', [StokKeluarController::class, 'addBarang'])->name('stok-keluar.add-barang');
    Route::post('stok-keluar/store', [StokKeluarController::class, 'store'])->name('stok-keluar.store');
    Route::delete('stok-keluar/remove-barang/{id}', [StokKeluarController::class, 'removeBarang'])->name('stok-keluar.remove-barang');
    Route::delete('stok-keluar/{id}', [StokKeluarController::class, 'destroy'])->name('stok-keluar.destroy');
    Route::post('stok-keluar/clear-cart', [StokKeluarController::class, 'clearCart'])->name('stok-keluar.clear-cart');

    // Laporan Stok
    Route::get('laporan/stok', [\App\Http\Controllers\LaporanStokController::class, 'index'])->name('laporan.stok');

    Route::controller(BarangController::class)->prefix('barang')->name('barang.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{barang}/edit', 'edit')->name('edit');
        Route::put('{barang}', 'update')->name('update');
        Route::delete('{barang}', 'destroy')->name('destroy');
    });

    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{user}/edit', 'edit')->name('edit');
        Route::put('{user}', 'update')->name('update');
        Route::delete('{user}', 'destroy')->name('destroy');
    });

    Route::controller(CabangController::class)->prefix('cabang')->name('cabang.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{cabang}/edit', 'edit')->name('edit');
        Route::put('{cabang}', 'update')->name('update');
        Route::delete('{cabang}', 'destroy')->name('destroy');
    });

    Route::controller(RoleController::class)->prefix('roles')->name('roles.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{role}/edit', 'edit')->name('edit');
        Route::put('{role}', 'update')->name('update');
        Route::delete('{role}', 'destroy')->name('destroy');
    });

    Route::controller(SupplierController::class)->prefix('supplier')->name('supplier.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{supplier}/edit', 'edit')->name('edit');
        Route::put('{supplier}', 'update')->name('update');
        Route::delete('{supplier}', 'destroy')->name('destroy');
    });

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});
// Dashboard Kurir: Tugas Pengiriman Saya
Route::get('kurir/tugas', [StokKeluarController::class, 'tugasKurir'])->name('kurir.tugas')->middleware('role:kurir');
