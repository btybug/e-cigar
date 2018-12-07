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
    public static $cartItems = [];

    public function getCartItems(){
        $cartCollection = Cart::getContent();

        $items = [];
        if(! Cart::isEmpty()){
            foreach($cartCollection as $key => $value){
                $items[$value->name][$key] = $value;
            }
        }

        self::$cartItems = $items;

        return $items;
    }

    public function getCount() {
        $cartCollection = count($this->getCartItems());
        return $cartCollection;
    }

    public static function getVariation ($id)
    {
        return StockVariation::find($id);
    }

    public static function getPriceSum($id)
    {
        $data = (isset(self::$cartItems[$id])) ? self::$cartItems[$id] : [] ;
        $price = 0;
        if(count($data)){
            foreach ($data as $datum){
                $price += $datum->getPriceSum();
            }
        }
        return $price;
    }

    public function remove($id)
    {
        $list = $this->getCartItems();
        $data = (isset($list[$id])) ? $list[$id] : [] ;

        if(count($data)){
            foreach ($data as $datum){
                Cart::remove($datum->id);
            }
        }else{
            Cart::remove($id);
        }
    }
}