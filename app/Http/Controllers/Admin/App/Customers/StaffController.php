<?php


namespace App\Http\Controllers\Admin\App\Customers;


use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Http\Requests\StaffRolelRequest;
use App\Models\Staff;
use App\Models\StaffRoles;
use App\Traits\UploadTrait;

class StaffController extends Controller
{
    use UploadTrait;

    public function getStaff()
    {
        return view('staff.index');
    }

    public function getCreateStaffMember($id=null)
    {
        $roles = \Auth::user()->roles()->pluck('name', 'id');
        $shops = \Auth::user()->shops()->pluck('name', 'id');
        $model=($id)?Staff::findOrfail($id):null;
        return view('staff.create_edit', compact('roles', 'shops','model'));
    }

    public function postCreateStaffMember(StaffRequest $request,$id=null)
    {
        $image = $request->file('photo');
        $folder = '/staff';
        $name = $request->get('name');
        $image = $this->uploadOne($image, $folder, 'public', $name);
        $data = $request->only(['name','last_name','phone','gender','email','address','birthday','pass_type','pass','photo','salary','status','family_status','rating' ,'role_id','shop_id','hired_at']);
        $data['photo']=$image;
        Staff::updateOrCreate(['id'=>$id],$data);
        return redirect()->route('staff');
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
