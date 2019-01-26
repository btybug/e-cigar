<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/stripe-charge', 'Frontend\StripePaymentController@stripeCharge');
Route::post('/get-comments', function (\Illuminate\Http\Request $request) {
    $product = \App\Models\Posts::find($request->id);
    return ['error' => false, 'data' => $product->makeReady()->toArray()];
});



//Knowledge base
//Manuals
//Ticket
//Terms & conditions
//Delivery
//Whole sellers



Auth::routes();
Auth::routes(['verify' => true]);
//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'news'], function () {
    Route::get('/', 'Frontend\BlogController@index')->name('blog');
    Route::get('/{post_id}', 'Frontend\BlogController@getSingle')->name('blog_post');
});
Route::post('/add-comment', 'Frontend\BlogController@addComment')->name('comment_create_post');


Route::group(['prefix' => 'products'], function () {
    Route::post('/get-price', 'Frontend\ProductsController@getPrice')->name('product_get_price');
    Route::post('/add-to-favorites', 'Frontend\ProductsController@attachFavorite')->name('product_add_to_favorites');
    Route::post('/remove-from-favorites', 'Frontend\ProductsController@detachFavorite')->name('product_remove_from_favorites');
    Route::get('/{type?}', 'Frontend\ProductsController@index')->name('categories_front');
    Route::group(['prefix' => '{type}'], function () {
        Route::get('/{slug}', 'Frontend\ProductsController@getSingle')->name('product_single');
    });
});

//Route::group(['prefix' => 'categories'], function () {
//    Route::get('/', 'Frontend\ProductsController@index')->name('categories_front');
//    Route::group(['prefix' => '{type}'], function () {
//        Route::group(['prefix' => '{category?}'], function () {
//            Route::get('/', 'Frontend\ProductsController@getType')->name('categories_types');
//        });
//    });
//});

Route::get('/sales', 'Frontend\CommonController@getSales')->name('product_sales');
Route::get('/forum', 'Frontend\CommonController@getForum')->name('forum');
Route::post('/change-currency', 'Frontend\CommonController@changeCurrency')->name('change_currency');
Route::group(['prefix'=>'/support'], function (){
    Route::get('/', 'Frontend\CommonController@getSupport')->name('product_support');

    Route::get('/faq', 'GuestController@getFaq')->name('faq_page');
    Route::post('/faq-by-category', 'GuestController@getFaqByCategory')->name('faq');
    Route::get('/knowledge-base', 'GuestController@getKnowledgeBase')->name('knowledge_base');
    Route::get('/manuals', 'GuestController@getManuals')->name('manuals');
    Route::get('/ticket', 'GuestController@getTicket')->name('ticket');
    Route::get('/terms-&-conditions', 'GuestController@getTermsConditions')->name('terms_conditions');
    Route::get('/delivery', 'GuestController@getDelivery')->name('delivery');
    Route::post('/get-cities', 'GuestController@getCities')->name('delivery_get_countries');
    Route::get('/whole-sellers', 'GuestController@getWholeSellers')->name('whole_sellers');
    if(LaravelGmail::check()){
        Route::get('/contact-us', 'GuestController@getContactUs')->name('support_contact_us');
        Route::post('/contact-us', 'GuestController@postContactUs')->name('post_contact_us');
    }

});
Route::get('/contact-us', 'Frontend\CommonController@getContactUs')->name('product_contact_us');
Route::post('/get-regions-by-country', 'GuestController@getRegionsByCountry')->name('get_regions_by_country');
Route::post('/get-regions-by-geozone', 'GuestController@getRegionsByGeoZone')->name('get_regions_by_geozone');


Route::get('/forum', 'Frontend\ForumController@index')->name('forum');
Route::get('/shop', 'Frontend\ShoppingCartController@index')->name('shop');
Route::get('/my-cart', 'Frontend\ShoppingCartController@getCart')->name('shop_my_cart');
Route::get('/check-out', 'Frontend\ShoppingCartController@getCheckOut')->name('shop_check_out');
Route::get('/payment/{token}', 'Frontend\ShoppingCartController@getPayment')->name('shop_payment');
Route::post('/add-to-cart', 'Frontend\ShoppingCartController@postAddToCart')->name('shop_add_to_cart');
Route::post('/update-cart', 'Frontend\ShoppingCartController@postUpdateQty')->name('shop_update_cart');
Route::post('/remove-from-cart', 'Frontend\ShoppingCartController@postRemoveFromCart')->name('shop_remove_from_cart');
Route::post('/change-shipping-method', 'Frontend\ShoppingCartController@postChangeShippingMethod')->name('change_shipping_method');
Route::post('/get-payment-options', 'Frontend\ShoppingCartController@postPaymentOptions')->name('get_payment_options');
Route::post('/cash-order', 'Frontend\CashPaymentController@order')->name('cash_order');
Route::get('/cash-order-success/{id}', 'Frontend\CashPaymentController@success')->name('cash_order_success');

Route::group(['prefix' => 'my-account', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'Frontend\UserController@index')->name('my_account');
    Route::post('/', 'Frontend\UserController@saveMyAccount')->name('my_account_save_data');
    Route::post('/contact', 'Frontend\UserController@saveMyAccountContact')->name('my_account_save_contact_data');
    Route::get('/notifications', 'Frontend\UserController@getNotifications')->name('notifications');
    Route::post('/notifications', 'Frontend\UserController@getNotificationsContent')->name('notifications_content');
    Route::post('/changePassword', 'Frontend\UserController@changePassword')->name('my_account_change_password');
    Route::get('/logs', 'Frontend\UserController@getLogs')->name('my_account_logs');
    Route::get('/password', 'Frontend\UserController@getPassword')->name('my_account_password');
    Route::get('/favourites', 'Frontend\UserController@getFavourites')->name('my_account_favourites');

    Route::post('/add_favourites', 'Frontend\UserController@attachFavorite')->name('add_favourites');
    Route::post('/delete_favourites', 'Frontend\UserController@detachFavorite')->name('delete_favourites');

    Route::get('/address', 'Frontend\UserController@getAddress')->name('my_account_address');
    Route::post('/address', 'Frontend\UserController@postAddress')->name('post_my_account_address');
    Route::post('/address-book-form', 'Frontend\UserController@postAddressBookForm')->name('post_my_account_address_book_form');
    Route::post('/save-address-book', 'Frontend\UserController@postAddressBookSave')->name('post_my_account_address_book_save');
    Route::post('/select-address-book', 'Frontend\UserController@postAddressBookSelect')->name('post_my_account_address_book_select');
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'Frontend\UserController@getOrders')->name('my_account_orders');
        Route::get('/invoice/{id}', 'Frontend\UserController@getOrderInvoice')->name('my_account_order_invoice');
    });
    Route::group(['prefix' => 'tickets'], function () {
        Route::get('/', 'Frontend\UserController@getTickets')->name('my_account_tickets');
        Route::get('/new', 'Frontend\UserController@getTicketsNew')->name('my_account_tickets_new');
        Route::post('/new', 'Frontend\UserController@postTicketsNew')->name('my_account_tickets_new_post');
        Route::get('/view/{id}', 'Frontend\UserController@getTicketsView')->name('my_account_tickets_view');
        Route::post('/mark-complete/{id}', 'Frontend\UserController@ticketMarkCompleted')->name('my_account_tickets_mark_completed');
    });
    Route::get('/verification', 'Frontend\UserController@getVerification')->name('my_account_verification');
    Route::post('/verification', 'Frontend\UserController@postVerification')->name('post_my_account_verification');
    Route::get('/payments', 'Frontend\UserController@getPayments')->name('my_account_payment');
   });
