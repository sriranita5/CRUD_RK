<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/produkkeluar', function () {
    return view('produkkeluar');
});

Route::get('/produkmasuk', function () {
    return view('produkmasuk');
});

Route::get('/order', function () {
    return view('order');
});

Route::get('/customer', function () {
    return view('customer');
});

Route::get('/pengiriman', function () {
    return view('/pengiriman');
});


/* Route untuk Produk */
Route::get('/produks', 'App\Http\Controllers\ProdukController@data'); /* memanggil database */
Route::get('produks/add', 'App\Http\Controllers\ProdukController@add'); /* menampilkan form */
Route::post('produks', 'App\Http\Controllers\ProdukController@addProcess');  /* mengirim form */
Route::get('produks/edit/{kode_produk}', 'App\Http\Controllers\ProdukController@edit'); /* mengedit form */
Route::patch('produks/{kode_produk}', 'App\Http\Controllers\ProdukController@editProcess');
Route::delete('produks/{kode_produk}', 'App\Http\Controllers\ProdukController@delete'); /* menghapus form */

/* Route untuk Produk Keluar */
Route::get('/produkkeluar', 'App\Http\Controllers\Produk_KeluarController@data'); /* memanggil database */
Route::get('produkkeluar/add', 'App\Http\Controllers\Produk_KeluarController@add'); /* menampilkan form */
Route::post('produkkeluar', 'App\Http\Controllers\Produk_KeluarController@addProcess');  /* mengirim form */
Route::get('produkkeluar/edit/{id_keluar}', 'App\Http\Controllers\Produk_KeluarController@edit'); /* mengedit form */
Route::patch('produkskeluar/{id_keluar}', 'App\Http\Controllers\Produk_KeluarController@editProcess');
Route::delete('produkkeluar/{id_keluar}', 'App\Http\Controllers\Produk_KeluarController@delete'); /* menghapus form */

/* Route untuk Produk Masuk */
Route::get('/produkmasuk', 'App\Http\Controllers\Produk_MasukController@data'); /* memanggil database */
Route::get('produkmasuk/add', 'App\Http\Controllers\Produk_MasukController@add'); /* menampilkan form */
Route::post('produkmasuk', 'App\Http\Controllers\Produk_MasukController@addProcess'); /* mengirim form */
Route::get('produkmasuk/edit/{id_masuk}', 'App\Http\Controllers\Produk_MasukController@edit'); /* mengedit form */
Route::patch('produkmasuk/{id_masuk}', 'App\Http\Controllers\Produk_MasukController@editProcess');
Route::delete('produkmasuk/{id_masuk}', 'App\Http\Controllers\Produk_MasukController@delete'); /* menghapus form */

/* Route untuk Order */
Route::get('/order', 'App\Http\Controllers\OrderController@data'); /*memanggil database */
Route::get('order/add', 'App\Http\Controllers\OrderController@add'); /* menampilkan form */
Route::post('order', 'App\Http\Controllers\OrderController@addProcess'); /* mengirim form */
Route::get('order/edit/{id_order}', 'App\Http\Controllers\OrderController@edit'); /* mengedit form */
Route::patch('order/{id_order}', 'App\Http\Controllers\OrderController@editProcess');
Route::delete('order/{id_order}', 'App\Http\Controllers\OrderController@delete'); /* menghapus form */

/* Route untuk Customer */
Route::get('/customer', 'App\Http\Controllers\CustomerController@data'); /* memanggil database */
Route::get('customer/add', 'App\Http\Controllers\CustomerController@add'); /* menampilkan form */
Route::post('customer', 'App\Http\Controllers\CustomerController@addProcess'); /* mengirim form */
Route::get('customer/edit/{id_cust}', 'App\Http\Controllers\CustomerController@edit'); /* mengedit form */
Route::patch('customer/{id_cust}', 'App\Http\Controllers\CustomerController@editProcess');
Route::delete('customer/{id_cust}', 'App\Http\Controllers\CustomerController@delete'); /* menghapus form */

/* Route untuk Pengiriman */
Route::get('/pengiriman', 'App\Http\Controllers\PengirimanController@data'); /* memanggil database */
Route::get('pengiriman/add', 'App\Http\Controllers\PengirimanController@add'); /* menampilkan form */
Route::post('pengiriman', 'App\Http\Controllers\PengirimanController@addProcess'); /* mengirim form */
Route::get('pengiriman/edit/{no_pengiriman}', 'App\Http\Controllers\PengirimanController@edit'); /* mengedit form */
Route::patch('pengiriman/{no_pengiriman}', 'App\Http\Controllers\PengirimanController@editProcess');
Route::delete('pengiriman/{no_pengiriman}', 'App\Http\Controllers\PengirimanController@delete'); /* menghapus form */