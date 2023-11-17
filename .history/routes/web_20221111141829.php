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
Route::get('product_delete/{id}','Admin\AdminController@product_delete')->name('product_delete');


Route::get('admin_dashboard','Admin\AdminController@admin_dashboard')->name('admin_dashboard');
// admin