<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Products;
use View;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $view='frontend.products';

    public function index()
    {
        $posts = Posts::all();
        return $this->view('index',compact('posts'));
    }

    public function getSingle($post_url)
    {
        $post = Posts::where('url',$post_url)->first();
        if(! $post) abort(404);
        return $this->view('single',compact('post'));
    }

    public function getVape()
    {
        $products=Products::where('type','vape')->where('status','published')->orderBy('id','DESC')->paginate(15);
        return $this->view('vapes',compact('products'));
    }

    public function singleVape($id)
    {
//        $vape=Products::
        return $this->view('single_vape');
    }

    public function getJuice()
    {
        return $this->view('juice');
    }
}
