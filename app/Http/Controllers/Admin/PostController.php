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
use App\User;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class PostController extends Controller
{
    protected $view = 'admin.blog';

    public function newPost(Request $request,$locale = null)
    {
        if (!isset($request->ident))
        {
            $article = new \App\Models\Posts();
            $article->url = "{$request->url}";
            $article->status = "{$request->status}";
            $article->user_id = "{$request->author}";
            $article->tags = "{$request->tags}";
            $article->save();

            foreach (['am', 'en', 'ru'] as $locale) {
                $article->translateOrNew($locale)->title = "{$request->title[$locale]}";
                $article->translateOrNew($locale)->short_description = "{$request->short_description[$locale]}";
                $article->translateOrNew($locale)->long_description = "{$request->long_description[$locale]}";
            }

            $article->save();
            $posts = Posts::all();
            return redirect('admin/blog');
        }else{
            $posts = Posts::find($request->ident);
            $posts->update($request->except('_token','ident','title','short_description','long_description'));
            foreach (['am', 'en', 'ru'] as $locale) {
                $posts->translateOrNew($locale)->title = "{$request->title[$locale]}";
                $posts->translateOrNew($locale)->short_description = "{$request->short_description[$locale]}";
                $posts->translateOrNew($locale)->long_description = "{$request->long_description[$locale]}";
            }
            $posts->save();
            return redirect()->back();
        }

    }

    public function delete($id)
    {
        Posts::find($id)->delete();
        return redirect('admin/blog');
    }

    public function edit($id)
    {
        $editable_post = Posts::find($id);
        $authors = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.type','backend')->select('users.*','roles.title')->get();
        return $this->view('new',compact('editable_post','authors'));
    }
}
