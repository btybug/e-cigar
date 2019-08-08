@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="order__admin-wrapper">
        <div class="d-flex align-items-center justify-content-between position-relative head-order-wrap">
            <div class="d-flex align-items-center left-head">
                <span class="font-sec-reg font-24 title">Order:  {!! $order->order_number !!} </span>
                <div class="d-flex align-items-center">
                    <span class="title-customer">Customer</span>
                    <span class="font-main-light border-main d-flex align-items-center justify-content-center name">
                        {!! $order->user->name ." " .$order->user->last_name !!}
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-center right-head">
                <span class="font-16 status">Status</span>
                @php
                    $status = $order->history()->whereNotNull('status_id')->latest()->first()
                @endphp
                <div class="font-main-bold font-16 submit-btn" style="background-color: {{ @$status->status->color }}">
                    @if($status && $status->status)
                        {{ $status->status->name }}
                    @endif
                </div>
                <div class="font-main-light font-16 lh-1 d-none status-pending">Pending</div>
                <div class="font-main-light font-18 bg-blue-clr change-btn">Change</div>
            </div>
            <div class="d-none order__change-status-wrapper">
                <form action="" class="w-100">
                    <div class="d-flex align-items-center justify-content-between font-main-reg order__change-status-wrapper-inner">

                        <div class="d-flex align-items-center order__change-status-wrapper-left">
                            <span class="font-sec-reg font-20 lh-1 text-tert-clr status-title">Change Status To</span>
                            <div class="custom-status-select position-relative">
                                <select name="" id="" class="form-control status-select">
                                    <option value="">Pending</option>
                                    <option value="">Pending</option>
                                </select>
                                <span class="position-absolute icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="10px" height="9px">
<path fill-rule="evenodd"  fill="rgb(53, 53, 53)"
      d="M5.544,8.368 L0.956,0.809 L9.955,0.704 L5.544,8.368 Z"/>
</svg>
                                </span>
                            </div>

                        </div>
                        <div class="d-flex align-items-center order__change-status-wrapper-right">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Add Note" class="border-main add-note-area"></textarea>
                            <button class="border-main font-18 text-sec-clr bg-blue-clr change-status-btn">Change</button>
                            <div class="border-main close-status-icon">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="32px" height="32px">
                                    <path fill-rule="evenodd"  fill="rgb(53, 53, 53)"
                                          d="M32.000,0.997 L31.004,-0.000 L16.000,15.002 L0.997,-0.000 L-0.000,0.997 L15.003,16.000 L-0.000,31.002 L0.997,32.000 L16.000,16.995 L31.004,32.000 L32.000,31.002 L16.997,16.000 L32.000,0.997 Z"/>
                                </svg>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <nav class="nav-orders">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-order-details-tab" data-toggle="tab"
                   href="#nav-order-details" role="tab" aria-controls="nav-details" aria-selected="true">Details</a>
                <a class="nav-item nav-link" id="nav-order-docs-tab" data-toggle="tab" href="#nav-order-docs"
                   role="tab"
                   aria-controls="nav-order-docs" aria-selected="false">Docs</a>
                <a class="nav-item nav-link" id="nav-order-collecting-tab" data-toggle="tab"
                   href="#nav-order-collecting" role="tab" aria-controls="nav-order-collecting" aria-selected="false">Collecting</a>
                <a class="nav-item nav-link" id="nav-order-shipping-tab" data-toggle="tab" href="#nav-order-shipping"
                   role="tab" aria-controls="nav-order-shipping" aria-selected="false">Shipping</a>
                <a class="nav-item nav-link" id="nav-order-logs-tab" data-toggle="tab" href="#nav-order-logs"
                   role="tab"
                   aria-controls="nav-order-logs" aria-selected="false">Logs</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade  show active" id="nav-order-details" role="tabpanel"
                 aria-labelledby="nav-order-details-tab">
                <div class="order-details__tab">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="order-details__tab-left">
                                <div class="shopping__cart-confirm w-100">
                                    <div class="row list-shipping">
                                        <div class="left-col">
                                            <ul class="row mb-0">
                                                <li class="col-md-4 col-sm-6">
                                                    <div class="sipping-item-wrap">
                                                        <div class="item-photo">
                                                            <img src="{{ user_avatar($order->user_id) }}"
                                                                 class="user-img"
                                                                 alt="item"/>
                                                        </div>
                                                        <h3 class="font-sec-reg font-18 item-title">{{ $order->user->name. " ".$order->user->last_name }}</h3>
                                                        <p class="font-sec-reg font-18 text-red-clr lh-1 item-info">
                                                            {!! $order->order_number !!}
                                                        </p>
                                                        <a href="{{ route('my_account_order_invoice',$order->id) }}"
                                                           class="d-flex align-items-center justify-content-center font-14 text-sec-clr bg-blue-clr item-order-btn">Verfied
                                                            Customer</a>
                                                    </div>
                                                </li>
                                                <li class="col-md-4 col-sm-6">
                                                    <div class="sipping-item-wrap address-item">
                                                        <div class="item-photo">
                                                            <img src="/public/img/confirm-home.png" class="home-img"
                                                                 alt="item"/>
                                                        </div>
                                                        <h3 class="font-sec-reg font-18 item-title">Shipping
                                                            Address</h3>
                                                        <div class="d-inline-block text-left">
                                                            <p class="font-main-light font-13 text-wrap">{{ $order->shippingAddress->company }}</p>
                                                            <p class="font-main-light font-13 text-wrap">
                                                                {!! $order->shippingAddress->first_line_address ." ".$order->shippingAddress->second_line_address  !!}</p>
                                                            <p class="font-main-light font-13 text-wrap">{!! $order->shippingAddress->city !!}</p>
                                                            <p class="font-main-light font-13 text-wrap">{!! $order->shippingAddress->post_code !!}</p>
                                                            <p class="font-main-light font-13 text-wrap mb-0">{!! $order->shippingAddress->country !!}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="col-md-4 col-sm-6">
                                                    <div class="sipping-item-wrap delivery-item">
                                                        <div class="item-photo">
                                                            <img src="/public/img/confirm-calendar.png"
                                                                 class="calendar-img"
                                                                 alt="item"/>
                                                        </div>
                                                        <h3 class="font-sec-reg font-18 item-title">
                                                            Date of Order
                                                        </h3>
                                                        <p class="font-sec-reg font-18 text-tert-clr lh-1 date-info">
                                                            {{ BBgetDateFormat($order->created_at,"l M Y") }}
                                                        </p>
                                                        <p class="font-sec-reg font-18 text-tert-clr lh-1 date-info mb-0">
                                                            {{ BBgetTimeFormat($order->created_at,"H:i") }}
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="right-col">
                                            <div class="sipping-item-wrap method-wrap">
                                                <div class="d-flex align-items-center single-wrap">
                                                    <div class="font-sec-reg font-18 left-wrap">Delivery Method</div>
                                                    <div class="font-16 text-tert-clr right-wrap">
                                                        {!! $order->shipping_method !!}
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center single-wrap">
                                                    <div class="font-sec-reg font-18 left-wrap">Total items</div>
                                                    <div class="font-16 text-tert-clr right-wrap">
                                                        @if($order->items->count() > 1)
                                                            {{ $order->items->count() }} Items
                                                        @else
                                                            {{ $order->items->count() }} Item
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center single-wrap">
                                                    <div class="font-sec-reg font-18 left-wrap">Total weight</div>
                                                    <div class="font-16 text-tert-clr right-wrap">200 g</div>
                                                </div>
                                                <div class="d-flex align-items-center single-wrap">
                                                    <div class="font-sec-reg font-18 left-wrap">Payment Method</div>
                                                    <div class="font-16 text-tert-clr right-wrap">
                                                        {{ ucfirst($order->payment_method) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2 class="font-sec-reg font-22 lh-1 title">Order Details</h2>
                                    <ul class="row list-order">
                                        @foreach($order->items as $item)
                                            <li class="col-md-4">
                                                <div class="order__product-wall">
                                                    <div class="main-info">
                                                        <div class="order__product-photo">
                                                            <img src="{!! checkImage($item->image) !!}"
                                                                 alt="{{ $item->name }}">
                                                        </div>
                                                        <h6 class="font-18 text-tert-clr lh-1 order__product-title text-truncate">{{ $item->name }}</h6>
                                                        <p class="font-18 lh-1 order__product-sec-title">Cola Shades
                                                            E-Juice</p>
                                                        <div class="order__product-info">
                                                            @if(count($item->options['options']))
                                                                <ul class="list-unstyled mb-0">
                                                                    @foreach($item->options['options'] as $option)
                                                                        <li class="single-row-product">
                                                                            @foreach($option['options'] as $op)
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-sm-9 font-15 font-main-bold">
                                                                                        {{ $op['title'] ." - ". $op['name'] }}
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">
                                                                                        <span>x {{ $op['qty'] }}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if(isset($item->options['extras']) && count($item->options['extras']))
                                                        <div class="order__product-offers">
                                                            <div class="font-16 text-sec-clr offers-tag">
                                                                With offers:
                                                            </div>
                                                            @foreach($item->options['extras'] as $extra)
                                                                @foreach($extra['options'] as $ext)
                                                                    <div class="d-flex product-offers-inner">
                                                                        <div class="photo">
                                                                            <img src="{{ $ext['image'] }}"
                                                                                 alt="product">
                                                                        </div>
                                                                        <div class="title-offers">
                                                                            <p class="font-18 lh-1 mb-0">
                                                                                {{ $ext['title'] ." - ". $ext['name'] }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                    <div class="qty-price">
                                                        <div
                                                            class="d-flex flex-wrap align-items-center justify-content-between qty-price-inner">
                                                            <div class="d-flex align-items-center qty-col">
                                                            <span
                                                                class="font-sec-light font-22 lh-1 qty-text">QTY</span>
                                                                <div class="product__single-item-inp-num">
                                                                    <div class="quantity">
                                                                        <input type="number" readonly min="1" max="9"
                                                                               step="1"
                                                                               value="{{ $item->qty }}">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="price-col">
                                                        <span class="lh-1 text-tert-clr font-35">
                                                            {!! convert_price($item->price,get_currency()) !!}
                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="order-details__tab-right">
                                <div class="customers-notes">
                                    <div class="font-sec-reg text-tert-clr font-23 notes-head">
                                        Customer’s Notes
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center notes-body">
                                        <span class="font-sec-reg font-21 no-notes">No Notes Added</span>
                                    </div>
                                </div>
                                <div class="card order-summary">
                                    <div class="order-header text-tert-clr font-23">
                                        ORDER SUMMARY
                                    </div>
                                    <div class="card-body border-top-0">
                                        <div
                                            class="single-row font-21 d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="name">
                                                Sub Total
                                            </div>
                                            <div
                                                class="price font-main-bold">
                                                {{ convert_price($order->items()->sum('amount'),$order->currency) }}
                                            </div>
                                        </div>
                                        <div
                                            class="single-row font-21 d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="name">
                                                Tax
                                            </div>
                                            <div
                                                class="price font-main-bold">
                                                {{ convert_price(0,$order->currency) }}
                                            </div>
                                        </div>
                                        <div
                                            class="single-row font-21 d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="name">
                                                Shipping
                                            </div>
                                            <div
                                                class="w-100 font-16 d-flex flex-wrap justify-content-between align-items-center shipping-wall">
                                                <div class="shipping-item">
                                                    United Kingdom
                                                </div>
                                                <div class="price font-21 font-main-bold">
                                                    {{ convert_price(0,$order->currency) }}
                                                </div>
                                            </div>
                                            <div
                                                class="w-100 d-flex font-16 flex-wrap justify-content-between align-items-center shipping-wall">
                                                <div class="shipping-item">
                                                    Shipping Service
                                                </div>
                                                <div class="price font-21 font-main-bold">
                                                    {{ convert_price($order->shipping_price,$order->currency) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="single-row font-21 d-flex flex-wrap justify-content-between align-items-center">
                                            <div
                                                class="w-100 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="name">
                                                    Coupon Discount
                                                </div>
                                                <div
                                                    class="price font-main-bold">
                                                    {{ ($order->coupon && $order->coupon->based == 'cart') ?
                                                        ( ($order->coupon->type == 'p') ? $order->coupon->discount."%" : convert_price($order->coupon->discount,$order->shipping_price))
                                                    : 0 }}
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="single-row font-21 d-flex flex-wrap justify-content-between align-items-center border-bottom-0 mb-0 pb-0">
                                            <div class="name">
                                                Total
                                            </div>
                                            <div
                                                class="price text-tert-clr font-main-bold">
                                                {{ convert_price($order->amount,$order->currency) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-order-docs" role="tabpanel"
                 aria-labelledby="nav-order-docs-tab">
                <div class="order-docs__tab">
                    <div class="row">
                        <div class="col-md-3">

                            <div class="font-main-reg order-docs__tab-left">
                                <div class="nav flex-column list-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link item-link active" id="v-pills-docs-invoice-tab" data-toggle="pill" href="#v-pills-docs-invoice" role="tab" aria-controls="v-pills-docs-invoice" aria-selected="true">
                                        <span class="icon"><img src="/public/img/print-icon.png" alt="icon"></span>
                                        <span class="font-20 text-main-clr name">Invoice</span>
                                    </a>
                                    <a class="nav-link item-link" id="v-pills-docs-shipping-tab" data-toggle="pill" href="#v-pills-docs-shipping" role="tab" aria-controls="v-pills-docs-shipping" aria-selected="false">
                                        <span class="icon"><img src="/public/img/delivery-icon.png"
                                                                alt="icon"></span>
                                        <span class="font-20 text-main-clr name">Shipping Label</span>
                                    </a>
                                </div>
{{--                                <ul class="list-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">--}}
{{--                                    <li class="item-wrap">--}}
{{--                                        <a class="item-link" id="v-pills-docs-invoice-tab" data-toggle="pill" href="#v-pills-docs-invoice" role="tab" aria-controls="v-pills-docs-invoice" aria-selected="true">--}}
{{--                                            <span class="icon"><img src="/public/img/print-icon.png" alt="icon"></span>--}}
{{--                                            <span class="font-20 text-main-clr name">Invoice</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="item-wrap">--}}
{{--                                        <a class="item-link"  id="v-pills-docs-shipping-tab" data-toggle="pill" href="#v-pills-docs-shipping" role="tab" aria-controls="v-pills-docs-shipping" aria-selected="false">--}}
{{--                                            <span class="icon"><img src="/public/img/delivery-icon.png"--}}
{{--                                                                    alt="icon"></span>--}}
{{--                                            <span class="font-20 text-main-clr name">Shipping Label</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="order-docs__tab-right">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-docs-invoice" role="tabpanel" aria-labelledby="v-pills-docs-invoice-tab">
                                        <div class="text-right">
                                            <a href="{{ route("pdf_download",$order->id) }}"
                                               class="bg-blue-clr text-sec-clr font-20 print-btn">Print</a>
                                        </div>
                                        @include('admin.pdf.invoice')
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-docs-shipping" role="tabpanel" aria-labelledby="v-pills-docs-shipping-tab">
                                        Shipping
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-order-collecting" role="tabpanel"
                 aria-labelledby="nav-order-collecting-tab">
                <div class="font-main-reg order-collecting__tab">
                    <div class="d-flex align-items-center justify-content-between product-add-wrap">
                        <div class="d-flex align-items-center left-wrap">
                            <span class="font-sec-reg font-20 text-tert-clr lh-1 scan-name">Scan Product</span>
                            <input type="text" placeholder="Barcode" class="form-control">
                        </div>
                        <div class="d-flex align-items-center right-wrap">
                            <span class="font-18 lh-1 qty">QTY</span>
                            <div class="product__single-item-inp-num">
                                <div class="quantity">
                                    <input type="number" readonly min="1" max="9" step="1" value="1">
                                </div>
                            </div>
                            <a href="#" class="add-btn">Add</a>
                        </div>
                    </div>
                    <div class="product-table">
                        @if(count($order->items))
                            @php
                                $count = 0;
                            @endphp
                            @foreach($order->items as $item)
                                @if(count($item->options))
                                    @if(isset($item->options['options']))
                                        @foreach($item->options['options'] as $option)
                                            @if(count($option['options']))
                                                @foreach($option['options'] as $o)
                                                    @include("admin.orders._partials.collect")
                                                    @php
                                                        $count++;
                                                    @endphp
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                    @if(isset($item->options['extras']))
                                        @foreach($item->options['extras'] as $option)
                                            @if(count($option['options']))
                                                @foreach($option['options'] as $o)
                                                    @include("admin.orders._partials.collect")
                                                    @php
                                                        $count++;
                                                    @endphp
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="d-flex align-items-center total-items-block">
                        {!! Form::hidden('item_count',$count,['id' => 'item_count']) !!}

                        <span class="font-16 total-items-count">Total Items: {{ $count }}</span>
                        <button class="check-item-btn @if($order->collections()->count() == $count) active @endif">
                            <span class="no-item">
                                <span class="icon"></span>
                                <span class="font-16 title status-check">Check All Items</span>
                            </span>
                            <span class="item-checked">
                                <span class="icon">
                                    <span class="first-icon icon-svg"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14px" height="11px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)"
      d="M4.454,8.702 L1.114,5.254 L0.000,6.403 L4.454,11.000 L14.000,1.149 L12.886,0.000 L4.454,8.702 Z"/>
</svg></span>
                                    <span class="second-icon icon-svg"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14px" height="11px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)"
      d="M4.454,8.702 L1.114,5.254 L0.000,6.403 L4.454,11.000 L14.000,1.149 L12.886,0.000 L4.454,8.702 Z"/>
</svg></span>
                                </span>
    <span class="font-16 font-weight-bold title">All Items are collected</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-order-shipping" role="tabpanel" aria-labelledby="nav-order-shipping-tab">
                4
            </div>
            <div class="tab-pane fade" id="nav-order-logs" role="tabpanel"
                 aria-labelledby="nav-order-logs-tab">
                <div class="font-main-reg order-logs__tab">
                    <div class="row">
                        <div class="col-md-9 order-main-cnt_right-col">
                            <div class="order-notes panel panel-default mb-0">
                                <div class="order-notes_timeline">
                                    <ul class="list-unstyled order-timeline">
                                        @include('admin.orders._partials.timeline_item',['histories' => $order->history()->orderBy('created_at','desc')->get()])
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="order-logs__tab-right">
                                <div class="add-notes-block">
                                    <div class="border-main note-head">
                                        <span class="font-sec-reg font-20 lh-1 text-tert-clr">Add Note</span>
                                    </div>
                                    <div class="border-main border-top-0 note-body">
                                        {!! Form::open(['url' =>route('orders_add_note')]) !!}
                                            <div class="errors"></div>
                                            {!! Form::hidden('id',$order->id) !!}
                                            <textarea name="note" id="" cols="30" rows="10"
                                                  placeholder="Your note"></textarea>
                                            {!! Form::submit('Add',['class' => 'add-note-btn change-status-btn']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card panel panel-default">
        <div class="card-header panel-heading clearfix order-panel--header">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <label class="col-md-4">Order Number</label>
                        <div class="col-md-8">
                            <div class="form-control">{{ $order->order_number }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <label class="col-md-4">Customer</label>
                        <div class="col-md-8">
                            <div class="form-control">{{ $order->user->name }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <label class="col-md-4">Current Status</label>
                        <div class="col-md-8">
                            @php
                                $status = $order->history()->whereNotNull('status_id')->orderBy('created_at','desc')->first()
                            @endphp
                            <div class="form-control">{{ ($status) ? $status->status->name : 'No status' }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-right">
                        <a href="#" target="_blank" data-toggle="tooltip" title="" class="btn btn-info"
                           data-original-title="Print Invoice"><i class="fa fa-print"></i></a>
                        <a href="#" target="_blank" data-toggle="tooltip" title="" class="btn btn-info"
                           data-original-title="Print Shipping List"><i class="fa fa-truck"></i></a>
                        <a href="{{ route('admin_orders') }}"
                           class="btn btn-default" data-original-title="Cancel"><i
                                class="fa fa-reply"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body panel-body">
            <div class="row order-main-cnt">
                <div class="col-md-12">
                    <div class="order-main-cnt_left-col">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                                   aria-controls="general" aria-selected="true" aria-expanded="true">Order Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="invoiceOrder-tab" data-toggle="tab" href="#invoiceOrder"
                                   role="tab"
                                   aria-controls="invoiceOrder" aria-selected="false">Docs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="managementOrder-tab" data-toggle="tab" href="#managementOrder"
                                   role="tab"
                                   aria-controls="managementOrder" aria-selected="false">Collecting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="shippingOrder-tab" data-toggle="tab" href="#shippingOrder"
                                   role="tab"
                                   aria-controls="shippingOrder" aria-selected="false">Shipping</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="log-tabid" data-toggle="tab" href="#log-tab" role="tab"
                                   aria-controls="log-tab" aria-selected="false">Logs</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-content-store-settings">
                            <div class="tab-pane active in show" id="general" role="tabpanel"
                                 aria-labelledby="general-tab">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-lg-4 mb-1">
                                                <div class="card panel panel-default">
                                                    <div class="card-header panel-heading">
                                                        <h3 class="panel-title h6"><i class="fa fa-shopping-cart"></i>
                                                            Order
                                                            Details</h3>
                                                    </div>
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <button data-toggle="tooltip" title=""
                                                                        class="btn btn-info btn-sm"
                                                                        data-original-title="Date Added"><i
                                                                        class="fa fa-calendar fa-fw"></i></button>
                                                            </td>
                                                            <td>{!! BBgetDateFormat($order->created_at) !!} {!! BBgetTimeFormat($order->created_at) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <button data-toggle="tooltip" title=""
                                                                        class="btn btn-info btn-sm"
                                                                        data-original-title="Payment Method"><i
                                                                        class="fa fa-credit-card fa-fw"></i></button>
                                                            </td>
                                                            <td>{!! $order->payment_method !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <button data-toggle="tooltip" title=""
                                                                        class="btn btn-info btn-sm"
                                                                        data-original-title="Shipping Method"><i
                                                                        class="fa fa-truck fa-fw"></i></button>
                                                            </td>
                                                            <td>{!! $order->shipping_method !!}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-1">
                                                <div
                                                    manage
                                                    class="card panel panel-default panel--orders-addresses customer-notes">
                                                    <div class="card-header panel-heading clearfix">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                {{ $order->user->name ." ". $order->user->last_name }}
                                                                - {{ $order->user->customer_number }}
                                                            </div>
                                                            <div class="col-md-4 text-right">
                                                                <strong> {!! ($order->user->status) ? "<span style='color:green;'><i class='fa fa-check'></i>Verified</span>" : "<span style='color:red;'><i class='fa fa-exclamation-circle'></i>Not verified</span>" !!}</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body panel-body">
                                                        <h3>Shipping Address</h3>
                                                        Country:{!! $order->shippingAddress->country !!}<br>
                                                        Region:{!! $order->shippingAddress->region  !!}
                                                        <br>
                                                        First line:{!! $order->shippingAddress->first_line_address !!}
                                                        <br>
                                                        Second line:{!! $order->shippingAddress->second_line_address !!}
                                                        <br>
                                                        Post code:{!! $order->shippingAddress->post_code !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered table--order-dtls order-table">
                                                    <thead>
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-left">Product</td>
                                                        <td>
                                                            <div class="head-stock-price">
                                                                <div>
                                                                    Stocks
                                                                </div>
                                                                <div>
                                                                    Price
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">Quantity</td>
                                                        <td class="text-right">Unit Price</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($order->items()->main()->get() as $item)
                                                        <tr>
                                                            <td class="w-5" align="center">
                                                            </td>
                                                            <td class="text-left w-20">
                                                                <div class="product-name">
                                                                    <img src="{{ $item->image }}"
                                                                         alt="{{ $item->name }}"
                                                                         width="100">
                                                                    <div class="name">{{ $item->name }}</div>
                                                                </div>
                                                            </td>
                                                            <td class="stock-price">
                                                                @php
                                                                    $options=$item->options;
                                                                        $lastElement = end($options);
                                                                @endphp

                                                                <div class="stock-row">
                                                                    @foreach($options['options'] as $key=>$option)
                                                                        @if(count($option['options']))
                                                                            <div class="left">

                                                                                <div class="d-flex flex-wrap">
                                                                                    @foreach($option['options'] as $key=>$op)
                                                                                        <div
                                                                                            class="h5 mr-1 inline-el"><span
                                                                                                class="badge badge-secondary">{{ $op['name'] }}</span>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <div class="right">
                                                                                <div class="stock-count">
                                                                                <span>
                                                                                    {{ convert_price($option['price'],'usd') }}
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>

                                                                <div class="extra-stock">
                                                                    <h4>Extra</h4>
                                                                    @foreach($options['extras'] as $key=>$option)
                                                                        @if(count($option['options']))
                                                                            <div class="left">
                                                                                <div class="stock-name">
                                                                                    <span>{{ $item->name }}</span>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap">
                                                                                    @foreach($option['options'] as $key=>$op)

                                                                                        <div
                                                                                            class="h5 mr-1 inline-el"><span
                                                                                                class="badge badge-secondary">{{ $op['name'] }}</span>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <div class="right">
                                                                                <div class="stock-count">
                                                                                <span>
                                                                                    {{ convert_price($option['price'],"usd") }}
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>

                                                            </td>
                                                            <td class="Qty w-8" align="center">
                                                                <div class="input-group justify-content-center">
                                                                    {{ $item->qty }}
                                                                </div>
                                                            </td>
                                                            <td class="w-8" align="center"> ${{ $item->amount }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div
                                            class="card panel panel-default panel--orders-addresses customer-notes mb-1">
                                            <div class="card-header panel-heading">Customer Notes</div>
                                            <div class="card-body panel-body">
                                                {!! $order->customer_notes !!}
                                            </div>
                                        </div>
                                        <div class="card panel panel-default panel--orders-addresses customer-notes">
                                            <div class="card-header panel-heading">Order Summary</div>
                                            <div class="card-body panel-body">
                                                <div class="cart-right">
                                                    <div class="order-summary-outer">
                                                        <div class="order-summary">
                                                            <div class="order-summary">
                                                                <input id="order_product_subtotal"
                                                                       name="order_product_subtotal" type="hidden"
                                                                       value="0">
                                                                <table class="table">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td align="left"><span>Sub Total</span></td>
                                                                        <td align="right" id="subtotal">
                                                                            $ {{ $order->items()->sum('amount') }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left"><span>Tax</span></td>
                                                                        <td align="right" id="subtotal">$0</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left"><span>Shipping </span></td>
                                                                        <td align="right" id="subtotal">
                                                                            ${{ $order->shipping_price }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left">
                                                                        <span>Discount ({{ ($order->coupon && $order->coupon->based == 'product') ? 'Product based' : 'Coupon'}}
                                                                            )</span></td>
                                                                        <td align="right" id="discount">{{ ($order->coupon && $order->coupon->based == 'cart') ?
                                                                        ( ($order->coupon->type == 'p') ? $order->coupon->discount."%" : "$" . $order->coupon->discount)
                                                                        : 0 }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="last" align="left"><span>Total</span>
                                                                        </td>
                                                                        <td class="last" align="right" id="total_price">
                                                                            ${{ $order->amount }}
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tabe-pane--invoice-order fade" id="invoiceOrder" role="tabpanel"
                                 aria-labelledby="invoiceOrder-tab">
                                <div class="tabbable">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="nav nav-pills flex-column nav-stacked">
                                                <li class="nav-item"><a class="nav-link" href="#invoice-doc"
                                                                        data-toggle="tab">Invoice</a></li>
                                                <li class="nav-item"><a class="nav-link active" href="#shipping-doc"
                                                                        data-toggle="tab">Shipping label</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div class="tab-pane" id="invoice-doc">
                                                    <div class="col-md-12">
                                                        <a href="{{ route("pdf_download",$order->id) }}">Export
                                                            PDF</a>
                                                    </div>
                                                    <div class="col-md-12">
                                                        @include('admin.pdf.invoice')
                                                    </div>
                                                </div>
                                                <div class="tab-pane active show" id="shipping-doc">
                                                    <div class="col-md-12">
                                                        @include('admin.pdf.shipping')
                                                    </div>
                                                    <div class="col-md-12">
                                                        <a href="{{ URL::to('/admin/pdf/order/shipping/'.$order->id) }}">Export
                                                            PDF</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="tab-pane tabe-pane--management-order fade" id="managementOrder" role="tabpanel"
                                 aria-labelledby="managementOrder-tab">

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="table-responsive">
                                            <table class="table table-bordered managmentorder-table">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Qty</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order->items as $item)
                                                    <tr>
                                                        <td class="images w-20">
                                                            <div class="image">
                                                                <img src="{{ $item->image }}"
                                                                     alt="">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-name-id">
                                                                <div class="name">{{ $item->name }}</div>
                                                                <div class="product-id">{{ $item->sku }}</div>
                                                                <div class="">
                                                                    {{--@if($item->options && count($item->options))--}}
                                                                    {{--@foreach($item->options as $attribute => $sticker)--}}
                                                                    {{--<p><strong>{{ $attribute }}--}}
                                                                    {{--: </strong> {{ $sticker }}</p>--}}
                                                                    {{--@endforeach--}}
                                                                    {{--@endif--}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td align="center" class="w-6"><span>{{ $item->qty }}</span>
                                                        </td>
                                                        <td align="center" class="w-6">
                                                            <div class="check-product">
                                                                <label class="contains">
                                                                    <input
                                                                        data-id={{ $item->id }} {{ ($item->collected) ? 'checked disabled' : "" }} type="checkbox"
                                                                        value="1"
                                                                        class="{{ ($item->collected)?: 'check-collecting'  }}">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="2"><span class="total-items">Total Items</span></td>
                                                    <td>
                                                        <div
                                                            class="form-control">{{ $order->items()->sum('qty') }}</div>
                                                    </td>

                                                    <td></td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="scan-your-item">
                                            <div class="card panel panel-default panel-scan mb-1">
                                                <div class="card-header panel-heading">Status</div>
                                                <div class="card-body panel-body">
                                                    <div class="status-box">
                                                        @php
                                                            $count = $order->items()->count();
                                                            $collected = $order->items()->where('collected',true)->count();
                                                        @endphp
                                                        @if($count == $collected)
                                                            All collected, Congratulations !!!
                                                        @else
                                                            You need collect {{ $count - $collected }} item(s)
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card panel panel-default panel-scan">
                                                <div class="card-header panel-heading">Scanned Items</div>
                                                <div class="card-body panel-body">
                                                    <div class="scan">
                                                        <span> Scan your item</span>
                                                    </div>
                                                    <div class="input-wall">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="qty">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                Qty
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="number" class="form-control" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mr-30 managmentorder-table collecting">
                                    <div class="check-product">
                                        <label class="contains">Check as Collecting is complete
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane tabe-pane--shipping-order fade" id="shippingOrder" role="tabpanel"
                                 aria-labelledby="shippingOrder-tab">
                                shipping
                            </div>
                            <div class="tab-pane tabe-pane--log-tab fade" id="log-tab" role="tabpanel"
                                 aria-labelledby="log-tabid">
                                <div class="row">
                                    <div class="col-md-9 order-main-cnt_right-col">
                                        <div class="order-notes panel panel-default mb-0">
                                            {{--@foreach($order->history as $history)--}}
                                            {{--<div class="order-notes_message {!! $history->color !!}">--}}
                                            {{--<p>--}}
                                            {{--on <span class="underlined">11/11/2011</span>--}}
                                            {{--at <span class="underlined">11:11</span>--}}
                                            {{--</p>--}}
                                            {{--<p>--}}
                                            {{--Status <span class="font-bold">{!! $history->status !!}</span>--}}
                                            {{--</p>--}}
                                            {{--@if($history->admin)--}}
                                            {{--<p>--}}
                                            {{--order status changed by <span--}}
                                            {{--class="text-bold">{!! $history->admin->name.' '.$history->admin->last_name !!} </span>--}}
                                            {{--</p>--}}
                                            {{--@endif--}}
                                            {{--</div>--}}
                                            {{--@endforeach--}}


                                            <div class="order-notes_timeline">
                                                <ul class="list-unstyled order-timeline">
                                                    @include('admin.orders._partials.timeline_item',['histories' => $order->history()->orderBy('created_at','desc')->get()])
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-3">

                                        <div class="row order-main-cnt_control-btns">
                                            <button id="btnAddStatus" class="btn btn-default col-sm-6 btn--add-status">
                                                <i
                                                    class="fa fa-plus" aria-hidden="true"></i> Add Status
                                            </button>
                                            <button id="btnAddNote" class="btn btn-default col-sm-6 btn--add-note"><i
                                                    class="fa fa-plus" aria-hidden="true"></i> Add Note
                                            </button>
                                        </div>
                                        <div class="hidden-add-field" id="addStatusField">
                                            <div class="card panel-default hidden-add-field_heading">
                                                <p class="card-header panel-heading text-center">Add Status <span
                                                        class="pull-right"><i
                                                            class="fa fa-close"></i></span></p>
                                            </div>
                                            <div class="hidden-add-field_body">
                                                {!! Form::open(['url' =>route('orders_add_note')]) !!}
                                                {!! Form::hidden('id',$order->id) !!}
                                                <div class="errors"></div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label col-form-label"
                                                           for="changeStatusSelect">Change
                                                        status to</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::select('status_id',$statuses,null,['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ChangeMessage"
                                                           class="control-label col-sm-4 col-form-label">Message</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::textarea('note',null,['class' => 'd-block w-100','rows' => 6]) !!}
                                                    </div>
                                                </div>
                                                <div class="confirm-btn-outer" style="padding-left: 15px">
                                                    {!! Form::submit('Change',['class' => 'btn btn-primary change-status-btn']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                        <div class="hidden-add-field" id="addNoteField">
                                            <div class="card panel-default hidden-add-field_heading">
                                                <p class="card-header panel-heading text-center">Add Note <span
                                                        class="pull-right"><i
                                                            class="fa fa-close"></i></span></p>
                                            </div>
                                            <div class="hidden-add-field_body">
                                                {!! Form::open(['url' =>route('orders_add_note')]) !!}
                                                <div class="errors"></div>
                                                {!! Form::hidden('id',$order->id) !!}
                                                <div class="form-group w-100">
                                                    <label class="control-label" for="addNoteArea">Add your note</label>
                                                    {!! Form::textarea('note',null,['class' => 'd-block w-100','rows' => 6]) !!}
                                                </div>
                                                <div class="confirm-btn-outer">
                                                    {!! Form::submit('Submit',['class' => 'btn btn-primary change-status-btn']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>





@stop

@section('css')
    <link href="/public/admin_assets/css/global-admin.css" rel="stylesheet">
    <link href="/public/css/invoice.css" rel="stylesheet">
    <style>
        .order-main-cnt_right-col {
            height: calc(100vh - 285px);
        }

        .inline-el {
            display: inline;
        }

        .tabe-pane--management-order .mr-30 {
            margin-right: 100px;
            margin-top: 50px;
        }

        .managmentorder-table.collecting .check-product {
            display: inline-block;
        }

        .scan-your-item .panel-scan .scan {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 200px;
        }

        .scan-your-item .panel-scan .qty {
            width: 70%;
            margin: 15px auto;
        }

        .tab-content-store-settings .customer-notes .wall {
            margin-bottom: 15px;
            padding: 4px 12px;
        }

        .tab-content-store-settings .customer-notes .wall.danger {
            background-color: #ffdddd;
            border-left: 6px solid #f44336;
        }

        .tab-content-store-settings .customer-notes .wall.success {
            background-color: #ddffdd;
            border-left: 6px solid #4CAF50;
        }

        .tab-content-store-settings .customer-notes .wall.info {
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
        }

        .tab-content-store-settings .details {
            margin-bottom: 20px;
        }

        .tab-content-store-settings .details .user-img-name {
            border: 1px solid #28618373;
            box-shadow: 0 0 4px #28618385;
        }

        .tab-content-store-settings .details .user-img-name img {
            width: 100%;
            height: 145px;
            object-fit: cover;
        }

        .tab-content-store-settings .details .user-img-name .name {
            padding: 15px 20px;
            border-top: 1px solid #28618385;
            text-align: center;
            font-weight: bold;
            background-color: #61747fe3;
            color: white;
        }

        .tab-content-store-settings .details .tabs-address .nav {
            display: flex;
        }

        .tab-content-store-settings .details .tabs-address .nav > li a {
            padding: 10px;
            text-align: center;
            color: black;
            font-size: 16px;
            border-radius: 0;
        }

        .tab-content-store-settings .details .tabs-address .nav > li {
            flex: auto;
        }

        .tab-content-store-settings .details .tabs-address .nav > li.active a {
            background-color: #3c8dbc;
            color: white;
        }

        .managmentorder-table tr td:not(.images) {
            vertical-align: middle;
        }

        .managmentorder-table .w-6 {
            width: 6%;
        }

        .managmentorder-table .w-20 {
            width: 20%;
        }

        .managmentorder-table tr .images .image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border: 1px solid #ccc;
        }

        .managmentorder-table .check-product {
            display: inherit;
        }

        .managmentorder-table .check-product .contains {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 25px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .managmentorder-table .check-product .contains input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .managmentorder-table .check-product .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .managmentorder-table .check-product .contains:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .managmentorder-table .check-product .contains input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .managmentorder-table .check-product .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .managmentorder-table .check-product .contains input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .managmentorder-table .check-product .contains .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .content-wrapper {
            /*min-height: 100% !important;*/
            /*height: calc(100vh - 101px);*/
            /*overflow: hidden;*/
        }

        body > .wrapper {
            overflow: hidden;
        }

        body .main-sidebar {
            overflow-y: auto !important;
            overflow-x: hidden !important;
            height: 640px;

        }

        body .main-sidebar::-webkit-scrollbar,
        .order-main-cnt_left-col::-webkit-scrollbar,
        .order-notes::-webkit-scrollbar {
            width: 10px;
        }

        body .main-sidebar::-webkit-scrollbar-track,
        .order-main-cnt_left-col::-webkit-scrollbar-track,
        .order-notes::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        body .main-sidebar::-webkit-scrollbar-thumb,
        .order-main-cnt_left-col::-webkit-scrollbar-thumb,
        .order-notes::-webkit-scrollbar-thumb {
            background: #888;
        }

        body .main-sidebar::-webkit-scrollbar-thumb:hover,
        .order-main-cnt_left-col::-webkit-scrollbar-thumb:hover,
        .order-notes::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

    </style>
@stop

@section('js')
    <script>
        $(function () {


            $('body').on('click','.order__admin-wrapper .head-order-wrap .right-head .change-btn',function () {
                if($('.order__admin-wrapper .order__change-status-wrapper').hasClass('d-none')){
                    $('.order__admin-wrapper .order__change-status-wrapper').removeClass('d-none')
            $(this).addClass('d-none')
                    let headWrap = $(this).closest('.right-head')
                    $(headWrap).find('.submit-btn').addClass('d-none')
                    $(headWrap).find('.status-pending').removeClass('d-none')

                }else{
                    $('.order__admin-wrapper .order__change-status-wrapper').addClass('d-none')
                }
            });
            $('body').on('click','.order__change-status-wrapper-inner .close-status-icon',function () {
                $('.order__admin-wrapper .head-order-wrap .right-head .change-btn').removeClass('d-none')
                $('.order__admin-wrapper .head-order-wrap .right-head .status-pending').addClass('d-none')
                $('.order__admin-wrapper .head-order-wrap .right-head .submit-btn').removeClass('d-none')
                $(this).closest('.order__change-status-wrapper').addClass('d-none')
            });

            $("body").on('click','.check-item-btn',function () {
                var data = $("body").find('.check-collecting');
                data.each(function (e,i) {
                    $(i).click();
                    console.log(e,i)
                })
            })

            $('body').on('click', '.check-collecting', function (event) {
                let $_this = $(this);
                if(! $_this.hasClass('d-none')){
                    let unique_id = $_this.data("unique");

                    AjaxCall("{!! route('admin_orders_collecting',$order->id) !!}", {
                        unique_id: unique_id,
                        count: $("#item_count").val()
                    }, function (res) {
                        if (!res.error) {
                            $_this.addClass('d-none');
                            $_this.closest('td').addClass('active');
                            $_this.closest('td').find('.check-icon').removeClass('d-none');

                            $(".status-check").html(res.message);
                            if(res.success){
                                $(".check-item-btn").addClass('active');
                            }
                        }
                    });
                }

            });

            $('#check1').click(function () {
                if ($(this).is(':checked')) alert('checked'); else alert('unchecked');
            });

            $('body').on('click', '.change-status-btn', function (event) {
                event.preventDefault();
                var form = $(this).parents('form:first');
                var data = form.serialize();
                form.find('.errors').html('');
                $.ajax({
                    url: "{!! route('orders_add_note') !!}",
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        if (!data.error) {
                            form[0].reset();
                            $('.hidden-add-field_heading .fa-close').trigger('click');
                            $(".order-timeline").html(data.html);
                        }
                    },
                    error: function (data) {
                        let errors = data.responseJSON.errors;
                        $.map(errors, function (k, v) {
                            form.find('.errors').append(`<p>${k[0]}</p>`);
                        });
                    }
                });
            });

            $('#btnAddStatus').on('click', function () {
                $('#addStatusField').addClass('show');
                $('.order-main-cnt_control-btns').hide();
            });

            $('#btnAddNote').on('click', function () {
                $('#addNoteField').addClass('show');
                $('.order-main-cnt_control-btns').hide();
            });

            $('.hidden-add-field_heading .fa-close').on('click', function () {
                $(this).closest('.hidden-add-field').removeClass('show');
                $('.order-main-cnt_control-btns').show("1000");
            });
        });

    </script>
@stop
