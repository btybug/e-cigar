<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CommentsController extends Controller
{
    public $comment;

    public function __construct(
        Comment $comment
    )
    {
        $this->comment = $comment;
    }

    public function index()
    {
        return view('admin.comments.show');
    }

    public function unapprove($id)
    {
        $this->comment->findOrFail($id);
        $this->comment->update($id,['status'=>0]);

        return redirect()->back()->with("message", "Comment Successfully unapproved");
    }

    public function approve($id)
    {
        $this->comment->findOrFail($id);
        $this->comment->update($id,['status'=>1]);

        return redirect()->back()->with("message", "Comment Successfully approved");
    }

    public function edit($id)
    {
        $comment = $this->comment->findOrFail($id);

        return view('admin.comments.edit',compact(['comment']));
    }

    public function postEdit(Request $request,$id)
    {
        $comment = $this->comment->findOrFail($id);
        $this->comment->update($id,$request->except('_token'));
        return redirect()->route('show_comments')->with("message", "Comment Successfully edited");
    }

    public function reply($id)
    {
        $comment = $this->comment->findOrFail($id);

        return view('admin.comments.reply',compact(['comment']));
    }

    public function postReply(Request $request,$id)
    {
        $comment = $this->comment->findOrFail($id);
        $this->comment->create(['author_id' => \Auth::id(),'comment' => $request->comment,'parent_id' => $id,'post_id' => $comment->post_id,'status' => 1]);

        return redirect()->route('show_comments')->with("message", "Comment Successfully replied");
    }
}