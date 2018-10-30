<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Posts;
use App\Models\Stock;
use App\Models\StockVariation;
use App\Models\StockVariationOption;
use App\Services\CartService;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use View;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    protected $view= 'frontend.shop';

    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        return $this->view('index');
    }

    public function getCart()
    {
        $items = $this->cartService->getCartItems();
        return $this->view('cart',compact(['items']));
    }

    public function getCheckOut()
    {
        $items = $this->cartService->getCartItems();
        if(! count($items)) return redirect('/');

        $billing_address = [];
        $default_shipping = [];
        if(\Auth::check()){
            $user=\Auth::user();
            $billing_address=$user->addresses()->where('type','billing_address')->first();
            $default_shipping=$user->addresses()->where('type','default_shipping')->first();
        }


        return $this->view('check_out',compact(['billing_address','default_shipping']));
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
        }else{
            Cart::update($request->uid, array(
                'quantity' => $qty
            ));
        }

        $items = $this->cartService->getCartItems();
        $html = $this->view('_partials.cart_table',compact(['items']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postRemoveFromCart (Request $request)
    {
        if(\Auth::check()){
            Cart::session(\Auth::id())->remove($request->uid);
        }else{
            Cart::remove($request->uid);
        }

        $items = $this->cartService->getCartItems();
        $html = $this->view('_partials.cart_table',compact(['items']))->render();

        return \Response::json(['error' => false,'html' => $html,'count' => $this->cartService->getCount()]);
    }
}
