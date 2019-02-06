<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 2/5/2019
 * Time: 3:35 PM
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ReferralsController extends Controller
{
    protected $view = 'frontend.my_account';

    public function getIndex()
    {
        $user=\Auth::user();
        return $this->view('referrals',compact('user'));
    }

    public function postReferredBy(Request $request){
        $user=\Auth::user();
        if($user->orders()->count())return abort(404);
        $data=$request->all();
        $v=\Validator::make($data,['referred_by'=>'required|exists_except:users,customer_number,id,'.$user->id]);
        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v);
        }
        $inviter=User::where('customer_number',$data['referred_by'])->first();
        $user->referred_by=$data['referred_by'];
        $user->save();
        $inviter->bonus_bringers()->attach($user->id,['type'=>'referral','status'=>0]);
        $user->bonus_bringers()->attach($inviter->id,['type'=>'invited','status'=>0]);
        return redirect()->back();

    }
}