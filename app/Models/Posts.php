<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\PostsTranslation;
use App\User;

class Posts extends Translatable
{
    use Commentable;

    protected $canBeRated = true;

    protected $mustBeApproved = true;

    protected $table = 'posts';

    public $translationModel = PostsTranslation::class;

    protected $guarded = ['id'];

    public $translatedAttributes = ['title', 'short_description', 'long_description'];

    public function author ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
