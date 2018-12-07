<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockVariationOption extends Model
{
    protected $table = 'stock_variation_options';

    protected $fillable = ['variation_id','attributes_id','options_id'];

    protected $dates = ['created_at','updated_at'];

    public function variation()
    {
        return $this->belongsTo(StockVariation::class, 'variation_id');
    }

    public function attr()
    {
        return $this->belongsTo(Attributes::class, 'attributes_id');
    }

    public function option()
    {
        return $this->belongsTo(Stickers::class, 'options_id');
    }
}