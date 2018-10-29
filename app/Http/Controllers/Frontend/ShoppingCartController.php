<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Posts;
use App\Models\Stock;
use App\Models\StockVariation;
use App\Models\StockVariationOption;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use View;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    protected $view= 'frontend.shop';

    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    public function index()
    {
        return $this->view('index');
    }

    public function getCart()
    {
        if(\Auth::check()){
            $cartCollection = Cart::session(\Auth::id())->getContent();
            $isEmpty = Cart::session(\Auth::id())->isEmpty();
        }else{
            $cartCollection = Cart::getContent();
            $isEmpty = Cart::isEmpty();
        }

        $items = [];
        if(! $isEmpty){
            foreach($cartCollection as $key => $value){
                $items[$value->name][$key] = $value;
            }
        }

//        dd($items,$cartCollection);
        return $this->view('cart',compact(['items']));
    }

    public function getCheckOut()
    {
        return $this->view('check_out');
    }

    public function postAddToCart(Request $request)
    {
        $variation = StockVariation::where('variation_id',$request->uid)->first();
//        Cart::session(\Auth::id())->clear();
        if($variation){
            if(\Auth::check()){
                Cart::session(\Auth::id())->add($variation->variation_id,$variation->stock->sku,$variation->price,1,['variation' => $variation]);
            }else{
                Cart::add($variation->variation_id,$variation->stock->sku,$variation->price,1,['variation' => $variation]);
            }

            return \Response::json(['error' => false,'message' => 'added']);
        }

       return \Response::json(['error' => true,'message' => 'try again']);
    }
}
