<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attributes;
use App\Models\Category;
use App\Models\Competitions;
use App\Models\MarketType;
use App\Models\Matches;
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
            return 'Admin Panel';
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
                    <a href="'.route("admin_store_attributes_edit",$attr->id).'" class="btn btn-warning">Edit</a>
                    <a href="'.route("admin_store_attributes_options",$attr->id).'" class="btn btn-primary">Options</a>';
            })->rawColumns(['actions','image','icon','created_at'])
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
