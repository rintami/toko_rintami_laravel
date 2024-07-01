<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DetailprodukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailcoController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginuserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LoginkaryawanController;
use App\Http\Controllers\CokaryawanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('CekLoginMiddleware');

Route::resource('dash', DashController::class)->middleware('LoginKarMiddleware');
Route::resource('kategori', KategoriController::class)->middleware('LoginKarMiddleware');
Route::resource('toko', TokoController::class)->middleware('LoginKarMiddleware');
Route::resource('produk', ProdukController::class)->middleware('LoginKarMiddleware');
Route::resource('detailproduk', DetailprodukController::class)->middleware('LoginKarMiddleware');
Route::resource('pelanggan', PelangganController::class)->middleware('LoginKarMiddleware');
Route::resource('karyawan', KaryawanController::class)->middleware('LoginKarMiddleware');
Route::resource('cokaryawan', CokaryawanController::class)->middleware('LoginKarMiddleware');
Route::resource('checkout', CheckoutController::class)->middleware('CekLoginMiddleware');
Route::resource('detailco', DetailcoController::class)->middleware('CekLoginMiddleware');
Route::resource('keranjang', KeranjangController::class)->middleware('CekLoginMiddleware');
Route::resource('shop', ShopController::class)->middleware('CekLoginMiddleware');
Route::resource('cart', CartController::class)->middleware('CekLoginMiddleware');
Route::resource('pesanan', PesananController::class)->middleware('CekLoginMiddleware');
Route::resource('template', PageController::class)->middleware('CekLoginMiddleware');


// Route::post('logincus', 'LoginuserController@logincus')->name('logincus');
Route::post('logincus', [LoginuserController::class, 'logincus'])->name('logincus');
Route::resource('loginuser', LoginuserController::class);
Route::get('logoutuser', [LoginuserController::class, 'logoutuser'])->name('logoutuser')->middleware('CekLoginMiddleware');

Route::post('loginkar', [LoginkaryawanController::class, 'loginkar'])->name('loginkar');
Route::resource('logkaryawan', LoginkaryawanController::class);
Route::get('logoutkaryawan', [LoginkaryawanController::class, 'logoutkaryawan'])->name('logoutkaryawan')->middleware('LoginKarMiddleware');






