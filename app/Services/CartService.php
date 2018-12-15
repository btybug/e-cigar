<?php namespace App\Services;

use App\Models\Orders;
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

    public function getCartItems($id = null){
        $cartCollection = ($id) ? Cart::session(Orders::ORDER_NEW_SESSION_ID)->getContent() : Cart::getContent();

        $items = [];
        $empty = ($id) ? Cart::session(Orders::ORDER_NEW_SESSION_ID)->isEmpty() : Cart::isEmpty();
        if(! $empty){
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

    public function remove($id,$user_id = null)
    {
        $list = $this->getCartItems($user_id);
        $data = (isset($list[$id])) ? $list[$id] : [] ;

        if(count($data)){
            foreach ($data as $datum){
                if($user_id){
                    Cart::session(Orders::ORDER_NEW_SESSION_ID)->remove($datum->id);
                }else{
                    Cart::remove($datum->id);
                }
            }
        }else{
            if($user_id){
                Cart::session(Orders::ORDER_NEW_SESSION_ID)->remove($id);
            }else{
                Cart::remove($id);
            }
        }
    }
}