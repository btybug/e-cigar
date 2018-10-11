<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $view='frontend.shop';
    public function index()
    {
        return $this->view('index');
    }
}
