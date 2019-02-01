<?php
namespace App\Models\Translations;


use Illuminate\Database\Eloquent\Model;

class CommonTranslation extends Model
{
    protected $table = 'common_translations';
    public $timestamps = false;
    protected $fillable = ['description'];
}