<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\EmailsTranslations;

class Emails extends Translatable
{
    /**
     * @var string
     */
    protected $table = 'emails';
    /**
     * @var array
     */
    public $translationModel = EmailsTranslations::class;
    protected $fillable = ['slug'];
    public $translatedAttributes = ['title', 'subject', 'content'];

}