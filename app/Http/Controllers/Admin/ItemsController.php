<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/26/2018
 * Time: 10:34 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ItemsRequest;
use App\Models\Attributes;
use App\Models\Items;

class ItemsController extends Controller
{
    protected $view = 'admin.items';

    public function index()
    {
        return $this->view('index');
    }

    public function getNew()
    {
        $model=null;
        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();
        return $this->view('new',compact('model','allAttrs'));
    }

    public function postNew(ItemsRequest $request)
    {
        $data = $request->except('_token', 'translatable');
        Items::updateOrCreate($request->id, $data);
        return redirect()->route('admin_items');
    }

    public function getPurchase($id)
    {
        $item=Items::FindOrFail($id);
        return $this->view('purchase',compact('item'));
    }

    public function getSuppliers()
    {
        return $this->view('suppliers.index');
    }
    public function getSaleChannels()
    {
        return $this->view('sale_channels.index');
    }
}