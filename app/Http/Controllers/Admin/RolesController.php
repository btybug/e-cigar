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
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $view = 'admin.roles';

    public function index()
    {
        return $this->view('index');
    }

    public function edit(Request $request)
    {
        $role=Roles::find($request->id);
        return $this->view('edit',compact('role'));
    }
    public function create()
    {
        return $this->view('create');
    }

    public function postCreate(Request $request)
    {
        dd($request->all());
    }
}