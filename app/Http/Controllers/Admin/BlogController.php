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
use Yajra\DataTables\Facades\DataTables;
use App\User;
use App\Models\PostsTranslation;

class BlogController extends Controller
{
    protected $view = 'admin.blog';

    public function index()
    {
        $posts = Posts::all();
        return $this->view('index',compact('posts'));
    }

    public function create()
    {
        $authors = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.type','backend')->select('users.*','roles.title')->get();
        return $this->view('new',compact('authors'));
    }

    public function edit($id)
    {
        return $this->view('edit');
    }
}