<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class EmailsTranslations extends Model
{
    protected $table = 'email_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'subject','content'];
}