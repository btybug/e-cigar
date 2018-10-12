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
    Route::post('/create', 'Admin\RolesController@postCreate')->name('post_admin_create_role');
    Route::get('/edit/{id}', 'Admin\RolesController@edit')->name('admin_edit_role');
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

Route::post('/create', function ($locale = null) {
    $article = new \App\Models\Posts();
    $article->online = true;
    $article->save();

    foreach (['en', 'nl', 'fr', 'de'] as $locale) {
        $article->translateOrNew($locale)->info = "Info {$locale}";
        $article->translateOrNew($locale)->product_name = "Product name {$locale}";
        $article->translateOrNew($locale)->short_description = "Short Description {$locale}";
        $article->translateOrNew($locale)->long_description = "Long Description {$locale}";
        $article->translateOrNew($locale)->status = "Status";
        $article->translateOrNew($locale)->status = "Tags";
    }

    $article->save();

    echo 'Created an article with some translations!';
})->name('admin_new_post');

Route::get('{locale}', function($locale) {
    app()->setLocale($locale);

    $article = Article::first();

    return view('admin.blog.index')->with(compact('article'));
});


//MEDIA


//Route::get('/media', 'Admin\Media\IndexController@index')->name('admin_media');
Route::get('/media', 'Admin\Media\IndexController@index')->name('admin_media');
Route::get('/settings', 'Admin\Media\IndexController@getSettings')->name('admin_media_settinds');
Route::post('/settings', 'Admin\Media\IndexController@postSettings');


