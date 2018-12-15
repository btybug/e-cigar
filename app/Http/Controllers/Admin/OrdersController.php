<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Requests\OrderHistoryRequest;
use App\Http\Controllers\Controller;
use App\Models\OrderHistory;
use App\Models\Orders;
use App\Models\Statuses;
use App\Models\Settings;
use App\Models\Stock;
use App\Models\StockVariation;
use App\Models\ZoneCountries;
use App\Services\CartService;
use App\User;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use PragmaRX\Countries\Package\Countries;
use App\Models\GeoZones;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $view = 'admin.orders';

    private $statuses;
    private $settings;
    private $cartService;
    private $countries;
    private $geoZones;

    public function __construct(
        Statuses $statuses,
        Settings $settings,
        CartService $cartService,
        Countries $countries,
        GeoZones $geoZones
    )
    {
        $this->statuses = $statuses;
        $this->settings = $settings;
        $this->cartService = $cartService;
        $this->countries = $countries;
        $this->geoZones = $geoZones;
    }

    public function index()
    {

        return $this->view('index');
    }
    public function getManage($id)
    {
        $order=Orders::where('id',$id)
            ->with('shippingAddress')
            ->with('billingAddress')
            ->with('history')
            ->with('items')
            ->with('user')->first();
        if(!$order)abort(404);
        $statuses= $this->statuses->where('type','order')->get()->pluck('name','id');
        return $this->view('manage',compact('order','statuses'));
    }

    public function getNew()
    {
        $user = null;
        $products = Stock::all()->pluck('name','id')->all();
        $statuses= $this->statuses->where('type','order')->get()->pluck('name','id');
        $users = User::leftJoin('roles', 'users.role_id', '=', 'roles.id')
            ->whereNull('role_id')
            ->orWhere('roles.type', 'frontend')->select('users.*', 'roles.title')->pluck('name','users.id');
        $countries = $this->countries->all()->pluck('name.common', 'name.common')->toArray();
        $countriesShipping = [null => 'Select Country'] + $this->geoZones
                ->join('zone_countries', 'geo_zones.id', '=', 'zone_countries.geo_zone_id')
                ->select('zone_countries.*', 'zone_countries.name as country')
                ->groupBy('country')->pluck('country', 'id')->toArray();

        session()->forget('shipping_address','billing_address');
        session()->forget('shipping_address_id','billing_address_id');
        Cart::clear();
        Cart::removeConditionsByType('shipping');

        return $this->view('new',compact('statuses','products','users','user','countries','countriesShipping'));
    }

    public function addNote(OrderHistoryRequest $request)
    {
        $order = Orders::findOrFail($request->id);

        $order->history()->create([
            'status_id' => $request->get('status_id',null),
            'note' => $request->note,
        ]);

        $histories = $order->history()->orderBy('created_at','desc')->get();
        $html = \View('admin.orders._partials.timeline_item',compact(['histories']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function getSettings ()
    {
        $statuses = $this->statuses->where('type','order')->get()->pluck('name','id')->all();
        $settings = $this->settings->getEditableData('order');

        return $this->view('settings',compact(['settings','statuses']));
    }

    public function postSettings (Request $request)
    {
        $data = $request->except('_token');

        $this->settings->updateOrCreateSettings('order', $data);

        return redirect()->back();
    }

    public function getProduct(Request $request)
    {
        $vape = Stock::with(['variations', 'stockAttrs'])->where('id', $request->id)->first();

        if (! $vape) abort(404);

        $variations = $vape->variations()->with('options')->get();

        $html = $this->view('_partials.product',compact(['vape','variations']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postGetUser (Request $request)
    {
        $user = User::findOrFail($request->id);

        $html = $this->view("_partials.select_user",compact('user'))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postAddUser (Request $request)
    {
        $user = User::findOrFail($request->id);
        $delivery = null;
        $countries = $this->countries->all()->pluck('name.common', 'name.common')->toArray();
        $countriesShipping = [null => 'Select Country'] + $this->geoZones
                ->join('zone_countries', 'geo_zones.id', '=', 'zone_countries.geo_zone_id')
                ->select('zone_countries.*', 'zone_countries.name as country')
                ->groupBy('country')->pluck('country', 'id')->toArray();

        $default_shipping = $user->addresses()->where('type','default_shipping')->first();
        $zone = ($default_shipping) ? ZoneCountries::find($default_shipping->country) : null;
        $geoZone = ($zone) ? $zone->geoZone : null;
        if($geoZone && count($geoZone->deliveries)) {
            $subtotal = Cart::getSubTotal();
            $delivery = $geoZone->deliveries()->where('min', '<=', $subtotal)->where('max', '>=', $subtotal)->first();
        }

        $html = $this->view("_partials.add_user",compact('user','countries','countriesShipping'))->render();
        $shippingHtml = $this->view("_partials.shipping_payment",compact('user','delivery','geoZone'))->render();


        return \Response::json(['error' => false,'html' => $html,'shippingHtml' => $shippingHtml]);
    }

    public function postAddToCart(Request $request)
    {
        $variation = StockVariation::find($request->uid);
        $user = User::find($request->user_id);
        if($variation && $user){
            Cart::session($user->id);
            Cart::add($variation->id,$variation->id,$variation->price,1,
                ['variation' => $variation, 'requiredItems' => $request->get('requiredItems')]);

            $optionalItems = $request->get('optionalItems');
            if($optionalItems && count($optionalItems)){
                foreach ($optionalItems as $opv){
                    $optpVariation = StockVariation::find($opv);
                    if($optpVariation){
                        Cart::add($optpVariation->id,$variation->id,$optpVariation->price,1,
                            ['variation' => $optpVariation]);
                    }
                }
            }

            $default_shipping = $user->addresses()->where('type','default_shipping')->first();
            $zone = ($default_shipping) ? ZoneCountries::find($default_shipping->country) : null;
            $geoZone = ($zone) ? $zone->geoZone : null;
            if($geoZone && count($geoZone->deliveries)) {
                $subtotal = Cart::getSubTotal();
                Cart::removeConditionsByType('shipping');
                $delivery = $geoZone->deliveries()->where('min', '<=', $subtotal)->where('max','>=',$subtotal)->first();
                if($delivery && count($delivery->options)){
                    $shippingDefaultOption =  $delivery->options->first();
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
                $shipping = Cart::getCondition($geoZone->name);
            }


            $items = $this->cartService->getCartItems();

            $html = $this->view('_partials.cart',compact(['items','default_shipping','shipping','geoZone']))->render();

            return \Response::json(['error' => false,'message' => 'added','count' => $this->cartService->getCount(),'html' => $html]);
        }

        return \Response::json(['error' => true,'message' => 'try again']);
    }

    public function postUpdateQty(Request $request)
    {
        $qty = ($request->condition) ? 1 : -1;
        $default_shipping = null;
        $shipping = null;
        $geoZone = null;
        $user = User::find($request->user_id);

        if($user){
            Cart::session($user->id);
            if($request->condition == 'inner'){
                Cart::update($request->uid, array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->value
                    )));
            }else{
                $i = Cart::update($request->uid, array(
                    'quantity' => $qty
                ));
            }

            $default_shipping = $user->addresses()->where('type','default_shipping')->first();
            $zone = ($default_shipping) ? ZoneCountries::find($default_shipping->country) : null;
            $geoZone = ($zone) ? $zone->geoZone : null;
            if($geoZone && count($geoZone->deliveries)){
                $subtotal = Cart::getSubTotal();
                Cart::removeConditionsByType('shipping');
                $delivery = $geoZone->deliveries()->where('min', '<=', $subtotal)->where('max','>=',$subtotal)->first();
                if($delivery && count($delivery->options)){
                    $shippingDefaultOption =  $delivery->options->first();
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

        }else{
            if($request->condition == 'inner'){
                Cart::update($request->uid, array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->value
                    )));
            }else{
                $i = Cart::update($request->uid, array(
                    'quantity' => $qty
                ));
            }
        }

        $items = $this->cartService->getCartItems();
        $html = $this->view('_partials.cart',compact(['items','default_shipping','shipping','geoZone']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postRemoveFromCart (Request $request)
    {
        $default_shipping = null;
        $shipping = null;
        $geoZone = null;
        $user = User::find($request->user_id);

        if($user){
            $this->cartService->remove($request->uid);

            $default_shipping = $user->addresses()->where('type','default_shipping')->first();
            $zone = ($default_shipping) ? ZoneCountries::find($default_shipping->country) : null;
            $geoZone = ($zone) ? $zone->geoZone : null;
            if($geoZone && count($geoZone->deliveries)){
                $subtotal = Cart::getSubTotal();
                Cart::removeConditionsByType('shipping');
                $delivery = $geoZone->deliveries()->where('min', '<=', $subtotal)->where('max','>=',$subtotal)->first();
                if($delivery && count($delivery->options)){
                    $shippingDefaultOption =  $delivery->options->first();
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
        }else{
            $this->cartService->remove($request->uid);
        }

        $items = $this->cartService->getCartItems();
        $html = $this->view('_partials.cart',compact(['items','default_shipping','shipping','geoZone']))->render();

        return \Response::json(['error' => false,'html' => $html,'count' => $this->cartService->getCount()]);
    }
}