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

//Route::get('/', function () {
//    return view('welcome');
//});
/* Route Model Binding */
Route::model('product','App\Product');
Route::model('laporan','App\Transaction');


/* Route Untuk Pengunjung */
Route::get('/', 'TokoController@index');

Route::get('/product/{id}/show',['as' => 'product.show','uses' => 'TokoController@showItem']);

Route::get('product/cart/{id}', 'TokoController@tambahItem');

Route::get('cart/delete/{id}' , 'TokoController@hapusItem');

Route::get('cart/checkout', 'TokoController@checkout');

Route::post('/cart/{form_id}/save',['as' => 'pelanggan.save','uses' => 'TokoController@savePelanggan']);

/* Route Untuk Administrator */
Route::get('/dashboard', function()
	{
		return view('toko.admin.home');
	}); 
Route::resource('dashboard/product', 'AdminProductController');
Route::get('dashboard/laporan', 'AdminLaporanController@index');
Route::post('dashboard/laporan/periode',['as' => 'laporan.show','uses' => 'AdminLaporanController@getPeriode']);
