<?php


Route::group(['prefix' => 'discounts'], function () {
    Route::get('/', 'Customers\DiscountController@index')->name('app_customer_discounts');
    Route::get('/create', 'Customers\DiscountController@create')->name('app_customer_discounts_create');
    Route::get('/edit/{id}', 'Customers\DiscountController@edit')->name('app_customer_discounts_edit');
    Route::post('/create', 'Customers\DiscountController@postCreate')->name('app_customer_discounts_create_post');
    Route::post('/edit/{id}', 'Customers\DiscountController@postEdit')->name('app_customer_discounts_edit_post');

    Route::get('/offers', 'Customers\DiscountController@offers')->name('app_customer_offers');
    Route::get('/offers/create', 'Customers\DiscountController@offersCreate')->name('app_customer_offers_create');
    Route::get('/offers/edit/{id}', 'Customers\DiscountController@offersEdit')->name('app_customer_offers_edit');
    Route::post('/offers/create', 'Customers\DiscountController@postOffersCreate')->name('app_customer_offers_create_post');
    Route::post('/offers/edit/{id}', 'Customers\DiscountController@postOffersEdit')->name('app_customer_offers_edit_post');
});
