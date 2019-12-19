<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/6/2018
 * Time: 10:41 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\MainPagesSeo;
use App\Models\Posts;
use App\Models\SeoPosts;
use App\Models\Settings;
use App\Models\Stock;
use App\Models\StockSeo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    protected $view = 'admin.seo';

    public function getPosts(Settings $settings)
    {

        $general = $settings->getEditableData('seo_posts');
        $fb = $settings->getEditableData('seo_fb_posts');
        $twitter = $settings->getEditableData('seo_twitter_posts');
        $robot = $settings->getEditableData('seo_robot_posts');
        return $this->view('posts', compact('general', 'fb', 'twitter', 'robot'));
    }

    public function getStocks(Settings $settings)
    {
        $general = $settings->getEditableData('seo_stocks');
        $fb = $settings->getEditableData('seo_fb_stocks');
        $twitter = $settings->getEditableData('seo_twitter_stocks');
        $robot = $settings->getEditableData('seo_robot_stocks');
        return $this->view('stocks', compact('general', 'fb', 'twitter', 'robot'));
    }

    public function getBrands(Settings $settings)
    {
        $general = $settings->getEditableData('seo_brand');
        $fb = $settings->getEditableData('seo_fb_brand');
        $twitter = $settings->getEditableData('seo_twitter_brand');
        $robot = $settings->getEditableData('seo_robot_brand');
        return $this->view('brands_general', compact('general', 'fb', 'twitter', 'robot'));
    }

    public function postStocks(Request $request, Settings $settings)
    {
        $general = $request->except(['_token', 'fb', 'twitter', 'robots']);
        $fb = $request->only('fb');
        $twitter = $request->only('twitter');
        $robot = $request->only('robots');
        $settings->updateOrCreateSettings('seo_stocks', $general);
        $settings->updateOrCreateSettings('seo_fb_stocks', $fb['fb']);
        $settings->updateOrCreateSettings('seo_twitter_stocks', $twitter['twitter']);
        $settings->updateOrCreateSettings('seo_robot_stocks', $robot);
        return redirect()->back();
    }
    public function postBrands(Request $request, Settings $settings)
    {
        $general = $request->except(['_token', 'fb', 'twitter', 'robots']);
        $fb = $request->only('fb');
        $twitter = $request->only('twitter');
        $robot = $request->only('robots');
        $settings->updateOrCreateSettings('seo_brand', $general);
        $settings->updateOrCreateSettings('seo_fb_brand', $fb['fb']);
        $settings->updateOrCreateSettings('seo_twitter_brand', $twitter['twitter']);
        $settings->updateOrCreateSettings('seo_robot_brand', $robot);
        return redirect()->back();
    }

    public function getBulk()
    {
        return $this->view('bulk');
    }

    public function postPosts(Request $request, Settings $settings)
    {
        $general = $request->except(['_token', 'fb', 'twitter', 'robots']);
        $fb = $request->only('fb');
        $twitter = $request->only('twitter');
        $robot = $request->only('robots');
        $settings->updateOrCreateSettings('seo_posts', $general);
        $settings->updateOrCreateSettings('seo_fb_posts', $fb['fb']);
        $settings->updateOrCreateSettings('seo_twitter_posts', $twitter['twitter']);
        $settings->updateOrCreateSettings('seo_robot_posts', $robot);
        return redirect()->back();
    }



    public function getBulkProducts()
    {
        return $this->view('products');
    }

    public function getBulkEditPost($id, Settings $settings)
    {
        $post = Posts::findOrFail($id);

        $general = $settings->getEditableData('seo_posts')->toArray();
        $fbSeo = $settings->getEditableData('seo_fb_posts')->toArray();
        $twitterSeo = $settings->getEditableData('seo_twitter_posts')->toArray();
        $robot = $settings->getEditableData('seo_robot_posts');
        $seo = $post->seo;

        return $this->view('edit_post', compact('post', 'general', 'fbSeo', 'seo', 'twitterSeo', 'robot'));
    }

    public function getBulkEditProduct($id, Settings $settings)
    {
        $stock = Stock::findOrFail($id);

        $general = $settings->getEditableData('seo_stocks')->toArray();
        $fbSeo = $settings->getEditableData('seo_fb_stocks')->toArray();
        $twitterSeo = $settings->getEditableData('seo_twitter_stocks')->toArray();
        $robot = $settings->getEditableData('seo_robot_stocks');
        $seo = $stock->seo;
        return $this->view('edit_stock', compact('stock', 'general', 'fbSeo', 'twitterSeo', 'robot', 'seo'));
    }

    public function createOrUpdatePostSeo(Request $request, $id)
    {
        $data = $request->except('_token', 'translatable');
        SeoPosts::updateOrCreate($request->get('id'), $data);
        return redirect()->back();
    }

    public function createOrUpdateStockSeo(Request $request, $id)
    {
        $data = $request->except('_token', 'translatable');
        StockSeo::updateOrCreate($request->get('id'), $data);
        return redirect()->back();
    }

    public function getMainPages(Settings $settings, Request $request)
    {
        $p = $request->get('p', 'banners');
        $seo = MainPagesSeo::where('page_name', $p)->first();
        if ($p == 'banners' || $p == "single_product" || $p == "single_post" || $p == "my_account" || $p == "stickers") {
            $model = $settings->getEditableData($p);
            $top = $settings->getEditableData('top');

        } else {
            $model = Common::where('type', $p)->first();
        }
        return $this->view('main_pages', compact(['model', 'p', 'seo']));
    }

    public function postMainPagesSeo(Request $request)
    {
        $data = $request->except('_token', 'p', 'translatable');
        $data['page_name'] = $request->get('p', 'banners');
        MainPagesSeo::updateOrCreate($request->id, $data);
        return redirect()->back();
    }

    public function getBulkBrands()
    {
        return $this->view('brands');
    }
}
