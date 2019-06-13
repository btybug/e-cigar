<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Stock;

class BrandsController extends Controller
{


    protected $view = 'frontend.brands';

    public function index($slug = null)
    {
        $brands = Category::where('type', 'brands')->get();
        $slug = ($slug || !$brands->count()) ? $slug : $brands->first()->slug;
        $current = ($slug) ? Category::where('slug', $slug)->first() : null;

        return $this->view('index', compact('brands', 'slug', 'current'));
    }

}

