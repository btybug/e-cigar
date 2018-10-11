<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:09
 */


Route::get('/', 'Admin\AdminController@getDashboard')->name('admin_dashboard');
Route::get('/users', 'Admin\UserController@index')->name('admin_users');
Route::group(['prefix' => 'store'], function () {
    Route::get('/', 'Admin\StoreController@index')->name('admin_store');
    Route::get('/new', 'Admin\StoreController@newProduct')->name('admin_store_new');
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'Admin\StoreController@getCategories')->name('admin_store_categories');
        Route::get('/new', 'Admin\StoreController@getNewCategory')->name('admin_store_categories_new');
    });
});
Route::group(['prefix' => 'roles'], function () {
    Route::get('/', 'Admin\RolesController@index')->name('admin_roles');

});
Route::get('/blog', 'Admin\BlogController@index')->name('admin_blog');
Route::get('/forum', 'Admin\ForumController@index')->name('admin_forum');
Route::get('/tickets', 'Admin\TicketsController@index')->name('admin_tickets');
Route::get('/tools', 'Admin\ToolsController@index')->name('admin_tools');


//MEDIA


//Route::get('/media', 'Admin\Media\IndexController@index')->name('admin_media');
Route::get('/settings', 'Admin\Media\IndexController@getSettings')->name('admin_media_settinds');
Route::get('/media', 'Admin\MediaController@index')->name('admin_media');
Route::post('/settings', 'Admin\Media\IndexController@postSettings');


