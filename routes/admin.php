<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:09
 */

Route::get('/', 'Admin\AdminController@getDashboard')->name('admin_dashboard');
Route::get('/menu-manager', function () {
    return view('admin.menu_manager');
});

Route::group(['prefix' => 'settings'], function () {
    Route::group(['prefix' => 'general'], function () {
        Route::get('/', 'Admin\SettingsController@getGeneral')->name('admin_settings_general');
    });
    Route::group(['prefix' => 'store'], function () {
        Route::get('/payment-gateways', 'Admin\SettingsController@getStorePaymentsGateways')->name('admin_settings_payment_gateways');
        Route::get('/payment-gateways/stripe', 'Admin\SettingsController@getStorePaymentsGatewaysSettings')->name('admin_payment_gateways_stripe');
        Route::post('/payment-gateways/stripe', 'Admin\SettingsController@postStorePaymentsGatewaysSettings')->name('post_admin_payment_gateways_stripe');

        Route::get('/payment-gateways/cash', 'Admin\SettingsController@getStorePaymentsGatewaysCash')->name('admin_payment_gateways_cash');
        Route::post('/payment-gateways/cash', 'Admin\SettingsController@postStorePaymentsGatewaysCash')->name('post_admin_payment_gateways_cash');
        Route::group(['prefix' => 'shipping'], function () {
            Route::get('/', 'Admin\SettingsController@getGeoZones')->name('admin_settings_shipping');
            Route::get('/new/{id?}', 'Admin\SettingsController@geoZoneForm')->name('admin_settings_geo_zones_new');
            Route::post('/save-geo-zone/{id?}', 'Admin\SettingsController@saveGeoZone')->name('admin_settings_geo_zone_save');
            Route::post('/search-payment-options', 'Admin\SettingsController@searchPaymentOptions')->name('admin_settings_search-payment-options');
            Route::post('/search-find-region', 'Admin\SettingsController@findRegion')->name('admin_settings_search-find-region');
            Route::post('/find-region', 'Admin\SettingsController@findRegion')->name('admin_store_shipping_zone_region_find');
        });
        Route::group(['prefix' => 'tax-rates'], function () {
            Route::get('/', 'Admin\SettingsController@getTaxRates')->name('admin_settings_tax_rates');
            Route::get('/create-or-update/{id?}', 'Admin\SettingsController@getCreateRate')->name('get_admin_settings_tax_create_or_update');
            Route::post('/create-or-update/{id?}', 'Admin\SettingsController@postCreateOrUpdateTaxRate')->name('post_admin_settings_tax_create_or_update');
            Route::post('/enable', 'Admin\SettingsController@postTaxRatesEnable')->name('post_admin_tax_rate_enable');

        });
        Route::post('/payment-gateways/enable', 'Admin\SettingsController@postStorePaymentsGatewaysEnable')->name('post_admin_payment_gateways_enable');
        Route::group(['prefix' => 'couriers'], function () {
            Route::get('/', 'Admin\SettingsController@getCouriers')->name('admin_settings_couriers');
            Route::get('/edit/{id}', 'Admin\SettingsController@getCouriersEdit')->name('admin_settings_courier_edit');
            Route::post('/save/{id?}', 'Admin\SettingsController@getCouriersSave')->name('admin_settings_courier_save');

            Route::post('/enable', 'Admin\SettingsController@postCouriersEnable')->name('post_admin_couriers_enable');
        });
        Route::get('/delivery-cost', 'Admin\SettingsController@getDeliveryCost')->name('admin_settings_delivery');
        Route::group(['prefix' => 'general'], function () {
            Route::get('/', 'Admin\SettingsController@getGeneral')->name('admin_settings_store');

        });
        Route::group(['prefix' => 'gifts'], function () {
            Route::get('/', 'Admin\SettingsController@getGifts')->name('admin_settings_store_gifts');
            Route::get('/create-or-update/{id?}', 'Admin\SettingsController@getGiftsManage')->name('admin_settings_store_gifts_manage');
            Route::post('/create-or-update/{id?}', 'Admin\SettingsController@postGiftsManage')->name('post_admin_settings_store_gifts_manage');

        });
    });
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', 'Admin\SettingsController@getLanguages')->name('admin_settings_languages');
        Route::get('/new', 'Admin\SettingsController@getLanguagesNew')->name('admin_settings_languages_new');
        Route::post('/new-or-update', 'Admin\SettingsController@postLanguages')->name('admin_settings_languages_new_post');
        Route::get('/delete/{id}', 'Admin\SettingsController@getLanguagesDelete')->name('admin_settings_languages_delete');
        Route::group(['prefix' => 'edit'], function () {
            Route::get('/{id}', 'Admin\SettingsController@getLanguagesEdit')->name('admin_settings_languages_edit');
        });

        Route::post('/get-languages', 'Admin\SettingsController@postLanguageGetWithCode')->name('post_admin_settings_get_languages');
    });
    Route::group(['prefix' => 'emails'], function () {
        Route::get('/', 'Admin\SettingsController@getEmails')->name('admin_emails');
        Route::get('/edit-template/{id?}', 'Admin\SettingsController@getCreateMailTemplates')->name('admin_mail_create_templates');
        Route::post('/edit-template/{id?}', 'Admin\SettingsController@postCreateOrUpdate')->name('    post_admin_mail_create_templates');
    });
});


Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'Admin\UserController@index')->name('admin_customers');
    Route::get('/staff', 'Admin\UserController@showStaff')->name('admin_staff');
    Route::get('/edit/{id}', 'Admin\UserController@edit')->name('admin_users_edit');
    Route::get('/activity/{id}', 'Admin\UserController@getUserActivity')->name('admin_users_activity');

    Route::group(['prefix' => 'roles-mebership'], function () {
        Route::get('/', 'Admin\RolesController@index')->name('admin_role_membership');
        Route::get('/create', 'Admin\RolesController@create')->name('admin_create_role');
        Route::post('/create', 'Admin\RolesController@postCreate')->name('post_admin_create_role');
        Route::get('/edit/{id}', 'Admin\RolesController@edit')->name('admin_edit_role');
        Route::post('/edit', 'Admin\RolesController@postEdit')->name('post_admin_edit_role');
    });
});
Route::group(['prefix' => 'store'], function () {

    Route::group(['prefix' => 'tax-rate'], function () {
        Route::get('/', 'Admin\StoreController@getTaxRate')->name('admin_store_tax');
        Route::post('/', 'Admin\StoreController@postTaxRate')->name('post_admin_store_tax');
    });

    Route::group(['prefix' => 'coupons'], function () {
        Route::get('/', 'Admin\StoreController@getCoupons')->name('admin_store_coupons');
        Route::get('/new', 'Admin\StoreController@getCouponsNew')->name('admin_store_coupons_new');
        Route::get('/delete/{id}', 'Admin\StoreController@Delete')->name('admin_store_coupons_delete');
        Route::get('/edit/{id}', 'Admin\StoreController@Edit')->name('admin_store_coupons_edit');
        Route::post('/coupons-save', 'Admin\StoreController@CouponsSave')->name('admin_store_coupons_save');

    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', 'Admin\StoreController@getSettings')->name('admin_store_settings');
    });
});


Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'Admin\PostController@index')->name('admin_blog');
    Route::get('create', 'Admin\PostController@create')->name('admin_blog_create');
    Route::get('delete/{id}', 'Admin\PostController@getDelete')->name('admin_post_delete');
    Route::get('edit/{id}', 'Admin\PostController@edit')->name('admin_post_edit');
    Route::post('create-new', 'Admin\PostController@newPost')->name('admin_new_post');
//    Route::group(['prefix' => 'comments'], function () {
//        Route::get('/', 'Admin\PostController@getComments')->name('admin_blog_comments');
//        Route::get('/settings', 'Admin\PostController@getCommentSettings')->name('admin_blog_comments_settings');
//        Route::get('/delete/{id}', 'Admin\PostController@getCommentsDelete')->name('admin_post_comment_delete');
//        Route::get('edit/{id}', 'Admin\PostController@getCommentsEdit')->name('admin_post_comment_edit');
//
//    });

});

Route::group(['prefix' => 'orders'], function () {
    Route::get('/', 'Admin\OrdersController@index')->name('admin_orders');
    Route::get('/manage/{id}', 'Admin\OrdersController@getManage')->name('admin_orders_manage');
    Route::get('/new', 'Admin\OrdersController@getNew')->name('admin_orders_new');
});

Route::group(['prefix' => 'inventory'], function () {
    Route::group(['prefix' => 'stock'], function () {
        Route::get('/', 'Admin\InventoryController@stock')->name('admin_stock');
        Route::get('/new', 'Admin\InventoryController@stockNew')->name('admin_stock_new');
        Route::get('/edit/{id}', 'Admin\InventoryController@getStockEdit')->name('admin_stock_edit');
        Route::post('/save-stock', 'Admin\InventoryController@postStock')->name('admin_stock_save');
        Route::post('/link-all', 'Admin\InventoryController@linkAll')->name('admin_stock_link_all');
        Route::post('/variation-form', 'Admin\InventoryController@variationForm')->name('admin_stock_variation_form');
        Route::get('/statuses/', 'Admin\InventoryController@getStatuses')->name('admin_stock_statuses');
        Route::get('/statuses/manage/{type}', 'Admin\InventoryController@getStatusesManage')->name('admin_stock_statuses_manage');
        Route::post('/statuses/manage/{id?}', 'Admin\InventoryController@postStatusesManage')->name('post_admin_stock_statuses_manage');
        Route::post('get-manage-form','Admin\InventoryController@postGetManageStatusForm')->name('post_admin_stock_statuses_manage_form');
    });

    Route::group(['prefix' => 'attributes'], function () {
        Route::get('/', 'Admin\AttributesController@getAttributes')->name('admin_store_attributes');
        Route::get('/new', 'Admin\AttributesController@getAttributesCreate')->name('admin_store_attributes_new');
        Route::post('/new', 'Admin\AttributesController@postAttributesCreate')->name('admin_store_attributes_new');
        Route::post('/options-show-form', 'Admin\AttributesController@postAttributesOptionsForm')->name('admin_store_attributes_options_form');
        Route::post('/options-delete', 'Admin\AttributesController@postAttributesOptionDelete')->name('admin_store_attributes_option_delete');
        Route::post('/options/{id}/save', 'Admin\AttributesController@postAttributesOptions')->name('admin_store_attributes_options');
        Route::get('/edit/{id}', 'Admin\AttributesController@getAttributesEdit')->name('admin_store_attributes_edit');
        Route::post('/edit/{id}', 'Admin\AttributesController@postAttributesEdit')->name('admin_store_attributes_post_edit');
        Route::post('/get-options-by-id', 'Admin\AttributesController@getOptions')->name('admin_store_attributes_options_by_id');
        Route::post('/get-options-by-id/{id}', 'Admin\AttributesController@getOptionsAutocomplate')->name('admin_store_attributes_options_by_id_autocomplate');
        Route::post('/get-attribute', 'Admin\AttributesController@getAttributeByID')->name('admin_store_attributes_by_id');
        Route::post('/get-all', 'Admin\AttributesController@postAllAttributes')->name('admin_store_attributes_all_post');
        Route::post('/delete', 'Admin\AttributesController@postAttributesDelete')->name('admin_store_attributes_delete');
        Route::post('/get-variations-table', 'Admin\AttributesController@getVariationsTable')->name('admin_store_attributes_variations_table');
    });

    Route::group(['prefix' => 'options'], function () {
        Route::get('/', 'Admin\OptionsController@getIndex')->name('admin_stock_options');
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', 'Admin\TagsController@getIndex')->name('admin_stock_tags');
        Route::post('/save', 'Admin\TagsController@tagsSave')->name('admin_stock_tags_save');
        Route::post('/search', 'Admin\TagsController@postSearch')->name('admin_stock_tags_save');
        Route::post('/delete', 'Admin\TagsController@postDelete')->name('admin_stock_tags_delete');
    });
});

Route::get('/forum', 'Admin\ForumController@index')->name('admin_forum');
Route::get('/tickets', 'Admin\TicketsController@index')->name('admin_tickets');

Route::group(['prefix' => '/tools'], function () {
    Route::get('/', 'Admin\ToolsController@index')->name('admin_tools');
    Route::get('/tags', 'Admin\ToolsController@getTags')->name('admin_tools_tags');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'Admin\CategoriesController@list')->name('admin_categories_list');

        Route::group(['prefix' => 'stock'], function () {
            Route::get('/', 'Admin\CategoriesController@getCategories')->name('admin_store_categories');
            Route::post('/get-form', 'Admin\CategoriesController@postCategoryForm')->name('admin_store_categories_form');
            Route::post('/update-parent', 'Admin\CategoriesController@postCategoryUpdateParent')->name('admin_store_categories_update_parent');
            Route::post('/create-or-update', 'Admin\CategoriesController@postCreateOrUpdateCategory')->name('admin_store_categories_new_or_update');
            Route::post('/delete', 'Admin\CategoriesController@postDeleteCategory')->name('admin_store_categories_delete');
        });

        Route::group(['prefix' => 'post'], function () {
            Route::get('/', 'Admin\CategoriesController@getPostCategories')->name('admin_categories_post');
            Route::post('/get-form', 'Admin\CategoriesController@postCategoryPostForm')->name('admin_categories_post_form');
            Route::post('/update-parent', 'Admin\CategoriesController@postCategoryPostUpdateParent')->name('admin_categories_post_update_parent');
            Route::post('/create-or-update', 'Admin\CategoriesController@postCreateOrUpdateCategoryPost')->name('admin_categories_post_new_or_update');
            Route::post('/delete', 'Admin\CategoriesController@postDeleteCategoryPost')->name('admin_categories_post_delete');
        });
    });
});

Route::group(['prefix'=>'comments'], function () {
    Route::get('/','Admin\CommentsController@index')->name('show_comments');
    Route::get('/approve/{id}','Admin\CommentsController@approve')->name('approve_comments');
    Route::get('/unapprove/{id}','Admin\CommentsController@unapprove')->name('unapprove_comments');
    Route::get('/edit/{id}','Admin\CommentsController@edit')->name('edit_comment');
    Route::post('/edit/{id}','Admin\CommentsController@postEdit')->name('edit_comment_post');
    Route::get('/reply/{id}','Admin\CommentsController@reply')->name('reply_comment');
    Route::post('/reply/{id}','Admin\CommentsController@postReply')->name('reply_comment_post');
});

//Route::get('{locale}', function($locale) {
//    app()->setLocale($locale);
//
//    $article = Article::first();
//
//    return view('admin.blog.index')->with(compact('article'));
//});


//MEDIA


//Route::get('/media', 'Admin\Media\IndexController@index')->name('admin_media');
Route::group(['prefix' => 'media'], function () {
    Route::get('/', 'Admin\Media\IndexController@index')->name('admin_media');
    Route::get('/settings', 'Admin\Media\IndexController@getSettings')->name('admin_media_settinds');
    Route::post('/settings', 'Admin\Media\IndexController@postSettings')->name('post_admin_media_settings');
});
Route::group(['prefix' => 'seo'], function () {
    Route::get('/', 'Admin\SeoController@getPosts')->name('admin_seo');
    Route::post('/', 'Admin\SeoController@postPosts')->name('post_admin_seo');
    Route::get('/stocks', 'Admin\SeoController@getStocks')->name('admin_seo_stocks');
    Route::get('/bulk', 'Admin\SeoController@getBulk')->name('admin_seo_bulk');
});

Route::post('/get-categories', 'Admin\CategoriesController@getCategory')->name('admin_get_categories');
Route::post('/get-products', 'Admin\StoreController@getProducts')->name('admin_store_coupons_get_products');
Route::post('/save-tags', 'Admin\StoreController@saveTags')->name('admin_store_save_tags');



