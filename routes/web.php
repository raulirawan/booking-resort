<?php

use Illuminate\Support\Facades\Route;

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



Route::prefix('admin')
// ->middleware(['admin','auth'])
->group(function () {
    Route::get('dashboard','Admin\DashboardController@index')->name('admin.dashboard.index');

    // CRUD PENGUNJUNG
    Route::get('pengunjung', 'Admin\PengunjungController@index')->name('admin.pengunjung.index');
    Route::post('pengunjung/create', 'Admin\PengunjungController@store')->name('admin.pengunjung.store');
    Route::post('pengunjung/update/{id}', 'Admin\PengunjungController@update')->name('admin.pengunjung.update');
    Route::get('pengunjung/delete/{id}', 'Admin\PengunjungController@delete')->name('admin.pengunjung.delete');

    // CRUD KAMAR
    Route::get('kamar', 'Admin\KamarController@index')->name('admin.kamar.index');
    Route::post('kamar/create', 'Admin\KamarController@store')->name('admin.kamar.store');
    Route::get('kamar/edit/{id}', 'Admin\KamarController@edit')->name('admin.kamar.edit');
    Route::get('kamar/gambar/delete/{id}/{key}', 'Admin\KamarController@deleteGambar')->name('admin.kamar.delete.gambar');
    Route::post('kamar/update/{id}', 'Admin\KamarController@update')->name('admin.kamar.update');
    Route::get('kamar/delete/{id}', 'Admin\KamarController@delete')->name('admin.kamar.delete');


    // // CRUD PRODUK
    // Route::get('produk', 'Admin\ProdukController@index')->name('admin.produk.index');
    // Route::post('produk/create', 'Admin\ProdukController@store')->name('admin.produk.store');
    // Route::post('produk/update/{id}', 'Admin\ProdukController@update')->name('admin.produk.update');
    // Route::delete('produk/delete/{id}', 'Admin\ProdukController@delete')->name('admin.produk.delete');

    // // Transaksi
    // Route::get('transaksi', 'Admin\TransaksiController@index')->name('admin.transaksi.index');
    // Route::get('transaksi/detail/{id}', 'Admin\TransaksiController@detail')->name('admin.transaksi.detail');
    // Route::post('transaksi/update/{id}', 'Admin\TransaksiController@update')->name('admin.transaksi.update');
    // Route::post('transaksi/update/resi/{id}', 'Admin\TransaksiController@updateResi')->name('admin.transaksi.update.resi');
});
