<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use Actuallymab\LaravelComment\Commentable;

class Comment extends \Actuallymab\LaravelComment\Models\Comment
{
    use Commentable;

    protected $canBeRated = true;

    protected $mustBeApproved = true;

    public function children()
    {
        return $this->where('commentable_type', self::class)->where('commentable_id', $this->id);
    }

    public function commentTree()
    {
        return $this->hasMany(self::class,'commentable_id')->where('commentable_type', self::class)->with('commentTree');
    }
}