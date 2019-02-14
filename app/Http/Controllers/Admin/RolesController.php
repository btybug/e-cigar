<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Permissions;
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
        $role = Roles::where('id',$request->id)->with('permissions')->first();
        return $this->view('edit', compact('role'));
    }

    public function create()
    {
//        dd(getModuleRoutes('GET','admin'));
        return $this->view('create');
    }

    public function postCreate(Request $request)
    {

        $data = $request->except('_token', 'has_access', 'permission');
        $permissions = $this->getPermissions($request->get('permission',[]), 'backend')->pluck('id');
        $has_access = $this->getPermissions($request->get('has_access',[]), 'has_access')->pluck('id');
        $validator = \Validator::make($data, [
            'title' => 'required|unique:roles,title',
            'description' => 'required',
            'type' => 'required|in:backend,frontend'
        ]);
        $data['slug'] = str_replace(' ', '_', strtolower($data['title']));
        if ($validator->fails()) return redirect()->back();
        $role = Roles::create($data);
        $role->permissions()->sync($permissions, true);
        $role->permissions()->sync($has_access, true);
        return redirect()->route('admin_role_membership');

    }

    protected function getPermissions($permissions, $type)
    {
        $result = [];
        foreach ($permissions as $key => $value) {
            if (Permissions::where('slug', $value)->where('type', $type)->exists()) {
                $result[] = Permissions::where('slug', $value)->where('type', $type)->first();
            } else {
                $result[] = Permissions::created(['slug' => $value, 'type' => $type]);
            }
        }
        return collect($result);
    }

    public function postEdit(Request $request)
    {
        $data = $request->except('_token', 'has_access', 'permission');
        $permissions = $this->getPermissions($request->get('permission',[]), 'backend')->pluck('id');
        $has_access = $this->getPermissions($request->get('has_access',[]), 'has_access')->pluck('id');
        $validator = \Validator::make($data, [
            'title' => 'required|unique:roles,title,'.$data['id'],
            'description' => 'required',
            'type' => 'required|in:backend,frontend',
            'id'=>'required|exists:roles'
        ]);
        if ($validator->fails()) return redirect()->withErrors($validator);
        $data['slug'] = str_replace(' ', '_', strtolower($data['title']));

        $role = Roles::find($data['id']);
        $role->permissions()->sync($permissions, false);
        $role->permissions()->sync($has_access, false);
        return redirect()->route('admin_role_membership');
    }
}