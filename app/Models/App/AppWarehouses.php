<?php


namespace App\Models\App;


use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;

class AppWarehouses extends Model
{
    protected $table = 'app_warehouses';

    protected $guarded = ['id'];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function offers()
    {
        return $this->hasMany(AppOffersDiscount::class,'app_warehouse_id');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class,'app_warehouse_id');
    }
}
