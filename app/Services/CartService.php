<?php namespace App\Services;

use App\Models\StockVariation;
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
        $cartCollection = Cart::getContent();

        $items = [];
        if(! Cart::isEmpty()){
            foreach($cartCollection as $key => $value){
                $items[$value->name][$key] = $value;
            }
        }else{

        }

        return $items;
    }

    public function getCount() {
        $cartCollection = Cart::getContent();
        return $cartCollection->count();
    }

    public static function getVariation ($id)
    {
        return StockVariation::find($id);
    }
}