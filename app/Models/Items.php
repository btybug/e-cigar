<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/1/2018
 * Time: 1:37 PM
 */

namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\ItemTranslations;

class Items extends Translatable
{
    protected $table = 'items';
    protected $guarded = ['id'];
    public $translationModel = ItemTranslations::class;
    public $translatedAttributes = ['name', 'short_description', 'long_description'];

    public function purchase()
    {
        return $this->hasMany(Purchase::class,'item_id');
    }

    public function barcode()
    {
        return $this->belongsTo(Barcodes::class,'barcode_id');
    }

    public function media()
    {
        return $this->hasMany(ItemsMedia::class,'item_id');
    }

    public function suppliers()
    {
        return $this->belongsToMany(Suppliers::class, 'item_suppliers', 'item_id', 'supplier_id');
    }

    public function packages()
    {
        return $this->hasMany(ItemsPackages::class,'item_id');
    }

    public function others()
    {
        return $this->hasMany(Others::class,'item_id');
    }

    public function specificationsPivot()
    {
        return $this->belongsToMany(Attributes::class, 'item_specifications', 'item_id', 'attributes_id');
    }

    public function specifications()
    {
        return $this->hasMany(ItemSpecification::class, 'item_id');
    }
}
