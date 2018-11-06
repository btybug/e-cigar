<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Posts;
use View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $view='frontend.blog';

    public function index()
    {
        $posts = Posts::all();
        return $this->view('index',compact('posts'));
    }

    public function getSingle($post_url)
    {
        $post = Posts::where('url',$post_url)->first();
        if(! $post) abort(404);

        return $this->view('single_post',compact('post'));
    }

    public function addComment(Request $request)
    {
        $data = $request->all();

        if(\Auth::check()){
            $rules = [
                'post_id' => 'required|exists:posts,id',
                'comment' => 'required|min:2|max:500'
            ];

            $result = [
                'post_id' => $data['post_id'],
                'parent_id' => (isset($data['parent_id'])) ? $data['parent_id'] : null,
                'author_id' => \Auth::id(),
                'comment' => trim(htmlspecialchars($data['comment']))
            ];
        }else{
            $rules = [
                'guest_name' => 'required|max:100|min:2',
                'guest_email' => 'required|max:255|min:2',
                'post_id' => 'required|exists:posts,id',
                'comment' => 'required|min:2|max:500',
            ];


            $result = [
                'post_id' => $data['post_id'],
                'comment' => trim(htmlspecialchars($data['comment'])),
                'parent_id' => (isset($data['parent_id'])) ? $data['parent_id'] : null,
                'guest_name' => trim(htmlspecialchars($data['guest_name'])),
                'guest_email' => trim(htmlspecialchars($data['guest_email']))
            ];
        }

        $validator = \Validator::make($data, $rules);

        if ($validator->fails()) {
            return \Response::json(['errors' => $validator->messages(),'success' => false]);
        }

        $comment = new Comment();
        $comment->create($result);

        return \Response::json(['success' => true,'message' => 'Success']);
    }
}
