<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $view='frontend.blog';
    public function index()
    {
        return $this->view('index');
    }
}
