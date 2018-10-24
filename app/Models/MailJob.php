<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/24/2018
 * Time: 11:07 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MailJob extends Model
{
    protected $table = 'mail_job';
    protected $fillable = ['status','to', 'mail_template_id', 'sent_at', 'must_be_done','log'];

    public function email()
    {
        return $this->belongsTo(MailTemplates::class,'mail_template_id');
    }
}