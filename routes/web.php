<?php

use App\Http\Controllers\BerandaUserController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\Homeadmin;
use App\Http\Controllers\Homemanajer;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\VideoController;
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
// Route::get("/", [LayoutController::class,"index"])->middleware("auth");
// Route::get("/home", [LayoutController::class,"index"])->middleware("auth");

// Route::controller(LoginController::class)->group(function(){
//     Route::get("login",'index')->name('login');
//     Route::post('login/proses','proses');
//     Route::get('logout','logout');
//     Route::get('register','registerpage');
//     Route::post('register','register');

// Route::get('login', [LoginController::class, 'index'])->name('login');

// Route::get('/', [LayoutController::class, 'index']);
Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

// Route::get('/', function () {
//     return redirect('/user/beranda');
// })->middleware('auth');

// Route::get('/home', function () {
//     return redirect('/user/beranda');
// })->middleware('auth');



Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

Route::get('/', [BerandaUserController::class, 'index'])->name('index');
Route::get('/get-products', [ProdukController::class, 'getProductsByCategory']);
Route::get('/user/produkuser', [ProdukController::class, 'produkuser'])->name('produkuser');
Route::get('/user/produkterbaru', [ProdukController::class, 'produkterbaru'])->name('produkterbaru');


Route::get('/user/kritiksaran', [KritikSaranController::class, 'index'])->name('index');
Route::POST('/simpan-kritik-saran', [KritikSaranController::class, 'store'])->name('simpanKritikSaran');
// Route::post('/simpan-kritik-saran', 'KritikSaranController@store')->name('simpanKritikSaran');

// detail produk
// Route::get('/produk/{id}', [ProdukController::class, 'detailProduk'])->name('detail.produk');
Route::get('/produk/{id}', [ProdukController::class, 'detailProduk'])->name('detail.produk');

Route::get('/user/tentangkami', [BerandaUserController::class, 'tentangkami'])->name('tentangkami');
Route::get('/user/vip', [BerandaUserController::class, 'vip'])->name('vip');
Route::get('/user/promo', [BerandaUserController::class, 'promo'])->name('promo');
Route::get('/user/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/galeri/modal/{id}', [GaleriController::class, 'showModal'])->name('showVideoModal');
Route::get('/promosi/{id}', [PromosiController::class, 'showdetailpromosi'])->name('promosi.showdetailpromosi');



Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:admin']], function () {
        Route::resource('produk', ProdukController::class);
        Route::resource('promosi', PromosiController::class);
        Route::resource('video', VideoController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::resource('kritiksaran', KritikSaranController::class);

        Route::get('/admin/deleteKritiksaran/{id}', [KritikSaranController::class, 'destroy'])->name('deleteKritiksaran');
        Route::get('/admin/kritiksaran', [KritikSaranController::class, 'tampil'])->name('tampilKritiksaran');


        // Route::resource('laporan', LaporanController::class);
        Route::get('/laporan', [LaporanController::class, 'adminIndex'])->name('laporan.penjualan.admin');

        // CRUD kategori
        Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
        Route::get('/admin/addKategori', [KategoriController::class, 'addKategori'])->name('addKategori');
        Route::POST('/admin/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/admin/editKategori/{id}', [KategoriController::class, 'show'])->name('editKategori');
        Route::PUT('/admin/updateKategori/{id}', [KategoriController::class, 'update'])->name('updateKategori');
        Route::get('/admin/deleteKategori/{id}', [KategoriController::class, 'destroy'])->name('deleteKategori');


        // CRUD produk
        Route::get('/admin/addProduk', [ProdukController::class, 'addProduk'])->name('addProduk');
        Route::POST('/admin/addData', [ProdukController::class, 'store'])->name('addData');
        Route::get('/admin/editProduk/{id}', [ProdukController::class, 'show'])->name('editProduk');
        Route::PUT('/admin/updateProduk/{id}', [ProdukController::class, 'update'])->name('updateProduk');
        Route::get('/admin/deleteProduk/{id}', [ProdukController::class, 'destroy'])->name('deleteProduk');

        // CRUD promosi
        Route::get('/admin/addPromosi', [PromosiController::class, 'addPromosi'])->name('addPromosi');
        Route::POST('/admin/addDatapromosi', [PromosiController::class, 'store'])->name('addDatapromosi');
        Route::get('/admin/editPromosi/{id}', [PromosiController::class, 'show'])->name('editPromosi');
        Route::PUT('/admin/updatePromosi/{id}', [PromosiController::class, 'update'])->name('updatePromosi');
        Route::get('/admin/deletePromosi/{id}', [PromosiController::class, 'destroy'])->name('deletePromosi');
        Route::post('/admin/delete/produkPromosi', [PromosiController::class, 'destroyProduk'])->name('deletePromosiProduk');

        // CRUD transaksi
        Route::get('/admin/addTransaksi', [TransaksiController::class, 'addTransaksi'])->name('addTransaksi');
        Route::post('/admin/transaksi/getProdukPromosi', [TransaksiController::class, 'getProdukPromosi'])->name('getProdukPromosi');
        Route::POST('/admin/addDataTransaksi', [TransaksiController::class, 'store'])->name('addDataTransaksi');
        Route::get('/admin/editTransaksi/{id}', [TransaksiController::class, 'show'])->name('editTransaksi');
        Route::get('/admin/viewTransaksi/{id}', [TransaksiController::class, 'view'])->name('viewTransaksi');
        Route::POST('/admin/updateTransaksi/{id}', [TransaksiController::class, 'update'])->name('updateTransaksi');
        Route::get('/admin/deleteTransaksi/{id}', [TransaksiController::class, 'destroy'])->name('deleteTransaksi');

        // CRUD VIDEO
        Route::get('/admin/addVideo', [VideoController::class, 'addVideo'])->name('addVideo');
        Route::POST('/admin/addDataVideo', [VideoController::class, 'store'])->name('addDataVideo');
        Route::get('/admin/editVideo/{id}', [VideoController::class, 'show'])->name('editVideo');
        Route::PUT('/admin/updateVideo/{id}', [VideoController::class, 'update'])->name('updateVideo');
        Route::get('/admin/deleteVideo/{id}', [VideoController::class, 'destroy'])->name('deleteVideo');
    });

    Route::group(['middleware' => ['cekUserLogin:manajer']], function () {
        // Route::resource('pegawai',LoginController::class);
        Route::get('/manajer/pegawai', [PegawaiController::class, 'index'])->name('pegawai');

        Route::get('/manajer/addPegawai', [PegawaiController::class, 'addPegawai'])->name('addPegawai');
        Route::POST('/manajer/addDataPegawai', [PegawaiController::class, 'store'])->name('addDataPegawai');
        Route::get('/manajer/editPegawai/{id}', [PegawaiController::class, 'show'])->name('editPegawai');
        Route::PUT('/manajer/updatePegawai/{id}', [PegawaiController::class, 'update'])->name('updatePegawai');
        Route::get('/manajer/deletePegawai/{id}', [PegawaiController::class, 'destroy'])->name('deletePegawai');
        // Route::resource('laporan', LaporanController::class);
        Route::get('/manajer/laporanPenjualan', [LaporanController::class, 'index'])->name('laporan.penjualan');
        Route::get('/manajer/laporanPromosi', [LaporanController::class, 'promosi'])->name('laporan.promosi');
        Route::get('/manajer/kritiksaran', [KritikSaranController::class, 'tampilmanajer'])->name('tampilKritiksaran');

        // // CRUD PEGAWAI
        // Route::get('/manajer/addPegawai', [LoginController::class, 'addPegawai']) -> name('addPegawai');
        // Route::POST('/manajer/addData', [LoginController::class, 'store']) -> name('addData');
        // Route::get('/manajer/editPegawai/{id}', [LoginController::class, 'edit']) -> name('editPegawai');
        // Route::PUT('/manajer/updatePegawai/{id}', [LoginController::class, 'perbarui']) -> name('updatePegawai');
        // Route::get('/manajer/deletePegawai/{id}', [LoginController::class, 'hapus'])->name('deletePegawai');
    });
});
