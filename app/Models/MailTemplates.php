<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\MailTemplatesTranslations;

class MailTemplates extends Translatable
{
    /**
     * @var string
     */
    protected $table = 'mail_templates';
    /**
     * @var array
     */
    public $translationModel = MailTemplatesTranslations::class;
    protected $fillable = ['type'];
    public $translatedAttributes = ['title', 'subject', 'content'];
}