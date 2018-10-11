<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    protected $view = 'admin.store';

    public function index()
    {
        return view($this->view('index'));
    }

    public function newProduct()
    {
        return view($this->view('new'));
    }

    public function getCategories()
    {
        return view($this->view('categories.index'));
    }

    public function getNewCategory()
    {
        return view($this->view('categories.new'));
    }
}