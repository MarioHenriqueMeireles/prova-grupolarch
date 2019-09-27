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
    return view('welcome');
});

Route::get('/clientes', 'CustomerSearchesController@index')->name('list-customer');
Route::get('/cliente/novo', 'CustomersController@create')->name('customer-create');
Route::get('/cliente/atualizar/{id}', 'CustomersController@edit')->name('edit-customer');
Route::put('/cliente/update/{id}', 'CustomersController@update')->name('update-customer');
Route::get('/cliente/{id}', 'CustomerSearchesController@show')->name('show-customer');
Route::post('/cliente/novo', 'CustomersController@store')->name('store-customer');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
