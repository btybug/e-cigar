<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
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
        $filter=Filters::findOrFail($id);
        return $this->view('edit_or_create',compact('filter'));
    }

    public function getItems(Request $request)
    {
        $filter=Filters::find($request->get('id'));
        $attr = Items::whereNotIn('id',$filter->items->pluck('id')->toArray())->get();
        return \Response::json(['error' => false, 'data' => $attr]);
    }
    public function postFilterForm (Request $request)
    {
        $id = $request->get('id',0);
        $child_id= $request->get('child_id');
        $parent = Filters::find($id);
        $child = $parent->children()->find($child_id);
        $html = $this->view("create_or_update",compact(['parent','child','child_id']))->render();
        return \Response::json(['error' => false,'html' => $html]);
    }



    public function postCreateOrUpdateCategory(Request $request)
    {
        $data = $request->except('_token','translatable');
        $filter = Filters::updateOrCreate($request->id, $data);
//        $category->stickers()->sync($request->get('stickers'));
        return redirect()->back();
    }
    public function postCategoryUpdateChild(Request $request,$id)
    {
        $data = $request->except('_token','translatable','child_id','id','items');
        $filter = Filters::updateOrCreate($request->child_id, $data);
        $filter->items()->sync($request->get('items'));
        return redirect()->back();
    }

    public function postDeleteCategory (Request $request,$type)
    {
        $model = Category::findOrFail($request->get('slug'));
        $model->delete();

        return response()->json(['error' => false]);
    }

    public function getCategory(Request $request)
    {
        $lang = Lang::getLocale();
        return Category::LeftJoin('categories_translations', 'categories.id', '=', 'categories_translations.category_id')
            ->select('categories.*', 'categories_translations.name')
            ->where('categories_translations.name', 'like', '%' . $request->get('q') . '%')
            ->where('categories_translations.locale',$lang)
            ->get();
    }
}
