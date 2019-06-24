<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/26/2018
 * Time: 10:34 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Requests\WarehouseRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRacksRequest;
use App\Models\Stickers;
use App\Models\Warehouse;
use App\Models\WarehouseRacks;
use PragmaRX\Countries\Package\Countries;

use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    protected $view = 'admin.inventory.warehouses';

    private $countries;

    public function __construct(
        Countries $countries
    )
    {
        $this->countries = $countries;
    }
    public function index ()
    {
        return $this->view('index');
    }

    public function getNew ()
    {
        $model = null;
        return $this->view('new', compact('model'));
    }

    public function postSave (WarehouseRequest $request)
    {
        $data = $request->except('_token','translatable');
        Warehouse::updateOrCreate($request->id,$data,$request->get('translatable'));

        return redirect()->route('admin_warehouses');
    }

    public function delete(Request $request)
    {
        $warehouse = Warehouse::findOrFail($request->slug);
        $warehouse->delete();

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $model = Warehouse::findOrFail($id);
        return $this->view('new', compact('model'));
    }

    public function getManage($id)
    {
        $model = Warehouse::findOrFail($id);
        $categories = $model->categories()->whereNull('parent_id')->get();
//        dd($categories);
        enableMedia();
        return $this->view('manage', compact('categories', 'model', 'type'));
    }

    public function postCategoryForm(Request $request, $w_id)
    {
        $id = $request->get('id', 0);
        $warehouse = Warehouse::findOrFail($w_id);

        $model = $warehouse->categories()->where('id', $id)->first();

        $allCategories = $warehouse->categories()->whereNull('parent_id')->get();
        $stickers = Stickers::all()->pluck('name', 'id');
        $html = $this->view("create_or_update", compact(['allCategories', 'model','warehouse' ,'stickers']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function postCategoryUpdateParent(Request $request, $w_id)
    {
        $warehouse = Warehouse::findOrFail($w_id);

        $model = $warehouse->categories()->where('id', $request->get('id'))->first();
        if ($model) {
            $model->parent_id = $request->get('parentId');
            $model->save();
        }

        return \Response::json(['error' => false]);
    }

    public function postCreateOrUpdateCategory(StoreRacksRequest $request, $w_id)
    {
        $data = $request->except('_token', 'translatable');
        $warehouse = Warehouse::findOrFail($w_id);
        $data['warehouse_id'] = $warehouse->id;
        $category = WarehouseRacks::updateOrCreate($request->id, $data,$request->get('translatable'));

        return redirect()->back();
    }

    public function postDeleteCategory(Request $request, $w_id)
    {
        $warehouse = Warehouse::findOrFail($w_id);
        $model = $warehouse->categories()->where('id', $request->get('slug'))->first();
        $model->delete();

        return response()->json(['error' => false]);
    }

    public function postGetRacksByWarehouse(Request $request)
    {
        $warehouse = Warehouse::findOrFail($request->get('w_id'));
        return response()->json(['error' => false,'data' => $warehouse->categories()->whereNull('parent_id')->get()]);
    }

    public function postGetShelvesByRack(Request $request)
    {
        $rack = WarehouseRacks::findOrFail($request->get('r_id'));
        return response()->json(['error' => false,'data' => $rack->children]);
    }
}
