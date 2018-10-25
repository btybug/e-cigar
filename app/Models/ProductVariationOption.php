<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariationOption extends Model
{
    protected $table = 'product_variation_options';

    protected $fillable = ['variation_id','attributes_id','options_id'];

    protected $dates = ['created_at','updated_at'];

    public function variation()
    {
        return $this->belongsTo(ProductVariation::class, 'variation_id');
    }

    public function attr()
    {
        return $this->belongsTo(Attributes::class, 'attributes_id');
    }

    public function option()
    {
        return $this->belongsTo(Attributes::class, 'options_id');
    }
}