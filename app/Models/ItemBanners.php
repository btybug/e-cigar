<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ItemBanners extends Model
{
    /**
     * @var string
     */
    protected $table = 'item_banners';
    /**
     * @var array
     */
    protected $fillable = [
        'item_id', 'image', 'url', 'tags', 'alt'
    ];

    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id');
    }
}
