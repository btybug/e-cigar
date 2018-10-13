<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Category;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    protected $view = 'admin.store.attributes';

    public function getAttributes()
    {
        return $this->view('index');
    }

    public function getAttributesCreate()
    {
        $model = null;
        return $this->view('create_edit_form',compact(['model']));
    }

    public function postAttributesCreate(Request $request)
    {
        Attributes::updateOrCreate($request->id, $request->except('_token','translatable'));
        return redirect()->route('admin_store_attributes');
    }

    public function getAttributesEdit ($id)
    {
        $model = Attributes::findOrFail($id);
        return $this->view('create_edit_form',compact(['model']));
    }

    public function postAttributesEdit(Request $request,$id)
    {
        Attributes::updateOrCreate($id, $request->except('_token','translatable'));
        return redirect()->route('admin_store_attributes');
    }

    public function getAttributesOptions ($id)
    {
        $model = Attributes::findOrFail($id);
        $options = $model->children;
        return $this->view('options.list',compact(['model','options']));
    }
}