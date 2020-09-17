<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\dateFormatWeb;
use App\Http\Middleware\dateFormatAdmin;
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
//поддомены
// Route::middleware(dateFormatWeb::class)
//     ->group(array('domain' => '{account}.'.config('app.name')), function() {

//         Route::get('/', 'HomeController@indexCity');

//         Route::get('mesters/{id}', function($account, $id) {
//             // ...
//         //return Redirect::to('https://www.myapp.com'.'/'.$account);
//     });
    
//     Route::get('/test/', function($account) {
//         return $account.'___1111';
//     });

//     Route::get('/test2/', function($account) {
//         return $account.'___2222';
//     });
// });


Route::middleware(dateFormatWeb::class)->group(function () {
        Route::get('/test/', function() {
            return '___1111';
        });
        
        Route::get('/test2/', function() {
            return '___2222';
        });
        
        Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function () {

    Route::get( '/', 'DashboardController@index' )->name('admin.index');
    Route::resource( '/category', 'CategoryController', ['as'=>'admin'] );
    
});

// Route::get('/home', 'metrikaApi@widgets');
// Route::get('customers', 'CustomersController@index');
// Route::get('orders', 'OrderController@index');

// Route::get('metrica', 'metrikaApi@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
