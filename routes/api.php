<?php

use Illuminate\Http\Request;

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


Route::middleware('auth:api')->group(function () {
    Route::get('/user','ShopController@getUser');
    Route::get('/shops', 'ShopController@getShop');
    Route::post('/get-settings', 'ShopController@getSettings');
//    Route::middleware('shopping',function (){
    Route::post('/items', 'ItemsController@getItems');
    Route::post('/categories', 'ItemsController@getCategories');
    Route::post('/get-basket-number', 'OrdersController@getBasketNumber');
    Route::post('/finish-order','OrdersController@FinishOrder');
    Route::post('/add-to-basket', 'OrdersController@addItemToBasked');
    Route::post('/remove-from-basket', 'OrdersController@removeFromBasked');
    Route::post('/get-baskets', 'OrdersController@getBaskets');
    Route::post('/get-basket', 'OrdersController@getBasket');
    Route::post('/get-authorize', 'OrdersController@getAuthorize');
    Route::post('/close-basket', 'OrdersController@getCloseBasket');
    Route::post('/get-admin-discounts', 'OrdersController@getAdminDiscounts');
    Route::post('/get-offer-discounts', 'OrdersController@getOfferDiscounts');
    Route::post('/add-admin-discounts', 'OrdersController@addAdminDiscounts');

    });
