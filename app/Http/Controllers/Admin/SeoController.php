<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/6/2018
 * Time: 10:41 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Settings;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    protected $view = 'admin.seo';

    public function getPosts(Settings $settings)
    {

        $general=$settings->getEditableData('seo_posts');
        $fb=$settings->getEditableData('seo_fb_posts');
        $twitter=$settings->getEditableData('seo_twitter_posts');
        $robot=$settings->getEditableData('seo_robot_posts');
        return $this->view('posts',compact('general','fb','twitter','robot'));
    }

    public function getStocks(Settings $settings)
    {
        $general=$settings->getEditableData('seo_stocks');
        $fb=$settings->getEditableData('seo_fb_stocks');
        $twitter=$settings->getEditableData('seo_twitter_stocks');
        $robot=$settings->getEditableData('seo_robot_stocks');
        return $this->view('stocks',compact('general','fb','twitter','robot'));
    }
    public function postStocks(Request $request,Settings $settings)
    {
        $general=$request->except(['_token','fb','twitter','robots']);
        $fb=$request->only('fb');
        $twitter=$request->only('twitter');
        $robot=$request->only('robots');
        $settings->updateOrCreateSettings('seo_stocks',$general);
        $settings->updateOrCreateSettings('seo_fb_stocks',$fb['fb']);
        $settings->updateOrCreateSettings('seo_twitter_stocks',$twitter['twitter']);
        $settings->updateOrCreateSettings('seo_robot_stocks',$robot);
        return redirect()->back();
    }

    public function getBulk()
    {
        return $this->view('bulk');
    }

    public function postPosts(Request $request,Settings $settings)
    {
        $general=$request->except(['_token','fb','twitter','robots']);
        $fb=$request->only('fb');
        $twitter=$request->only('twitter');
        $robot=$request->only('robots');
        $settings->updateOrCreateSettings('seo_posts',$general);
        $settings->updateOrCreateSettings('seo_fb_posts',$fb['fb']);
        $settings->updateOrCreateSettings('seo_twitter_posts',$twitter['twitter']);
        $settings->updateOrCreateSettings('seo_robot_posts',$robot);
        return redirect()->back();
    }


    public function getPages(Request $request,Settings $settings)
    {
        $p=$request->get('p','home');
        $model=$settings->getEditableData('frontend_seo_'.$p);
        $pages=getFrontendPages();
        return $this->view('pages',compact('pages','p','model'));
    }

    public function postPages(Request $request,Settings $settings)
    {
        $p=$request->get('p','home');
        $settings->updateOrCreateSettings('frontend_seo_'.$p, $request->except('_token','p'));
        return redirect()->back();
    }

    public function getBulkProducts()
    {
        return $this->view('products');
    }

}