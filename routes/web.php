<?php

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
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function(){
	Route::get('/dashboard', 'MainController@dashboard');
	Route::get('/transaksi-penyewa', 'TransaksiController@penyewa_index')->name('transaksi-penyewa');
	Route::get('/transaksi-proses', 'TransaksiController@pj_index')->name('transaksi-proses');
	Route::get('/produk-penyewa', 'JasController@produkpenyewa')->name('produk-penyewa');
	Route::post('/produk-penyewa/addtransaksi', 'TransaksiController@addTransaksi')->name('addTransaksi');
	Route::resource('jas', 'JasController');
	Route::resource('transaksi', 'TransaksiController');
	Route::resource('py', 'PenyewaController');
	Route::resource('pj', 'PJController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
