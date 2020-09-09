<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:15
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Requests\AdminProfileRequest;
use App\Http\Controllers\Admin\Requests\UserAvaratRequest;
use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Couriers;
use App\Models\Dashboard;
use App\Models\Filters;
use App\Models\Items;
use App\Models\ItemsMedia;
use App\Models\Roles;
use App\Models\Stickers;
use App\Models\Stock;
use App\Models\StockAds;
use App\Models\StockBanners;
use App\Models\StockVariation;
use App\Models\Stores;
use App\Models\Translations\BrandsSeoTranslations;
use App\Models\Warehouse;
use App\Models\WarehouseRacks;
use App\Services\ManagerApiRequest;
use App\Services\UserService;
use App\Services\Widgets;
use App\User;
use PragmaRX\Countries\Package\Countries;
use App\Models\GeoZones;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;

class AdminController extends Controller
{
    private $geoZones;

    public function __construct(
        GeoZones $geoZones
    )
    {
        $this->geoZones = $geoZones;
    }

    public function getDashboard()
    {
        $widgets = \Auth::user()->widgets()->pluck('widget')->all();

        return view('admin.dashboard', compact(['widgets']));
    }

    public function fixMedia()
    {
        $items=Items::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=Brands::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=Category::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=ItemsMedia::all();
        foreach ($items as $item){
            $item->url=str_replace('/public','',$item->url);
            $item->save();
        }
        $items=StockVariation::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=Attributes::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=BrandsSeoTranslations::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=Couriers::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=Filters::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=Stickers::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=StockAds::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=StockBanners::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=Stock::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=Stores::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=WarehouseRacks::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }
        $items=Warehouse::all();
        foreach ($items as $item){
            $item->image=str_replace('/public','',$item->image);
            $item->save();
        }

    }

    public function find()
    {
        return view('admin.find', compact([]));
    }

    public function saveDashboardWidgets(Request $request)
    {
        $placeholderItems = Dashboard::where('placeholder', $request->placeholder)->where('user_id', \Auth::id())->get();
        $widgets = ($request->get('widgets')) ? explode(',', $request->get('widgets')) : [];

        if (count($widgets)) {
            foreach ($widgets as $position => $widget) {
                $widgetInPlacholder = Dashboard::where('placeholder', $request->placeholder)->where('user_id', \Auth::id())->where('widget', $widget)->first();
                if ($widgetInPlacholder) {
                    $widgetInPlacholder->update([
                        'position' => $position
                    ]);
                } else {
                    Dashboard::where('user_id', \Auth::id())->where('widget', $widget)->delete();
                    Dashboard::create([
                        'user_id' => \Auth::id(),
                        'placeholder' => $request->placeholder,
                        'position' => $position,
                        'widget' => $widget
                    ]);
                }
            }
        }

        return \Response::json(['error' => false]);
    }

    public function deleteDashboardWidget(Request $request)
    {
        $widgetInPlacholder = \Auth::user()->widgets()->where('placeholder', $request->placeholder)->where('widget', $request->key)->first();
        if ($widgetInPlacholder) {
            $widgetInPlacholder->delete();
            return \Response::json(['error' => false]);

        }
        return \Response::json(['error' => true]);
    }

    public function getProfile(Request $request, Countries $countries)
    {
        $user = \Auth::user();
        $countries = $countries->all()->pluck('name.common', 'name.common')->toArray();

        return view('admin.dashboard_profile', compact('user', 'countries'));
    }

    public function postProfileImageUpload(UserAvaratRequest $request, UserService $userService)
    {
        $result = $userService->avatarUpload($request->except('_token'));
        return response()->json($result);
    }

    public function postProfile(AdminProfileRequest $request)
    {
        $data = $request->except(['_token', 'avatar']);
        $user = \Auth::user();
        $user->update($data);

        return redirect()->back()->with('message', 'Your profile updated');
    }

    public function test()
    {
        return view('test');
        //ManagerApiRequest $request
       // dd($request->exportOrder(8));
    }

    public function getPassport()
    {
        return view('admin.passport');
    }

    public function roles()
    {
        return view('');
    }

    public function quickEmail(Request $request, Widgets $widgets)
    {
        $widgets->quickEmailSend($request);
        return ['error' => false];
    }
}
