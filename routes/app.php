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
Route::group(['prefix' => 'staff'], function () {
    Route::get('/{id?}', 'Customers\StaffController@getStaff')->name('app_staff');
    Route::post('/manage-staff', 'Customers\StaffController@postCreateStaffMember')->name('app_staff_add');
    Route::get('/view-staff-member/{id}', 'Customers\StaffController@getViewStaffMember')->name('app_staff_view');
    Route::get('/roles', 'Customers\StaffController@getRoles')->name('app_staff_roles');
    Route::get('/manage-role/{id?}', 'Customers\StaffController@getCreateRole')->name('app_staff_roles_create');
    Route::post('/manage-role/{id?}', 'Customers\StaffController@postCreateOrEditRole')->name('app_staff_roles_create');

    Route::get('/add-permission/{id}/{w_id}', 'Customers\StaffController@getStaffPermission')->name('app_staff_add_permission');
    Route::post('/add-permission/{id}/{w_id}', 'Customers\StaffController@postStaffPermission');
    Route::get('/permissions', 'Customers\StaffController@getAppPermissions')->name('app_permissions');

    Route::get('/badge/{id}/{warehouse_id}', 'Customers\StaffController@getAppBadge')->name('app_staff_badge');

});
