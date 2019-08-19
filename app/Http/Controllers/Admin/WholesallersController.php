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

class WholesallersController extends Controller
{
    protected $view = 'admin.wholesallers';

    public function index()
    {
        return $this->view('index');
    }
}
