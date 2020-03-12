<?php


namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\StoresTranslations;

class Stores extends Translatable
{
    protected $table = 'stores';
    protected $guarded = ['id'];
    public $translatedAttributes = ['title', 'description', 'address', 'director'];

    public $translationModel = StoresTranslations::class;

    public function contacts()
    {
        return $this->hasMany(StoreContacts::class,'stores_id');
    }
}
