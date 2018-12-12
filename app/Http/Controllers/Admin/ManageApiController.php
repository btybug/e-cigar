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

    public function postSettings(Request $request,Settings $settings,ManagerApiService $apiService)
    {
        $data=$request->only(['client_id','client_secret']);
        $settings->updateOrCreateSettings('manage_api_settings',$data);
        return redirect()->back();
    }

    public function getStocks()
    {
        return $this->view('stocks');
    }

    public function getAllStocks(Request $request,ManagerApiRequest $apiRequest)
    {
        return $apiRequest->getStocks($request);
    }
}