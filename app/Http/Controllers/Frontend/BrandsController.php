<?php

namespace App\Http\Controllers\Frontend;



use App\Http\Controllers\Controller;
use App\Models\Category;

class BrandsController extends Controller
{


    protected $view = 'frontend.brands';

    public function index()
    {
        $brands=Category::where('is_brand',1)->whereNotNull('parent_id')->get();
        return $this->view('index',compact('brands'));
    }

}

