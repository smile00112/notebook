<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articles', 'API\ArticlesController@index');

Route::get('/metrica', 'metrikaApi@show');

//Аунтентификация / Регистрация
Route::prefix('user')->group(function () {

    Route::post('send_sms', 'API\UserController@send_code');
    Route::post('registration', 'API\UserController@register');
    Route::post('loginwc', 'API\UserController@login_without_code');
    Route::post('login', 'API\UserController@login');
    Route::post('kontur', 'API\UserController@kontur_request');	

});

Route::get('/dashboard2', function() {
    return 'Добро пожаловать, Менеджер проекта';
 });

Route::group(['middleware' => 'role:project-manager'], function() {
    Route::get('/dashboard', function() {
       return 'Добро пожаловать, Менеджер проекта';
    });
 });
