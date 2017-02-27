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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/home', 'HomeController@index');

//products
Route::get('/loadProduct', 'ProductController@loadProduct');


//View
Route::get('/gmaps', 'MapController@gmaps');


Route::get('/realtimeDb', 'MapController@real');