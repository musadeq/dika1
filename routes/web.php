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



Auth::routes();

Route::get('/', 'HomeController@index');

Route::resource('purchases', 'PurchaseController');

Route::resource('uploads', 'UploadController');
Route::post('uploads/import/{id}', 'UploadController@import')->name('uploads.import');

Route::get('sales/ids-by-code', 'SaleController@getIdsByCode')->name('sales.code.all');
Route::resource('sales', 'SaleController');

Route::resource('audits', 'AuditController');

Route::resource('stock', 'StockController');