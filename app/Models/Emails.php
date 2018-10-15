<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    /**
     * @var string
     */
    protected $table = 'emails';
    /**
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'mail_template_id','description','is_core'
    ];

    public function template()
    {
        return $this->belongsTo(MailTemplates::class,'mail_template_id');
    }
}