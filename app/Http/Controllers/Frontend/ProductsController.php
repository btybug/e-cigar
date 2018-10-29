<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
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
            ->select('products.*', 'products_translations.name')
            ->orderBy($column, $direction)->paginate(5);
        $attributes=Attributes::where('filter',1)->whereNull('parent_id')->with('children')->get();
        return $this->view('vapes', compact('products','orderBy','attributes'));
    }

    public function singleVape($id)
    {
        $vape=Products::findOrFail($id);
        $variations = $vape->variations()->with('options')->get();
        return $this->view('single_vape',compact('vape','variations'));
    }

    public function getJuice()
    {
        return $this->view('juice');
    }
}
