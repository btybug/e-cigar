<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\User;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class UserController extends Controller
{
    protected $view = 'admin.users';

    public function index()
    {
        return $this->view('index');
    }
    public function showStaff()
    {
        return $this->view('staff');
    }

    public function edit(Request $request,Countries $countries)
    {
        $user=User::find($request->id);
        $countries= $countries->all()->pluck('name.common', 'name.common')->toArray();
        $roles=Roles::where('type','frontend')->pluck('title','id')->toArray();
        return $this->view('edit',compact('user','countries','roles'));
    }

    public function postEdit(Request $request)
    {
        $data=$request->except('_token');
        User::find($request->id)->update($data);

        return redirect()->back();
    }

    public function getUserActivity($id)
    {
        $user=User::findOrFail($id);
        return $this->view('activity_log',compact('user'));
    }
}