<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $view = 'frontend.my_account';

    public function index()
    {
        return $this->view('index');
    }
}
