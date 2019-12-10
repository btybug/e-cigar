<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attributes;
use App\Models\Barcodes;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Competitions;
use App\Models\ContactUs;
use App\Models\Coupons;
use App\Models\Emails;
use App\Models\Faq;
use App\Models\Filters;
use App\Models\GeoZones;
use App\Models\Items;
use App\Models\Landing;
use App\Models\LogActivities;
use App\Models\MailTemplates;
use App\Models\MarketType;
use App\Models\Matches;
use App\Models\Newsletter;
use App\Models\Notifications\CustomEmails;
use App\Models\OrderInvoice;
use App\Models\Orders;
use App\Models\Others;
use App\Models\Posts;
use App\Models\Products;
use App\Models\Purchase;
use App\Models\Regions;
use App\Models\Roles;
use App\Models\SelectionType;
use App\Models\Settings;
use App\Models\Sports;
use App\Models\Statuses;
use App\Models\Stock;
use App\Models\StockSales;
use App\Models\Suppliers;
use App\Models\Teams;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\Translations;
use App\Models\TranslationsEntry;
use App\Models\Warehouse;
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
                return '<div class="users-table--td-btn datatable-td__action">
                    <a href="' . route('admin_users_edit', $user->id) . '" class="btn btn-warning events-modal" data-object="competitions">Edit</a>
                    <a href="' . route('admin_users_activity', $user->id) . '" class="btn btn-info">Activity</a>
                    <a href="javascript:void(0)" data-href="' . route("admin_users_delete") . '" 
                class="delete-button btn btn-danger" data-key="' . $user->id . '">x</a>
                    </div>
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
                return '<div class="datatable-td__action">
                    <a href="' . route('admin_staff_edit', $user->id) . '" class="btn btn-warning events-modal" data-object="competitions">Edit</a>
                    <a href="' . route('admin_users_activity', $user->id) . '" class="btn btn-info">Activity</a>
                    <a href="javascript:void(0)" data-href="' . route("admin_staff_delete") . '" 
                class="delete-button btn btn-danger" data-key="' . $user->id . '">x</a>
                    </div>
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
                return '<div class="datatable-td__action">
                    <a href="javascript:void(0)" class="btn btn-warning events-modal" data-object="competitions"  data-id="' . $category->id . '">Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger" data-id="' . $category->id . '">x</a>
                    </div>';
            })->rawColumns(['actions', 'image', 'icon', 'created_at'])
            ->make(true);
    }

    public function getAllRoles()
    {
        $query = Roles::query();

        return Datatables::of($query)->addColumn('actions', function ($role) {
            if ($role->slug != 'superadmin' && $role->slug != 'customer')
                return '<div class="datatable-td__action"><a href="' . route('admin_edit_role', $role->id) . '" class="btn btn-warning events-modal" >Edit</a></div>';
        })->addColumn('access', function ($role) {
            return ($role->type == 'backend') ? 'Admin Panel' : 'Frontend Pages';
        })
            ->rawColumns(['actions', 'access'])->make(true);
    }

    public function getAllAttributes()
    {
        return Datatables::of(
            Attributes::leftJoin('attributes_translations', 'attributes.id', '=', 'attributes_translations.attributes_id')
                ->leftJoin("attribute_categories", 'attributes.id', '=', 'attribute_categories.attribute_id')
                ->leftJoin("categories", 'attribute_categories.categories_id', '=', 'categories.id')
                ->leftJoin('categories_translations','categories.id','=','categories_translations.category_id')
                ->select('attributes.*','attributes_translations.name','categories_translations.name as category')
                ->where('attributes_translations.locale', \Lang::getLocale())
//                    ->whereNull('attributes.parent_id')
                    ->groupBy('attributes.id')
        )
            ->editColumn('name', function ($attr) {
                return $attr->name;
            })
            ->editColumn('category', function ($attr) {
                $html = '';
                if(count($attr->categories)){
                    foreach ($attr->categories as $category){
                        $html .= '<p>'.$category->name .'</p>';
                    }
                }
                return $html;
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

                return '<div class="datatable-td__action">'
                    . (userCan('admin_store_attributes_edit') ? '
                    <a href="' . route("admin_store_attributes_edit", $attr->id) . '" class="btn btn-warning">Edit</a>' : null)
                    .(userCan('admin_store_attributes_delete') ? '
                    <a href="javascript:void(0)" class="btn btn-danger delete-button" data-href="' . route("admin_store_attributes_delete") . '" data-key="' . $attr->id . '">x</a>' : null)
                    .'</div>';
            })->rawColumns(['actions', 'image', 'icon', 'created_at','category'])
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
                return '<div class="datatable-td__action">
                    <a href="' . route("admin_store_products_edit", $product->id) . '" class="btn btn-warning">Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger" data-id="' . $product->id . '">x</a>
                    </div>';
            })->rawColumns(['actions', 'image', 'created_at'])
            ->make(true);
    }

    public function getAllEmails()
    {
        return Datatables::of(MailTemplates::where('is_for_admin', 0))
            ->addColumn('actions', function ($email) {
                return userCan('admin_mail_create_templates') ? '<a href="' . route('admin_mail_create_templates', $email->id) . '" class="btn btn-warning events-modal" data-object="competitions">Edit</a>' : null;
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
                return '<div class="datatable-td__action">'
                    . (userCan('admin_post_edit') ? "<a class='btn btn-warning' href='" . route("admin_post_edit", $post->id) . "'>Edit</a>" : null)
                    .((userCan('admin_post_delete')) ? "
                    <a class='delete-button btn btn-danger' data-key='" . $post->id . "' data-href='" . route("admin_post_delete") . "'>x</a>" : null).'</div>';
            })->rawColumns(['actions', 'url', 'short_description', 'created_at', 'status'])
            ->make(true);
    }

    public function getAllContactUs()
    {
        return Datatables::of(ContactUs::whereNull('parent_id')->orderBy('updated_at', 'DESC'))
            ->editColumn('is_readed', function ($message) {
                return (!$message->is_readed || $message->children()->where('is_readed', 0)->exists());
            })->addColumn('options', function ($message) {
                return '<input type="checkbox" data-id="' . $message->id . '">';
            })->addColumn('action', function ($message) {
                return "<div class='datatable-td__action'>" . (userCan('admin_blog_contact_us_view') ? "<a class='btn btn-info' href='" . route('admin_blog_contact_us_view', $message->id) . "'><i class='fa fa-eye'></i></a>" : null)."<a class='btn btn-danger' href='#'>x</a></div>";
            })->rawColumns(['action', 'options'])
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
                $actions = '';
                if (userCan('edit_comment')) {
                    $actions = ($comment->status) ? '<div class="datatable-td__action"><a href="' . route('unapprove_comments', $comment->id) . '" class="btn btn-info"> Block</a>' : '<a href="' . route('approve_comments', $comment->id) . '" class="btn btn-success">Approve</a>';
                    $actions .= '<a class="btn btn-primary" href="' . route('reply_comment', $comment->id) . '">Reply</a>';
                    $actions .= '<a class="btn btn-warning" href="' . route('edit_comment', $comment->id) . '">Edit</a>';
                }

                userCan('delete_comments') ? $actions .= '<a class="btn btn-danger delete-button" data-key="' . $comment->id . '" data-href="' . route('delete_comments') . '">x</a></div>' : null;
                return $actions;
            })->rawColumns(['actions', 'author', 'comment', 'replies', 'status'])
            ->make(true);
    }

    public function getAllCoupons($isArchive)
    {
        $now = strtotime(today()->toDateString());
//        dd($isArchive);
        if ($isArchive == 'archive') {
            $query = Coupons::where(function ($q) use ($now) {
                $q->where('status', false)->orWhere('end_date', '<', $now);
            });
        } else {
            $query = Coupons::where(function ($q) use ($now) {
                $q->where('start_date', '<=', $now)->where('end_date', '>=', $now)->where('status', true);
            })->orWhere(function ($q) use ($now) {
                $q->where('start_date', '>', $now)->where('status', true);
            });
        }

        return Datatables::of($query)
            ->editColumn('type', function ($coupons) {
                return ($coupons->type == 'p') ? "Percentage" : "Fixed Amount";
            })->editColumn('discount', function ($coupons) {
                return ($coupons->type == 'p') ? "-" . $coupons->discount . "%" : "-" . $coupons->discount;
            })
            ->editColumn('start_date', function ($coupons) {
                return BBgetDateFormat($coupons->start_date);
            })
            ->editColumn('end_date', function ($coupons) {
                return BBgetDateFormat($coupons->end_date);
            })->editColumn('status', function ($coupons) {
                return $coupons->availability;
            })
            ->addColumn('actions', function ($coupons) {
                return (userCan('admin_store_coupons_edit')) ? "<div class='datatable-td__action'>
<a class='btn btn-warning' href='" . route("admin_store_coupons_edit", $coupons->id) . "'>Edit</a></div>" : null;
            })->rawColumns(['actions', 'name', 'end_date', 'start_date'])
            ->make(true);
    }

    public function getAllStocks()
    {
        return Datatables::of(Stock::leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id')
            ->select('stocks.*','stock_translations.name')
            ->where('stocks.is_offer', false)
            ->where('stock_translations.locale', \Lang::getLocale()))
            ->editColumn('image', function ($stock) {
                return ($stock->image) ? "<img src='$stock->image' width='50px'/>" : "No image";
            })
            ->editColumn('created_at', function ($stock) {
                return BBgetDateFormat($stock->created_at) . ' ' . BBgetTimeFormat($stock->created_at);
            })
            ->addColumn('actions', function ($stock) {
                return '<div class="datatable-td__action">
                ' .
                    ((userCan('admin_stock_edit')) ? "<a class='btn btn-warning mr-1' href='" . route("admin_stock_edit", $stock->id) . "'>Edit</a>" : '')
                    .'<a href="javascript:void(0)" data-href="'.route("admin_stock_delete").'" 
                class="delete-button btn btn-danger" data-key="' . $stock->id . '">x</a>'.'</div>';
            })->rawColumns(['actions', 'name', 'image'])
            ->make(true);
    }

    public function getAllStockOffers()
    {
        return Datatables::of(Stock::leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id')
            ->select('stocks.*','stock_translations.name')
            ->where('stocks.is_offer', true)
            ->where('stock_translations.locale', \Lang::getLocale()))
            ->editColumn('image', function ($stock) {
                return ($stock->image) ? "<img src='$stock->image' width='50px'/>" : "No image";
            })
            ->editColumn('created_at', function ($stock) {
                return BBgetDateFormat($stock->created_at) . ' ' . BBgetTimeFormat($stock->created_at);
            })
            ->addColumn('actions', function ($stock) {
                return '<div class="datatable-td__action">
                            <a class="btn btn-warning mr-1" href="' . route("admin_stock_edit_offer", $stock->id) . '">Edit</a>' .
                        '<a href="javascript:void(0)" data-href="'.route("admin_stock_delete").'" 
                        class="delete-button btn btn-danger" data-key="' . $stock->id . '">x</a>
                </div>';
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
                return "<div class='datatable-td__action'>
                    <a class='btn btn-warning' href='" . route('admin_settings_geo_zones_new', $geo_zone->id) . "'>Edit</a>
                    <a class='btn btn-info' href='#'><i class='fa fa-copy'></i></a>
                    <a class='btn btn-danger' href='#'>x</a>
                    </div>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getUserActivity($id)
    {
        return Datatables::of(LogActivities::where('user_id', $id))
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })
            ->addColumn('actions', function ($post) {
                return "<div class='datatable-td__action'>
                    <a class='btn btn-warning' href='#'>Edit</a>
                    <a class='btn btn-danger' href=''>x</a>
                    </div>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getUserPostActivity($id)
    {
        return Datatables::of(LogActivities::where('user_id', $id)->where('method', 'post'))
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })
            ->addColumn('actions', function ($post) {
                return "<div class='datatable-td__action'>
                    <a class='btn btn-warning' href='#'>Edit</a>
                    <a class='btn btn-danger' href=''>x</a>
                    </div>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getFrontendActivity()
    {

        return Datatables::of(LogActivities::leftJoin('users', 'users.id', '=', 'log_activities.user_id')->whereNull('users.role_id')
            ->select('log_activities.*', 'users.name', 'users.last_name'))
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })->editColumn('user', function ($attr) {
                if (!$attr->name) return 'GUEST';
                return $attr->name . ' ' . $attr->last_name;
            })
            ->addColumn('actions', function ($post) {
                return "<div class='datatable-td__action'>
                    <a class='btn btn-warning' href='#'>Edit</a>
                    <a class='btn btn-danger' href=''>x</a>
                    </div>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getBackendActivity()
    {
        return Datatables::of(LogActivities::leftJoin('users', 'users.id', '=', 'log_activities.user_id')
            ->whereNotNull('users.role_id')->whereNotNull('user_id')
            ->select('log_activities.*', 'users.name', 'users.last_name'))
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })->editColumn('user', function ($attr) {
                if (!$attr->name) return 'GUEST';
                return $attr->name . ' ' . $attr->last_name;
            })
            ->addColumn('actions', function ($post) {
                return "<div class='datatable-td__action'>
                    <a class='btn btn-warning' href='#'>Edit</a>
                    <a class='btn btn-danger' href=''>x</a>
                    </div>";
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
                $status = $attr->history()->whereNotNull('status_id')->latest()->first();
                return ($status && $status->status) ?
                    '<span class="badge badge-secondary" style="background-color: ' . $status->status->color . '">' . $status->status->name . '</span>' : null;
            })->editColumn('updated_at', function ($attr) {
                return BBgetDateFormat($attr->updated_at);
            })->editColumn('user', function ($attr) {
                return $attr->user->name . ' ' . $attr->user->last_name;
            })
            ->editColumn('type', function ($attr) {
                return ($attr->type) ? "Wholesaler" : "User";
            })
            ->addColumn('actions', function ($post) {
                return (userCan('admin_orders_manage')) ?
                    "<div class='datatable-td__action'>
                    <a class='btn btn-warning' href='" . route('admin_orders_edit', $post->id) . "'>Edit</a>
                    <a class='btn btn-info' href='" . route('admin_orders_manage', $post->id) . "'>Activity</a>
                    </div>"  : '' ;
            })->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function getAllOrdersInvoice()
    {
        return Datatables::of(
            OrderInvoice::leftJoin('order_invoice_addresses', 'order_invoices.id', '=', 'order_invoice_addresses.order_id')
                ->select('order_invoices.*', 'order_invoice_addresses.country', 'order_invoice_addresses.region', 'order_invoice_addresses.city')
        )
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })->editColumn('status', function ($attr) {
                $status = $attr->history()->whereNotNull('status_id')->latest()->first();
                return ($status && $status->status) ?
                    '<span class="badge badge-secondary" style="background-color: ' . $status->status->color . '">' . $status->status->name . '</span>' : null;
            })->editColumn('updated_at', function ($attr) {
                return BBgetDateFormat($attr->updated_at);
            })->editColumn('user', function ($attr) {
                return $attr->user->name . ' ' . $attr->user->last_name;
            })
            ->editColumn('type', function ($attr) {
                return ($attr->type) ? "Wholesaler" : "User";
            })
            ->addColumn('actions', function ($post) {
                return
                    "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route('admin_orders_invoice_edit', $post->id) . "'>Edit</a></div>";
            })->rawColumns(['actions', 'status'])
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
                return "<div class='datatable-td__action'>
                    <a class='btn btn-warning' href='" . route('admin_stock_statuses_manage', $attr->id) . "'>Edit</a>
                    <a class='btn btn-danger' href=''>x</a>
                    </div>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getBulkPosts(Settings $settings)
    {
        $general = $settings->getEditableData('seo_posts')->toArray();
        $twitterSeo = $settings->getEditableData('seo_twitter_posts')->toArray();
        $fbSeo = $settings->getEditableData('seo_fb_posts')->toArray();
        $robot = $settings->getEditableData('seo_robot_posts');
        return Datatables::of(Posts::query())
            ->editColumn('og:title', function ($post) use ($general) {

                return ($post->getSeoField('og:title')) ? $post->getSeoField('og:title') : getSeo($general, 'og:title', $post);
            })
            ->addColumn('og:image', function ($post) use ($general) {
                return ($post) ? "<img src='" . $post->getSeoField('og:image') . "' width='50px'/>" : "<img src='" . getSeo($general, 'og:keywords', $post) . "' width='50px'/>";
            })
            ->addColumn('og:description', function ($post) use ($general) {
                return ($post->getSeoField('og:description')) ? $post->getSeoField('og:description') : getSeo($general, 'og:description', $post);
            })
            ->addColumn('og:keywords', function ($post) use ($general) {
                return ($post->getSeoField('og:keywords')) ? $post->getSeoField('og:keywords') : getSeo($general, 'og:keywords', $post);
            })
            ->addColumn('fb:title', function ($post) use ($fbSeo) {
                return ($post->getSeoField('og:title', 'fb')) ? $post->getSeoField('og:title', 'fb') : getSeo($fbSeo, 'og:title', $post);
            })
            ->addColumn('fb:description', function ($post) use ($fbSeo) {
                return ($post->getSeoField('og:description', 'fb')) ? $post->getSeoField('og:description', 'fb') : getSeo($fbSeo, 'og:description', $post);
            })
            ->addColumn('fb:image', function ($post) use ($fbSeo) {
                return ($post->getSeoField('og:image', 'fb')) ? $post->getSeoField('og:image', 'fb') : "<img src='" . getSeo($fbSeo, 'og:keywords', $post) . "' width='50px'/>";
            })
            ->addColumn('tw:title', function ($post) use ($twitterSeo) {
                return ($post->getSeoField('og:title', 'twitter')) ? $post->getSeoField('og:title', 'twitter') : getSeo($twitterSeo, 'og:title', $post);
            })
            ->addColumn('tw:description', function ($post) use ($twitterSeo) {
                return ($post->getSeoField('og:description', 'twitter')) ? $post->getSeoField('og:description', 'twitter') : getSeo($twitterSeo, 'og:description', $post);
            })
            ->addColumn('tw:image', function ($post) use ($twitterSeo) {
                return ($post->getSeoField('og:image', 'twitter')) ? $post->getSeoField('og:image', 'twitter') : "<img src='" . getSeo($twitterSeo, 'og:keywords', $post) . "' width='50px'/>";;
            })->addColumn('robots', function ($post) {
                return "";
            })->addColumn('actions', function ($post) {
                return userCan('admin_seo_bulk_edit_post') ? "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route('admin_seo_bulk_edit_post', $post->id) . "'>Edit</a></div>" : null;
            })
            ->rawColumns(['actions', 'name', 'og:image', 'fb:image', 'tw:image'])
            ->make(true);
    }

    public function getBulkStock(Settings $settings)
    {
        $general = $settings->getEditableData('seo_stocks')->toArray();
        $twitterSeo = $settings->getEditableData('seo_twitter_stocks')->toArray();
        $fbSeo = $settings->getEditableData('seo_fb_stocks')->toArray();
        $robot = $settings->getEditableData('seo_robot_stocks');

        return Datatables::of(Stock::query())
            ->editColumn('og:title', function ($stock) use ($general) {

                return ($stock->getSeoField('og:title')) ? $stock->getSeoField('og:title') : getSeo($general, 'og:title', $stock);
            })
            ->addColumn('og:image', function ($stock) use ($general) {
                return ($stock) ? "<img src='" . $stock->getSeoField('og:image') . "' width='50px'/>" : "<img src='" . getSeo($general, 'og:keywords', $stock) . "' width='50px'/>";
            })
            ->addColumn('og:description', function ($stock) use ($general) {
                return ($stock->getSeoField('og:description')) ? $stock->getSeoField('og:description') : getSeo($general, 'og:description', $stock);
            })
            ->addColumn('og:keywords', function ($stock) use ($general) {
                return ($stock->getSeoField('og:keywords')) ? $stock->getSeoField('og:keywords') : getSeo($general, 'og:keywords', $stock);
            })
            ->addColumn('fb:title', function ($stock) use ($fbSeo) {
                return ($stock->getSeoField('og:title', 'fb')) ? $stock->getSeoField('og:title', 'fb') : getSeo($fbSeo, 'og:title', $stock);
            })
            ->addColumn('fb:description', function ($stock) use ($fbSeo) {
                return ($stock->getSeoField('og:description', 'fb')) ? $stock->getSeoField('og:description', 'fb') : getSeo($fbSeo, 'og:description', $stock);
            })
            ->addColumn('fb:image', function ($stock) use ($fbSeo) {
                return ($stock->getSeoField('og:image', 'fb')) ? $stock->getSeoField('og:image', 'fb') : "<img src='" . getSeo($fbSeo, 'og:keywords', $stock) . "' width='50px'/>";
            })
            ->addColumn('tw:title', function ($stock) use ($twitterSeo) {
                return ($stock->getSeoField('og:title', 'twitter')) ? $stock->getSeoField('og:title', 'twitter') : getSeo($twitterSeo, 'og:title', $stock);
            })
            ->addColumn('tw:description', function ($stock) use ($twitterSeo) {
                return ($stock->getSeoField('og:description', 'twitter')) ? $stock->getSeoField('og:description', 'twitter') : getSeo($twitterSeo, 'og:description', $stock);
            })
            ->addColumn('tw:image', function ($stock) use ($twitterSeo) {
                return ($stock->getSeoField('og:image', 'twitter')) ? $stock->getSeoField('og:image', 'twitter') : "<img src='" . getSeo($twitterSeo, 'og:keywords', $stock) . "' width='50px'/>";;
            })->addColumn('robots', function ($stock) {
                return "";
            })->addColumn('actions', function ($stock) {
                return (userCan('admin_seo_bulk_edit_stock')) ? "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route('admin_seo_bulk_edit_stock', $stock->id) . "'>Edit</a></div>" : null;
            })
            ->rawColumns(['actions', 'name', 'og:image', 'fb:image', 'tw:image'])
            ->make(true);
    }

    public function getTickets()
    {
        return Datatables::of(Ticket::query())
            ->editColumn('user_id', function ($ticket) {
                return $ticket->author->name;
            })->editColumn('status_id', function ($ticket) {
                return "<span style='background: " . @$ticket->status->color ."' class='badge'>" . @$ticket->status->name . "</span>";
            })->editColumn('priority_id', function ($ticket) {
                return "<span style='background: " . @$ticket->priority->color . "' class='badge'>" . @$ticket->priority->name . "</span>";
            })->editColumn('category_id', function ($ticket) {
                return $ticket->category->name;
            })->editColumn('tags', function ($ticket) {
                return '';
            })
            ->editColumn('created_at', function ($ticket) {
                return BBgetDateFormat($ticket->created_at) . ' ' . BBgetTimeFormat($ticket->created_at);
            })->editColumn('attachments', function ($ticket) {
                return "<span class='badge'>" . count($ticket->attachments) . "</span>";
            })
            ->addColumn('actions', function ($ticket) {
                $settings = new Settings();
                $status = $settings->getData('tickets', 'completed');
                $actions = userCan('admin_tickets_edit') ? "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route('admin_tickets_edit', $ticket->id) . "'>Edit</a>" : null;
                if ($status && $status->val != $ticket->status_id) {
                    $actions .= userCan('admin_tickets_close') ? "<a class='btn btn-danger' href='" . route('admin_tickets_close', $ticket->id) . "'>Close</a></div>" : null;
                }
                return $actions;
            })->rawColumns(['actions', 'priority_id', 'status_id', 'attachments'])
            ->make(true);
    }

    public function getFaq()
    {
        return Datatables::of(Faq::query())
            ->editColumn('question', function ($faq) {
                return $faq->question;
            })->editColumn('answer', function ($faq) {
                return $faq->answer;
            })
            ->editColumn('user_id', function ($faq) {
                return $faq->author->name;
            })->editColumn('status', function ($faq) {
                return ($faq->status) ? '<span class="badge btn-success">published</span>' : '<span class="badge btn-danger">draft</span>';
            })
            ->editColumn('created_at', function ($faq) {
                return BBgetDateFormat($faq->created_at);
            })
            ->addColumn('actions', function ($faq) {
                return "<div class='datatable-td__action'>"
                    . (userCan('admin_faq_edit') ? "<a class='btn btn-warning' href='" . route("admin_faq_edit", $faq->id) . "'>Edit</a>" : null)
                    .(userCan('admin_faq_delete') ? "
                        <a class='btn btn-danger delete-button' data-key='" . $faq->id . "' data-href='" . route("admin_faq_delete") . "'>x</a>" : null)
                    .'</div>';
            })->rawColumns(['actions', 'question', 'answer', 'created_at', 'status'])
            ->make(true);
    }


    public function getPurchases()
    {
        return Datatables::of(Purchase::query())
            ->editColumn('user_id', function ($faq) {
                return $faq->user->name;
            })->addColumn('name', function ($attr) {
                return ($attr->item)?$attr->item->name:null;
            })->addColumn('sku', function ($attr) {
                return ($attr->item)?$attr->item->sku:null;
            })->editColumn('created_at', function ($faq) {
                return BBgetDateFormat($faq->created_at);
            })->editColumn('purchase_date', function ($faq) {
                return BBgetDateFormat($faq->purchase_date);
            })
            ->addColumn('actions', function ($faq) {
                return "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route("admin_inventory_purchase_edit", $faq->id) . "'>Edit</a></div>";
            })->rawColumns(['actions', 'question', 'answer', 'created_at', 'status'])
            ->make(true);
    }

    public function getItemPurchases($item_id)
    {

        return Datatables::of(Purchase::where('item_id', $item_id))
            ->editColumn('user_id', function ($faq) {
                return $faq->user->name;
            })->editColumn('sku', function ($attr) {
                return $attr->item->sku;
            })->editColumn('created_at', function ($faq) {
                return BBgetDateFormat($faq->created_at);
            })->editColumn('purchase_date', function ($faq) {
                return BBgetDateFormat($faq->purchase_date);
            })
            ->addColumn('actions', function ($faq) {
                return "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route("admin_inventory_purchase_edit", $faq->id) . "'>Edit</a></div>";
            })->rawColumns(['actions', 'question', 'answer', 'created_at', 'status'])
            ->make(true);
    }
    public function getItemOthers($item_id)
    {
        return Datatables::of(Others::where('item_id', $item_id))
            ->editColumn('user_id', function ($faq) {
                return $faq->user->name;
            })->editColumn('sku', function ($attr) {
                return $attr->item->sku;
            })->editColumn('created_at', function ($faq) {
                return BBgetDateFormat($faq->created_at);
            })->editColumn('purchase_date', function ($faq) {
                return BBgetDateFormat($faq->purchase_date);
            })
            ->addColumn('actions', function ($faq) {
                return "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route("admin_inventory_purchase_edit", $faq->id) . "'>Edit</a></div>";
            })->rawColumns(['actions', 'question', 'answer', 'created_at', 'status'])
            ->make(true);
    }

    public function getUserOrders($user_id)
    {
        return Datatables::of(
            Orders::leftJoin('orders_addresses', 'orders.id', '=', 'orders_addresses.order_id')
                ->select('orders.*', 'orders_addresses.country', 'orders_addresses.region', 'orders_addresses.city')->where('user_id', $user_id)
        )
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })->editColumn('status', function ($attr) {
                $history = $attr->history()->whereNotNull('status_id')->latest()->first();
                return ($history && $history->status) ?
                    '<span class="badge" style="background-color: ' . $history->status->color . '">' . $history->status->name . '</span>' : null;
            })->editColumn('updated_at', function ($attr) {
                return BBgetDateFormat($attr->updated_at);
            })->editColumn('user', function ($attr) {
                return $attr->user->name . ' ' . $attr->user->last_name;
            })
            ->addColumn('actions', function ($post) {
                return "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route('admin_orders_manage', $post->id) . "'>Edit</a></div>";
            })->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function getAllItems()
    {
        return Datatables::of(Items::leftJoin('item_translations', 'items.id', '=', 'item_translations.items_id')
            ->leftJoin('barcodes','items.barcode_id','=','barcodes.id')
            ->leftJoin('categories','items.brand_id','=','categories.id')
            ->leftJoin('categories_translations','categories.id','=','categories_translations.category_id')
            ->select('items.*','item_translations.name','item_translations.short_description','barcodes.code',
                'categories_translations.name as category')
            ->where('items.is_archive', false)
            ->where('item_translations.locale', \Lang::getLocale()))
//            ->editColumn('name', function ($attr) {
//                return $attr->name;
//            }),
//                \DB::raw('SUM(purchases.qty) as pqty,SUM(others.qty) as oqty')
            ->editColumn('brand_id', function ($attr) {
                $str = '';
                if($attr->categories && count($attr->categories)){
                    foreach ($attr->categories as $category){
                        $str .= "<span class='badge badge-dark'>".$category->name."</span>";
                    }
                }
                return $str;
            })->addColumn('quantity', function ($attr) {
                return ($attr->type=='simple')?$attr->purchase()->sum('qty')-$attr->others()->sum('qty'):'N/A';
            })
            ->addColumn('barcode_id', function ($attr) {
                return ($attr->barcode)?$attr->barcode->code:'no barcode';
            })
            ->editColumn('brand_id', function ($attr) {
                $brand=Category::find($attr->brand_id);
                return ($brand)?$brand->name:'no brand';
            })->editColumn('status', function ($attr) {
                return ($attr->status)?"Active":'Draft';
            })->editColumn('long_description', function ($attr) {
                return $attr->long_description;
            })->addColumn('actions', function ($attr) {
                return "<div class='datatable-td__action'>
            <a class='btn btn-warning' href='".route('admin_items_edit',$attr->id)."'>Edit</a>
            <a class='btn btn-info' href='" . route('admin_items_purchase', $attr->id) . "'>Activity</a>
            <a class='btn btn-danger' href='" . route('admin_items_archive', $attr->id) . "'>x</a>
            </div>";
            })->rawColumns(['actions','category'])->make(true);
    }

    public function getAllItemsInModal()
    {
        return Datatables::of(Items::leftJoin('item_translations', 'items.id', '=', 'item_translations.items_id')
            ->leftJoin('barcodes','items.barcode_id','=','barcodes.id')
            ->leftJoin('categories','items.brand_id','=','categories.id')
            ->leftJoin('categories_translations','categories.id','=','categories_translations.category_id')
            ->select('items.*','item_translations.name','item_translations.short_description','barcodes.code','categories_translations.name')
            ->where('items.is_archive', false)
            ->where('item_translations.locale', \Lang::getLocale()))

            ->editColumn('brand_id', function ($attr) {
                $brand=Category::find($attr->brand_id);
                return ($brand)?$brand->name:'no brand';
            })->rawColumns(['category'])->make(true);
    }

    public function getAllItemsArchived()
    {
        return Datatables::of(Items::archive())
            ->editColumn('name', function ($attr) {
                return $attr->name;
            })->editColumn('short_description', function ($attr) {
                return $attr->short_description;
            })->addColumn('quantity', function ($attr) {
                return ($attr->type=='simple')?$attr->purchase()->sum('qty')-$attr->others()->sum('qty'):'N/A';
            })->editColumn('barcode_id', function ($attr) {
                return ($attr->barcode)?$attr->barcode->code:'no barcode';
            })->editColumn('long_description', function ($attr) {
                return $attr->long_description;
            })->addColumn('actions', function ($attr) {
                return "<div class='datatable-td__action'>
            <a class='btn btn-warning' href='".route('admin_items_edit',$attr->id)."'>Edit</a>
            <a class='btn btn-info' href='" . route('admin_items_purchase', $attr->id) . "'>Activity</a>
            <a class='btn btn-success' href='" . route('admin_items_activate', $attr->id) . "'><i class='fa fa-arrow-circle-left'></i></a>
            </div>";
            })->rawColumns(['actions'])->make(true);
    }

    public function getAllSuppliers()
    {
        return Datatables::of(Suppliers::query())
            ->editColumn('created_at', function ($faq) {
                return BBgetDateFormat($faq->created_at);
            })
            ->addColumn('actions', function ($attr) {
                return (userCan('admin_suppliers_edit')) ? "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route('admin_suppliers_edit', $attr->id) . "'>Edit</a></div>" : '';
            })->rawColumns(['actions'])->make(true);
    }

    public function getAllOthers($id = null)
    {
        if (!$id) {
            $array = collect(json_decode(json_encode(\DB::select('SELECT MAX(id) as id FROM others GROUP BY `grouped`'), true), true))->pluck('id');
            return Datatables::of(
                Others::whereIn('id', $array)
            )
                ->editColumn('item_id', function ($other) {
                    return $other->item->name;
                })->editColumn('user_id', function ($other) {
                    return $other->user->name . ' ' . $other->user->last_name;
                })->editColumn('created_at', function ($faq) {
                    return BBgetDateFormat($faq->created_at);
                })->editColumn('updated_at', function ($faq) {
                    return BBgetDateFormat($faq->created_at);
                })
                ->addColumn('actions', function ($attr) {
                    return "<div class='datatable-td__action'>
                        <a class='btn btn-warning' href='" . route('admin_inventory_others_new', $attr->id) . "'>Edit</a>
</div>";
                })->rawColumns(['actions'])->make(true);
        } else {
            $other = Others::find($id);
            return Datatables::of(
                Others::where('grouped', $other->grouped)
            )
                ->editColumn('item_id', function ($other) {
                    return $other->item->name;
                })->editColumn('user_id', function ($other) {
                    return $other->user->name . ' ' . $other->user->last_name;
                })->editColumn('created_at', function ($faq) {
                    return BBgetDateFormat($faq->created_at);
                })->editColumn('updated_at', function ($faq) {
                    return BBgetDateFormat($faq->created_at);
                })->make(true);
        }

    }

    public function getAllCustomEmails()
    {

        return DataTables::of(CustomEmails::query()->where("is_for_admin", "=", "0"))
            ->editColumn('status', function ($message) {
                return $message->status ? 'sent out' : 'in progress';
            })->editColumn('category_id', function ($message) {
                return ($message->category) ? $message->category->name : '';
            })
            ->editColumn('created_at', function ($message) {

                return BBgetDateFormat($message->created_at);
            })->addColumn('actions', function ($message) {
                return (!$message->status ? '<button class="btn btn-success send-now" data-id="' . $message->id . '">Send Now</button>
<a href="' . route('edit_admin_emails_notifications_send_email', $message->id) . '" class="btn btn-danger">Edit</a>' : '<button class="btn btn-info copy-message" data-id="' . $message->id . '">Copy</button><a href="' . route('view_admin_emails_notifications_send_email', $message->id) . '" class="btn btn-warning"><i class="fa fa-eye"></i></a>');
            })->rawColumns(['actions'])->make(true);
    }

    public function getAllTransactions()
    {
        return Datatables::of(
            Transaction::query()
        )
            ->editColumn('date', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })->editColumn('time', function ($attr) {
                return BBgetTimeFormat($attr->created_at);
            })->editColumn('user', function ($attr) {
                return $attr->user->name . ' ' . $attr->user->last_name;
            })
            ->addColumn('actions', function ($post) {
                return "<div class='datatable-td__action'>
<a class='btn btn-info' href='" . route('admin_store_transactions_view', $post->id) . "'><i class='fa fa-eye'></i></a>
</div>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getAllNewsletters()
    {
        return Datatables::of(
            Newsletter::query()
        )
            ->editColumn('created_at', function ($attr) {
                return BBgetDateFormat($attr->created_at);
            })->editColumn('user_id', function ($attr) {
                return ($attr->user) ? $attr->user->name . ' ' . $attr->user->last_name : 'Not member';
            })->editColumn('category_id', function ($attr) {
                return ($attr->category) ? $attr->category->name : '';
            })
            ->addColumn('actions', function ($post) {
                return "<div class='datatable-td__action'>
                        <a class='btn btn-danger delete-button' data-key='$post->id' data-href='" . route('admin_emails_newsletter_delete') . "'>x</a>
                        </div>";
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function getAllBarcodes()
    {
        return Datatables::of(
            Barcodes::leftJoin('items','items.barcode_id','=','barcodes.id')
                ->leftJoin('item_translations','items.id','=','item_translations.items_id')
                ->where('item_translations.locale',app()->getLocale())->select('barcodes.*','item_translations.name as item_name')
        )

            ->editColumn('barcode', function ($barcode) {
                return '<svg id="code_'.$barcode->code.'" data-name="'.$barcode->item_name.'" class="barcodes" data-barcode="'.$barcode->code.'" width="200px"></svg>';
            })
            ->addColumn('actions', function ($code) {
                return "<div class='datatable-td__action'>
                <a class='btn btn-info' href='".route('admin_inventory_barcode_view',$code->id)."'>Activity</a>
                <a class='btn btn-primary printB' href='javascript:void(0)' data-id='".$code->id."' >Print</a>
                <a class='btn btn-danger delete-button' data-key='$code->id' data-href='" . route('admin_inventory_barcode_delete') . "'>x</a>
                </div>
                ";
            })->rawColumns(['actions','item','barcode'])
            ->make(true);
    }

    public function getCampaigns()
    {
        return Datatables::of(
            Campaign::query()
        )->editColumn('created_at', function ($faq) {
            return BBgetDateFormat($faq->created_at);
        })->addColumn('actions', function ($attr) {
            $html = "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route('admin_campaign_edit', $attr->id) . "'>Edit</a>";
            return  $html .= '<a href="javascript:void(0)" data-href="' . route("admin_campaign_delete") . '" 
                class="delete-button btn btn-danger" data-key="' . $attr->id . '">x</a></div>';
        })->rawColumns(['actions'])->make(true);
    }

    public function getAllChannelCustomers($id = null)
    {
        return Datatables::of(
            User::query()
        )->make(true);
    }

    public function getAllFilters()
    {
        return Datatables::of(
            Category::where('type','filter')
        )->editColumn('created_at', function ($faq) {
            return BBgetDateFormat($faq->created_at);
        })->addColumn('actions', function ($attr) {
            $html = "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route('admin_tools_filters_manage', $attr->id) . "'>Edit</a>";
            return $html .= '<a href="javascript:void(0)" data-href="#" class="delete-button btn btn-danger" data-key="' . $attr->id . '">x</a></div>';
        })->rawColumns(['actions'])->make(true);
    }

    public function getAllWarehouses()
    {
        return Datatables::of(
            Warehouse::query()
        )->editColumn('created_at', function ($faq) {
            return BBgetDateFormat($faq->created_at);
        })
            ->editColumn('image', function ($attr) {
                return ($attr->image) ? "<img src='$attr->image' class='img img-responsive' width='100px'/>" : "No image";
            })
            ->addColumn('actions', function ($attr) {
                $html = "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route('admin_warehouses_edit', $attr->id) . "'>Edit</a>";
                $html .= '<a href="'.route("admin_warehouses_manage",$attr->id).'" class="btn btn-info" >Activity</a>';
            return  $html .= '<a href="javascript:void(0)" data-href="'.route("admin_warehouses_delete").'" 
                class="delete-button btn btn-danger" data-key="' . $attr->id . '">x</a></div>';
        })->rawColumns(['actions','image'])->make(true);
    }

    public function getAllPromotions()
    {
        return Datatables::of(
            StockSales::query()
            )->editColumn('id', function ($item) {
                return "id";
            })->editColumn('start_date', function ($item) {
                return BBgetDateFormat($item->start_date);
            })->editColumn('end_date', function ($item) {
                return BBgetDateFormat($item->end_date);
            })
            ->editColumn('stock_id', function ($item) {
                return $item->stock->name;
            })
            ->editColumn('canceled', function ($attr) {
                return ($attr->canceled) ? "YES" : "No";
            })
            ->addColumn('actions', function ($attr) {
                return '';
//                $html = '<a href="'.route("admin_warehouses_manage",$attr->id).'"
//                class="badge btn-info" ><i class="fa fa-eye"></i></a>';
//                $html .= '<a href="javascript:void(0)" data-href="'.route("admin_warehouses_delete").'"
//                class="delete-button badge btn-danger" data-key="' . $attr->id . '"><i class="fa fa-trash"></i></a>';
//                return $html .= "<a class='badge btn-warning' href='" . route('admin_warehouses_edit', $attr->id) . "'><i class='fa fa-edit'></i></a>";
            })->rawColumns(['actions','canceled'])->make(true);
    }

    public function getAllLandings()
    {
        return Datatables::of(
            Landing::query()
            )->editColumn('url', function ($item) {
                return "<a href='/landings/$item->url' target='_blank'>/landings/".$item->url."</a>";
            })->editColumn('created_at', function ($item) {
                return BBgetDateFormat($item->created_at);
            })
            ->addColumn('actions', function ($attr) {
                $html = "<div class='datatable-td__action'><a class='btn btn-warning' href='" . route('admin_landings_edit', $attr->id) . "'>Edit</a>";
                return $html .= '<a href="javascript:void(0)" data-href="'.route("admin_landings_delete").'"
                class="delete-button btn btn-danger" data-key="' . $attr->id . '">x</a></div>';
            })->rawColumns(['actions','url'])->make(true);
    }
}
