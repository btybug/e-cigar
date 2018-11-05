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
use PragmaRX\Countries\Package\Countries;



class CashPaymentController extends Controller
{
    protected $view= 'frontend.shop';

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
        $order = \DB::transaction(function () use ($billingId,$shippingId,$geoZone,$shippingAddress,$zone) {
            $shipping = Cart::getCondition($geoZone->name);
            $items = Cart::getContent();
            $order = Orders::create([
                'user_id' => \Auth::id(),
                'code'=>getUniqueCode('orders','code',Countries::where('name.common', $zone->name)->first()->cca2),
                'amount' => Cart::getTotal(),
                'billing_addresses_id' => $billingId,
                'shipping_method' => $shipping->getAttributes()->courier->name,
                'payment_method' => 'cash',
                'shipping_price' => $shipping->getValue(),
                'currency' => 'usd',
            ]);
            $order->history()->create(['status_id'=>1]);
            $shippingAddress = $shippingAddress->toArray();
            unset($shippingAddress['id']);
            unset($shippingAddress['created_at']);
            unset($shippingAddress['updated_at']);
            unset($shippingAddress['user_id']);
            $order->shippingAddress()->create($shippingAddress);
            foreach ($items as $variation_id => $item){
                $options = [];
                foreach ($item->attributes->variation->options as $option){
                    $options[$option->attr->name] = $option->option->name;
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'name' => $item->attributes->variation->stock->name,
                    'sku' => $item->name,
                    'variation_id' => $variation_id,
                    'price' => $item->price,
                    'qty' => $item->quantity,
                    'amount' => $item->price * $item->quantity,
                    'image' => $item->attributes->variation->stock->image,
                    'options' => $options
                ]);
            }

            return $order;
        });

        return \Response::json(['error' => false,'url' => route('cash_order_success',$order->id)]);
    }

    public function success (Request $request,$id)
    {
        $order = Orders::findOrFail($id);
        
        if(! Cart::isEmpty() && session()->has('shipping_address') &&  session()->has('billing_address') && $order){
            session()->forget('shipping_address','billing_address');
            session()->forget('shipping_address_id','billing_address_id');
            Cart::clear();
            Cart::removeConditionsByType('shipping');

            return $this->view('_partials.cash_success');
        }

        abort(404);
    }
}