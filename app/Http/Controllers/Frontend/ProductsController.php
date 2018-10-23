<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Products;
use View;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $view = 'frontend.products';

    public function index()
    {
        $posts = Posts::all();
        return $this->view('index', compact('posts'));
    }

    public function getSingle($post_url)
    {
        $post = Posts::where('url', $post_url)->first();
        if (!$post) abort(404);
        return $this->view('single', compact('post'));
    }

    public function getVape(Request $request)
    {
        $orderBy=$request->get('orderBy');
        $orderByArray = explode(',', $request->get('orderBy', 'id,DESC'));
        $column = $orderByArray[0];
        $direction = $orderByArray[1];
        $products = Products::leftJoin('products_translations', 'products.id', '=', 'products_translations.products_id')
            ->where('products_translations.locale', app()->getLocale())
            ->where('type', 'vape')
            ->where('status', 'published')
            ->select('products.*', 'products_translations.title', 'products_translations.title')
            ->orderBy($column, $direction)->paginate(5);
        return $this->view('vapes', compact('products','orderBy'));
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
