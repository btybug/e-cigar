<?php

namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\CategoryTranslation;

class Category extends Translatable
{
    /**
     * @var string
     */
    protected $table = 'categories';
    public $translationModel = CategoryTranslation::class;
    public $translatedAttributes = ['name', 'description'];
    /**
     * @var array
     */
    protected $guarded = ['id'];

}