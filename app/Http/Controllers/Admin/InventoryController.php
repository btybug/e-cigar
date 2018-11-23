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

        $general = $this->settings->getEditableData('seo_stocks')->toArray();
        $twitterSeo = $this->settings->getEditableData('seo_twitter_stocks')->toArray();
        $fbSeo = $this->settings->getEditableData('seo_fb_stocks')->toArray();
        $robot = $this->settings->getEditableData('seo_robot_stocks');
        return $this->view('stock_new', compact(['model', 'data', 'categories', 'general','allAttrs','twitterSeo', 'fbSeo', 'robot', 'data']));
    }

    public function getStockEdit($id)
    {
        $model = Stock::findOrFail($id);
        $categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get();
        $checkedCategories = $model->categories()->pluck('id')->all();
        $data = Category::recursiveItems($categories, 0, [], $checkedCategories);
        $attrs = $model->attrs()->with('children')->where('attributes.parent_id', null)->get();
        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();

        $general = $this->settings->getEditableData('seo_stocks')->toArray();
        $twitterSeo = $this->settings->getEditableData('seo_twitter_stocks')->toArray();
        $fbSeo = $this->settings->getEditableData('seo_fb_stocks')->toArray();
        $robot = $this->settings->getEditableData('seo_robot_stocks');
        return $this->view('stock_new', compact(['model', 'attrs', 'data', 'checkedCategories', 'categories','allAttrs', 'general', 'twitterSeo', 'fbSeo', 'robot', 'data']));
    }

    public function postStock(ProductsRequest $request)
    {
        $data = $request->except('_token', 'translatable', 'attributes', 'options', 'variations', 'categories', 'general', 'related_products', 'stickers','fb', 'twitter', 'general', 'robot');
        $data['user_id'] = \Auth::id();
        $stock = Stock::updateOrCreate($request->id, $data);
        $stock->attrs()->sync($request->get('attributes'));
        $options = $this->stockService->makeOptions($stock, $request->get('options', []));
        $stock->attrs()->syncWithoutDetaching($options);

        $this->stockService->saveVariations($stock, $request->get('variations', []));
        $stock->categories()->sync(json_decode($request->get('categories', [])));
        $stock->related_products()->sync($request->get('related_products'));
        $stock->stickers()->sync($request->get('stickers'));
        $this->createOrUpdateSeo($request, $stock->id);
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
        $attr = Stock::whereNotIn('id', $request->get('arr', []))->get();
        return \Response::json(['error' => false, 'data' => $attr]);
    }

    public function addVariation(Request $request)
    {
        $item = $request->except('_token');
        $html = \View('admin.inventory._partials.variation_item', compact(['item']))->render();
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
        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();

        $html = \View("admin.inventory._partials.variation_option_item",compact(['selected','allAttrs']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }
}