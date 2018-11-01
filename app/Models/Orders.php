<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/1/2018
 * Time: 1:37 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $guarded = ['id'];

    public function shippingAddress()
    {
        return $this->hasOne(OrderAddresses::class,'order_id');
    }
}