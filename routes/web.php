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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'Frontend\BlogController@index')->name('blog');
    Route::get('/{post_id}', 'Frontend\BlogController@getSingle')->name('blog_post');
});

Route::get('/forum', 'Frontend\ForumController@index')->name('forum');
Route::get('/shop', 'Frontend\ShopController@index')->name('shop');
Route::get('/my-cart', 'Frontend\ShopController@getCart')->name('shop_my_cart');

Route::group(['prefix' => 'my-account','middleware' => ['auth']], function () {
    Route::get('/', 'Frontend\UserController@index')->name('my_account');
    Route::get('/profile', 'Frontend\UserController@getProfile')->name('my_account_profile');
    Route::get('/logs', 'Frontend\UserController@getLogs')->name('my_account_logs');
    Route::get('/password', 'Frontend\UserController@getPassword')->name('my_account_password');
    Route::get('/favourites', 'Frontend\UserController@getFavourites')->name('my_account_favourites');
    Route::get('/address', 'Frontend\UserController@getAddress')->name('my_account_address');
    Route::get('/orders', 'Frontend\UserController@getOrders')->name('my_account_orders');
    Route::get('/tickets', 'Frontend\UserController@getTickets')->name('my_account_tickets');
});
