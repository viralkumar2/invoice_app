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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product','Admin\ProductsController');
Route::get('product_delete/{id}','Admin\ProductsController@destroy')->name('product_delete');
Route::resource('client','Admin\ClientsController');
Route::get('client_delete/{id}','Admin\ClientsController@destroy')->name('client_delete');




Route::resource('category','Admin\CategoryController');
Route::get('category_delete/{id}','Admin\CategoryController@destroy')->name('category_delete');


Route::resource('setting','Admin\SettingsController');




Route::get('admin_dashboard','Admin\AdminController@admin_dashboard')->name('admin_dashboard');
Route::get('invoice','Admin\AdminController@invoice')->name('invoice');
Route::get('invoice_data','Admin\AdminController@invoice_data')->name('invoice_data');
Route::get('invoice_show','Admin\AdminController@invoice_data')->name('invoice_data');

Route::get('pdfview_download','Admin\AdminController@pdfview_download')->name('pdfview_download');
Route::POST('invoice_submit','Admin\AdminController@invoice_submit')->name('invoice_submit');


// admin