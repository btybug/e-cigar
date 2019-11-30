<?php


namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\MainPagesSeoTranslations;

class MainPagesSeo extends Translatable
{
    protected $table = 'main_pages_seo';

    public $translatedAttributes = ['title', 'description', 'keywords','image'];

    protected $guarded = ['id'];

    public $translationModel = MainPagesSeoTranslations::class;
}
