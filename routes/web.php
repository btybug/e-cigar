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
});
Route::get('/stripe', function () {
// $stripe=new \Stripe();
// dd($stripe);
//dd($stripeCharge);
//// Braintree Accepts Charges In Dollars...
//    $user->charge(1);
    return view('stripe');
});
Route::any('/stripe-charge', 'Frontend\StripePaymentController@stripeCharge');
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
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'news'], function () {
    Route::get('/', 'Frontend\BlogController@index')->name('blog');
    Route::get('/{post_id}', 'Frontend\BlogController@getSingle')->name('blog_post');
});
Route::post('/add-comment', 'Frontend\BlogController@addComment')->name('comment_create_post');


Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'Frontend\ProductsController@index')->name('products');
    Route::post('/get-price', 'Frontend\ProductsController@getPrice')->name('product_get_price');
    Route::get('/vape', 'Frontend\ProductsController@getVape')->name('product_vape');
    Route::get('/vape/{id}', 'Frontend\ProductsController@singleVape')->name('product_single_vape');
    Route::get('/juice/{category?}', 'Frontend\ProductsController@getJuice')->name('product_juice');
    Route::get('/juice/{category}/{id}', 'Frontend\ProductsController@singleJuice')->name('product_single_juice');
});
Route::get('/sales', 'Frontend\CommonController@getSales')->name('product_sales');
Route::get('/forum', 'Frontend\CommonController@getForum')->name('forum');
Route::group(['prefix'=>'/support'], function (){
    Route::get('/', 'Frontend\CommonController@getSupport')->name('product_support');

    Route::get('/faq', 'GuestController@getFaq')->name('faq');
    Route::get('/knowledge-base', 'GuestController@getKnowledgeBase')->name('knowledge_base');
    Route::get('/manuals', 'GuestController@getManuals')->name('manuals');
    Route::get('/ticket', 'GuestController@getTicket')->name('ticket');
    Route::get('/terms-&-conditions', 'GuestController@getTermsConditions')->name('terms_conditions');
    Route::get('/delivery', 'GuestController@getDelivery')->name('delivery');
    Route::post('/get-cities', 'GuestController@getCities')->name('delivery_get_countries');
    Route::get('/whole-sellers', 'GuestController@getWholeSellers')->name('whole_sellers');
});
Route::get('/contact-us', 'Frontend\CommonController@getContactUs')->name('product_contact_us');
Route::post('/get-regions-by-country', 'GuestController@getRegionsByCountry')->name('get_regions_by_country');
Route::post('/get-regions-by-geozone', 'GuestController@getRegionsByGeoZone')->name('get_regions_by_geozone');


Route::get('/forum', 'Frontend\ForumController@index')->name('forum');
Route::get('/shop', 'Frontend\ShoppingCartController@index')->name('shop');
Route::get('/my-cart', 'Frontend\ShoppingCartController@getCart')->name('shop_my_cart');
Route::get('/check-out', 'Frontend\ShoppingCartController@getCheckOut')->name('shop_check_out');
Route::post('/add-to-cart', 'Frontend\ShoppingCartController@postAddToCart')->name('shop_add_to_cart');
Route::post('/update-cart', 'Frontend\ShoppingCartController@postUpdateQty')->name('shop_update_cart');
Route::post('/remove-from-cart', 'Frontend\ShoppingCartController@postRemoveFromCart')->name('shop_remove_from_cart');
Route::post('/change-shipping-method', 'Frontend\ShoppingCartController@postChangeShippingMethod')->name('change_shipping_method');
Route::post('/get-payment-options', 'Frontend\ShoppingCartController@postPaymentOptions')->name('get_payment_options');
Route::post('/cash-order', 'Frontend\CashPaymentController@order')->name('cash_order');
Route::get('/cash-order-success/{id}', 'Frontend\CashPaymentController@success')->name('cash_order_success');

Route::group(['prefix' => 'my-account', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'Frontend\UserController@index')->name('my_account');
    Route::get('/logs', 'Frontend\UserController@getLogs')->name('my_account_logs');
    Route::get('/password', 'Frontend\UserController@getPassword')->name('my_account_password');
    Route::get('/favourites', 'Frontend\UserController@getFavourites')->name('my_account_favourites');
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
    });
    Route::get('/verification', 'Frontend\UserController@getVerification')->name('my_account_verification');
    Route::post('/verification', 'Frontend\UserController@postVerification')->name('post_my_account_verification');
    Route::get('/payments', 'Frontend\UserController@getPayments')->name('my_account_payment');
});
