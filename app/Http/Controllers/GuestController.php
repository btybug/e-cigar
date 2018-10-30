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

        $countries = [null => 'Select Country'] + $geoZones
                ->join('zone_countries','geo_zones.id','=','zone_countries.geo_zone_id')
                ->select('zone_countries.*','zone_countries.name as country')
                ->groupBy('country')->pluck('country', 'country')->toArray();
        return $this->view('delivery', compact('countries'));
    }

    public function getWholeSellers()
    {
        return $this->view('whole_sellers');
    }

    public function getCities(Request $request)
    {
        $zones=GeoZones::join('zone_countries','geo_zones.id','=','zone_countries.geo_zone_id')
            ->select('zone_countries.*','zone_countries.name as country')
        ->orderBy('name');
        return ['error'=>false,'html'=>\View::make($this->view.'._partials,regions')] ;
    }

    public function getDeliveryPrices(Request $request)
    {

    }
}
