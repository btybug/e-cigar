<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class StockStickers extends Model
{
    protected $table = 'stock_stickers';

    public function sticker()
    {
       return $this->belongsTo(Stickers::class,'sticker_id');
    }

}
