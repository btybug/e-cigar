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


class PromotionController extends Controller
{
    protected $view = 'admin.store.promotion';

    private $stockService;
    private $settings;

    public function __construct(StockService $stockService, Settings $settings)
    {
        $this->stockService = $stockService;
        $this->settings = $settings;
    }

    public function getIndex()
    {
        return $this->view('index');
    }

    public function getNew()
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
        return $this->view('create_or_update', compact(['model', 'data', 'categories', 'general','allAttrs','twitterSeo', 'fbSeo', 'robot', 'data','stockItems']));
    }

    public function getEdit($id)
    {
        $model = Stock::where('is_promotion',true)->where('id',$id)->first();
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
        return $this->view('create_or_update', compact(['model', 'attrs', 'data', 'checkedCategories', 'categories','allAttrs', 'general','stockItems', 'twitterSeo', 'fbSeo', 'robot', 'data']));
    }

    public function postSave(ProductsRequest $request)
    {
        $data = $request->except('_token', 'translatable', 'attributes', 'options',
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
        $stock->stickers()->sync($request->get('stickers'));
        $this->createOrUpdateSeo($request, $stock->id);
        //-------------------//
        return redirect()->route('admin_promotion');
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
}