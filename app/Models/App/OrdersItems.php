<?php


namespace App\Models\App;


use Illuminate\Database\Eloquent\Model;

class OrdersItems extends Model
{
    protected $table = 'basket_items';
    const TYPES=[0=>'Sold','1'=>'Gift'];
    const GIFT=0;
    const SOLD=0;

    protected $fillable=['basket_id','discount_offer_id','item_id','type','qty','price'];

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Orders::class,'basket_id');
    }

    public function items()
    {
        return $this->belongsTo(Items::class,'item_id');
    }

    public function discountOffers()
    {
        return $this->belongsToMany(AppOffersDiscount::class,'app_basket_offer_discounts','basket_id','discount_offer_id');
    }

}
