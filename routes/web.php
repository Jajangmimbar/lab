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

Auth::routes();

// Route::get('/', 'Home\AlatController@index');
Route::get('/home', 'Home\AlatController@home')->name('home');
Route::get('/daftar-alat', 'Home\AlatController@daftarAlat');
Route::get('/alat', 'Home\AlatController@tambah');
Route::post('alat/tambah', 'Home\AlatController@tambahAlat');
Route::get('alat/detail/{slug?}', 'Home\AlatController@detailAlat');
Route::get('alat/edit/{slug?}', 'Home\AlatController@editAlat');
Route::patch('alat/update/{slug?}', 'Home\ALatController@updateAlat');
Route::post('alat/hapus/{id}', 'Home\AlatController@deleteAlat');
Route::get('service/{id}', 'Home\ServiceController@service');
Route::get('service/tambah/{id}', 'Home\ServiceController@tambahService');
Route::post('service/tambah/{id}', 'Home\ServiceController@addService');
Route::get('service/detail/{slug?}', 'Home\ServiceController@detailService');
Route::get('service/edit/{slug?}', 'Home\ServiceController@editService');
Route::patch('service/update/{slug?}', 'Home\ServiceController@updateService');
Route::get('/cari', 'Home\SearchController@cariAlat');
Route::get('/user', 'Home\AdminController@index');
Route::get('user/tambah', 'Home\AdminController@tambahUser');
Route::post('user/tambah', 'Home\AdminController@postUser');
Route::get('user/detail/{id}', 'Home\AdminController@detailUser');
Route::get('user/edit/{id}', 'Home\AdminController@editUser');
Route::patch('user/update/{id}', 'Home\AdminController@updateUser');
Route::post('user/hapus/{id}', 'Home\AdminController@deleteUser');
Route::get('/riwayat-service', 'Home\AdminController@riwayatPerawatan');
Route::get('alat/print', 'Home\AlatController@printAlat');
Route::get('service/print-all/{id}', 'Home\ServiceController@printAll');
Route::get('service/print-detail/{slug?}', 'Home\ServiceController@printDetail');
Route::get('riwayat-service/print', 'Home\ServiceController@prints');
Route::get('/pinjam-alat', 'Home\PinjamController@pinjam');
Route::post('/pinjam-alat', 'Home\PinjamController@addPinjaman');
Route::get('/riwayat-peminjaman', 'Home\PinjamController@riwayatPinjam');
Route::get('riwayat-peminjaman/print', 'Home\PinjamController@printRiwayat');
Route::get('riwayat-peminjaman/print/{id}', 'Home\PinjamController@printRiwayat');
Route::get('riwayat-peminjaman/update-status/{id}', 'Home\PinjamController@statusPinjaman');
Route::patch('riwayat-peminjaman/update-status/{id}', 'Home\PinjamController@updateStatus');