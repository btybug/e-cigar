<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/31/2018
 * Time: 10:14 PM
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\OrderAddresses;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\StripePayments;
use App\Models\ZoneCountries;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class CashPaymentController extends Controller
{
    public function order(Request $request)
    {
        $shippingId = session()->get('shipping_address');
        $billingId = session()->get('billing_address');
        $geoZone = null;
        if(\Auth::check()){
            $shippingAddress = Addresses::find($shippingId);
            $zone = ($shippingAddress) ? ZoneCountries::find($shippingAddress->country) : null;
            $geoZone = ($zone) ? $zone->geoZone : null;
            $shipping = Cart::getCondition($geoZone->name);
        }

        \DB::transaction(function () use ($billingId,$shippingId,$geoZone,$shippingAddress) {
            $shipping = Cart::getCondition($geoZone->name);
            $items = Cart::getContent();
            $order = Orders::create([
                'user_id' => \Auth::id(),
                'amount' => Cart::getTotal(),
                'billing_addresses_id' => $billingId,
                'status' => 'ordered',
                'shipping_method' => $shipping->getAttributes()->courier->name,
                'payment_method' => 'cash',
                'shipping_price' => $shipping->getValue(),
                'currency' => 'usd',
            ]);
            $shippingAddress = $shippingAddress->toArray();
            unset($shippingAddress['id']);
            unset($shippingAddress['created_at']);
            unset($shippingAddress['updated_at']);
            unset($shippingAddress['user_id']);
            $order->shippingAddress()->create($shippingAddress);
            foreach ($items as $variation_id => $item){
                OrderItem::create([
                    'order_id' => $order->id,
                    'sku' => $item->name,
                    'variation_id' => $variation_id,
                    'price' => $item->price,
                    'qty' => $item->quantity,
                    'amount' => $item->price * $item->quantity,
                    'image' => $item->attributes->variation->stock->image,
                    'options' => [],//TODO: render names
                ]);
            }
        });

        return \Response::json(['error' => false,'url' => '']);
    }
}