<?php

namespace App\Models;

use App\Models\Common\Translatable;
use App\Models\Translations\WarehouseTranslations;

class Warehouse extends Translatable
{
    /**
     * @var string
     */

    protected $table = 'warehouses';

    public $translationModel = WarehouseTranslations::class;

    public $translatedAttributes = ['name','description', 'address'];
    /**
     * @var array
     */
    protected $guarded = ['id'];

    public function items()
    {
        return $this->belongsToMany(Items::class, 'filter_items', 'filter_id', 'item_id');
    }

    public function categories()
    {
        return $this->hasMany(WarehouseRacks::class,'warehouse_id');
    }

    public function default_rack()
    {
        return $this->categories()->where('is_default',1)->first();
    }

    public function orders()
    {
        return $this->hasMany(\App\Models\App\Orders::class,'shop_id');
    }
}
