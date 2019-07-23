<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/26/2018
 * Time: 10:39 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ItemsLocations extends Model
{
    protected $table = 'item_locations';
    protected $guarded=['id'];

    public function item()
    {
        return $this->belongsTo(Items::class,'item_id');
    }

    public function warehouse()
    {
        return $this->hasOne(Warehouse::class,'id','warehouse_id');
    }

    public function rack()
    {
        return $this->hasOne(WarehouseRacks::class,'id','rack_id');
    }



}
