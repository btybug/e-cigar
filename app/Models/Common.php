<?php

namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\CategoryTranslation;
use App\Models\Translations\CommonTranslation;

class Common extends Translatable
{
    /**
     * @var string
     */
    protected $table = 'common';

    public $translationModel = CommonTranslation::class;

    public $translatedAttributes = ['description'];
    /**
     * @var array
     */
    protected $guarded = ['id'];
}