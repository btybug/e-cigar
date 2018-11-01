<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/1/2018
 * Time: 1:37 PM
 */

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['order_id','user_id','status'];



    public function shippingAddress()
    {
        return $this->hasOne(OrderAddresses::class,'order_id');
    }
    public function billingAddress()
    {
        return $this->belongsTo(Addresses::class,'billing_addresses_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function history()
    {
        return $this->hasMany(OrderHistory::class,'order_id')->with('admin');
    }

}