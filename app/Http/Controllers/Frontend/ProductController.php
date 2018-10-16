<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $view='frontend.products';

    public function index()
    {
        return $this->view('products');
    }

    public function favorites()
    {
        return $this->view('favorites');
    }
}
