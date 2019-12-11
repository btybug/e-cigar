<?php


namespace App\Http\Controllers\Admin\App\Customers;


use App\Http\Controllers\Controller;
use App\Models\App\AppStaff;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function getStaff()
    {
        $warehouse=Warehouse::all()->pluck('name','id');
        return view('admin.app.staff.index',compact('warehouse'));
    }

    public function postCreateStaffMember(Request $request)
    {
        $warehouse=Warehouse::findOrFail($request->get('warehouse_id'));
        $warehouse->staff()->attach($request->get('user_id'));
        return response()->json(['error'=>false]);
    }

    public function getViewStaffMember($id)
    {
        $model=Staff::findOrfail($id);
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $barcode= '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($model->pass, $generator::TYPE_CODE_128)) . '">';
        $photo= '<img src="data:image/jpg;base64,' . base64_encode(\Storage::disk('local')->get('/public/'.$model->photo)). '" alt="user">';
        return view('staff.view', compact('model','barcode','photo'));
    }

    public function getRoles()
    {
        return view('staff.roles.index');
    }

    public function getCreateRole($id = null)
    {
        $model = ($id) ? StaffRoles::findOrFail($id) : null;
        return view('staff.roles.create_edit', compact('model'));
    }

    public function postCreateOrEditRole(StaffRolelRequest $request, $id = null)
    {
        $data = $request->only(['name', 'minimum_rate', 'minimum_salary', 'description']);
        $data['slug'] = str_replace(' ', '_', strtolower($request->get('name')));
        $data['customer_id'] = \Auth::id();
        StaffRoles::updateOrCreate(['id' => $id], $data);
        return redirect()->route('staff_roles');
    }
}
