@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_orders'])
            </div>
            <div class="col-md-8">
                <table class="table table-bordered table--order-dtls">
                    <thead>
                    <tr>
                        <td class="text-left">Product</td>
                        <td class="text-left">SKU</td>
                        <td class="text-right">Quantity</td>
                        <td class="text-right">Unit Price</td>
                        <td class="text-right">Total</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td class="text-left"><a
                                        href="">{!! $item->name !!}</a>
                            </td>
                            <td class="text-left">
                                {!! $item->sku !!}<br>
                                @php
                                    $options=$item->options;
                                        $lastElement = end($options);
                                @endphp
                                <b>
                                    @foreach($options as $key=>$option)
                                        {!! $key !!}: {!! $option !!} @if($option!=$lastElement) , @endif
                                    @endforeach
                                </b>

                            </td>
                            <td class="text-right">{!! $item->qty !!}</td>
                            <td class="text-right">$@convert($item->amount/$item->qty)</td>
                            <td class="text-right">$@convert($item->amount)</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right">Sub-Total</td>
                        <td class="text-right">$@convert($order->amount-$order->shipping_price)</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Shipping ({!! $order->shipping_method !!})</td>
                        <td class="text-right">$@convert($order->shipping_price)</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Total</td>
                        <td class="text-right">$@convert($order->amount)</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop