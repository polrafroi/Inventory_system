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


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/', 'WelcomeController@welcome');

Route::get('/home', 'HomeController@index');



//products
Route::get('/loadProduct', 'ProductController@loadProduct');
Route::post('/addProduct', 'ProductController@addProduct');

Route::get('/productout', 'ProductController@productOut');

Route::post('/addToList', 'ProductController@addToList');

Route::get('/getTemp', 'ProductController@getTemp');


Route::get('/loadPdf', 'PdfController@loadPdf');



//View
Route::get('/gmaps', 'MapController@gmaps');


Route::get('/realtimeDb', 'MapController@real');


//ADMIN SECTION
Route::group(['middleware' => 'isAdmin'], function(){
    Route::get('/graphs', 'GraphController@graphs');
});

