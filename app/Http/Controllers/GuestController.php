<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\GeoZones;
use App\Models\ZoneCountries;
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
    private $countries;

    public function __construct(Countries $countries)
    {
        $this->countries = $countries;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getFaq()
    {
        $categories = Category::where('type','faq')->whereNull('parent_id')->get();
        $category = $categories->first();

        return $this->view('faq',compact(['categories','category']));
    }

    public function getFaqByCategory(Request $request)
    {
        $category = Category::where('type','faq')->where('id',$request->uid)->first();
        if($category){
            $html = $this->view('_partials.faq_questions',compact(['category']))->render();

            return \Response::json(['error' => false,'html' => $html]);
        }

        return \Response::json(['error' => true]);
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

    public function getRegionsByCountry(Request $request)
    {
        if(! $request->country) return ['error' => true];

        $data = $this->countries->where('name.common', $request->country)->first()->hydrateStates()->states->pluck('name', 'name')->toArray();
        return ['error'=>false,'data'=> $data] ;
    }

    public function getRegionsByGeoZone(Request $request)
    {
        $country = ZoneCountries::find($request->get('country',0));
        if(! $request->country) return ['error' => true];

        $data = $country->regions->pluck('name','id');
        if($data)
        return ['error'=>false,'data'=> $data] ;
    }
}
