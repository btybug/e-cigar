<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 1/24/2019
 * Time: 2:47 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    protected $view = 'admin.blog.contact_us';

    public function index()
    {
        return $this->view('index');
    }
}