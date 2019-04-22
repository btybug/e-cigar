<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/31/2018
 * Time: 10:14 PM
 */

namespace App\Http\Controllers\Frontend;


use App\Events\OrderSubmitted;
use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\OrderAddresses;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\OrdersJob;
use App\Models\Others;
use App\Models\StripePayments;
use App\Models\Statuses;
use App\Models\Settings;
use App\Models\ZoneCountries;
use App\Models\ZoneCountryRegions;
use App\Services\CartService;
use App\Services\PaymentService;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use PragmaRX\Countries\Package\Countries;


class CashPaymentController extends Controller
{
    protected $view = 'frontend.shop';

    private $statuses;
    private $settings;
    private $amount;
    private $paymentService;

    public function __construct(
        Statuses $statuses,
        Settings $settings,
        PaymentService $paymentService
    )
    {
        $this->statuses = $statuses;
        $this->settings = $settings;
        $this->paymentService = $paymentService;
    }

    public function order(Request $request)
    {
        $order = $this->paymentService->call();

        return \Response::json(['error' => false, 'url' => route('cash_order_success', $order->id)]);
    }

    public function success(Request $request, $id)
    {
        $order = Orders::findOrFail($id);

        if (!Cart::isEmpty() && session()->has('shipping_address') && session()->has('billing_address') && $order) {
            session()->forget('shipping_address', 'billing_address');
            session()->forget('shipping_address_id', 'billing_address_id');
            session()->forget('payment_token');
            Cart::clear();
            Cart::removeConditionsByType('shipping');

            return $this->view('_partials.cash_success');
        }

        abort(404);
    }
}
