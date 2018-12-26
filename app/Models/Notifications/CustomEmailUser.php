<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 12/26/2018
 * Time: 3:37 PM
 */

namespace App\Models\Notifications;


use Illuminate\Database\Eloquent\Model;

class CustomEmailUser extends Model
{
    protected $table = 'custom_email_user';

    protected $guarded=['id'];
}