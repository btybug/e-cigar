<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $view='frontend.blog';

    public function index()
    {
        $posts = Posts::all();
        return $this->view('index',compact('posts'));
    }

    public function getSingle($post_url)
    {
        $post = Posts::where('url',$post_url)->first();
        if(! $post) abort(404);

//        dd($post->comments[0]->childrens);
        return $this->view('single_post',compact('post'));
    }
}
