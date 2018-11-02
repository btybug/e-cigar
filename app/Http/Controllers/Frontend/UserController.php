<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\Requests\VerificationRequest;
use App\Http\Requests\AddressesRequest;
use App\Models\Addresses;
use App\Models\GeoZones;
use App\Models\Media\Folders;
use App\Models\Media\Items;
use App\Models\ZoneCountries;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class UserController extends Controller
{
    private $countries;
    private $geoZones;

    public function __construct(
        Countries $countries,
        GeoZones $geoZones
    )
    {
        $this->countries = $countries;
        $this->geoZones = $geoZones;
    }

    protected $view = 'frontend.my_account';

    public function index()
    {
        $user = \Auth::user();
        return $this->view('index', compact('user'));
    }

    public function getFavourites()
    {
        return $this->view('favourites');
    }

    public function getAddress()
    {
        $user=\Auth::user();
        $billing_address=$user->addresses()->where('type','billing_address')->first();
        $default_shipping=$user->addresses()->where('type','default_shipping')->first();
        $address=$user->addresses()->where('type','address_book')->pluck('company','id');
        $countries = $this->countries->all()->pluck('name.common','name.common')->toArray();
        $countriesShipping = [null => 'Select Country'] + $this->geoZones
                ->join('zone_countries','geo_zones.id','=','zone_countries.geo_zone_id')
                ->select('zone_countries.*','zone_countries.name as country')
                ->groupBy('country')->pluck('country', 'id')->toArray();

        return $this->view('address',compact('billing_address','default_shipping','address','countries','countriesShipping'));
    }

    public function postAddress(AddressesRequest $request)
    {
        $data=$request->except('_token');
        $data['user_id']=\Auth::id();
        Addresses::updateOrCreate(['id'=>$request->get('id',null),'user_id'=>$data['user_id']],$data);
        return redirect()->back();
    }

    public function postAddressBookForm (Request $request)
    {
        $id = $request->get('id',0);
        $address_book= \Auth::user()->addresses()->find($id);
        $countriesShipping = [null => 'Select Country'] + $this->geoZones
                ->join('zone_countries','geo_zones.id','=','zone_countries.geo_zone_id')
                ->select('zone_countries.*','zone_countries.name as country')
                ->groupBy('country')->pluck('country', 'id')->toArray();

        $html = $this->view('_partials.new_address',compact(['address_book','countriesShipping']))->render();

        return \Response::json(['error' => false,'html'=>$html]);
    }

    public function postAddressBookSelect (Request $request)
    {
        $address = Addresses::findOrFail($request->id);

        $html = $this->view('_partials.render_address',compact(['address']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postAddressBookSave (AddressesRequest $request)
    {
        $data=$request->except('_token');
        $data['user_id']=\Auth::id();
        if($request->get('make_default')){
            $data['type'] = 'default_shipping';
            \Auth::user()->addresses()->where('type','default_shipping')->update(['type' => 'address_book']);
        }
        Addresses::updateOrCreate(['id'=>$request->get('id',null),'user_id'=>$data['user_id']],$data);

        return \Response::json(['error' => false]);
    }

    public function getOrders()
    {
        $user=\Auth::user()->with('orders')->first();
        return $this->view('orders',compact('user'));
    }

    public function getTickets()
    {
        return $this->view('tickets');
    }

    public function getLogs()
    {
        return $this->view('logs');
    }

    public function getPassword()
    {
        return $this->view('password');
    }

    public function getVerification()
    {
        return $this->view('verification');
    }

    public function getPayments()
    {
        return $this->view('payment');
    }

    public function postVerification(VerificationRequest $request)
    {
        $item = $request->file('verification_image');
        $user = \Auth::user();
        $folder = Folders::where('name', 'drive')->first();
        if ($folder && \File::isDirectory($folder->path())) {
            $realName = $user->id . '.' . $request->get('verification_type');
            $originalName = md5(uniqid()) . '.' . $item->getClientOriginalExtension();
            if ($item->move($folder->path(), $originalName)) {
                $item = Items::create([
                    'original_name' => $originalName,
                    'real_name' => $realName,
                    'extension' => $item->getClientOriginalExtension(),
                    'size' => \File::size($folder->path() . DIRECTORY_SEPARATOR . $originalName),
                    'folder_id' => $folder->id
                ]);
            }
        }
        $user->verification_image=$item->relativeUrl;
        $user->verification_type=$request->get('verification_type');
        $user->save();
        return redirect()->back();
    }
}

