<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    const IN_PROGRESS=0;
    const PROCESSING=1;
    const DONE=2;
    protected $table = 'basket';
    protected $fillable = ['shop_id', 'status', 'user_id', 'discount','order_number', 'additional_data','staff_id','payment_method','tendered','changed'];

    public function shop()
    {
        return $this->belongsTo(Shops::class,'shop_id');
    }

    public function items()
    {
        return $this->hasMany(OrdersItems::class,'order_id');
    }

    public function basketItems()
    {
        return $this->belongsToMany(RackItems::class,'orders_items','order_id','item_id','id','id');
    }

    public function status()
    {
        switch ($this->status){
            case 0:'in progress';break;
            case 1:'processing';break;
            case 2:'done';break;
        }
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }
}
