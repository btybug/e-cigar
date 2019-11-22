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

class OrderInvoice extends Model
{
    protected $table = 'order_invoices';
    protected $guarded = ['id'];

    const ORDER_NEW_SESSION_ID = 'order_new';


    public function shippingAddress()
    {
        return $this->hasOne(OrderInvoiceAddresses::class, 'order_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo(Addresses::class, 'billing_addresses_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function history()
    {
        return $this->hasMany(OrderInvoiceHistory::class, 'order_id')->orderBy('id', 'DESC')->with('admin');
    }

    public function items()
    {
        return $this->hasMany(OrderInvoiceItem::class, 'order_id');
    }


    public function coupon()
    {
        return $this->hasOne(Coupons::class, 'code','coupon_code');
    }

}