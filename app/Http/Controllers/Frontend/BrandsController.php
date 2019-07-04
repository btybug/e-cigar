<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;

class BrandsController extends Controller
{


    protected $view = 'frontend.brands';

    public function index($slug = null)
    {
        $brands = Category::where('type', 'brands')->whereNotNull('parent_id')->get();
        $parentBrands = Category::where('type', 'brands')->whereNull('parent_id')->get()->pluck('name','id')->all();
        $slug = ($slug || !$brands->count()) ? $slug : $brands->first()->slug;
        $current = ($slug) ? Category::where('slug', $slug)->first() : null;

        return $this->view('index', compact('brands', 'slug', 'current','parentBrands'));
    }

    public function postBrand(Request $request)
    {
        $current = Category::where('type', 'brands')->whereNotNull('parent_id')->where('id',$request->id)->first();
        if($current){
            $html = view("frontend.brands._partials.current",compact('current'))->render();
            return response()->json(['error' => false,'html' => $html]);
        }

        return response()->json(['error' => true]);
    }

}

