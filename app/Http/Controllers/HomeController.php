<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $this->settings = $settings;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        40564344854

//        $printerId = 'bc1b47fb-d23d-be25-3cb4-78cfa410fc3b';
//        \GoogleCloudPrint::asText()
//            ->content('Sahak like rainbow color :D')
//            ->printer($printerId)
//            ->marginsInCentimeters(1, 1, 1, 1)
//            ->send();
//
//        dd('done');

        $banners = $this->settings->getEditableData('banners');
        $banners = ($banners->data) ? json_decode($banners->data, true) : [];
        $categories = Category::where('type', 'stocks')->whereNull('parent_id')->get();
        $brands = Category::where('type','brands')->whereNull('parent_id')->get();
        $tops = $this->settings->getEditableData('top');
        $tops = ($tops->data) ? json_decode($tops->data, true) : [];
//        dd($tops);
        return view('welcome', compact(['banners','categories','brands','tops']));
    }

    public function topProduct(Request $request)
    {
        $key = $request->key;
        $tops = $this->settings->getEditableData('top');
        $tops = ($tops->data) ? json_decode($tops->data, true) : [];
        $topProducts = (count($tops) && isset($tops['products'][$key])) ? $tops['products'][$key] : [];

        $html = view('frontend._partials.top_products',compact(['topProducts']))->render();

        return response()->json(['error'=> false,'html'=> $html]);
    }

    public function getFaq()
    {
        return view('faq');
    }

    public function verifyWholesaler(){
        return view('auth.verify_wholesaler');
    }
}
