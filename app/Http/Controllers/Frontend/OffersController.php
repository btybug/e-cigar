<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/23/2018
 * Time: 10:46 AM
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use App\Models\Attributes;
use App\Models\Category;
use App\Models\Common;
use App\Models\Newsletter;
use App\Models\SiteCurrencies;
use App\Models\Stickers;
use App\ProductSearch\ProductSearch;
use App\User;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    protected $view='frontend.offers';

    public function getIndex(Request $request, $type = null)
    {
        $category = Category::where('type', 'offers')->whereNull('parent_id')->where('slug', $type)->first();
        if (!$category && $type != null) abort(404);

        $categories = Category::with('children')->where('type', 'offers')->whereNull('parent_id')->get()->pluck('name', 'slug');
        $products = ProductSearch::apply($request, $category);
//        $products = ProductSearch::apply($request,$category,true);
//        dd($products);
        $filters = (new Attributes())->getFiltersByOffer($type);
//        dd($filters);
        $data = $request->except('_token');
        $selecteds = [];
        if (isset($data['select_filter']) && count($data['select_filter'])) {
            foreach ($data['select_filter'] as $k => $v) {
                if ($v && is_array($v)) {
                    foreach ($v as $key => $value) {
                        $attr = Attributes::getById($key);
                        $sticker = Stickers::getById($value);
                        $selecteds[$k . "," . $value] = $sticker;
                    }
                } elseif ($v) {
                    $sticker = Stickers::getById($v);
                    $attr = Attributes::getById($k);
                    $selecteds[$k] = $sticker;
                }
            }
        }

        if($request->ajax()){
            $html = View('frontend.products._partials.products_render',compact(['products']))->render();
            return response()->json(['error' => false, 'html' => $html]);
        }
        return $this->view('index', compact('categories', 'category', 'products', 'filters', 'selecteds', 'type'))->with('filterModel', $request->all());
    }
}
