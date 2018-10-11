<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:09
 */


Route::get('/', 'Admin\AdminController@getDashboard')->name('admin_dashboard');
Route::get('/languages', 'Admin\SettingsController@getLanguages')->name('admin_settings_languages');
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
Route::group(['prefix' => 'roles-mebership'], function () {
    Route::get('/', 'Admin\RolesController@index')->name('admin_role_membership');
    Route::get('/create', 'Admin\RolesController@create')->name('admin_create_role');
    Route::get('/edit/{id}', 'Admin\RolesController@edit')->name('admin_edit_role');
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'Admin\BlogController@index')->name('admin_blog');
    Route::get('/create', 'Admin\BlogController@create')->name('admin_blog_create');
    Route::get('/edit/{id}', 'Admin\BlogController@edit')->name('admin_blog_edit');
});

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


