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
use App\Models\Warehouse;
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

    public function delete(Request $request,$id)
    {
        $warehouse = Warehouse::findOrFail($id);
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

        return $this->view('manage', compact('model'));
    }
}
