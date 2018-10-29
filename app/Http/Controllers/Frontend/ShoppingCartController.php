<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Posts;
use App\Models\Products;
use App\Models\Stock;
use App\Models\StockVariation;
use App\Models\StockVariationOption;
use Darryldecode\Cart\Cart;
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
//        $cartCollection = $this->cart->session(\Auth::id())->getContent();
//        dd($cartCollection);
        return $this->view('cart');
    }

    public function getCheckOut()
    {
        return $this->view('check_out');
    }

    public function postAddToCart(Request $request)
    {
        $variation = StockVariation::where('variation_id',$request->uid)->first();

        if($variation){
            if(\Auth::check()){
                \Cart::session(\Auth::id())->add($variation->variation_id,$variation->stock->name,$variation->price,1,array());
            }else{
                Cart::add($variation->variation_id,$variation->stock->name,$variation->price,1,array());
            }

            return \Response::json(['error' => false,'message' => 'added']);
        }

       return \Response::json(['error' => true,'message' => 'try again']);
    }
}
