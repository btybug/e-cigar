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
use App\Models\Settings;
use App\Models\Sports;
use App\Models\Statuses;
use App\Models\Stock;
use App\Models\Teams;
use App\Models\Ticket;
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
                    <a href="' . route('admin_users_edit', $user->id) . '" class="btn btn-warning events-modal" data-object="competitions">Edit</a>
                    <a href="' . route('admin_users_activity', $user->id) . '" class="btn btn-info"><i class="fa fa-eye"></i>Activity</a>
                    ';
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
                return "<a href='/news/" . $post->url . "' target='_blank'>news/" . $post->url . "</a>";
            })
            ->editColumn('user_id', function ($post) {
                return $post->author->name;
            })->editColumn('status', function ($post) {
                return ($post->status) ? '<span class="badge btn-success">published</span>' : '<span class="badge btn-danger">draft</span>';
            })
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })
            ->addColumn('actions', function ($post) {
                return "<a class='badge btn-danger' href='" . route("admin_post_delete", $post->id) . "'><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='" . route("admin_post_edit", $post->id) . "'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions', 'url', 'short_description', 'created_at', 'status'])
            ->make(true);
    }

    public function getAllPostComments()
    {
        return Datatables::of(Comment::query())
            ->editColumn('status', function ($comment) {
                return ($comment->status) ? '<span class="badge btn-success">Approved</span>' : '<span class="badge btn-danger">Unapproved</span>';
            })->editColumn('author', function ($comment) {
                $user = $comment->author;
                return '<strong>
                            <img alt="" src="/public/admin_theme/dist/img/user2-160x160.jpg" class="img" height="32" width="32"> ' . $user->name . '</strong>
                            <br>
                            <a href="mailto:' . $user->email . '">' . $user->email . '</a><br>';
            })
            ->editColumn('comment', function ($comment) {
                $str = 'Submitted on ' . BBgetDateFormat($comment->created_at) . ' at ' . BBgetTimeFormat($comment->created_at);
                if ($comment->parent) {
                    $str .= ' | In reply to ' . $comment->parent->author->name;
                }
                $str .= '<br>';
                $str .= '<div><strong>' . $comment->comment . '</strong></div>';
                return $str;
            })
            ->editColumn('replies', function ($comment) {
                return '<span class="badge comment-count">' . count($comment->childrenAll) . '</span>';
            })
            ->addColumn('actions', function ($comment) {
                $actions = ($comment->status) ? '<a href="' . route('unapprove_comments', $comment->id) . '" class="btn btn-info"> Block</a>' : '<a href="' . route('approve_comments', $comment->id) . '" class="btn btn-success">Approve</a>';
                $actions .= '<a class="btn btn-primary" href="' . route('reply_comment', $comment->id) . '">Reply</a>';
                $actions .= '<a class="btn btn-warning" href="' . route('edit_comment', $comment->id) . '"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger delete-button" href="' . route('delete_comments', $comment->id) . '"><i class="fa fa-trash"></i></a>';
                return $actions;
            })->rawColumns(['actions', 'author', 'comment', 'replies', 'status'])
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
    public function getUserPostActivity($id)
    {
        return Datatables::of(LogActivities::where('user_id', $id)->where('method','post'))
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })
            ->addColumn('actions', function ($post) {
                return "<a class='badge btn-danger' href=''><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='#'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getFrontendActivity()
    {

        return Datatables::of(LogActivities::leftJoin('users','users.id','=','log_activities.user_id')->whereNull('users.role_id')
            ->select('log_activities.*','users.name','users.last_name'))
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            }) ->editColumn('user', function ($attr) {
                if(!$attr->name) return 'GUEST';
                return $attr->name.' '.$attr->last_name;
            })
            ->addColumn('actions', function ($post) {
                return "<a class='badge btn-danger' href=''><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='#'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions'])
            ->make(true);
    }
    public function getBackendActivity()
    {
        return Datatables::of(LogActivities::leftJoin('users','users.id','=','log_activities.user_id')
            ->whereNotNull('users.role_id')->whereNotNull('user_id')
            ->select('log_activities.*','users.name','users.last_name'))
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            }) ->editColumn('user', function ($attr) {
                if(!$attr->name) return 'GUEST';
                return $attr->name.' '.$attr->last_name;
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
            Orders::leftJoin('orders_addresses', 'orders.id', '=', 'orders_addresses.order_id')
                ->select('orders.*', 'orders_addresses.country', 'orders_addresses.region', 'orders_addresses.city')
        )
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })->editColumn('status', function ($attr) {
                return $attr->history()->first()->status;
            })->editColumn('updated_at', function ($attr) {
                return BBgetDateFormat($attr->updated_at);
            })->editColumn('user', function ($attr) {
                return $attr->user->name . ' ' . $attr->user->last_name;
            })
            ->addColumn('actions', function ($post) {
                return "<a class='badge btn-warning' href='" . route('admin_orders_manage', $post->id) . "'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getAllStatuses()
    {
        return Datatables::of(Statuses::query())
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })->editColumn('name', function ($attr) {
                return $attr->name;
            })->editColumn('description', function ($attr) {
                return $attr->description;
            })
            ->addColumn('actions', function ($attr) {
                return "<a class='badge btn-danger' href=''><i class='fa fa-trash'></i></a>
                    <a class='badge btn-warning' href='" . route('admin_stock_statuses_manage', $attr->id) . "'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getBulkPosts(Settings $settings)
    {
        return Datatables::of(Posts::query())
            ->editColumn('title', function ($attr) {
                return $attr->title;
            })->editColumn('status', function ($attr) {
                return ($attr->status)?'Published':'Draft';
            })->editColumn('seo_title', function ($attr) use ($settings) {
                $general = $settings->getEditableData('seo_posts')->toArray();
                return ($attr->getSeoField('og:title'))??getSeo($general, 'og:title', $attr);
            })->addColumn('actions', function ($attr) {
                return "<a href='#'>Save</a>|<a href='#'>Save All</a>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getBulkStock()
    {
        return Datatables::of(Stock::query())
            ->editColumn('image', function ($stock) {
                return ($stock->image) ? "<img src='$stock->image' width='50px'/>" : "No image";
            })
            ->editColumn('created_at', function ($stock) {
                return BBgetDateFormat($stock->created_at) . ' ' . BBgetTimeFormat($stock->created_at);
            })
            ->addColumn('actions', function ($stock) {
                return "<a href='#'>Save</a>|<a href='#'>Save All</a>";
            })->rawColumns(['actions', 'name', 'image'])
            ->make(true);
    }

    public function getTickets()
    {
        return Datatables::of(Ticket::query())
            ->editColumn('user_id', function ($ticket) {
                return $ticket->author->name;
            })->editColumn('status_id', function ($ticket) {
                return "<span style='background: ".$ticket->status->color."' class='badge'>".$ticket->status->name."</span>";
            })->editColumn('priority_id', function ($ticket) {
                return "<span style='background: ".$ticket->priority->color."' class='badge'>".$ticket->priority->name."</span>";
            })->editColumn('category_id', function ($ticket) {
                return $ticket->category->name;
            })->editColumn('tags', function ($ticket) {
                return '';
            })
            ->editColumn('created_at', function ($ticket) {
                return BBgetDateFormat($ticket->created_at) . ' ' . BBgetTimeFormat($ticket->created_at);
            })->editColumn('attachments', function ($ticket) {
                return "<span class='badge'>".count($ticket->attachments)."</span>";
            })
            ->addColumn('actions', function ($ticket) {
                $settings = new Settings();
                $status = $settings->getData('tickets', 'completed');
                $actions = "<a class='badge btn-warning' href='" . route('admin_tickets_edit', $ticket->id) . "'><i class='fa fa-edit'></i></a>";
                if($status && $status->val != $ticket->status_id){
                    $actions .= "<a class='badge btn-danger' href='" . route('admin_tickets_close', $ticket->id) . "'>Close</a>";
                }
                return $actions;
            })->rawColumns(['actions','priority_id','status_id','attachments'])
            ->make(true);
    }
}
