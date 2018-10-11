<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    protected $view;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function view(string $path,$data=[],$mergeData=[])
    {
        return view($this->view.'.'.$path,$data,$mergeData);
    }
}
