<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:09
 */
Route::get('/users/get-all','Admin\DatatableController@getAllUsers')->name('dt_all_users');

Route::get('/store/categories/get-all','Admin\DatatableController@getAllCategories')->name('dt_all_categories');
Route::get('/roles/get-all','Admin\DatatableController@getAllRoles')->name('dt_all_roles');

