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
    return redirect()->route('list-customer');
});

Route::get('/clientes', 'CustomerSearchesController@index')->name('list-customer'); // lista de clientes
//Route::get('/clientes/excluidos', 'CustomerSearchesController@index')->name('customers-deleted'); // lista de clientes excluídos
Route::get('/cliente/novo', 'CustomersController@create')->name('customer-create'); // novo cliente
Route::get('/cliente/atualizar/{id}', 'CustomersController@edit')->name('edit-customer'); // editar cliente
Route::put('/cliente/update/{id}', 'CustomersController@update')->name('update-customer'); //edita cliente
Route::get('/cliente/{id}', 'CustomerSearchesController@show')->name('show-customer'); // exibe dados do cliente
Route::post('/cliente/novo', 'CustomersController@store')->name('store-customer'); // salva um novo cliente
Route::get('/cliente/delete/{id}', 'CustomersController@delete')->name('delete-customer'); // deletar cliente
Route::delete('/cliente/delete/{id}', 'CustomersController@destroy')->name('destroy-customer'); // deleta cliente

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
