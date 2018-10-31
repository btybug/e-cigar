<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\GeoZones;
use App\Models\Posts;
use App\Models\Stock;
use App\Models\StockVariation;
use App\Models\StockVariationOption;
use App\Models\ZoneCountries;
use App\Services\CartService;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use PragmaRX\Countries\Package\Countries;
use View;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    protected $view= 'frontend.shop';

    private $cartService;
    private $countries;
    private $geoZones;

    public function __construct(
        CartService $cartService,
        Countries $countries,
        GeoZones $geoZones
    )
    {
        $this->cartService = $cartService;
        $this->countries = $countries;
        $this->geoZones = $geoZones;
    }

    public function index()
    {
        return $this->view('index');
    }

    public function getCart()
    {
        $items = $this->cartService->getCartItems();
        $default_shipping = null;
        $shipping = null;
        if(\Auth::check()){
            $user=\Auth::user();
            $default_shipping=$user->addresses()->where('type','default_shipping')->first();
            $zone = ($default_shipping) ? ZoneCountries::find($default_shipping->country) : null;
            $geoZone = ($zone) ? $zone->geoZone : null;
            if(! count($items)) {
                Cart::removeConditionsByType('shipping');
            }else{
                if($geoZone){
                    $shipping = Cart::getCondition($geoZone->name);
                    if(! $shipping) {
                        Cart::removeConditionsByType('shipping');
                        if(count($geoZone->deliveries) && $geoZone->deliveries->first() && count($geoZone->deliveries->first()->options)){
                            $shippingDefaultOption =  $geoZone->deliveries->first()->options->first();
                            $condition2 = new \Darryldecode\Cart\CartCondition(array(
                                'name' => $geoZone->name,
                                'type' => 'shipping',
                                'target' => 'total',
                                'value' => $shippingDefaultOption->cost,
                                'order' => 1,
                                'attributes' => $shippingDefaultOption
                            ));
                            Cart::condition($condition2);
                            $shipping = Cart::getCondition($geoZone->name);
                        }
                    }
                }
            }

        }

        return $this->view('cart',compact(['items','default_shipping','shipping','geoZone','shippingDefault']));
    }

    public function getCheckOut()
    {
        $items = $this->cartService->getCartItems();
        if(! count($items)) return redirect('/');

        $billing_address = [];
        $default_shipping = [];
        $geoZone = null; //need to change
        $shipping = null;
        $countries = $this->countries->all()->pluck('name.common','name.common')->toArray();
        $countriesShipping = [null => 'Select Country'] + $this->geoZones
                ->join('zone_countries','geo_zones.id','=','zone_countries.geo_zone_id')
                ->select('zone_countries.*','zone_countries.name as country')
                ->groupBy('country')->pluck('country', 'id')->toArray();

        if(\Auth::check()){
            $user=\Auth::user();
            $billing_address=$user->addresses()->where('type','billing_address')->first();
            $default_shipping=$user->addresses()->where('type','default_shipping')->first();
            $zone = ($default_shipping) ? ZoneCountries::find($default_shipping->country) : null;
            $geoZone = ($zone) ? $zone->geoZone : null;
            if($geoZone){
                $shipping = Cart::getCondition($geoZone->name);
            }
        }


        return $this->view('check_out',compact(['billing_address','default_shipping','countries','countriesShipping','geoZone','shipping']));
    }

    public function postAddToCart(Request $request)
    {
        $variation = StockVariation::where('variation_id',$request->uid)->first();
        if($variation){
            if(\Auth::check()){
                Cart::session(\Auth::id())->add($variation->variation_id,$variation->stock->sku,$variation->price,1,['variation' => $variation]);
            }else{
                Cart::add($variation->variation_id,$variation->stock->sku,$variation->price,1,['variation' => $variation]);
            }

            return \Response::json(['error' => false,'message' => 'added','count' => $this->cartService->getCount()]);
        }

       return \Response::json(['error' => true,'message' => 'try again']);
    }

    public function postUpdateQty(Request $request)
    {
        $qty = ($request->condition) ? 1 : -1;
        if(\Auth::check()){
            $i = Cart::session(\Auth::id())->update($request->uid, array(
                'quantity' => $qty
            ));

            $default_shipping = \Auth::user()->addresses()->where('type','default_shipping')->first();
            $zone = ($default_shipping) ? ZoneCountries::find($default_shipping->country) : null;
            $geoZone = ($zone) ? $zone->geoZone : null;
            if($geoZone){
                $shipping = Cart::getCondition($geoZone->name);
            }

        }else{
            $default_shipping = null;
            $shipping = null;
            $geoZone = null;
            Cart::update($request->uid, array(
                'quantity' => $qty
            ));
        }

        $items = $this->cartService->getCartItems();
        $html = $this->view('_partials.cart_table',compact(['items','default_shipping','shipping','geoZone']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postRemoveFromCart (Request $request)
    {
        if(\Auth::check()){
            Cart::session(\Auth::id())->remove($request->uid);
            $default_shipping = \Auth::user()->addresses()->where('type','default_shipping')->first();
            $zone = ($default_shipping) ? ZoneCountries::find($default_shipping->country) : null;
            $geoZone = ($zone) ? $zone->geoZone : null;
            if($geoZone){
                $shipping = Cart::getCondition($geoZone->name);
            }
        }else{
            $default_shipping = null;
            $shipping = null;
            $geoZone = null;
            Cart::remove($request->uid);

            if(Cart::isEmpty()){
                Cart::removeConditionsByType('shipping');
            }
        }

        $items = $this->cartService->getCartItems();
        $html = $this->view('_partials.cart_table',compact(['items','default_shipping','shipping','geoZone']))->render();

        return \Response::json(['error' => false,'html' => $html,'count' => $this->cartService->getCount()]);
    }

    public function postChangeShippingMethod(Request $request)
    {
        $items = $this->cartService->getCartItems();
        $billing_address = [];
        $default_shipping = [];
        $geoZone = null; //need to change
        $shipping = null;
        $countries = $this->countries->all()->pluck('name.common','name.common')->toArray();
        $countriesShipping = [null => 'Select Country'] + $this->geoZones
                ->join('zone_countries','geo_zones.id','=','zone_countries.geo_zone_id')
                ->select('zone_countries.*','zone_countries.name as country')
                ->groupBy('country')->pluck('country', 'id')->toArray();

        if(\Auth::check()){
            $user=\Auth::user();
            $billing_address=$user->addresses()->where('type','billing_address')->first();
            $default_shipping=$user->addresses()->where('type','default_shipping')->first();
            $zone = ($default_shipping) ? ZoneCountries::find($default_shipping->country) : null;
            $geoZone = ($zone) ? $zone->geoZone : null;
            if($geoZone){
                $delivery = $geoZone->deliveries()->where('id',$request->deliveryId)->first();
                if($delivery) {
                    $shippingDefaultOption = $delivery->options()->where('id',$request->optionId)->first();
                    if($shippingDefaultOption){
                        Cart::removeConditionsByType('shipping');
                        $condition2 = new \Darryldecode\Cart\CartCondition(array(
                            'name' => $geoZone->name,
                            'type' => 'shipping',
                            'target' => 'total',
                            'value' => $shippingDefaultOption->cost,
                            'order' => 1,
                            'attributes' => $shippingDefaultOption
                        ));
                        Cart::condition($condition2);
                    }
                }

                $shipping = Cart::getCondition($geoZone->name);
            }
        }

        $html = $this->view('_partials.checkout_render',compact(['billing_address','default_shipping','countries','countriesShipping','geoZone','shipping']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }
}
