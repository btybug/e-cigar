<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['post_url','post_title', 'short_description', 'long_description','status','tags'];

}
