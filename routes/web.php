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
Route::get('/send-mail', function () {


    $user = App\User::find(1);
    $product = \App\Models\Posts::find(1);

// $user->comment(Commentable $model, $comment = '', $rate = 0);
    $user->comment($product, 'Lorem ipsum ..', 3);
    dd($product->comments);
//
//// approve it -- if you are admin or you don't use mustBeApproved option, it is not necessary
//    $product->comments[0]->approve();
//
//// get avg rating -- it calculates approved average rate.
//    $product->averageRate();
//
//// get total comment count -- it calculates approved comments count.
//    $product->totalCommentCount();
});

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'Frontend\BlogController@index')->name('blog');
    Route::get('/{post_id}', 'Frontend\BlogController@getSingle')->name('blog_post');
});

Route::get('/forum', 'Frontend\ForumController@index')->name('forum');
Route::get('/shop', 'Frontend\ShopController@index')->name('shop');
Route::get('/my-cart', 'Frontend\ShopController@getCart')->name('shop_my_cart');

Route::group(['prefix' => 'my-account','middleware' => ['auth','verified']], function () {
    Route::get('/', 'Frontend\UserController@index')->name('my_account');
    Route::get('/logs', 'Frontend\UserController@getLogs')->name('my_account_logs');
    Route::get('/password', 'Frontend\UserController@getPassword')->name('my_account_password');
    Route::get('/favourites', 'Frontend\UserController@getFavourites')->name('my_account_favourites');
    Route::get('/address', 'Frontend\UserController@getAddress')->name('my_account_address');
    Route::post('/address', 'Frontend\UserController@postAddress')->name('post_my_account_address');
    Route::get('/orders', 'Frontend\UserController@getOrders')->name('my_account_orders');
    Route::get('/tickets', 'Frontend\UserController@getTickets')->name('my_account_tickets');
    Route::get('/verification', 'Frontend\UserController@getVerification')->name('my_account_verification');
    Route::post('/verification', 'Frontend\UserController@postVerification')->name('post_my_account_verification');
    Route::get('/payments', 'Frontend\UserController@getPayments')->name('my_account_payment');
});
