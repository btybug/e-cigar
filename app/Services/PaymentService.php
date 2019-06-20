<?php namespace App\Services;

use App\Events\OrderSubmitted;
use App\Models\Addresses;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\OrdersJob;
use App\Models\Others;
use App\Models\Settings;
use App\Models\Statuses;
use App\Models\StockVariation;
use App\Models\ZoneCountries;
use App\Models\ZoneCountryRegions;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use PragmaRX\Countries\Package\Countries;

/**
 * Created by PhpStorm.
 * User: edo
 * Date: 22/04/2019
 * Time: 1:01 PM
 */
class PaymentService
{
    private $amount = 0;

    public function __construct(
        Statuses $statuses,
        Settings $settings
    )
    {
        $this->statuses = $statuses;
        $this->settings = $settings;
    }

    public function call()
    {
        $shippingId = session()->get('shipping_address');
        $billingId = session()->get('billing_address');
        $this->amount = CartService::getTotalPriceSum() + Cart::getTotal();
        $geoZone = null;

        if (\Auth::check()) {
            $shippingAddress = Addresses::find($shippingId);
            $zone = ($shippingAddress) ? ZoneCountries::find($shippingAddress->country) : null;
            $region = ($shippingAddress) ? ZoneCountryRegions::find($shippingAddress->region) : null;
            $geoZone = ($zone) ? $zone->geoZone : null;
            $shipping = Cart::getCondition($geoZone->name);
        }
        return \DB::transaction(function () use ($billingId, $shippingId, $geoZone, $shippingAddress, $zone, $region) {
            $shipping = Cart::getCondition($geoZone->name);
            $items = Cart::getContent();
            $order_number = get_order_number();

            $order = Orders::create([
                'user_id' => \Auth::id(),
                'code' => getUniqueCode('orders', 'code', Countries::where('name.common', $zone->name)->first()->cca2),
                'amount' => $this->amount,
                'billing_addresses_id' => $billingId,
                'shipping_method' => $shipping->getAttributes()->courier->name,
                'payment_method' => 'cash',
                'shipping_price' => $shipping->getValue(),
                'currency' => 'usd',
                'order_number' => $order_number
            ]);

            $status = $setting = $this->settings->getData('order', 'open');
            $historyData['user_id'] = \Auth::id();
            $historyData['status_id'] = ($status) ? $status->val : $this->statuses->where('type', 'order')->first()->id;
            $historyData['note'] = 'Order made';

            $order->history()->create($historyData);

            $shippingAddress = $shippingAddress->toArray();
            $shippingAddress['country'] = ($zone) ? $zone->name : null;
            $shippingAddress['region'] = ($region) ? $region->name : null;

            unset($shippingAddress['id']);
            unset($shippingAddress['created_at']);
            unset($shippingAddress['updated_at']);
            unset($shippingAddress['user_id']);
            $order->shippingAddress()->create($shippingAddress);

            $sales = [];
            foreach ($items as $variation_id => $item) {
                $options = [];
                foreach ($item->attributes->variations as $variation) {
                    $dataV = [];
                    $dataV['price'] = $variation['price'];
                    $dataV['options'] = [];
                    foreach ($variation['options'] as $option) {
                        if (isset($sales[$option['option']->item_id])) {
                            $sales[$option['option']->item_id] = $sales[$option['option']->item_id] + $option['qty'];
                        } else {
                            $sales[$option['option']->item_id] = $option['qty'];
                        }

                        $dataV['options'][] = [
                            'qty' => $option['qty'],
                            'name' => $option['option']->name,
                            'title' => $option['option']->title,
                            'id' => $option['option']->id,
                            'image' => $option['option']->image,
                        ];
                    }
                    $options[$variation['group']->variation_id] = $dataV;
                }

                $extras = [];
                if($item->attributes->extra && isset($item->attributes->extra)){
                    foreach ($item->attributes->extra as $extra) {
                        $dataV = [];
                        $dataV['price'] = $extra['price'];
                        $dataV['options'] = [];
                        foreach ($extra['options'] as $option) {
                            if (isset($sales[$option['option']->item_id])) {
                                $sales[$option['option']->item_id] = $sales[$option['option']->item_id] + $option['qty'];
                            } else {
                                $sales[$option['option']->item_id] = $option['qty'];
                            }

                            $dataV['options'][] = [
                                'qty' => $option['qty'],
                                'name' => $option['option']->name,
                                'title' => $option['option']->title,
                                'id' => $option['option']->id,
                                'image' => $option['option']->image,
                            ];
                        }
                        $extras[$extra['group']->variation_id] = $dataV;
                    }
                }


                if (count($sales)) {
                    foreach ($sales as $item_id => $sale) {
                        Others::create([
                            'item_id' => $item_id,
                            'user_id' => \Auth::id(),
                            'qty' => (int)$sale,
                            'reason' => 'sold',
                            'grouped' => $order->id,
                        ]);
                    }
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'name' => $item->attributes->product->name,
                    'sku' => '',
                    'variation_id' => $variation_id,
                    'price' => $item->price,
                    'qty' => $item->quantity,
                    'amount' => $item->price * $item->quantity,
                    'image' => $item->attributes->product->image,
                    'options' => ['options' => $options, 'extras' => $extras]
                ]);
            }

            OrdersJob::makeNew($order->id);
            event(new OrderSubmitted(\Auth::getUser(), $order));

            return $order;
        });
    }
}
