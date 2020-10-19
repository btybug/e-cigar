<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class ItemStickers extends Model
{
    protected $table = 'item_stickers';

    public function sticker()
    {
       return $this->belongsTo(Stickers::class,'sticker_id');
    }

}
