<?php


namespace App\Models\App;


use Illuminate\Database\Eloquent\Model;

class OrdersItems extends Model
{
    protected $table = 'basket_items';

    protected $fillable=['basket_id','item_id','qty','price'];

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Orders::class,'basket_id');
    }

    public function items()
    {
        return $this->belongsTo(Items::class,'item_id');
    }

}
