<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class MailTemplatesTranslations extends Model
{
    protected $table = 'categories_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'subject','content'];
}