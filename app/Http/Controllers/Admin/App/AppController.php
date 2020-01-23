<?php


namespace App\Http\Controllers\Admin\App;


use App\Http\Controllers\Controller;

class AppController extends Controller
{
    protected $view = 'admin.app';

    public function products()
    {
        return $this->view('products.index');
    }

    public function orders()
    {
        return $this->view('orders.index');
    }
}
