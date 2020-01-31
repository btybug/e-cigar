<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\App\AppItems;
use App\Models\App\AppWarehouses;
use App\Models\App\Orders;
use App\Models\Warehouse;
use App\Services\App\OrderService;
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
        $uniqId = $this->stringId($shop->id,$this->numberId($lastOrder?$lastOrder->id:0));
        $order=Orders::create(['shop_id'=>$shop->id,'status'=>0,'order_number'=>$uniqId,'staff_id'=>$request->get('staff_id')]);
        return response()->json(['error'=>false,'basket_number'=>$uniqId,'order_id'=>$order->id]);
    }

    protected function numberId($id)
    {
        foreach ($this->nums as $key => $v) {
            if ($id >= $key) {
                $delta = floor($id / $key);
                return ($delta > 1) ? $delta . $v . substr((string) $id, -2) : $v . substr((string) $id, -2);
            }
        }
    }

    protected function stringId($id, $suffix)
    {
        for ($i = 0; $i <= strlen($this->latters); $i++) {
            for ($j = 0; $j <= strlen($this->latters); $j++) {
               if(!Orders::where('shop_id',$id)->where('order_number',$this->latters[$i].$this->latters[$j].$suffix)->exists()){
                 return   $this->latters[$i].$this->latters[$j].$suffix;
               };
            }
        }
    }

    public function addItemToBascked(Request $request,OrderService $service)
    {
        $shop = AppWarehouses::where('warehouse_id',$request->get('shop_id'))->first();
        $order = $shop->warehouse->orders()->find($request->get('order_id'));
        $item=AppItems::find($request->get('product_id'));
        $item =$shop->warehouse->default_rack()->items()->where('item_id',$item->item_id)->first();
        if (!$order->items()->where('item_id', $item->item_id)->exists()) {
            $order->basketItems()->attach([$item->item_id => ['qty' => $request->get('qty'), 'price' => $item->price]]);
        } else {
            $order->items()->where('item_id', $item->item_id)->update(['qty' => $request->get('qty'), 'price' => $item->price]);
        }

        return response()->json(['success' => true]);
    }

    public function removeFromBascked(Request $request)
    {
        $order = Orders::find($request->get('order_id'));
        $order->basketItems()->detach($request->get('product_id'));
        return response()->json(['success' => true]);
    }

    public function getBasket(Request $request)
    {
        $order = Orders::where('order_number',$request->get('basket_number','AA'))
            ->where('shop_id',$request->get('shop_id',1))
            ->with('items')
            ->first();

        if($order){
            return response()->json(['success' => true,'basket'=>$order]);
        }
        return response()->json(['success' => false]);
    }

    public function getBaskets(Request $request)
    {
        $orders=Orders::where('shop_id',$request->get('shop_id',1))->with('items')->get();
        if($orders){
            return response()->json(['success' => true,'orders'=>$orders]);
        }
        return response()->json(['success' => false]);
    }

    public function getAuthorize(Request $request)
    {
        $shop = Warehouse::find($request->get('shop_id'));
        if ($shop && $shop->staff()->where('app_pass', $request->get('barcode'))->exists()) {
            $member = $shop->staff()->where('app_pass', $request->get('barcode'))->with('role')->first();
            return response()->json(['success'=>true,'member'=>$member]);
        }
        return response()->json(['success'=>false,'message'=>'invalid member']);
    }

    public function FinishOrder(Request $request,OrderService $service)
    {
        $shop = Warehouse::find($request->get('shop_id'));
        $order = $shop->orders()->findOrFail($request->get('order_id'));
        $order->staff_id=$request->get('staff_id');
        $order->status=Orders::DONE;
        $order->payment_method=$request->get('payment_method');
        $order->tendered=$request->get('tendered');
        $order->changed=$request->get('changed');
        $order->save();
        $service->discount($order,$shop);
        return response()->json(['success'=>true]);
    }

    public function getCloseBasket(Request $request)
    {
        $shop = Warehouse::find($request->get('shop_id'));
        $order = $shop->orders()->findOrFail($request->get('order_id'));
        $order->note=$request->get('note');
        $order->save();
        return response()->json(['success'=>true]);
    }
}
