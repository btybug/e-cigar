<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\CouponsRequest;
use App\Http\Requests\PurchaseRequest;
use App\Models\Coupons;
use App\Models\Items;
use App\Models\Products;
use App\Models\Purchase;
use App\Models\ShippingZones;
use App\Models\StockVariation;
use Carbon\Carbon;
use PragmaRX\Countries\Package\Countries;
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
        $model = new Products();
        return $this->view('new',compact('model'));
    }

    public function getCoupons()
    {
        return $this->view('coupons');
    }

    public function getCouponsNew()
    {
        $coupons = null;
        return $this->view('coupons_new',compact('coupons'));
    }
    public function CouponsSave(CouponsRequest $request)
    {
        $data = $request->except('_token');
        Coupons::updateOrCreate($request->id, $data);
        return redirect(route('admin_store_coupons'));
    }

    public function Delete($id)
    {
        Coupons::find($id)->delete();
        return redirect(route('admin_store_coupons'));
    }

    public function Edit($id)
    {
        $coupons = Coupons::find($id);
        return $this->view('coupons_new',compact('coupons'));
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


    public function getPurchase ()
    {
        return $this->view('purchase.index',compact(''));
    }

    public function getPurchaseNew ()
    {
        $model = null;
        $items=Items::all()->pluck('name','id');
        return $this->view('purchase.new',compact('model','items'));
    }

    public function postSaveOrUpdate (PurchaseRequest $request)
    {
        $data = $request->except('_token');

        $data['purchase_date'] = Carbon::parse($data['purchase_date']);
        $data['user_id'] = \Auth::id();
        Purchase::create($data);
        return redirect()->route('admin_store_purchase');
    }

    public function EditPurchase ($id)
    {
        $data = Purchase::find($id);
        if(! count($data)) abort(404);

        return $this->view('purchase.edit',compact('data','sku'));
    }


    public function getStockBySku (Request $request)
    {
        $sku = $request->get('sku');
        $variation = StockVariation::where('variation_id',$sku)->first();
        if($variation){
            $vape = $variation->stock;
            $html = $this->view('purchase.product',compact('vape','variation'))->render();

            return \Response::json(['error' => false,'html' => $html]);
        }

        return \Response::json(['error' => true]);
    }

}