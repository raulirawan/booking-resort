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


    // CRUD OBJEK WISATA
    Route::get('objek/wisata', 'Admin\ObjekWisataController@index')->name('admin.objek.wisata.index');
    Route::post('objek/wisata/create', 'Admin\ObjekWisataController@store')->name('admin.objek.wisata.store');
    Route::post('objek/wisata/update/{id}', 'Admin\ObjekWisataController@update')->name('admin.objek.wisata.update');
    Route::get('objek/wisata/delete/{id}', 'Admin\ObjekWisataController@delete')->name('admin.objek.wisata.delete');

    // // Transaksi
    // Route::get('transaksi', 'Admin\TransaksiController@index')->name('admin.transaksi.index');
    // Route::get('transaksi/detail/{id}', 'Admin\TransaksiController@detail')->name('admin.transaksi.detail');
    // Route::post('transaksi/update/{id}', 'Admin\TransaksiController@update')->name('admin.transaksi.update');
    // Route::post('transaksi/update/resi/{id}', 'Admin\TransaksiController@updateResi')->name('admin.transaksi.update.resi');
});
