<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/31/2018
 * Time: 10:14 PM
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\StripePayments;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class CashPaymentController extends Controller
{
    public function order(Request $request)
    {
        $cart = Cart::getContent();
        $shippingId = session()->get('shipping_address');
        $billingId = session()->get('billing_address');

        \DB::transaction(function () {

        });
       dd($cart,$shippingId,$billingId);
    }
}