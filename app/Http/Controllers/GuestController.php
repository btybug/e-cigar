<?php

namespace App\Http\Controllers;

use App\Models\GeoZones;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class GuestController extends Controller
{
    protected $view = 'frontend.guest';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getFaq()
    {
        return $this->view('faq');
    }

    public function getKnowledgeBase()
    {
        return $this->view('knowledge_base');
    }

    public function getManuals()
    {
        return $this->view('manuals');
    }

    public function getTicket()
    {
        return $this->view('ticket');
    }

    public function getTermsConditions()
    {
        return $this->view('terms_conditions');
    }

    public function getDelivery(GeoZones $geoZones)
    {

        $countries = [null => 'Select Country'] + $geoZones->groupBy('country')->pluck('country', 'country')->toArray();
        return $this->view('delivery', compact('countries'));
    }

    public function getWholeSellers()
    {
        return $this->view('whole_sellers');
    }

    public function getCities(Request $request)
    {
        $zones=GeoZones::where('country', 'Armenia')->get();
        $array=[null => 'Select Region'];
        foreach ($zones as $zone){
            $regions=json_decode($zone->regions,true);
            foreach ($regions as $region){
                $array[$region]=$region;
            }
        }
        $html=\Form::select('city',$array,null,['class'=>'form-control','id'=>'city'])->toHtml();
        return ['error'=>false,'html'=>$html] ;
    }

    public function getDeliveryPrices(Request $request)
    {

    }
}
