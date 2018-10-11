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
Route::get('/blog', 'Frontend\BlogController@index')->name('blog');
Route::get('/forum', 'Frontend\ForumController@index')->name('forum');
Route::get('/shop', 'Frontend\ShopController@index')->name('shop');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/my-account', 'Frontend\UserController@index')->name('my_account');
});
