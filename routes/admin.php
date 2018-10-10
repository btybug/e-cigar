<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:09
 */


Route::get('/', 'Admin\AdminController@getDashboard')->name('admin_dashboard');
Route::get('/users', 'Admin\BlogController@index')->name('admin_users');
Route::get('/store', 'Admin\BlogController@index')->name('admin_store');
Route::get('/blog', 'Admin\BlogController@index')->name('admin_blog');
Route::get('/forum', 'Admin\BlogController@index')->name('admin_forum');
Route::get('/tickets', 'Admin\BlogController@index')->name('admin_tickets');
Route::get('/tools', 'Admin\BlogController@index')->name('admin_tools');


//MEDIA


Route::get('/media', 'Admin\Media\IndexController@index')->name('admin_media');
Route::get('/settings', 'Admin\Media\IndexController@getSettings')->name('admin_media_settinds');
Route::post('/settings', 'Admin\Media\IndexController@postSettings');


