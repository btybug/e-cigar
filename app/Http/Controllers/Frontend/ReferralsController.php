<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 2/5/2019
 * Time: 3:35 PM
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

class ReferralsController extends Controller
{
    protected $view = 'frontend.my_account';

    public function getIndex()
    {
        return $this->view('referrals');
    }
}