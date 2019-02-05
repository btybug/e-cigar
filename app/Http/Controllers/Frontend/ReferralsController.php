<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 2/5/2019
 * Time: 3:35 PM
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReferralsController extends Controller
{
    protected $view = 'frontend.my_account';

    public function getIndex()
    {
        return $this->view('referrals');
    }

    public function postReferredBy(Request $request){
        $user=\Auth::user();
        if($user->orders()->count())return abort(404);
        $data=$request->all();
        $v=\Validator::make($data,['referred_by'=>'required|alpha_num|unique:users|exists_except:users,referral_code,id,'.$user->id]);
        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v);
        }
        $user->referred_by=$data['referred_by'];
        $user->save();
        return redirect()->back();

    }
}