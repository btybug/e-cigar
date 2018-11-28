<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/28/2018
 * Time: 9:59 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Items;
use App\Models\Others;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    protected $view = 'admin.inventory.other';

    public function getIndex()
    {
        return $this->view('index');
    }

    public function getNew()
    {
        $items = Items::all()->pluck('name', 'id');
        $model = null;
        return $this->view('new', compact('model', 'items'));
    }

    public function postOthers(Request $request)
    {
        $data = $request->only(['item_id', 'qty', 'reason', 'notes']);
        $id = $request->get('id');
        $qty = $data['qty'];
        if ($id) {
            $other = Others::findOrFail($id);
            $qty = $data['qty'] - $other->qty;
        }
        $item = Items::findOrFail($data['item_id']);
        $item->quantity = $item->quantity - $qty;

        $data['user_id']=\Auth::id();
        Others::updateOrCreate($request->only('id'),$data);
        $item->save();
        return redirect()->route('admin_inventory_other');
    }

}