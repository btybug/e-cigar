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
        $filters=Filters::all();
        return $this->view('index',compact('filters'));
    }

    public function getItems(Request $request)
    {
        $promotion = ($request->get("promotion")) ? true : false;
        $attr = Items::whereNotIn('id', $request->get('arr', []))->get();

        return \Response::json(['error' => false, 'data' => $attr]);
    }
    public function postFilterForm (Request $request)
    {
        $id = $request->get('id',0);
        $model = Filters::find($id);
        $html = $this->view("create_or_update",compact(['model']))->render();
        return \Response::json(['error' => false,'html' => $html]);
    }



    public function postCreateOrUpdateCategory(StoreCategoryPost $request,$type)
    {
        $data = $request->except('_token','translatable','stickers');
        $data['user_id'] = \Auth::id();
        $category = Category::updateOrCreate($request->id, $data);
        $category->stickers()->sync($request->get('stickers'));
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
