<?php namespace App\Services;

use Darryldecode\Cart\Facades\CartFacade as Cart;

/**
 * Created by PhpStorm.
 * User: edo
 * Date: 10/18/2018
 * Time: 1:01 PM
 */
class CartService
{
    public function getCartItems(){
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

        return $items;
    }

    public function getCount() {
        if(\Auth::check()){
            $cartCollection = Cart::session(\Auth::id())->getContent();
        }else{
            $cartCollection = Cart::getContent();
        }
        return $cartCollection->count();
    }
}