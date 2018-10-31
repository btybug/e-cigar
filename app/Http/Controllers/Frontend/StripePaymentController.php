<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/31/2018
 * Time: 10:14 PM
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\StripePayments;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function stripeCharge(Request $request)
    {
        putenv('STRIPE_API_KEY=' . stripe_secret());
        putenv('STRIPE_API_VERSION=2016-07-06');
        $stripe = new Stripe();

// This is a $20.00 charge in US Dollar.
        $charge = $stripe->charges()->create(
            array(
                'amount' => 2000,
                'currency' => 'usd',
                'source' => $request->get('stripeToken')
            )
        );
        $data=[];
        $data['user_id']=\Auth::id();
        $data['transaction_id']=$charge['id'];
        $data['amount']=$charge['amount'];
        $data['currency_code']=$charge['currency'];
        $data['payment_status']=$charge['status'];
        StripePayments::create($data);
        return redirect('/');
    }
}