<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class ProductsTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'products_translations';

    protected $fillable = ['title', 'short_description', 'long_description'];
}
