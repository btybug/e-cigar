<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/23/2018
 * Time: 10:46 AM
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\SiteCurrencies;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    protected $view='frontend.common';

    public function getSales()
    {
        return $this->view('sale');
    }

    public function getForum()
    {
        return $this->view('forum');
    }
    public function getSupport()
    {
        return $this->view('support');
    }
    public function getContactUs()
    {
        return $this->view('contact_us');
    }

    public function changeCurrency(Request $request,SiteCurrencies $siteCurrencies)
    {
        $currency = $siteCurrencies->where('code',$request->code)->first();

        if ($currency) {
            \Cookie::queue('currency', $request->code);
        }

        return $request->code;
    }


}