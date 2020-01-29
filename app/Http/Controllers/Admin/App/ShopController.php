<?php


namespace App\Http\Controllers\Admin\App;


use App\Http\Controllers\Controller;
use App\Http\Requests\RacksRequest;
use App\Models\Warehouse;
use App\Models\WarehouseRacks;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $view = 'admin.app.locations';
    public function index($q=null)
    {
        $model= ($q)?Warehouse::findOrFail($q):Warehouse::first();
        $warehouses=Warehouse::all()->pluck('name','id');
        $racks = $model->categories()->whereNull('parent_id')->get();
        return $this->view('index', compact('model','q','warehouses','racks'));
    }

    public function postRackForm(Request $request, $w_id)
    {
        $id = $request->get('id', 0);
        $shop = Warehouse::findOrFail($w_id);
        $model = $shop->categories()->find($id);
        $allCategories = $shop->categories()->whereNull('parent_id')->get();
        $html = view("admin.app.locations.create_or_update", compact(['allCategories', 'model','shop']))->render();
        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function postCreateOrUpdateRack(RacksRequest $request, $w_id)
    {
        $data = $request->except('_token', 'translatable');
        $shop = Warehouse::findOrFail($w_id);
        if(!$shop->categories()->where('is_default',1)->exists()){
            $data['is_default'] = 1;
        }
        $data['warehouse_id'] = $shop->id;
        WarehouseRacks::updateOrCreate($request->id, $data);

        return redirect()->back();
    }
}
