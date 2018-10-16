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
}