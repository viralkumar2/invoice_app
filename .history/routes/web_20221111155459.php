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

Route::get('admin_dashboard','Admin\AdminController@admin_dashboard')->name('admin_dashboard');
// admin