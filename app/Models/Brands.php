<?php


namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\BrandsTranslation;

class Brands extends Translatable
{
    protected $table = 'brands';

    protected $guarded=['id'];

    public $translationModel = BrandsTranslation::class;

    public $translatedAttributes = ['name', 'description'];

    public function stickers()
    {
        return $this->belongsToMany(Stickers::class,'brand_stickers','brand_id','sticker_id');
    }

    public function products()
    {
        $role = get_role_for_product();
        return $this->hasMany(Stock::class,'brand_id')->leftJoin('stock_variations', 'stocks.id', '=', 'stock_variations.stock_id')
            ->leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id')
            ->where('stock_translations.locale', app()->getLocale())
            ->where('stock_variations.role_id', $role->id)
            ->where('stocks.status',true)
            ->select('stocks.*')
            ->groupBy('stocks.id');
    }
}
