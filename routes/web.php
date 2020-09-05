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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'metrikaApi@widgets');
Route::get('/home', 'metrikaApi@widgets');
Route::get('customers', 'CustomersController@index');
Route::get('orders', 'OrderController@index');

Route::get('metrica', 'metrikaApi@show');