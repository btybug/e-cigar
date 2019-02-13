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
        $role = Roles::find($request->id);
        return $this->view('edit', compact('role'));
    }

    public function create()
    {
//        dd(getModuleRoutes('GET','admin'));
        return $this->view('create');
    }

    public function postCreate(Request $request)
    {
        $formData = $request->formData;
        $treeData = $request->get('treeData', []);
        $permissions = [];
        $data = [];
        foreach ($formData as $column) {
            if ($column['name'] != '_token')
                $data[$column['name']] = $column['value'];
        }
        $validator = \Validator::make($data, [
            'title' => 'required|unique:roles,title',
            'description' => 'required',
            'type' => 'required|in:backend,frontend'
        ]);
        $data['slug'] = str_replace(' ', '_', strtolower($data['title']));
        if ($validator->fails()) return response()->json(['error' => true, 'message' => $validator->messages()]);
        $role = Roles::create($data);
        $dataPermissions = [];
        foreach ($treeData as $permission) {
            if (isset($permission['text'])) {
                if (!Permissions::where('slug', $permission['text'])->exists()) {
                    $permission = Permissions::create(['slug' => $permission['text'], 'type' => $data['type']]);
                } else {
                    $permission = Permissions::where('slug', $permission['text'])->first();
                }
                $dataPermissions[] = $permission->id;
            }
        }
        $role->permissions()->sync($dataPermissions);
        return response()->json(['error' => false]);
    }

    public function postEdit(Request $request)
    {
        $formData = $request->formData;
        $treeData = $request->get('treeData', []);
        $permissions = [];
        $data = [];
        foreach ($formData as $column) {
            if ($column['name'] != '_token')
                $data[$column['name']] = $column['value'];
        }
        $role = Roles::find($data['id']);
        $validator = \Validator::make($data, [
            'title' => 'required|unique:roles,title,' . $role->id,
            'description' => 'required',
            'type' => 'required|in:backend,frontend'
        ]);
        $data['slug'] = str_replace(' ', '_', strtolower($data['title']));
        if ($validator->fails()) return response()->json(['error' => true, 'message' => $validator->messages()]);
        $role->update($data);
        $dataPermissions = [];
        foreach ($treeData as $permission) {
            if (isset($permission['text'])) {
                if (!Permissions::where('slug', $permission['text'])->exists()) {
                    $permission = Permissions::create(['slug' => $permission['text'], 'type' => $data['type']]);
                } else {
                    $permission = Permissions::where('slug', $permission['text'])->first();
                }
                $dataPermissions[] = $permission->id;
            }
        }
        $role->permissions()->sync($dataPermissions);
        return response()->json(['error' => false]);
    }
}