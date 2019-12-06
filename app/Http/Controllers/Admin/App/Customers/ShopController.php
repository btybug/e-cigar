<?php


namespace App\Http\Controllers\Admin\App\Customers;


use App\Http\Controllers\Controller;
use App\Http\Requests\RacksRequest;
use App\Http\Requests\ShopRequest;
use App\Http\Services\WholesaleService;
use App\Models\ItemHistory;
use App\Models\RackItems;
use App\Models\Racks;
use App\Models\Shopes;
use App\Models\Shops;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = \Auth::user()->shops()->paginate(6);
        return view('customers.shops.index', compact('shops'));
    }

    public function create()
    {
        return view('customers.shops.create');
    }

    public function edit($id)
    {
        $model = \Auth::user()->shops()->findOrFail($id);
        return view('customers.shops.edit', compact('model'));
    }
    public function Items(WholesaleService $wholesaleService,$id)
    {
        $user=\Auth::getUser();
        $model = $user->shops()->findOrFail($id);
        $items = $model->items;

        $response= $wholesaleService->getItems($items->pluck("item_id")->all());

        $remoteItems=$response['items'];

        return view('customers.shops.view', compact('model','items','remoteItems'));
    }

    public function getStaff($id)
    {
        $model = \Auth::user()->shops()->findOrFail($id);
        return view('customers.shops.staff', compact('model'));
    }


    public function racks($id)
    {
        $model = \Auth::user()->shops()->findOrFail($id);
        $racks = $model->racks()->whereNull('parent_id')->get();
        return view('customers.rack.index', compact('model','racks'));
    }

    public function postRackForm(Request $request, $w_id)
    {
        $id = $request->get('id', 0);
        $shop = \Auth::user()->shops()->findOrFail($w_id);
        $model = $shop->racks()->where('id', $id)->first();
        $allCategories = $shop->racks()->whereNull('parent_id')->get();
        $html = view("customers.rack._partials.create_or_update", compact(['allCategories', 'model','shop']))->render();
        return \Response::json(['error' => false, 'html' => $html]);
    }
    public function postCreateOrUpdateRack(RacksRequest $request, $w_id)
    {
        $data = $request->except('_token', 'translatable');
        $shop = \Auth::user()->shops()->findOrFail($w_id);
        $data['shop_id'] = $shop->id;

        Racks::updateOrCreate($request->id, $data);

        return redirect()->back();
    }

    public function postDeleteRack(Request $request, $w_id)
    {
        $shop = \Auth::user()->shops()->findOrFail($w_id);
        $model = $shop->rack()->where('id', $request->get('slug'))->first();
        $model->delete();
        return response()->json(['error' => false]);
    }

    public function postRackUpdateParent(Request $request, $w_id)
    {
        $shop = \Auth::user()->shops()->findOrFail($w_id);

        $model = $shop->racks()->where('id', $request->get('id'))->first();
        if ($model) {
            $model->parent_id = $request->get('parentId');
            $model->save();
        }

        return \Response::json(['error' => false]);
    }

    public function postCreate(ShopRequest $request)
    {
        $shop = \Auth::user()->shops()->create($request->except('_token'));
        $shop->racks()->create(['name' => 'Main', 'slug' => 'main', 'is_default' => 1, 'description' => 'sale is possible only from this rack']);
        return redirect()->route('customer_shops_index');
    }

    public function postEdit(ShopRequest $request,$id)
    {
        \Auth::user()->shops()->findOrFail($id)->update($request->except('_token'));
        return redirect()->route('customer_shops_index');
    }

    public function getStorage(WholesaleService $wholesaleService)
    {
        $user=\Auth::getUser();
        $shop=$user->defaultSroage();
        $rack = $shop->getDefaultRack();
        $items=$rack->items;
        $response=$wholesaleService->getItems($items->pluck('item_id')->toArray());
        $remoteItems=$response['items'];

        return view('customers.storage.index',compact('items','remoteItems'));
    }

    public function getStorageView(WholesaleService $wholesaleService,$id,$item_id)
    {
        $shop = \Auth::user()->shops()->findOrFail($id);
        $litem = $shop->items()->findOrFail($item_id);
        $rack = $shop->racks()->where('id', $item_id)->first();
        $response = $wholesaleService->getItem($litem->item_id);
        $item = $response['item'];
        $locations = Racks::leftJoin("rack_items","racks.id","rack_items.rack_id")
            ->leftJoin("shops","racks.shop_id","shops.id")
            ->where("shops.id",$id)
            ->where("rack_items.item_id",$litem->id)
            ->select("racks.*")
            ->get();

        return view('customers.storage.view',compact('item','litem','locations'));
    }

    public function postChangePrice(Request $request,$id,$item_id)
    {
        $shop = \Auth::user()->shops()->findOrFail($id);
        $item = $shop->items()->findOrFail($item_id);
        $item->price=$request->get('price');
        $item->save();

        return redirect()->back()->with('success',"Price changed");
    }

    public function getStorageTransfer($id,$item_id)
    {
        $user=\Auth::getUser();
        $currentShop = $user->shops()->findOrFail($id);

        $shops = $user->shops()->where("shops.id","!=",$id)->pluck('name','id')->all();
        return view('customers.storage.transfer',compact('shops','currentShop'));
    }

    public function postStorageTransfer(Request $request,$id,$item_id)
    {
        $user=\Auth::getUser();
        if($request->from){
            $from = Shops::find($request->from);
            $rack_id=($request->get('from_shelve'))?$request->get('shelve'):$request->from_rack;
            $fromShelve = Racks::find($rack_id);
        }else{
            $from = $user->defaultSroage();
            $fromShelve = $from->getDefaultRack();
        }
        $rackItem = $fromShelve->items()->find($item_id);

        if(! $rackItem){
            return redirect()->back()->with('error',"Wrong shop selected");
        }
        $toRack_id=($request->get('shelve'))?$request->get('shelve'):$request->rack;
        $to = Shops::find($request->shop);
        $toShelve = Racks::find($toRack_id);

        if($rackItem->qty < $request->qty){
            return redirect()->back()->with('error',"Max qty that you can transfer is $rackItem->qty");
        }

        if($toRackItem = $toShelve->items()->where('item_id',$rackItem->item_id)->first()){
            $rackItem->update(['qty'=>($rackItem->qty - $request->qty)]);
            $toRackItem->update(['qty'=> ($toRackItem->qty + $request->qty)]);
        }else{
            $rackItem->update(['qty'=>($rackItem->qty - $request->qty)]);
            $toShelve->items()->create([
                'item_id' => $rackItem->item_id,
                'qty' => $request->qty,
                'price' => 0
            ]);
        }

        ItemHistory::create([
            'from_id' => $from->id,
            'to_id' => $to->id,
            'item_id' => $rackItem->item_id,
            'qty' => $request->qty,
            'reason' => 'Transfer'
        ]);

        return redirect()->route('customer_shops_view',$from->id)->with('message',"Successfully transferred");
    }

    public function postGetRacksByWarehouse(Request $request)
    {
        $warehouse = Shops::findOrFail($request->get('w_id'));
        return response()->json(['error' => false,'data' => $warehouse->racks()->whereNull('parent_id')->get()]);
    }

    public function postGetShelvesByRack(Request $request)
    {
        $rack = Racks::findOrFail($request->get('r_id'));
        return response()->json(['error' => false,'data' => $rack->children]);
    }

    public function getStorageHistory($id,$item_id,WholesaleService $wholesaleService)
    {
        $rack_item = RackItems::findOrFail($item_id);
        $purchases = ItemHistory::where('to_id',$id)->where("item_id",$rack_item->item_id)->get();
        $response = $wholesaleService->getItem($rack_item->item_id);
        $item = $response['item'];
//        dd($purchases[0]->from,$purchases);
        $others = ItemHistory::where('from_id',$id)->where("item_id",$rack_item->item_id)->get();

        return view('customers.storage.history',compact('purchases','others','item'));
    }
}
