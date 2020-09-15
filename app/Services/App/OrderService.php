<?php


namespace App\Services\App;


class OrderService
{
    public function discount($order, $shop)
    {
//        $order_items =$order->items;
//        foreach ($order_items as $order_item){
//            $item=$shop->default_rack()->items()->where('item_id',$order_item->item_id)->first();
//            $item->qty=$item->qty-$order_item->qty;
//            $item->save();
//        }
    }

    public function discountEdit($order, $shop)
    {
        $history = $order->history()->orderBy('id', 'desc')->first();
        if (isset($history->data['items'])) {
            $items = collect($history->data['items'])->pluck('qty', 'item_id');
            $order_items = $order->items;
            foreach ($order_items as $order_item) {
                $qty = (isset($items[$order_item->item_id])) ? $items[$order_item->item_id]['qty'] - $order_item->qty : $order_item->qty;
                if ($qty > 0) {
                    $item = $shop->default_rack()->items()->where('item_id', $order_item->item_id)->first();
                    $item->qty = $item->qty - $qty;
                    $item->save();
                }

            }
        }

    }
}
