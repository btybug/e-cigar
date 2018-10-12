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
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class PostController extends Controller
{
    protected $view = 'admin.blog';

    public function newPost(Request $request,$locale = null)
    {
            $article = new \App\Models\Posts();
            $article->post_url = "{$request->post_url}";
            $article->status = "{$request->status}";
            $article->author = "{$request->author}";
            $article->tags = "{$request->tags}";
            $article->save();

            foreach (['am', 'en', 'ru'] as $locale) {
                $article->translateOrNew($locale)->post_title = "{$request->post_title[$locale]}";
                $article->translateOrNew($locale)->short_description = "{$request->short_description[$locale]}";
                $article->translateOrNew($locale)->long_description = "{$request->long_description[$locale]}";
            }

            $article->save();
        $posts = Posts::all();
        return redirect('admin/blog');
    }

    public function delete($id)
    {
        Posts::find($id)->delete();
        return redirect('admin/blog');
    }
}
