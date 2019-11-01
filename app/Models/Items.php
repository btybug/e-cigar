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

    protected $casts = [
        'manual_codes' => 'json',
    ];
    public $translationModel = ItemTranslations::class;

    public $translatedAttributes = ['name', 'short_description', 'long_description'];

    protected $appends = array('qty','barcodes');

    const ACTIVE = 1;
    const DRAFT = 1;

    public function getQtyAttribute()
    {
        return ($this->type == 'simple') ? $this->purchase()->sum('qty') - $this->others()->sum('qty') : 0;
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE)->where('is_archive',false);
    }

    public function getBarcodesAttribute()
    {
        return Barcodes::all()->pluck('code','id');
    }

    public function scopeMain($query)
    {
        return $query->where('is_archive', false);
    }
    public function scopeArchive($query)
    {
        return $query->where('is_archive', true);
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'item_id');
    }

    public function barcode()
    {
        return $this->belongsTo(Barcodes::class, 'barcode_id');
    }

    public function brand()
    {
        return $this->belongsTo(Category::class, 'brand_id');
    }

    public function media()
    {
        return $this->hasMany(ItemsMedia::class, 'item_id')->where('items_media.type','image');
    }

    public function videos()
    {
        return $this->hasMany(ItemsMedia::class, 'item_id')->where('items_media.type','video');
    }

    public function suppliers()
    {
        return $this->belongsToMany(Suppliers::class, 'item_suppliers', 'item_id', 'supplier_id');
    }

    public function packages()
    {
        return $this->hasMany(ItemsPackages::class, 'item_id');
    }

    public function locations()
    {
        return $this->hasMany(ItemsLocations::class, 'item_id');
    }

    public function others()
    {
        return $this->hasMany(Others::class, 'item_id');
    }

    public function specificationsPivot()
    {
        return $this->belongsToMany(Attributes::class, 'item_specifications', 'item_id', 'attributes_id');
    }

    public function specifications()
    {
        return $this->hasMany(ItemSpecification::class, 'item_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'item_categories', 'item_id', 'categories_id')
            ->where('categories.type', 'stocks');
    }
}
