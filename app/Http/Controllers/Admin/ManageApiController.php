<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 12/11/2018
 * Time: 10:34 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Services\ManagerApiRequest;
use App\Services\ManagerApiService;
use Illuminate\Http\Request;

class ManageApiController extends Controller
{
    protected $view = 'admin.manage_api';

    public function index()
    {
        return $this->view('index');
    }
    public function settings(Settings $settings)
    {
        $model = $settings->getEditableData('manage_api_settings');
        return $this->view('settings',compact('model'));
    }

    public function postSettings(Request $request,Settings $settings)
    {
        $data=$request->only(['client_id','client_secret']);
        $settings->updateOrCreateSettings('manage_api_settings',$data);
        $service=new ManagerApiService;
        $service->getAccessToken()->save();
        return redirect()->back();
    }

    public function getProducts()
    {
        return $this->view('products');
    }
    public function getItems()
    {
        return $this->view('products');
    }

    public function getAllProducts(Request $request,ManagerApiRequest $apiRequest)
    {
        return $apiRequest->getProducts($request);
    }
    public function getAllItems(Request $request,ManagerApiRequest $apiRequest)
    {
        return $apiRequest->getItems($request);
    }
}