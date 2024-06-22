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
});

Route::resource('kategori', KategoriController::class);
Route::resource('toko', TokoController::class);
Route::resource('produk', ProdukController::class);
Route::resource('detailproduk', DetailprodukController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('karyawan', KaryawanController::class);
Route::resource('checkout', CheckoutController::class);
Route::resource('detailco', DetailcoController::class);
Route::resource('keranjang', KeranjangController::class);
Route::resource('shop', ShopController::class);
Route::resource('cart', CartController::class);

// Route::post('logincus', 'LoginuserController@logincus')->name('logincus');
Route::post('logincus', [LoginuserController::class, 'logincus'])->name('logincus');
Route::resource('loginuser', LoginuserController::class);
Route::get('logoutuser', [LoginuserController::class, 'logoutuser'])->name('logoutuser')->middleware('CekLoginMiddleware');






