<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    protected $view='admin.front_pages.stores';
    public function index()
    {
        return $this->view('index');
    }

    public function editOrCreate($id=null)
    {
        $shop=null;
        return $this->view('edit_create',compact('shop'));
    }
}
