<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function newPost(Request $request)
    {
        $posts = Posts::create($request->except('_token'));
        $posts->save();
    }
}
