<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:15
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Requests\AdminProfileRequest;
use App\Http\Controllers\Admin\Requests\UserAvaratRequest;
use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use App\Models\Roles;
use App\Services\ManagerApiRequest;
use App\Services\UserService;
use App\Services\Widgets;
use App\User;
use PragmaRX\Countries\Package\Countries;
use App\Models\GeoZones;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    private $geoZones;

    public function __construct(
        GeoZones $geoZones
    )
    {
        $this->geoZones = $geoZones;
    }

    public function getIndex()
    {
        return view('admin.my_account.index', compact([]));
    }

    public function getSites()
    {
        return view('admin.my_account.sites', compact([]));
    }
}
