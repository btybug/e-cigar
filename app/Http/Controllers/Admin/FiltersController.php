<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Filters;
use App\Models\Items;
use Illuminate\Http\Request;

class FiltersController extends Controller
{
    protected $view = 'admin.tools.filters';

    public function index()
    {

        return $this->view('index',compact('filters'));
    }
    public function getCreateOrEdit($id=null)
    {
        $category=Category::findOrFail($id);
        return $this->view('edit_or_create',compact('category'));
    }

    public function getItems(Request $request)
    {
        $filter=Filters::find($request->get('id'));
        $attr = Items::whereNotIn('id',$filter->items->pluck('id')->toArray())->get();
        return \Response::json(['error' => false, 'data' => $attr]);
    }

    public function postDelete(Request $request)
    {
        $model = Filters::findOrFail($request->get('slug'));
        $model->delete();
        return response()->json(['error' => false]);
    }
    public function postDetachItem(Request $request,$id)
    {
        $model = Filters::findOrFail($id);
        return response()->json(['error' => !$model->items()->detach($request->get('slug'))]);
    }
    public function postFilterForm (Request $request)
    {
        $id = $request->get('id',0);
        $category_id = $request->get('category_id');
        $child_id= $request->get('child_id');
        $category=Category::find($category_id);
        $parent = Filters::find($id);
        $child = (!$category)?$parent->children()->find($child_id):$category->filters()->find($child_id);
        $html = $this->view("create_or_update",compact(['parent','child','child_id','category']))->render();
        return \Response::json(['error' => false,'html' => $html]);
    }
    public function postGetNext (Request $request)
    {
//        $parent=Filters::findOrFail($request->get('parent'));
        $children=$request->get('filters',[]);
        $filters=collect([]);
        foreach($children as $id){
            $filters->push(Filters::find($id));
        }
        if(!$filters->last()->children()->exists()){
            $items=$filters->last()->items;
            $html =$this->view("items",compact(['items']))->render();
            return \Response::json(['error' => false,'html' => $html,'type'=>'items']);
        };

        $filters=Filters::whereIn('id',$children)->get();
        $html =$this->view("filters",compact(['children','filters']))->render();
        return \Response::json(['error' => false,'html' => $html,'type'=>'filter']);
    }



    public function postCreateOrUpdateCategory(Request $request)
    {
        $data = $request->except('_token','translatable');

        $filter = Filters::updateOrCreate($request->id, $data);
        return redirect()->back();
    }

    public function postCreateParentCategory(Request $request)
    {
        $data = $request->except('_token','translatable');
        $data['user_id']=\Auth::id();
        $data['type']='filter';

        Category::updateOrCreate($request->id, $data);
        return redirect()->back();
    }
    public function postCategoryUpdateChild(Request $request,$id)
    {
        $data = $request->except('_token','translatable','child_id','id','items');
        $data['category_id']=(!$data['parent_id'])?$data['category_id']:null;
        $filter = Filters::updateOrCreate($request->child_id, $data);
        $filter->items()->sync($request->get('items'));
        return redirect()->back();
    }
}
