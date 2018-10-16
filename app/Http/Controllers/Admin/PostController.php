<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPost;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\User;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class PostController extends Controller
{
    protected $view = 'admin.blog';

    public function index()
    {
        return $this->view('index');
    }

    public function create()
    {
        $post = null;
        $authors = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.type','backend')->select('users.*','roles.title')->pluck('users.name','users.id')->toArray();
        return $this->view('new',compact('authors','post'));
    }

    public function newPost(StoreBlogPost $request,$locale = null)
    {
        $data = $request->except('_token','translatable');
        Posts::updateOrCreate($request->id, $data);

        return redirect()->route('admin_blog');
    }

    public function getDelete($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
        return redirect()->route('admin_blog');
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        $authors = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.type','backend')->select('users.*','roles.title')->pluck('users.name','users.id')->toArray();
        return $this->view('new',compact('post','authors'));
    }

    public function getComments()
    {
        return $this->view('comments.index');
    }

    public function getCommentsDelete($id)
    {
//        $post = Posts::findOrFail($id);
//        $post->delete();
//        return redirect()->route('admin_blog');
    }

}
