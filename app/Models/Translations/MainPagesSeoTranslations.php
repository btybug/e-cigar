<?php


namespace App\Models\Translations;


use Illuminate\Database\Eloquent\Model;

class MainPagesSeoTranslations extends Model
{
    protected $table = 'main_pages_seo_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'keywords'];

}
