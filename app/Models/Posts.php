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
    const APPROVED = 1;

    protected $table = 'posts';

    public $translationModel = PostsTranslation::class;

    protected $guarded = ['id'];

    protected $casts = [
      'gallery' => 'json'
    ];

    public $translatedAttributes = ['title', 'short_description', 'long_description'];

    public function author ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function approvedComments()
    {
        return $this->comments()->whereNull('parent_id')->where('status',self::APPROVED)->orderBy('created_at','desc')->get();
    }

    public function categories()
    {
        return $this->belongsToMany(CategoryPost::class, 'post_categories', 'post_id', 'categories_post_id');
    }
}
