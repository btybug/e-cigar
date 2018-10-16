<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\AttributesPost;
use App\Models\Attributes;
use App\Models\Category;
use Illuminate\Http\Request;

class AttributesController extends Controller
{

    protected $view = 'admin.inventory.attributes';

    public function getAttributes()
    {
        return $this->view('index');
    }

    public function getAttributesCreate()
    {
        $model = null;
        return $this->view('create_edit_form',compact(['model']));
    }

    public function postAttributesCreate(AttributesPost $request)
    {
        $data = $request->except('_token','translatable');
        $data['user_id'] = \Auth::id();
        Attributes::updateOrCreate($request->id,$data);
        return redirect()->route('admin_store_attributes');
    }

    public function getAttributesEdit($id)
    {
        $model = Attributes::findOrFail($id);
        $optionModel = null;
        return $this->view('create_edit_form',compact(['model','optionModel']));
    }

    public function postAttributesEdit(Request $request,$id)
    {
        $data = $request->except('_token','translatable');
        $data['user_id'] = \Auth::id();
        Attributes::updateOrCreate($id, $data);
        return redirect()->route('admin_store_attributes');
    }

    public function postAttributesOptions(Request $request,$id)
    {
        $model = Attributes::findOrFail($id);
        $data = $request->except('_token','translatable');
        $data['user_id'] = \Auth::id();
        Attributes::updateOrCreate($request->id, $data);
        return redirect()->back();
    }

    public function postAttributesOptionsForm(Request $request)
    {
        $model = Attributes::findOrFail($request->parentId);
        $optionModel = Attributes::find($request->id);

        $html = \View("admin.inventory.attributes.options_form",compact(['optionModel','model']))->render();
        return \Response::json(['error' => false,'html' => $html]);
    }

}