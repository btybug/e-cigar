<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;

class StoreController extends Controller
{
    protected $view = 'admin.store';

    public function index()
    {
        return $this->view('index');
    }

    public function newProduct()
    {
        return $this->view('new');
    }

    public function getCategories()
    {
        $categories = Category::whereNull('parent_id')->get();
        return $this->view('categories.index',compact('categories'));
    }

    public function getNewCategory()
    {
        return $this->view('categories.new');
    }
}