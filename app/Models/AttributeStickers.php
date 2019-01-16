<?php

namespace App\Models;


use App\Models\Translations\AttributeTranslation;
use Illuminate\Database\Eloquent\Model;

class AttributeStickers extends Model
{
    /**
     * @var string
     */
    protected $table = 'attributes_stickers';
    /**
     * @var array
     */
    protected $guarded = ['id'];
}