<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function newPost(Request $request,$locale = null)
    {
            $article = new \App\Models\Posts();
            $article->online = true;
            $article->save();

            foreach (['en', 'nl', 'fr', 'de'] as $locale) {
                $article->translateOrNew($locale)->post_url = "{$request->post_url} {$locale}";
                $article->translateOrNew($locale)->post_title = "{$request->post_title} {$locale}";
                $article->translateOrNew($locale)->short_description = "{$request->short_description} {$locale}";
                $article->translateOrNew($locale)->long_description = "{$request->long_description} {$locale}";
                $article->translateOrNew($locale)->status = "{$request->status}";
                $article->translateOrNew($locale)->tags = "{$request->tags}";

            }

            $article->save();

            echo 'Created an article with some translations!';
    }
}
