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
    ];

    const TYPES = [
      'DEV' => 'Devices',
      'JUE' => 'Juice',
      'DPT' => 'Devices parts',
      'ACY' => 'Accessory'
    ];

    public function attrs()
    {
        return $this->belongsToMany(Attributes::class, 'stock_attributes', 'stock_id', 'attributes_id')->whereNull('attributes.parent_id');
    }

    public function variations()
    {
        return $this->hasMany(StockVariation::class, 'stock_id');
    }
}