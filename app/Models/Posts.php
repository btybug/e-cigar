<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['post_url'];

    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['post_title', 'short_description', 'long_description'];

    public function author ()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
