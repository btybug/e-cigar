<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 1/24/2019
 * Time: 2:47 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    protected $view = 'admin.blog.contact_us';

    public function index()
    {
        return $this->view('index');
    }

    public function getView($id)
    {
        $model=ContactUs::findOrFail($id);
        return $this->view('view',compact('model'));
    }
}