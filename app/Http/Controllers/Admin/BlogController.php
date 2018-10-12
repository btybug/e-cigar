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
use App\Models\PostsTranslation;

class BlogController extends Controller
{
    protected $view = 'admin.blog';

    public function index()
    {
        $posts = PostsTranslation::all();
        return $this->view('index',compact('posts'));
    }

    public function create()
    {
        return $this->view('new');
    }

    public function edit($id)
    {
        return $this->view('edit');
    }
}