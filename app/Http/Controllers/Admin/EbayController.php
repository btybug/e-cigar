<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class EbayController extends Controller
{
    protected $view = 'admin.ebay';

    public function settings()
    {
        return $this->view('settings');
    }
}
