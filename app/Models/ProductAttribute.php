<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attributes';

    protected $fillable = ['product_id','attributes_id','parent_id','is_shared'];

    protected $dates = ['created_at','updated_at'];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function product()
    {
        return $this->belongsTo(Stock::class, 'product_id');
    }

    public function attr()
    {
        return $this->belongsTo(Attributes::class, 'attributes_id');
    }
}