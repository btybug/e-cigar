<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Statuses;
use App\Services\CartService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class PaymentController extends Controller
{
    public $_api_context;
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
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->statuses = $statuses;
        $this->settings = $settings;
        $this->paymentService = $paymentService;
        $this->amount = CartService::getTotalPriceSum() + Cart::getTotal();
    }

    public function payWithpaypal(Request $request)
    {
        try {

            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            $items = Cart::getContent();

            $itemsArray = [];
            foreach ($items as $variation_id => $item) {
                $item_ = new Item();
                $item_->setName($item->attributes->product->name)/** item name **/
                ->setCurrency('GBP')
                    ->setQuantity($item->quantity)
                    ->setPrice($item->price);
                /** unit price **/

                $itemsArray[] = $item_;
            }

            $item_list = new ItemList();
            $item_list->setItems($itemsArray);

            $amount = new Amount();
            $amount->setCurrency('GBP')
                ->setTotal($this->amount);

            $transaction = new Transaction();

            $transaction->setAmount($this->amount)
                ->setItemList($item_list)
                ->setDescription('Your transaction description');

            $this->paymentService->method = 'paypal';
            $order = $this->paymentService->call();

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(route('cash_order_success', $order->id));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/

            $transaction = $payment->create($this->_api_context);
            $this->makeTransaction($transaction, $order);

        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return \Redirect::route('paywithpaypal');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return \Redirect::route('paywithpaypal');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        \Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return \Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return \Redirect::route('home');
    }

    private function makeTransaction($charge, $order)
    {
        return \App\Models\Transaction::create([
            'user_id' => \Auth::id(),
            'order_id' => $order->id,
            'payment_method' => 'stripe',
            'transaction_id' => $charge['id'],
            'object' => $charge['object'],
            'amount' => $order->amount,
            'amount_refunded' => $charge['amount_refunded'],
            'currency' => $charge['currency'],
            'invoice' => $charge['invoice'],
            'paid' => $charge['paid'],
            'receipt_number' => $charge['receipt_number'],
            'receipt_url' => $charge['receipt_url'],
            'refunds_url' => $charge['refunds']['url'],
            'source_id' => $charge['source']['id'],
            'source_object' => $charge['source']['object'],
            'source_brand' => $charge['source']['brand'],
            'source_country' => $charge['source']['country'],
            'source_exp_month' => $charge['source']['exp_month'],
            'source_exp_year' => $charge['source']['exp_year'],
            'source_funding' => $charge['source']['funding'],
            'source_last4' => $charge['source']['last4'],
            'status' => $charge['status'],
        ]);
    }

    private function order($transaction)
    {
        $this->paymentService->method = 'paypal';
        $order = $this->paymentService->call();
//        $this->makeTransaction($transaction, $order);

        return $order;
    }
}
