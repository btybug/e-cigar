<?php
namespace App\Models\Translations;


use Illuminate\Database\Eloquent\Model;

class CategoryPostTranslation extends Model
{
    protected $table = 'categories_post_translations';
    public $timestamps = false;
    protected $fillable = ['name','description'];
}