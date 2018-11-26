<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/1/2018
 * Time: 1:37 PM
 */

namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\ItemTranslations;

class Items extends Translatable
{
    protected $table = 'items';
    protected $guarded = ['id'];
    public $translationModel = ItemTranslations::class;
    public $translatedAttributes = ['name', 'short_description', 'long_description'];

    public function purchase()
    {
        return $this->hasMany(Purchase::class,'item_id');
    }
}