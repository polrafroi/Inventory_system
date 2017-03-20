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
Route::post('/deleteProduct', 'ProductController@deleteProduct');
Route::post('/editProduct', 'ProductController@editProduct');



//Route::post('/addToList', 'ProductController@addToList');
Route::match(['GET','POST'],'/addToList', 'ProductController@addToList' );

Route::post('/removeToList', 'ProductController@removeToList');

Route::get('/getTemp', 'ProductController@getTemp');


Route::get('/loadPdf', 'PdfController@loadPdf');



//View
Route::get('/gmaps', 'MapController@gmaps');


Route::get('/realtimeDb/{room_id}', 'MapController@real');


Route::get('/chat', 'HomeController@chat');


//ADMIN SECTION
Route::group(['middleware' => 'isAdmin'], function(){
    Route::get('/graphs', 'GraphController@graphs');
});



Route::get('/printReceipt', 'ProductController@printReceipt');
Route::get('/user-ajax'                               ,   'UserController@userAjax');
Route::get('/mobile', 'DashboardController@viewDashboardMobile');

Route::get('/loadUser', 'UserController@loadUser');

Route::post('/addUser', 'UserController@addUser');


Route::get('/dashboard', 'DashboardController@viewProducts');
Route::get('/manageproducts', 'DashboardController@viewManageProducts');
Route::get('/productout', 'DashboardController@viewProductOut');

Route::get('/user', 'DashboardController@viewUsers');



Route::get('/products', 'ProductController@viewProductsMobile');

Route::get('/productin', 'ProductController@viewProductInMobile');

Route::get('/chatmobile', 'DashboardController@viewchatMobile');


