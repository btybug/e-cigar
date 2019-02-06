<?php namespace App\Services;

use App\Models\Coupons;
use App\Models\Orders;
use App\Models\ReferalCoupon;
use App\User;
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: edo
 * Date: 10/18/2018
 * Time: 1:01 PM
 */
class UserService
{

    public function giveCoupon($user_id, $referal_id)
    {
        try{
            $user = User::findOrFail($user_id);
            $referal = User::findOrFail($referal_id);
            $coupon = Coupons::create($this->couponData($referal,$user_id));

            $referal = ReferalCoupon::create([
                'user_id' => $user_id,
                'coupon_id' => $coupon->id,
            ]);

            return $referal;
        }catch (\Exception $exception){
            \Log::emergency($exception->getMessage());
            return false;
        }
    }

    private function couponData($referal,$user_id)
    {
        return [
            "name" => "Referal $referal->name",
            "code" => $this->generateCode(),
            "discount" => "10",
            "type" => "f",
            "based" => "cart",
            "product" => null,
            "shipping_type" => "shipping_type",
            "target" => "1",
            "users" => [
                $user_id
            ],
            "start_date" => date('m/d/Y',now()->getTimestamp()),
            "end_date" => date('m/d/Y',Carbon::now()->addMonth(6)->getTimestamp()),
            "total_amount" => "1",
            "user_per_coupon" => "1",
            "user_per_customer" => "1",
            "created_by" => "referral by system",
        ];
    }

    private function generateCode($length = 10){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }

        return $token;
    }
}