<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'orders_items';
    protected $guarded=['id'];

    public function order()
    {
        return $this->belongsTo(Orders::class,'order_id');
    }
}