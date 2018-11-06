<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/6/2018
 * Time: 10:41 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class SeoController extends Controller
{
    protected $view = 'admin.seo';

    public function getPosts()
    {
        return $this->view('posts');
    }

    public function getStocks()
    {
        return $this->view('stocks');
    }

    public function getBulk()
    {
        return $this->view('bulk');
    }

}