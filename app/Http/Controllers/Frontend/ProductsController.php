<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use View;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $view='frontend.products';

    public function index()
    {
        return $this->view('index');
    }

    public function getSingle($p_id)
    {
        return $this->view('single');
    }
}
