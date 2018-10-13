<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:09
 */

Route::get('/', 'Admin\AdminController@getDashboard')->name('admin_dashboard');

Route::group(['prefix' => 'languages'], function () {
    Route::get('/', 'Admin\SettingsController@getLanguages')->name('admin_settings_languages');
    Route::get('/new', 'Admin\SettingsController@getLanguagesNew')->name('admin_settings_languages_new');
    Route::get('/edit/{id}', 'Admin\SettingsController@getEditLanguages')->name('admin_settings_languages_edit');
});


Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'Admin\UserController@index')->name('admin_users');
    Route::get('/edit/{id}', 'Admin\UserController@edit')->name('admin_users_edit');

    Route::group(['prefix' => 'roles-mebership'], function () {
        Route::get('/', 'Admin\RolesController@index')->name('admin_role_membership');
        Route::get('/create', 'Admin\RolesController@create')->name('admin_create_role');
        Route::post('/create', 'Admin\RolesController@postCreate')->name('post_admin_create_role');
        Route::get('/edit/{id}', 'Admin\RolesController@edit')->name('admin_edit_role');
        Route::post('/edit', 'Admin\RolesController@postEdit')->name('post_admin_edit_role');
    });
});
Route::group(['prefix' => 'store'], function () {
    Route::get('/', 'Admin\StoreController@index')->name('admin_store');
    Route::get('/new', 'Admin\StoreController@newProduct')->name('admin_store_new');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'Admin\StoreController@getCategories')->name('admin_store_categories');
        Route::post('/get-form', 'Admin\StoreController@postCategoryForm')->name('admin_store_categories_form');
        Route::post('/update-parent', 'Admin\StoreController@postCategoryUpdateParent')->name('admin_store_categories_update_parent');
        Route::post('/create-or-update', 'Admin\StoreController@postCreateOrUpdateCategory')->name('admin_store_categories_new_or_update');
        Route::post('/delete', 'Admin\StoreController@postDeleteCategory')->name('admin_store_categories_delete');
    });
});


Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'Admin\BlogController@index')->name('admin_blog');
    Route::get('/create', 'Admin\BlogController@create')->name('admin_blog_create');
    Route::get('/edit/{id}', 'Admin\BlogController@edit')->name('admin_blog_edit');
});

Route::group(['prefix' => 'orders'], function () {
    Route::get('/', 'Admin\OrdersController@index')->name('admin_orders');
});

Route::group(['prefix' => 'inventory'], function () {
    Route::get('/stock', 'Admin\InventoryController@stock')->name('admin_stock');
});

Route::get('/forum', 'Admin\ForumController@index')->name('admin_forum');
Route::get('/tickets', 'Admin\TicketsController@index')->name('admin_tickets');

Route::group(['prefix' => '/tools'], function () {
    Route::get('/', 'Admin\ToolsController@index')->name('admin_tools');
    Route::get('/tags', 'Admin\ToolsController@getTags')->name('admin_tools_tags');
});

Route::post('/create-new', 'Admin\PostController@newPost')->name('admin_new_post');
Route::get('/delete/{id}', 'Admin\PostController@delete')->name('admin_post_delete');
Route::get('/edit/{id}', 'Admin\PostController@edit')->name('admin_post_edit');

//Route::get('{locale}', function($locale) {
//    app()->setLocale($locale);
//
//    $article = Article::first();
//
//    return view('admin.blog.index')->with(compact('article'));
//});


//MEDIA


//Route::get('/media', 'Admin\Media\IndexController@index')->name('admin_media');
Route::get('/media', 'Admin\Media\IndexController@index')->name('admin_media');
Route::get('/settings', 'Admin\Media\IndexController@getSettings')->name('admin_media_settinds');
Route::post('/settings', 'Admin\Media\IndexController@postSettings')->name('post_admin_media_settings');


