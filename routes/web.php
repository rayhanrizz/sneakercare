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

Route::get('/','FrontController@index');

Auth::routes();
Route::get('signout', ['as' => 'auth.signout', 'uses' => 'Auth\loginController@signout']);

Route::group(['middleware' => 'auth'], function(){
	Route::get('dashboard', 'DashboardController@index');
	Route::resource('fasilitas','FasilitasController');
	Route::resource('layanan','LayananController');
	Route::resource('customer','CustomerController');
	Route::get('export_customer', 'CustomerController@export');
	Route::resource('product','ProductController');
	Route::get('export_product', 'ProductController@export');
	Route::resource('order','OrderController');
	Route::get('export_order', 'OrderController@export');
	Route::resource('antrian','AntrianController');
	Route::resource('jadwal','JadwalController');
	Route::resource('admin','AdminController');
	Route::get('/{id}/print', 'OrderController@cetak_struk');
});
// Route::get('/home', 'HomeController@index')->name('home');
