<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Attributes;
use App\Models\Category;
use App\Models\Items;
use App\Models\Settings;
use App\Models\Statuses;
use App\Models\Stock;
use App\Models\StockSeo;
use App\Models\StockVariationOption;
use App\Services\StockService;
use Illuminate\Http\Request;


class InventoryController extends Controller
{
    protected $view = 'admin.inventory';

    private $stockService;
    private $settings;

    public function __construct(StockService $stockService, Settings $settings)
    {
        $this->stockService = $stockService;
        $this->settings = $settings;
    }

    public function stock()
    {
        return $this->view('stock');
    }

    public function stockNew()
    {
        $model = null;
        $categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get();
        $data = Category::recursiveItems($categories);
        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();
        $stockItems = Items::all()->pluck('sku','sku')->all();

        $general = $this->settings->getEditableData('seo_stocks')->toArray();
        $twitterSeo = $this->settings->getEditableData('seo_twitter_stocks')->toArray();
        $fbSeo = $this->settings->getEditableData('seo_fb_stocks')->toArray();
        $robot = $this->settings->getEditableData('seo_robot_stocks');
        return $this->view('stock_new', compact(['model', 'data', 'categories', 'general','allAttrs','twitterSeo', 'fbSeo', 'robot', 'data','stockItems']));
    }

    public function getStockEdit($id)
    {
        $model = Stock::where('is_promotion',false)->where('id',$id)->first();
        if(! $model) abort(404);

        $categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get();
        $checkedCategories = $model->categories()->pluck('id')->all();
        $data = Category::recursiveItems($categories, 0, [], $checkedCategories);
        $attrs = $model->attrs()->with('children')->where('attributes.parent_id', null)->get();
        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();
        $stockItems = Items::all()->pluck('sku','sku')->all();

        $general = $this->settings->getEditableData('seo_stocks')->toArray();
        $twitterSeo = $this->settings->getEditableData('seo_twitter_stocks')->toArray();
        $fbSeo = $this->settings->getEditableData('seo_fb_stocks')->toArray();
        $robot = $this->settings->getEditableData('seo_robot_stocks');
        return $this->view('stock_new', compact(['model', 'attrs', 'data', 'checkedCategories', 'categories','allAttrs', 'general','stockItems', 'twitterSeo', 'fbSeo', 'robot', 'data']));
    }

    public function postStock(ProductsRequest $request)
    {
        $data = $request->except('_token', 'translatable', 'attributes', 'options','promotions',
            'variations','variation_single','package_variation_price','package_variation',
            'categories', 'general', 'related_products', 'stickers','fb', 'twitter', 'general', 'robot','type_attributes','type_attributes_options');
        $data['user_id'] = \Auth::id();
        $stock = Stock::updateOrCreate($request->id, $data);


        if($data['type'] == 'variation_product'){
            $this->stockService->saveVariations($stock, $request->get('variations', []));
        }elseif ($data['type'] == 'simple_product'){
            $this->stockService->saveSingleVariation($stock, $request->get('variation_single', []));
        }elseif ($data['type'] == 'package_product'){
            $this->stockService->savePackageVariation($stock, $request->get('package_variation', []),$request->get('package_variation_price'));
        }


        $this->stockService->makeTypeOptions($stock, $request->get('type_attributes', []));
        $stock->attrs()->sync($request->get('attributes'));
        $options = $this->stockService->makeOptions($stock, $request->get('options', []));
        $stock->attrs()->syncWithoutDetaching($options);


        //-------------------//
        $stock->categories()->sync(json_decode($request->get('categories', [])));
        $stock->related_products()->sync($request->get('related_products'));
        $stock->promotions()->sync($request->get('promotions'));
        $stock->stickers()->sync($request->get('stickers'));
        $this->createOrUpdateSeo($request, $stock->id);
        //-------------------//
        return redirect()->route('admin_stock');
    }

    private function createOrUpdateSeo($request, $stock_id)
    {
        $types = $request->only(['fb', 'general', 'twitter', 'robot']);
        foreach ($types as $type => $data) {
            foreach ($data as $name => $value) {
                $seo= StockSeo::firstOrNew(['stock_id' => $stock_id, 'name' => $name,'type' => $type]);
                if ($value) {
                    $seo->content=$value;
                    $seo->save();
                }else{
                    $seo->delete();
                }
            }
        }
    }

    public function linkAll($data)
    {
        $results = [];
        if ($data && count($data)) {
            $firstKeyArray = array_first($data);
            array_shift($data);
            foreach ($data as $i => $v) {
                $notFullCount = count($firstKeyArray);
                foreach ($firstKeyArray as $phrase) {
                    foreach ($data[$i] as $newPart) {
                        $firstKeyArray[] = $phrase . "-" . $newPart;
                    }
                }
                $firstKeyArray = array_slice($firstKeyArray, $notFullCount);
            }


            if (count($firstKeyArray)) {
                foreach ($firstKeyArray as $string) {
                    $results[] = explode('-', $string);
                }
            }
        }

        return $results;
    }

    public function variationForm(Request $request)
    {
        $data = $request->get('data');
        $model = null;
        $html = \View('admin.inventory._partials.variation_form', compact(['model', 'data']))->render();
        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function getStocks(Request $request)
    {
        $promotion = ($request->get("promotion")) ? true : false;
        $attr = Stock::where('is_promotion',$promotion)->whereNotIn('id', $request->get('arr', []))->get();
        return \Response::json(['error' => false, 'data' => $attr]);
    }

    public function addVariation(Request $request)
    {
        $item = $request->except('_token');
        $stockItems = Items::all()->pluck('sku','sku')->all();
        $html = \View('admin.inventory._partials.variation_item', compact(['item','stockItems']))->render();
        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function addPackageVariation(Request $request)
    {
        $stockItems = Items::all()->pluck('sku','sku')->all();
        $package_variation = null;
        $html = \View('admin.inventory._partials.variation_package_item', compact(['package_variation','stockItems']))->render();
        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function editVariation (Request $request)
    {
        $data = $request->get('data');
        $model = $request->get('model');
        $variationId = $request->get('variationId');
        $html = \View('admin.inventory._partials.variation_form', compact(['model', 'data','variationId']))->render();
        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function getOptionById(Request $request)
    {
        $selected = Attributes::find($request->id);
        $allAttrs = Attributes::with('stickers')->whereNull('parent_id')->get();
        $html = \View("admin.inventory._partials.variation_option_item",compact(['selected','allAttrs']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function addExtraOption(Request $request)
    {
        $option = $request->except('_token');
        $html = \View("admin.inventory._partials.extra_item",compact(['option']))->render();
        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function addExtraOptionVariations (Request $request)
    {
        dd($request->all());
    }

    public function postRenderVariationNewOptions(Request $request)
    {
        $attributesJson = $request->get('attributesJson');
        $objData = $request->get('objData');
        $variation = $request->get('variation');
        $html = \View("admin.inventory._partials.variation_item_render_new_options",compact(['attributesJson','objData','variation']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }
}