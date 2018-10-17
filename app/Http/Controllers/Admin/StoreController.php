<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingZonePost;
use App\Http\Requests\StoreCategoryPost;
use App\Models\Category;
use App\Models\ShippingZones;
use DB;
use PragmaRX\Countries\Package\Countries;
use Lang;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $view = 'admin.store';

    public function index()
    {
        return $this->view('index');
    }

    public function newProduct()
    {
        $model = new Category();
        return $this->view('new',compact('model'));
    }

    public function getCategories()
    {
        $categories = Category::whereNull('parent_id')->get();
        $allCategories = Category::all();
        enableMedia();
        return $this->view('categories.index',compact('categories','model','allCategories'));
    }

    public function postCategoryForm (Request $request)
    {
        $id = $request->get('id',0);
        $model = Category::find($id);
        $allCategories = Category::where('id','!=',$id)->get();
        $html = \View("admin.store.categories.create_or_update",compact(['allCategories','model']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postCategoryUpdateParent (Request $request)
    {
        $model = Category::find($request->get('id'));
        if($model){
            $model->parent_id = $request->get('parentId');
            $model->save();
        }

        return \Response::json(['error' => false]);
    }

    public function postCreateOrUpdateCategory(StoreCategoryPost $request)
    {
        $data = $request->except('_token','translatable');
        $data['user_id'] = \Auth::id();
        Category::updateOrCreate($request->id, $data);
        return redirect()->back();
    }

    public function postDeleteCategory (Request $request)
    {
        $model = Category::find($request->get('id'));
        if($model){
            $model->delete();
        }

        return redirect()->back();
    }


    public function getShippingZones()
    {
        $zones = ShippingZones::all();
        return $this->view('shipping_zones',compact('zones'));
    }

    public function getTaxRate()
    {
        return $this->view('tax_rate');
    }

    public function getSettings()
    {
        return $this->view('settings');
    }

    public function getCoupons()
    {
        return $this->view('coupons');
    }

    public function getCouponsNew()
    {
        return $this->view('coupons_new');
    }

    public function getCategory(Request $request)
    {
        $lang = Lang::getLocale();
        return Category::LeftJoin('categories_translations', 'categories.id', '=', 'categories_translations.category_id')
            ->select('categories.*', 'categories_translations.name')
            ->where('categories_translations.name', 'like', '%' . $request->get('q') . '%')
            ->where('categories_translations.locale',$lang)
            ->get();
    }

    public function saveTags(Request $request)
    {
       dd($request->all());
    }

    public function getProducts(Request $request)
    {
        dd($request->all());
        return $this->view('coupons_new');
    }

    public function newShippingZones(Countries $countries)
    {
        $countries = $countries->all()->pluck('name.common','name.common')->toArray();
        return $this->view('new_shipping_zone',compact('countries'));
    }

    public function getShippingNew(Countries $countries)
    {
        $shipping_zone = null;
        $countries = $countries->all()->pluck('name.common','name.common')->toArray();
        return $this->view('new_shipping_zone',compact('countries','shipping_zone'));
    }

    public function getregions(Countries $countries)
    {
        dd($countries);
        return $this->view('new_shipping_zone',compact('countries'));
    }

    public function saveShippingNew(ShippingZonePost $request)
    {
        $data = $request->except('_token');
        ShippingZones::updateOrCreate($request->id,$data);
        return redirect(route('admin_store_shipping_zones'));
    }

    public function editShippingZone(Countries $countries,$id)
    {
        $shipping_zone = ShippingZones::find($id);
        $countries = $countries->all()->pluck('name.common','name.common')->toArray();
        return $this->view('new_shipping_zone',compact('countries','shipping_zone'));
    }

    public function findRegion(Request $request)
    {
        $coontries = new Countries();
        $posible = array();
        $regions = $coontries->where('name.common', $request->country)->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        foreach ($regions as $region)
        {
            if (preg_match("/(" . $request->id . ")/i",$region))
            {
                $posible[] = $region;
            }
        }
       return \Response::json(['error'=>false,'data'=>$posible]);
    }

    public function getDatatable(Request $request)
    {

    }


}