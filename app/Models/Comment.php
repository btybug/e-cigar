<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use Actuallymab\LaravelComment\Commentable;
use App\User;

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
        return $this->hasMany(self::class, 'commentable_id')->where('commentable_type', self::class)->with('commentTree');
    }

    public function treeArray()
    {
        $parent = $this->toArray();
        $parent['comment_tree'] = $this->commentTree->toArray();
        return $parent;
    }

    public function user()
    {
       return $this->belongsTo(User::class,'commented_id') ;
    }




//{
//"id": 1,
//"parent": null,
//"created": "2015-01-01",
//"modified": "2015-01-01",
//"content": "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.",
//"pings": [],
//"creator": 6,
//"fullname": "Simon Powell",
//"profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
//"created_by_admin": false,
//"created_by_current_user": false,
//"upvote_count": 3,
//"user_has_upvoted": false,
//"is_new": false
//},

}