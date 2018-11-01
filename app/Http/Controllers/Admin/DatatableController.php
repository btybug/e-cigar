<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attributes;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Competitions;
use App\Models\Coupons;
use App\Models\Emails;
use App\Models\GeoZones;
use App\Models\LogActivities;
use App\Models\MailTemplates;
use App\Models\MarketType;
use App\Models\Matches;
use App\Models\Orders;
use App\Models\Posts;
use App\Models\Products;
use App\Models\Regions;
use App\Models\Roles;
use App\Models\SelectionType;
use App\Models\Sports;
use App\Models\Stock;
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
            ->orWhere('roles.type', 'frontend')->select('users.*', 'roles.title'))
            ->addColumn('actions', function ($user) {
                return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $user->id . '">Delete</a>
                    <a href="' . route('admin_users_edit', $user->id) . '" class="btn btn-warning events-modal" data-object="competitions">Edit</a>
                    <a href="' . route('admin_users_activity', $user->id) . '" class="btn btn-info"><i class="fa fa-eye"></i>Activity</a>
                    ';
            })->addColumn('membership', function ($user) {
                return ($user->role) ? $user->role->title : 'No Membership';
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getAllStaff()
    {

        return Datatables::of(User::join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.type', 'backend')->select('users.*', 'roles.title'))
            ->addColumn('actions', function ($user) {
                return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $user->id . '">Delete</a>
                    <a href="' . route('admin_users_edit', $user->id) . '" class="btn btn-warning events-modal" data-object="competitions">Edit</a>';
            })->addColumn('role', function ($user) {
                return $user->role->title;
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getAllCategories()
    {
        return Datatables::of(Category::query())
            ->editColumn('image', function () {
                return '';
            })
            ->editColumn('icon', function () {
                return '';
            })
            ->editColumn('created_at', function () {
                return '';
            })
            ->addColumn('actions', function ($category) {
                return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $category->id . '">Delete</a>
                    <a href="javascript:void(0)" class="btn btn-warning events-modal" data-object="competitions"  data-id="' . $category->id . '">Edit</a>';
            })->rawColumns(['actions', 'image', 'icon', 'created_at'])
            ->make(true);
    }

    public function getAllRoles()
    {
        $query = Roles::query();

        return Datatables::of($query)->addColumn('actions', function ($role) {
            if ($role->slug != 'superadmin' && $role->slug != 'customer')
                return '<a href="' . route('admin_edit_role', $role->id) . '" class="btn btn-warning events-modal" >Edit</a>';
        })->addColumn('access', function ($role) {
            return ($role->type == 'backend') ? 'Admin Panel' : 'Frontend Pages';
        })
            ->rawColumns(['actions', 'access'])->make(true);
    }

    public function getAllAttributes()
    {
        return Datatables::of(Attributes::whereNull('parent_id'))
            ->editColumn('name', function ($attr) {
                return $attr->name;
            })
            ->editColumn('image', function ($attr) {
                return ($attr->image) ? "<img src='$attr->image' width='50px'/>" : "No image";
            })
            ->editColumn('icon', function ($attr) {
                return ($attr->icon) ? "<i class='$attr->icon'></i>" : "No Icon";
            })
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })
            ->addColumn('actions', function ($attr) {
                return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $attr->id . '">Delete</a>
                    <a href="' . route("admin_store_attributes_edit", $attr->id) . '" class="btn btn-warning">Edit</a>';
            })->rawColumns(['actions', 'image', 'icon', 'created_at'])
            ->make(true);
    }

    public function getAllProducts()
    {
        return Datatables::of(Products::query())
            ->editColumn('created_at', function ($product) {
                return BBgetDateFormat($product->created_at);
            })->editColumn('image', function ($product) {
                return ($product->image) ? "<img src='$product->image' width='100px'/>" : "No image";
            })
            ->editColumn('user_id', function ($product) {
                return $product->author->name;
            })
            ->addColumn('actions', function ($product) {
                return '<a href="javascript:void(0)" class="btn btn-danger" data-id="' . $product->id . '">Delete</a>
                    <a href="' . route("admin_store_products_edit", $product->id) . '" class="btn btn-warning">Edit</a>';
            })->rawColumns(['actions', 'image', 'created_at'])
            ->make(true);
    }

    public function getAllEmails()
    {
        return Datatables::of(MailTemplates::where('is_for_admin', 0))
            ->addColumn('actions', function ($email) {
                return '<a href="' . route('admin_mail_create_templates', $email->id) . '" class="btn btn-warning events-modal" data-object="competitions">Edit</a>';
            })
            ->editColumn('is_active', function ($email) {
                return ($email->is_active) ? 'Yes' : 'No';
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getAllPosts()
    {
        return Datatables::of(Posts::query())
            ->editColumn('title', function ($post) {
                return $post->title;
            })->editColumn('short_description', function ($post) {
                return $post->short_description;
            })
            ->editColumn('url', function ($post) {
                return "<a href='/blog/" . $post->url . "' target='_blank'>blog/" . $post->url . "</a>";
            })
            ->editColumn('user_id', function ($post) {
                return $post->author->name;
            })
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })
            ->addColumn('actions', function ($post) {
                return "<a class='badge btn-danger' href='" . route("admin_post_delete", $post->id) . "'><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='" . route("admin_post_edit", $post->id) . "'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions', 'url', 'short_description', 'created_at'])
            ->make(true);
    }

    public function getAllPostComments()
    {
        $comments = Comment::with('commentTree')->where('commentable_type', Posts::class)->get();
        $data = Comment::recursiveItemsToOneArray($comments);

        return Datatables::of($data)
            ->editColumn('author', function ($comment) {
                $user = $comment->user;
                return '<strong>
                            <img alt="" src="/public/admin_theme/dist/img/user2-160x160.jpg" class="img" height="32" width="32"> ' . $user->name . '</strong>
                            <br>
                            <a href="mailto:' . $user->email . '">' . $user->email . '</a><br>';
            })
            ->editColumn('comment', function ($comment) {
                $str = 'Submitted on ' . BBgetDateFormat($comment->created_at) . ' at ' . BBgetTimeFormat($comment->created_at);
                if ($comment->parent) {
                    $str .= ' | In reply to ' . $comment->parent->user->name;
                }
                $str .= '<br>';
                $str .= '<div>' . $comment->comment . '</div>';
                return $str;
            })
            ->editColumn('replies', function ($comment) {
                return '<span class="comment-count">' . count($comment->childrens) . '</span>';
            })
            ->addColumn('actions', function ($comment) {
                return "<a class='badge btn-danger' href='" . route("admin_post_comment_delete", $comment['id']) . "'><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='" . route("admin_post_comment_edit", $comment['id']) . "'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions', 'author', 'comment', 'replies'])
            ->make(true);
    }

    public function getAllCoupons()
    {
        return Datatables::of(Coupons::query())
            ->addColumn('actions', function ($coupons) {
                return "<a class='badge btn-danger' href='" . route("admin_store_coupons_delete", $coupons->id) . "'><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='" . route("admin_store_coupons_edit", $coupons->id) . "'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions', 'name', 'code', 'replies'])
            ->make(true);
    }

    public function getAllStocks()
    {
        return Datatables::of(Stock::query())
            ->editColumn('image', function ($stock) {
                return ($stock->image) ? "<img src='$stock->image' width='50px'/>" : "No image";
            })
            ->editColumn('created_at', function ($stock) {
                return BBgetDateFormat($stock->created_at) . ' ' . BBgetTimeFormat($stock->created_at);
            })
            ->addColumn('actions', function ($stock) {
                return "<a class='badge btn-danger' href='#'><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='" . route("admin_stock_edit", $stock->id) . "'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions', 'name', 'image'])
            ->make(true);
    }

    public function getAllGeoZones()
    {
        return Datatables::of(GeoZones::query())
            ->editColumn('created_at', function ($geo_zone) {
                return BBgetDateFormat($geo_zone->created_at) . ' ' . BBgetTimeFormat($geo_zone->created_at);
            })
            ->addColumn('actions', function ($geo_zone) {
                return "<a class='badge btn-danger' href='" . route('admin_settings_geo_zones_new', $geo_zone->id) . "'><i class='fa fa-edit'></i></a>
                    <a class='badge btn-warning' href='#'><i class='fa fa-trash'></i></a>
                    <a class='badge btn-info' href='#'><i class='fa fa-copy'></i></a>";
            })->rawColumns(['actions'])
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
    public function getUserActivity($id)
    {
        return Datatables::of(LogActivities::where('user_id', $id))
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })
            ->addColumn('actions', function ($post) {
                return "<a class='badge btn-danger' href=''><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='#'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions'])
            ->make(true);
    }
    public function getAllOrders()
    {
        return Datatables::of(
            Orders::leftJoin('orders_addresses','orders.id','=','orders_addresses.order_id')
        ->select('orders.*','orders_addresses.country','orders_addresses.region','orders_addresses.city')
        )
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })->editColumn('status', function ($attr) {
                return $attr->history()->first()->status;
            })->editColumn('updated_at', function ($attr) {
                return BBgetDateFormat($attr->updated_at);
            })->editColumn('user', function ($attr) {
                return $attr->user->name.' '.$attr->user->last_name;
            })
            ->addColumn('actions', function ($post) {
                return "<a class='badge btn-warning' href='".route('admin_orders_manage',$post->id)."'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions'])
            ->make(true);
    }
}
