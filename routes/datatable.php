<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:09
 */

Route::group(['prefix'=>'datatables'],function(){
    Route::get('/users/get-all','Admin\DatatableController@getAllUsers')->name('datatable_all_users');
    Route::get('/users/staff','Admin\DatatableController@getAllStaff')->name('datatable_all_staff');
    Route::get('/store/categories/get-all','Admin\DatatableController@getAllCategories')->name('datatable_all_categories');
    Route::get('/store/products/get-all','Admin\DatatableController@getAllProducts')->name('datatable_all_products');
    Route::get('/store/attributes/get-all','Admin\DatatableController@getAllAttributes')->name('datatable_all_attributes');
    Route::get('/roles/get-all','Admin\DatatableController@getAllRoles')->name('datatable_all_roles');
    Route::get('/mail-templates/get-all','Admin\DatatableController@getAllMailTemplates')->name('datatable_all_mail_templates');
    Route::get('/email/get-all','Admin\DatatableController@getAllEmails')->name('datatable_all_emails');
    Route::get('/blog/get-all','Admin\DatatableController@getAllPosts')->name('datatable_all_posts');
    Route::get('/coupons/get-all','Admin\DatatableController@getAllCoupons')->name('datatable_all_coupons');
    Route::get('/blog/comments/get-all','Admin\DatatableController@getAllPostComments')->name('datatable_all_post_comments');
    Route::get('/stock/get-all','Admin\DatatableController@getAllStocks')->name('datatable_all_stocks');
    Route::get('/settings/get-all-geo-zones','Admin\DatatableController@getAllGeoZones')->name('datatable_all_geo_zones');
});


