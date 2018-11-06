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

    public function general()
    {
        return $this->view('general');
    }

    public function getSocial()
    {
        return $this->view('social');
    }

    public function getBulk()
    {
        return $this->view('bulk');
    }

}