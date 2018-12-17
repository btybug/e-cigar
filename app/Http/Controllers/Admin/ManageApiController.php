<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 12/11/2018
 * Time: 10:34 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\Settings;
use App\Services\ManagerApiRequest;
use App\Services\ManagerApiService;
use App\User;
use Illuminate\Http\Request;

class ManageApiController extends Controller
{
    protected $view = 'admin.manage_api';

    public function index(Settings $settings)
    {
        $model = $settings->getEditableData('manage_api_export_users');
        return $this->view('index', compact('model'));
    }

    public function settings(Settings $settings)
    {
        $model = $settings->getEditableData('manage_api_settings');
        return $this->view('settings', compact('model'));
    }

    public function postSettings(Request $request, Settings $settings)
    {
        $data = $request->only(['client_id', 'client_secret']);
        $settings->updateOrCreateSettings('manage_api_settings', $data);
        $service = new ManagerApiService;
        $service->getAccessToken()->save();
        return redirect()->back();
    }

    public function getProducts()
    {
        return $this->view('products');
    }

    public function getItems()
    {
        return $this->view('items');
    }

    public function postManage(Request $request, Settings $settings)
    {
        $data = $request->except('_token');
        $data['customer_number']=1;
        $data['id']=1;
        $data['created_at']=1;
        $settings->updateOrCreateSettings('manage_api_export_users', $request->except('_token'));
        return redirect()->back();
    }

    public function getAllProducts(Request $request, ManagerApiRequest $apiRequest)
    {
        return $apiRequest->getProducts($request);
    }

    public function getAllItems(Request $request, ManagerApiRequest $apiRequest)
    {
        return $apiRequest->getItems($request);
    }

    public function exportCustomers(ManagerApiRequest $apiRequest)
    {
        return $apiRequest->exportCustomers();
    }
}