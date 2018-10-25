<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $table = 'product_variations';

    protected $fillable = ['product_id','variation_id','image','qty','qty_alert'];

    protected $dates = ['created_at','updated_at'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function options()
    {
        return $this->hasMany(ProductVariationOption::class, 'variation_id');
    }
}