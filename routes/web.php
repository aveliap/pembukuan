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

Route::get('Cust', 'HomeController@index')->name('cust');

// Route::get('home', 'HomeController@index');
// Route::middleware(['Role:admin'])->group(function() {
  Route::get('Cust', 'CustomerController@index')->name('Cust.index');
  Route::get('Cust/create', 'CustomerController@create')->name('Cust.create');
  Route::post('Cust', 'CustomerController@store')->name('Cust.store');
  Route::get('Cust/{Cust}', 'CustomerController@show')->name('Cust.show');
  Route::get('Cust/{Cust}/edit', 'CustomerController@edit')->name('Cust.edit');
  Route::put('Cust/{Cust}', 'CustomerController@update')->name('Cust.update');
  Route::delete('Cust/{Cust}', 'CustomerController@destroy')->name('Cust.destroy');



// });
Route::get('LapMasuk_pdf', 'LaporanMasukController@cetak_pdf');// baru
Route::get('LapKeluar_pdf', 'LaporanKeluarController@cetakKeluar_pdf');// baru
Route::resource('LapMasuk', 'LaporanMasukController');// baru
Route::resource('LapKeluar', 'LaporanKeluarController');// baru
Route::resource('Transaksi', 'TransaksiController');
Route::resource('Pengeluaran', 'PengeluaranController');
Route::resource('Laundry', 'LaundryController');
Route::resource('Tipe', 'TipeController');
Route::get('/get/details/{id}', 'TransaksiController@getDetails')->name('getDetails');
