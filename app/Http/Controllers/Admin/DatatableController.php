<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attributes;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Competitions;
use App\Models\Emails;
use App\Models\MailTemplates;
use App\Models\MarketType;
use App\Models\Matches;
use App\Models\Posts;
use App\Models\Regions;
use App\Models\Roles;
use App\Models\SelectionType;
use App\Models\Sports;
use App\Models\Teams;
use App\Models\Translations;
use App\Models\TranslationsEntry;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class DatatableController extends Controller
{
    public function getAllUsers()
    {

        return Datatables::of(User::leftJoin('roles', 'users.role_id', '=', 'roles.id')
            ->whereNull('role_id')
            ->orWhere('roles.type','frontend')->select('users.*','roles.title'))
            ->addColumn('actions', function ($user) {
                return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $user->id . '">Delete</a>
                    <a href="'.route('admin_users_edit',$user->id).'" class="btn btn-warning events-modal" data-object="competitions">Edit</a>';
            })->addColumn('membership', function ($user) {
                return ($user->role)?$user->role->title:'No Membership';
            })->rawColumns(['actions'])
            ->make(true);
    }
    public function getAllStaff()
    {

         return Datatables::of(User::join('roles', 'users.role_id', '=', 'roles.id')
             ->where('roles.type','backend')->select('users.*','roles.title'))
            ->addColumn('actions', function ($user) {
                return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $user->id . '">Delete</a>
                    <a href="'.route('admin_users_edit',$user->id).'" class="btn btn-warning events-modal" data-object="competitions">Edit</a>';
            })->addColumn('role', function ($user) {
                return $user->role->title;
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getAllCategories()
    {
        return Datatables::of(Category::query())
            ->editColumn('image',function () {
                return '';
            })
            ->editColumn('icon',function () {
                return '';
            })
            ->editColumn('created_at',function () {
                return '';
            })
            ->addColumn('actions', function ($category) {
            return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $category->id . '">Delete</a>
                    <a href="javascript:void(0)" class="btn btn-warning events-modal" data-object="competitions"  data-id="' . $category->id . '">Edit</a>';
        })->rawColumns(['actions','image','icon','created_at'])
            ->make(true);
    }

    public function getAllRoles()
    {
        $query = Roles::query();

        return Datatables::of($query)->addColumn('actions', function ($role) {
            if($role->slug!='superadmin' && $role->slug!='customer')
            return '<a href="'.route('admin_edit_role',$role->id).'" class="btn btn-warning events-modal" >Edit</a>';
        })->addColumn('access', function ($role) {
            return ($role->type=='backend')?'Admin Panel':'Frontend Pages';
        })
            ->rawColumns(['actions','access'])->make(true);
    }

    public function getAllAttributes()
    {
        return Datatables::of(Attributes::whereNull('parent_id'))
            ->editColumn('name',function ($attr) {
                return $attr->name;
            })
            ->editColumn('image',function ($attr) {
                return ($attr->image) ? "<img src='$attr->image' width='50px'/>" : "No image";
            })
            ->editColumn('icon',function ($attr) {
                return ($attr->icon) ? "<i class='$attr->icon'></i>" : "No Icon";
            })
            ->editColumn('created_at',function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })
            ->addColumn('actions', function ($attr) {
                return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $attr->id . '">Delete</a>
                    <a href="'.route("admin_store_attributes_edit",$attr->id).'" class="btn btn-warning">Edit</a>';
            })->rawColumns(['actions','image','icon','created_at'])
            ->make(true);
    }

    public function getAllMailTemplates()
    {
        return Datatables::of(MailTemplates::query())
            ->addColumn('actions', function ($template) {
                return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $template->id . '">Delete</a>
                    <a href="'.route('admin_mail_create_templates',$template->id).'" class="btn btn-warning events-modal" data-object="competitions">Edit</a>';
            })->rawColumns(['actions'])
            ->make(true);
    }
    public function getAllEmails()
    {
        return Datatables::of(Emails::query())
            ->addColumn('actions', function ($email) {
                return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $email->id . '">Delete</a>
                    <a href="'.route('admin_mail_create_templates',$email->id).'" class="btn btn-warning events-modal" data-object="competitions">Edit</a>';
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getAllPosts()
    {
        return Datatables::of(Posts::query())
            ->editColumn('title',function ($post) {
                return $post->title;
            })->editColumn('short_description',function ($post) {
                return $post->short_description;
            })
            ->editColumn('url',function ($post) {
                return "<a href='/blog/".$post->url."' target='_blank'>blog/".$post->url."</a>";
            })
            ->editColumn('user_id',function ($post) {
                return $post->author->name;
            })
            ->editColumn('created_at',function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })
            ->addColumn('actions', function ($post) {
                return "<a class='badge btn-danger' href='".route("admin_post_delete",$post->id)."'><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='".route("admin_post_edit",$post->id)."'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions','url','short_description','created_at'])
            ->make(true);
    }

    public function getAllPostComments()
    {
        $comments =  Comment::with('commentTree')->where('commentable_type',Posts::class)->get();
        $data = Comment::recursiveItemsToOneArray($comments);

        return Datatables::of($data)
            ->editColumn('author',function ($comment) {
                $user = $comment->user;
                return '<strong>
                            <img alt="" src="/public/admin_theme/dist/img/user2-160x160.jpg" class="img" height="32" width="32"> '.$user->name.'</strong>
                            <br>
                            <a href="mailto:'.$user->email.'">'.$user->email.'</a><br>';
            })
            ->editColumn('comment',function ($comment) {
                $str = 'Submitted on '.BBgetDateFormat($comment->created_at).' at '.BBgetTimeFormat($comment->created_at);
                if($comment->parent){
                    $str .= ' | In reply to '.$comment->parent->user->name;
                }
                $str .= '<br>';
                $str .= '<div>' .$comment->comment. '</div>';
                return $str;
            })
            ->editColumn('replies',function ($comment) {
                return '<span class="comment-count">'.count($comment->childrens).'</span>';
            })
            ->addColumn('actions', function ($comment) {
                return "<a class='badge btn-danger' href='".route("admin_post_comment_delete",$comment['id'])."'><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='".route("admin_post_comment_edit",$comment['id'])."'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions','author','comment','replies'])
            ->make(true);
    }

//    public function getAllCompetitions($sport_id = null, $region_id = null)
//    {
//        $query = Competitions::query();
//        if ($sport_id) {
//            $query = $query->where('sport_id', $sport_id);
//        }
//        if ($region_id) {
//            $query = $query->where('region_id', $region_id);
//        }
//        return Datatables::of($query)->addColumn('actions', function ($comp) {
//            return '<a href="javascript:void(0)" class="btn btn-warning events-modal" data-object="competitions"  data-id="' . $comp->id . '">Edit</a>';
//        })->rawColumns(['actions'])->make(true);
//    }
}
