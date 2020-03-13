<?php


namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\StoresTranslations;

class Stores extends Translatable
{
    protected $table = 'stores';
    protected $guarded = ['id'];
    public $translatedAttributes = ['title', 'description', 'address','country', 'director'];

    public $translationModel = StoresTranslations::class;

    public function contacts()
    {
        return $this->hasMany(StoreContacts::class,'stores_id');
    }

    public function phones()
    {
        return $this->hasMany(StoreContacts::class,'stores_id')->where('type','phone');
    }
    public function emails()
    {
        return $this->hasMany(StoreContacts::class,'stores_id')->where('type','email');
    }
}
