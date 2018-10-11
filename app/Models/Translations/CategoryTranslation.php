<?php
namespace App\Models\Translations;


use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'categories_translations';
    public $timestamps = false;
    protected $fillable = ['name','description'];
}