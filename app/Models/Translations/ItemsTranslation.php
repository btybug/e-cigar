<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class ItemsTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'items_translations';

    protected $fillable = ['name', 'short_description', 'long_description'];
}
