<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $settings;

    public function __construct(Settings $settings)
    {
        $this->middleware(['auth', 'verified']);
        $this->settings = $settings;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = $this->settings->getEditableData('banners');
        $banners = ($banners->data) ? json_decode($banners->data,true) : [];

//        public/media/drive/Banners/6770493469a66ce503996020c26c2933.html
//        $html = \File::get('public/media/drive/Banners/6770493469a66ce503996020c26c2933.html');
//        dd($html);
        return view('welcome',compact(['banners']));
    }

    public function getFaq()
    {
        return view('faq');
    }
}
