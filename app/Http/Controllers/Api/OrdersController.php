<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\App\AppItems;
use App\Models\App\AppOffersDiscount;
use App\Models\App\AppWarehouses;
use App\Models\App\Discount;
use App\Models\App\Orders;
use App\Models\App\OrdersItems;
use App\Models\ItemsLocations;
use App\Models\Warehouse;
use App\Services\App\OrderService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $nums = [
        1000000000 => 'B',
        100000000 => 'HM',
        10000000 => 'TM',
        1000000 => 'M',
        100000 => 'G',
        10000 => 'D',
        1000 => 'T',
        100 => 'H',
        10 => 'N',
        1 => 'O',
    ];
    protected $latters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function getBasketNumber(Request $request)
    {
        $shop = Warehouse::findOrFail($request->get('shop_id'));
        $lastOrder = $shop->Orders()->orderBy('id', 'DESC')->first();
        $uniqId = $this->stringId($shop->id, $this->numberId($lastOrder ? $lastOrder->id : 0));
        $order = Orders::create(['shop_id' => $shop->id, 'status' => 0, 'order_number' => $uniqId, 'staff_id' => $request->get('staff_id')]);
        return response()->json(['error' => false, 'basket_number' => $uniqId, 'order_id' => $order->id]);
    }

    protected function numberId($id)
    {
        foreach ($this->nums as $key => $v) {
            if ($id >= $key) {
                $delta = floor($id / $key);
                return ($delta > 1) ? $delta . $v . substr((string)$id, -2) : $v . substr((string)$id, -2);
            }
        }
    }

    protected function stringId($id, $suffix)
    {
        for ($i = 0; $i <= strlen($this->latters); $i++) {
            for ($j = 0; $j <= strlen($this->latters); $j++) {
                if (!Orders::where('shop_id', $id)->where('order_number', $this->latters[$i] . $this->latters[$j] . $suffix)->exists()) {
                    return $this->latters[$i] . $this->latters[$j] . $suffix;
                };
            }
        }
    }

    public function addItemToBasked(Request $request, OrderService $service)
    {
        $shop = AppWarehouses::where('warehouse_id', $request->get('shop_id'))->first();
        $order = $shop->warehouse->orders()->with('items')->find($request->get('order_id'));
        if($order->status==Orders::DONE){
            $order->status=Orders::EDITING;
            $order->history()->create(['data'=>$order->toArray()]);
            $order->save();
        }

        if ($request->get('product_id', false)) {
            $item = AppItems::find($request->get('product_id'));

            if (!$order->items()->where('item_id', $item->item_id)->where('type', OrdersItems::SOLD)->exists()) {
                $order->basketItems()->attach([$item->item_id => ['qty' => $request->get('qty'), 'price' => $item->price]]);
            } else {
               $items= $order->items()->where('type', OrdersItems::SOLD)->where('item_id', $item->item_id)->first();

                if ($order->status == Orders::EDITING &&  $items->qty>$request->get('qty')) {
                    dd(['warehouse_id'=>$request->get('shop_id')],['rack_id'=>$request->get('location_id'),'item_id'=>$request->get('product_id')]);
                    $location = ItemsLocations::firstOrNew(['warehouse_id'=>$request->get('shop_id')],['rack_id'=>$request->get('location_id'),'item_id'=>$request->get('product_id')]);
                    $basketItem = $order->basketItems()->where('item_id', $request->get('product_id'))->first();
                    $location->qty+=$basketItem->qty-$request->get('qty');
                    $location->save();
                }
                $order->items()->where('type', OrdersItems::SOLD)->where('item_id', $item->item_id)->update(['qty' => $request->get('qty'), 'price' => $item->price]);

            }
        }
        if ($request->get('gifts', false)) {
            $gifts = $request->get('gifts',[]);
            $sync = [];
            $order->items()->where('type', OrdersItems::GIFT)->delete();
            foreach ($gifts as $gift) {
                $sync[] = $gift['giftId'];
                foreach ($gift['products'] as $product) {
                    $item = AppItems::find($product['productId']);
                    if (!$order->items()->where('item_id', $item->item_id)->where('type', OrdersItems::GIFT)->exists()) {
                        $order->basketItems()->attach([$item->item_id => ['qty' => $product['qty'], 'price' => 0, 'type' => OrdersItems::GIFT, 'discount_offer_id' => $gift['giftId']]]);
                    } else {
                        $order->items()->where('item_id', $item->item_id)->where('type', OrdersItems::GIFT)->update(['qty' => $product['qty'], 'price' => 0, 'type' => OrdersItems::GIFT, 'discount_offer_id' => $gift['giftId']]);
                    }
                }
            }
            $order->discountOffers()->sync($sync);

        }
        return response()->json(['success' => true]);
    }

    public function removeFromBasked(Request $request)
    {
        $order = Orders::with('basketItems')->where('id', $request->get('order_id'))->first();
        if ($order->status == Orders::DONE) {
            $order->status = Orders::EDITING;
            $order->history()->create(['data' => $order->toArray()]);
            $order->save();
        }
        if ($order->status == Orders::EDITING) {
            $location = ItemsLocations::firstOrNew(['warehouse_id'=>$request->get('shop_id')],['rack_id'=>$request->get('location_id'),'item_id'=>$request->get('product_id')]);
            $item = $order->basketItems()->where('item_id', $request->get('product_id'))->first();
            $location->qty+=$item->qty;
            $location->save();
        }

        $order->basketItems()->detach($request->get('product_id'));
        return response()->json(['success' => true]);
    }

    public function getBasket(Request $request)
    {
        $order = Orders::where('order_number', $request->get('basket_number', 'AA'))
            ->where('shop_id', $request->get('shop_id', 1))
            ->with('items')
            ->with('gifts')
            ->first();

        if ($order) {
            return response()->json(['success' => true, 'basket' => $order]);
        }
        return response()->json(['success' => false]);
    }

    public function getBaskets(Request $request)
    {
        $orders = Orders::where('shop_id', $request->get('shop_id', 1))->with('items')->get();
        if ($orders) {
            return response()->json(['success' => true, 'orders' => $orders]);
        }
        return response()->json(['success' => false]);
    }

    public function getAuthorize(Request $request)
    {
        $shop = Warehouse::find($request->get('shop_id'));
        if ($shop && $shop->staff()->where('app_pass', $request->get('barcode'))->exists()) {
            $member = $shop->staff()->where('app_pass', $request->get('barcode'))->with('role')->first();
            return response()->json(['success' => true, 'member' => $member]);
        }
        return response()->json(['success' => false, 'message' => 'invalid member']);
    }

    public function FinishOrder(Request $request, OrderService $service)
    {
        $shop = Warehouse::find($request->get('shop_id'));
        $order = $shop->orders()->findOrFail($request->get('order_id'));
        $order->staff_id = $request->get('staff_id');
        $order->status = Orders::DONE;
        $order->payment_method = $request->get('payment_method');
        $order->tendered = $request->get('tendered');
        $order->changed = $request->get('changed');
        $order->sub_total = $request->get('sub_total');
        $order->total = $request->get('total');
        $order->tax = $request->get('tax');
        $order->admin_discount = $request->get('admin_discount');
        $order->finished_at = Carbon::now();
        $order->save();
        if ($order->status != Orders::EDITING){
            $service->discount($order, $shop);
        }else{
            $service->discountEdit($order, $shop);
        }

        return response()->json(['success' => true]);
    }

    public function getCloseBasket(Request $request)
    {
        $shop = Warehouse::find($request->get('shop_id'));
        $order = $shop->orders()->findOrFail($request->get('order_id'));
        $order->note = $request->get('note');
        $order->save();
        return response()->json(['success' => true]);
    }

    public function getAdminDiscounts()
    {
        $discounts = Discount::where('status', '1')->get();
        return response()->json(['success' => true, 'discounts' => $discounts]);
    }

    public function getOfferDiscounts()
    {
        $discounts = AppOffersDiscount::where('status', '1')->get();
        return response()->json(['success' => true, 'offers' => $discounts]);
    }

    public function addAdminDiscounts(Request $request)
    {
        Orders::where('id', $request->get('order_id'))->update(['admin_discount_id' => $request->get('admin_discount_id')]);
        return response()->json(['success' => true]);

    }

    public function getCustomers()
    {
        return response()->json(['success' => true,'customers'=>User::all()]);
    }

    public function addCustomerBasket(Request $request)
    {
        Orders::where('id', $request->get('order_id'))->update(['user_id' => $request->get('user_id')]);
        return response()->json(['success' => true]);
    }

    public function addAdditionalData(Request $request)
    {
        $order = Orders::find($request->get('order_id'));//->update(['additional_data' => $request->get('additional_data')]);
        $order->additional_data = $request->get('additional_data');
        $order->save();
        return response()->json(['success' => true]);
    }

    public function test( OrderService $service)
    {
        $order = Orders::find(58);
        dd(collect($order->history[0]->data['items'])->pluck('qty','item_id'),$order->items);
    }

}
