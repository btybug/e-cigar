<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 3/27/2019
 * Time: 3:35 PM
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Filters;
use Illuminate\Http\Request;

class FilterApiControll extends Controller
{
    protected $view='filters';
    public function postGetNext(Request $request)
    {
        $children = $request->get('filters', []);
        $filters = collect([]);
        foreach ($children as $key => $id) {
            if ($id) {
                if ($key > 0) {
                    $f = (isset($filters[$key - 1]))?$filters[$key - 1]->children()->find($id):null;
                } else {
                    $f = Filters::find($id);
                }
                if ($f) {
                    $filters->push($f);

                } else {
                    break;
                };
            }
        }
        $type = 'filter';
        $items_html = '';
        if (!$filters->last()->children()->exists()) {
            $items = $filters->last()->items()->skip(0)->take(10)->get();
            $type = 'items';
            $items_html = $this->view("items", compact(['items']))->render();
            isset($filters[$key]);
            unset($filters[$key]);
        };

        $html = $this->view("filters", compact([ 'filters']))->render();
        $wizard = $this->view("wizard", compact(['children', 'filters']))->render();
        return \Response::json(['error' => false, 'filters' => $html, 'wizard'=>$wizard,'items_html' => $items_html, 'type' => $type]);
    }
}
