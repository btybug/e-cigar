<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;

use App\Models\Common\Translatable;
use App\Models\Translations\StockTranslation;
use Illuminate\Database\Eloquent\Model;

class Stock extends Translatable
{
    /**
     * @var string
     */
    protected $table = 'stocks';

    public $translationModel = StockTranslation::class;

    public $translatedAttributes = ['name','short_description','long_description'];
    /**
     * @var array
     */
    protected $guarded = ['id'];

    protected $casts = [
      'other_images' => 'json',
      'videos' => 'json',
      'posters' => 'json',
    ];

    const TYPES = [
      'DEV' => 'Devices',
      'JUE' => 'Juice',
      'DPT' => 'Devices parts',
      'ACY' => 'Accessory'
    ];

    const STATUS = [
      '0' => 'Draft',
      '1' => 'Published'
    ];

    public function attrs()
    {
        return $this->belongsToMany(Attributes::class, 'stock_attributes', 'stock_id', 'attributes_id')
            ->select('attributes.*','stock_attributes.is_shared as is_shared')->whereNull('attributes.parent_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'stock_categories', 'stock_id', 'categories_id')
            ->where('categories.type','stocks');
    }

    public function stockAttrs()
    {
        return $this->hasMany(StockAttribute::class, 'stock_id')->with('children')->whereNull('parent_id');
    }

    public function variations()
    {
        return $this->hasMany(StockVariation::class, 'stock_id');
    }

    public function forRender()
    {
        if(! $this->id) return [];

        return Attributes::leftJoin('stock_variation_options', 'attributes.id','=' ,'stock_variation_options.attributes_id')
            ->leftJoin('stock_variations', 'stock_variation_options.variation_id','=' ,'stock_variations.id')
            ->leftJoin('stocks', 'stock_variations.stock_id','=' ,'stocks.id')
//            ->leftJoin('attributes', 'product_variation_options.options_id','=' ,'attributes.id')
            ->where('stocks.id','=',$this->id)
            ->select('attributes.*','stock_variation_options.attributes_id as attr_id')
            ->distinct()
//            ->groupBy('attr_id','attributes.id','attributes.parent_id','attributes.user_id','attributes.image','attributes.icon','attributes.filter','attributes.display_as','attributes.created_at','attributes.updated_at')
            ->get();

    }
}