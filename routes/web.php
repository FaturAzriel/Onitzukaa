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
    return view('datang');
});


Route::get('/detail-product','CustomerController@upload');

Route::post('/customer/storeupload','CustomerController@storeupload');

// EKSPORT TO PDF
Route::get('/sepatu', 'SepatuController@index');
Route::get('/sepatu/cetak_pdf/{id}', 'SepatuController@cetak_pdf');

// VIEW AJA
Route::get('/thank-you','CustomerController@thankyou');

Route::get('/confirm-order','CustomerController@confirm');

Route::get('/pesanan','AdminController@pesanan');


// INPUT
Route::get('/tambahukuran','AdminController@tambahukuran');

Route::get('/admin/tambahukuran','AdminController@tambahukuran');

Route::post('/admin/storeukuran','AdminController@storeukuran');


// HAPUS
Route::get('/admin/hapuspesanan/{id}','AdminController@hapuspesanan');





// CHAINED 
// Route::get('detail-product',array('as'=>'myform','uses'=>'CustomerController@myform'));
// Route::get('detail-product/ajax/{id}',array('as'=>'myform.ajax','uses'=>'CustomerController@myformAjax'));

Route::get('/detail-product','DynamicDependent@index');

Route::post('detail-product/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
