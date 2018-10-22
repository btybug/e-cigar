<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockVariation extends Model
{
    protected $table = 'stock_variations';

    protected $fillable = ['stock_id','variation_id','image','qty','qty_alert'];

    protected $dates = ['created_at','updated_at'];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}