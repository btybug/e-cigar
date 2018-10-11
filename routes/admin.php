<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:09
 */


Route::get('/', 'Admin\AdminController@getDashboard')->name('admin_dashboard');
Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'Admin\UserController@index')->name('admin_users');
    Route::get('/edit/{id}', 'Admin\UserController@edit')->name('admin_users_edit');
});
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
    Route::get('/edit/{id}', 'Admin\RolesController@edit')->name('admin_edit_role');
});
Route::get('/blog', 'Admin\BlogController@index')->name('admin_blog');
Route::get('/forum', 'Admin\ForumController@index')->name('admin_forum');
Route::get('/tickets', 'Admin\TicketsController@index')->name('admin_tickets');

Route::group(['prefix' => 'tools'], function () {
    Route::get('/', 'Admin\ToolsController@index')->name('admin_tools');
    Route::get('/tags', 'Admin\ToolsController@getTags')->name('admin_tools_tags');
});


//MEDIA


//Route::get('/media', 'Admin\Media\IndexController@index')->name('admin_media');
Route::get('/media', 'Admin\Media\IndexController@index')->name('admin_media');
Route::get('/settings', 'Admin\Media\IndexController@getSettings')->name('admin_media_settinds');
Route::post('/settings', 'Admin\Media\IndexController@postSettings');


