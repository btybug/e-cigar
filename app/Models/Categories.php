<?php
namespace App\Models;


use App\Models\Common\Translatable;

class Categories extends Translatable
{
    /**
     * @var string
     */
    protected $table = 'categories';

    public $translatedAttributes = ['name', 'description'];
    /**
     * @var array
     */
    protected $guarded = ['id'];

}