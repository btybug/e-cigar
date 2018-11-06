<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $table = 'comments';

    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->where('status', true);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function childrenAll()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}