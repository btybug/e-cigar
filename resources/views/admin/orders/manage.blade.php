@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="order__admin-wrapper">
        <div class="d-flex align-items-center justify-content-between head-order-wrap">
            <div class="d-flex align-items-center left-head">
                <span class="font-sec-reg font-24 title">Order: MK-12355k4N </span>
                <div class="d-flex align-items-center">
                    <span class="title-customer">Customer</span>
                    <span class="font-main-light border-main d-flex align-items-center justify-content-center name">Customer Name</span>
                </div>
            </div>
            <div class="d-flex align-items-center right-head">
                <span class="font-16 status">Status</span>
                <div class="font-main-bold font-16 submit-btn">Order Is submitted</div>
                <div class="font-main-light font-18 bg-blue-clr change-btn">Change</div>
            </div>
        </div>
        <nav class="nav-orders">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link " id="nav-order-details-tab" data-toggle="tab"
                   href="#nav-order-details" role="tab" aria-controls="nav-details" aria-selected="true">Details</a>
                <a class="nav-item nav-link" id="nav-order-docs-tab" data-toggle="tab" href="#nav-order-docs"
                   role="tab"
                   aria-controls="nav-order-docs" aria-selected="false">Docs</a>
                <a class="nav-item nav-link" id="nav-order-collecting-tab" data-toggle="tab"
                   href="#nav-order-collecting" role="tab" aria-controls="nav-order-collecting" aria-selected="false">Collecting</a>
                <a class="nav-item nav-link" id="nav-order-shipping-tab" data-toggle="tab" href="#nav-order-shipping"
                   role="tab" aria-controls="nav-order-shipping" aria-selected="false">Shipping</a>
                <a class="nav-item nav-link active" id="nav-order-logs-tab" data-toggle="tab" href="#nav-order-logs" role="tab"
                   aria-controls="nav-order-logs" aria-selected="false">Logs</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade" id="nav-order-details" role="tabpanel"
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
                                                            <img src="/public/img/confirm-user.png" class="user-img"
                                                                 alt="item"/>
                                                        </div>
                                                        <h3 class="font-sec-reg font-18 item-title">Customer Name</h3>
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
                                                            Friday</p>
                                                        <p class="font-sec-reg font-18 text-tert-clr lh-1 date-info mb-0">
                                                            13:45</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="right-col">
                                            <div class="sipping-item-wrap method-wrap">
                                                <div class="d-flex align-items-center single-wrap">
                                                    <div class="font-sec-reg font-18 left-wrap">Delivery Method</div>
                                                    <div class="font-16 text-tert-clr right-wrap">DHL UK</div>
                                                </div>
                                                <div class="d-flex align-items-center single-wrap">
                                                    <div class="font-sec-reg font-18 left-wrap">Total items</div>
                                                    <div class="font-16 text-tert-clr right-wrap">3 Items</div>
                                                </div>
                                                <div class="d-flex align-items-center single-wrap">
                                                    <div class="font-sec-reg font-18 left-wrap">Total weight</div>
                                                    <div class="font-16 text-tert-clr right-wrap">200 g</div>
                                                </div>
                                                <div class="d-flex align-items-center single-wrap">
                                                    <div class="font-sec-reg font-18 left-wrap">Payment Method</div>
                                                    <div class="font-16 text-tert-clr right-wrap">Master Card</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2 class="font-sec-reg font-22 lh-1 title">Order Details</h2>
                                    <ul class="row list-order">
                                        @foreach($order->items as $item)
                                            {{--{!! dd($item->options) !!}--}}

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
                                        {{--<li class="col-md-4">--}}
                                        {{--<div class="order__product-wall">--}}
                                        {{--<div class="main-info">--}}
                                        {{--<div class="order__product-photo">--}}
                                        {{--<img src="/public/img/product-vape.png" alt="product">--}}
                                        {{--</div>--}}
                                        {{--<h6 class="font-20 text-tert-clr lh-1 order__product-title text-truncate">dINNER LADY Cubano pRO </h6>--}}
                                        {{--<p class="font-20 lh-1 order__product-sec-title">Cola Shades E-Juice</p>--}}
                                        {{--<div class="order__product-info">--}}
                                        {{--<ul class="list-unstyled mb-0">--}}
                                        {{--<li class="single-row-product">--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Hit--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}
                                        {{--<span>x 2</span>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Cloud--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}

                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Cloud--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}
                                        {{--<span>x 1</span>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Cloud--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}

                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li class="single-row-product">--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony 18--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}
                                        {{--<span>x 2</span>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--</li>--}}

                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="order__product-offers">--}}
                                        {{--<div class="font-16 text-sec-clr offers-tag">--}}
                                        {{--With offers:--}}
                                        {{--</div>--}}
                                        {{--<div class="d-flex product-offers-inner">--}}
                                        {{--<div class="photo">--}}
                                        {{--<img src="/public/img/temp/product-1.png" alt="product">--}}
                                        {{--</div>--}}
                                        {{--<div class="title-offers">--}}
                                        {{--<p class="font-18 lh-1 mb-0">Kangertech Vola 23 100W Premium Vape </p>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="qty-price">--}}
                                        {{--<div class="d-flex flex-wrap align-items-center justify-content-between qty-price-inner">--}}
                                        {{--<div class="d-flex align-items-center qty-col">--}}
                                        {{--<span class="font-sec-light font-24 lh-1 qty-text">QTY</span>--}}
                                        {{--<div class="product__single-item-inp-num">--}}
                                        {{--<div class="quantity">--}}
                                        {{--<input type="number" min="1" max="9" step="1"--}}
                                        {{--value="1">--}}

                                        {{--</div>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="price-col">--}}
                                        {{--<span class="lh-1 text-tert-clr ">£25,78</span>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li class="col-md-4">--}}
                                        {{--<div class="order__product-wall">--}}
                                        {{--<div class="main-info">--}}
                                        {{--<div class="order__product-photo">--}}
                                        {{--<img src="/public/img/product-vape.png" alt="product">--}}
                                        {{--</div>--}}
                                        {{--<h6 class="font-20 text-tert-clr lh-1 order__product-title text-truncate">dINNER LADY Cubano pRO </h6>--}}
                                        {{--<p class="font-20 lh-1 order__product-sec-title">Cola Shades E-Juice</p>--}}
                                        {{--<div class="order__product-info">--}}
                                        {{--<ul class="list-unstyled mb-0">--}}
                                        {{--<li class="single-row-product">--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Hit--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}
                                        {{--<span>x 2</span>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Cloud--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}

                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Cloud--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}
                                        {{--<span>x 1</span>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Cloud--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}

                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li class="single-row-product">--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony 18--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}
                                        {{--<span>x 2</span>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--</li>--}}

                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="order__product-offers">--}}
                                        {{--<div class="font-16 text-sec-clr offers-tag">--}}
                                        {{--With offers:--}}
                                        {{--</div>--}}
                                        {{--<div class="d-flex product-offers-inner">--}}
                                        {{--<div class="photo">--}}
                                        {{--<img src="/public/img/temp/product-1.png" alt="product">--}}
                                        {{--</div>--}}
                                        {{--<div class="title-offers">--}}
                                        {{--<p class="font-18 lh-1 mb-0">Kangertech Vola 23 100W Premium Vape </p>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="qty-price">--}}
                                        {{--<div class="d-flex flex-wrap align-items-center justify-content-between qty-price-inner">--}}
                                        {{--<div class="d-flex align-items-center qty-col">--}}
                                        {{--<span class="font-sec-light font-24 lh-1 qty-text">QTY</span>--}}
                                        {{--<div class="product__single-item-inp-num">--}}
                                        {{--<div class="quantity">--}}
                                        {{--<input type="number" min="1" max="9" step="1"--}}
                                        {{--value="1">--}}

                                        {{--</div>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="price-col">--}}
                                        {{--<span class="lh-1 text-tert-clr ">£25,78</span>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li class="col-md-4">--}}
                                        {{--<div class="order__product-wall">--}}
                                        {{--<div class="main-info">--}}
                                        {{--<div class="order__product-photo">--}}
                                        {{--<img src="/public/img/product-vape.png" alt="product">--}}
                                        {{--</div>--}}
                                        {{--<h6 class="font-20 text-tert-clr lh-1 order__product-title text-truncate">dINNER LADY Cubano pRO </h6>--}}
                                        {{--<p class="font-20 lh-1 order__product-sec-title">Cola Shades E-Juice</p>--}}
                                        {{--<div class="order__product-info">--}}
                                        {{--<ul class="list-unstyled mb-0">--}}
                                        {{--<li class="single-row-product">--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Hit--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}
                                        {{--<span>x 2</span>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Cloud--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}

                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Cloud--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}
                                        {{--<span>x 1</span>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony Cloud--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}

                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li class="single-row-product">--}}
                                        {{--<div class="row">--}}
                                        {{--<div--}}
                                        {{--class="col-sm-9 font-15 font-main-bold">--}}
                                        {{--Mango Harmony 18--}}
                                        {{--</div>--}}
                                        {{--<div--}}
                                        {{--class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">--}}
                                        {{--<span>x 2</span>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--</li>--}}

                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="order__product-offers">--}}
                                        {{--<div class="font-16 text-sec-clr offers-tag">--}}
                                        {{--With offers:--}}
                                        {{--</div>--}}
                                        {{--<div class="d-flex product-offers-inner">--}}
                                        {{--<div class="photo">--}}
                                        {{--<img src="/public/img/temp/product-1.png" alt="product">--}}
                                        {{--</div>--}}
                                        {{--<div class="title-offers">--}}
                                        {{--<p class="font-18 lh-1 mb-0">Kangertech Vola 23 100W Premium Vape </p>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="qty-price">--}}
                                        {{--<div class="d-flex flex-wrap align-items-center justify-content-between qty-price-inner">--}}
                                        {{--<div class="d-flex align-items-center qty-col">--}}
                                        {{--<span class="font-sec-light font-24 lh-1 qty-text">QTY</span>--}}
                                        {{--<div class="product__single-item-inp-num">--}}
                                        {{--<div class="quantity">--}}
                                        {{--<input type="number" min="1" max="9" step="1"--}}
                                        {{--value="1">--}}

                                        {{--</div>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--<div class="price-col">--}}
                                        {{--<span class="lh-1 text-tert-clr ">£25,78</span>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}

                                        {{--</div>--}}
                                        {{--</li>--}}
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
                                                class="price font-main-bold">£25,78
                                            </div>
                                        </div>
                                        <div
                                            class="single-row font-21 d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="name">
                                                Tax
                                            </div>
                                            <div
                                                class="price font-main-bold">£0
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
                                                <div class="price font-21 font-main-bold">£0</div>
                                            </div>
                                            <div
                                                class="w-100 d-flex font-16 flex-wrap justify-content-between align-items-center shipping-wall">
                                                <div class="shipping-item">
                                                    Shipping Service
                                                </div>
                                                <div class="price font-21 font-main-bold">£0</div>
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
                                                    class="price font-main-bold">£0
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="single-row font-21 d-flex flex-wrap justify-content-between align-items-center border-bottom-0 mb-0 pb-0">
                                            <div class="name">
                                                Total
                                            </div>
                                            <div
                                                class="price text-tert-clr font-main-bold">£25,78
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
                                <ul class="list-nav">
                                    <li class="item-wrap">
                                        <a href="" class="item-link">
                                            <span class="icon"><img src="/public/img/print-icon.png" alt="icon"></span>
                                            <span class="font-20 text-main-clr name">Invoice</span>
                                        </a>
                                    </li>
                                    <li class="item-wrap">
                                        <a href="" class="item-link">
                                            <span class="icon"><img src="/public/img/delivery-icon.png"
                                                                    alt="icon"></span>
                                            <span class="font-20 text-main-clr name">Shipping Label</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="order-docs__tab-right">
                                <div class="text-right">
                                    <a href="#" class="bg-blue-clr text-sec-clr font-20 print-btn">Print</a>
                                </div>

                                <div class="invoice__wrapper">
                                    <div class="invoice__wrapper-header"></div>
                                    <div class="invoice__wrapper-main-content">
                                        <div class="invoice__content-logo">
                <span class="icon">
                    <svg width="808px" height="261px" viewBox="0 0 808 261">
<path fill-rule="evenodd" fill="rgb(56, 56, 56)"
      d="M790.218,41.075 C789.359,38.970 787.660,37.915 785.115,37.915 C783.261,37.915 781.818,38.627 780.788,40.038 C779.758,41.455 779.240,43.128 779.240,45.059 C779.240,47.821 779.841,50.151 781.045,52.049 C782.245,53.948 784.153,56.035 786.766,58.311 L795.219,65.765 C799.203,69.284 802.331,72.995 804.599,76.895 C806.868,80.795 808.000,85.367 808.000,90.612 C808.000,94.616 807.108,98.187 805.320,101.328 C803.534,104.467 801.008,106.933 797.746,108.728 C794.480,110.522 790.719,111.420 786.458,111.420 C778.761,111.420 772.989,109.297 769.141,105.052 C765.290,100.809 763.195,94.237 762.851,85.332 L777.488,82.846 C777.626,88.163 778.366,92.080 779.705,94.597 C781.045,97.118 783.055,98.377 785.736,98.377 C787.727,98.377 789.171,97.739 790.064,96.461 C790.956,95.185 791.405,93.547 791.405,91.544 C791.405,88.231 790.665,85.419 789.189,83.106 C787.710,80.795 785.391,78.257 782.232,75.496 L773.572,67.939 C770.134,65.041 767.505,61.935 765.687,58.621 C763.865,55.309 762.955,51.342 762.955,46.716 C762.955,39.885 764.966,34.623 768.985,30.930 C773.004,27.239 778.554,25.390 785.632,25.390 C793.189,25.390 798.448,27.582 801.403,31.964 C804.357,36.348 806.042,41.920 806.456,48.683 L791.713,50.857 C791.575,46.443 791.078,43.180 790.218,41.075 ZM732.912,110.281 L723.427,72.287 L717.244,72.287 L717.244,110.281 L700.337,110.281 L700.337,26.425 L721.984,26.425 C730.987,26.425 737.756,28.082 742.290,31.393 C746.827,34.709 749.096,40.437 749.096,48.581 C749.096,54.031 748.339,58.432 746.827,61.780 C745.315,65.129 742.635,67.664 738.787,69.387 L750.332,110.281 L732.912,110.281 ZM730.953,40.816 C729.509,38.885 726.896,37.915 723.119,37.915 L717.244,37.915 L717.244,62.143 L722.292,62.143 C726.278,62.143 729.078,61.159 730.695,59.192 C732.309,57.223 733.117,54.136 733.117,49.927 C733.117,45.784 732.395,42.748 730.953,40.816 ZM698.126,149.784 L699.689,149.784 L699.689,170.031 L698.126,170.031 L698.126,149.784 ZM692.181,168.041 C691.664,168.709 690.998,169.252 690.178,169.669 C689.361,170.086 688.426,170.295 687.376,170.295 C686.468,170.295 685.666,170.121 684.976,169.774 C684.284,169.427 683.748,168.947 683.368,168.331 C682.986,167.716 682.798,167.021 682.798,166.249 C682.798,165.325 683.058,164.524 683.577,163.844 C684.098,163.161 684.847,162.640 685.822,162.275 C686.798,161.910 687.945,161.726 689.269,161.726 L692.168,161.726 L692.168,160.118 C692.168,159.090 691.851,158.285 691.216,157.700 C690.582,157.115 689.678,156.823 688.505,156.823 C687.787,156.823 687.139,156.954 686.556,157.213 C685.974,157.471 685.520,157.821 685.192,158.260 C684.864,158.700 684.700,159.184 684.700,159.710 L683.125,159.697 C683.125,158.977 683.358,158.294 683.822,157.647 C684.284,157.000 684.932,156.483 685.764,156.092 C686.594,155.701 687.531,155.506 688.572,155.506 C689.596,155.506 690.496,155.680 691.276,156.027 C692.054,156.373 692.661,156.894 693.093,157.588 C693.526,158.284 693.743,159.135 693.743,160.146 L693.743,166.736 C693.743,168.143 693.888,169.183 694.176,169.860 L694.176,170.031 L692.496,170.031 C692.320,169.558 692.216,168.893 692.181,168.041 ZM692.168,162.939 L689.399,162.939 C688.350,162.939 687.449,163.070 686.696,163.329 C685.941,163.589 685.366,163.955 684.963,164.429 C684.560,164.904 684.360,165.467 684.360,166.117 C684.360,166.635 684.488,167.105 684.745,167.527 C685.003,167.949 685.373,168.284 685.854,168.529 C686.335,168.775 686.901,168.898 687.547,168.898 C688.642,168.898 689.596,168.637 690.409,168.114 C691.222,167.592 691.810,166.915 692.168,166.090 L692.168,162.939 ZM664.362,111.420 C655.497,111.420 649.175,109.091 645.396,104.432 C641.615,99.774 639.724,92.927 639.724,83.882 L639.724,52.618 C639.724,43.577 641.615,36.778 645.396,32.221 C649.175,27.668 655.497,25.390 664.362,25.390 C673.157,25.390 679.463,27.687 683.279,32.274 C687.091,36.865 689.000,43.648 689.000,52.618 L689.000,83.987 C689.000,92.959 687.091,99.774 683.279,104.432 C679.463,109.091 673.157,111.420 664.362,111.420 ZM671.681,48.476 C671.681,45.025 671.183,42.352 670.186,40.454 C669.189,38.556 667.248,37.606 664.362,37.606 C661.478,37.606 659.534,38.556 658.540,40.454 C657.540,42.352 657.044,45.025 657.044,48.476 L657.044,88.127 C657.044,91.647 657.525,94.373 658.487,96.307 C659.450,98.239 661.407,99.206 664.362,99.206 C667.248,99.206 669.189,98.221 670.186,96.256 C671.183,94.286 671.681,91.578 671.681,88.127 L671.681,48.476 ZM643.744,156.396 C644.562,156.988 645.185,157.831 645.614,158.919 C646.043,160.010 646.256,161.291 646.256,162.768 L646.256,163.044 C646.256,164.469 646.043,165.727 645.614,166.822 C645.185,167.916 644.562,168.769 643.744,169.379 C642.925,169.989 641.957,170.295 640.836,170.295 C638.901,170.295 637.419,169.605 636.387,168.225 L636.387,175.514 L634.811,175.514 L634.811,155.770 L636.283,155.770 L636.360,157.786 C637.375,156.265 638.858,155.506 640.810,155.506 C641.947,155.506 642.925,155.803 643.744,156.396 ZM637.903,157.627 C637.242,158.127 636.736,158.783 636.387,159.592 L636.387,166.473 C636.756,167.236 637.278,167.841 637.956,168.285 C638.634,168.730 639.476,168.950 640.483,168.950 C641.401,168.950 642.175,168.696 642.805,168.186 C643.434,167.677 643.907,166.975 644.217,166.084 C644.528,165.193 644.682,164.179 644.682,163.044 L644.682,162.768 C644.682,161.633 644.528,160.624 644.217,159.736 C643.907,158.849 643.434,158.150 642.805,157.640 C642.175,157.131 641.392,156.877 640.456,156.877 C639.414,156.877 638.564,157.126 637.903,157.627 ZM637.344,189.092 C638.368,189.092 639.269,189.266 640.049,189.613 C640.827,189.959 641.434,190.480 641.865,191.174 C642.298,191.870 642.516,192.722 642.516,193.732 L642.516,200.324 C642.516,201.729 642.661,202.772 642.949,203.447 L642.949,203.619 L641.269,203.619 C641.094,203.143 640.988,202.480 640.955,201.627 C640.437,202.295 639.769,202.839 638.952,203.256 C638.134,203.674 637.200,203.882 636.150,203.882 C635.240,203.882 634.441,203.708 633.748,203.361 C633.058,203.014 632.522,202.533 632.141,201.917 C631.760,201.302 631.570,200.608 631.570,199.834 C631.570,198.912 631.831,198.111 632.351,197.430 C632.870,196.749 633.620,196.226 634.596,195.861 C635.570,195.496 636.719,195.313 638.041,195.313 L640.942,195.313 L640.942,193.704 C640.942,192.677 640.624,191.871 639.990,191.286 C639.355,190.702 638.452,190.409 637.279,190.409 C636.561,190.409 635.913,190.539 635.331,190.798 C634.749,191.059 634.293,191.407 633.966,191.846 C633.637,192.287 633.474,192.770 633.474,193.296 L631.897,193.284 C631.897,192.562 632.130,191.880 632.595,191.233 C633.058,190.588 633.706,190.070 634.536,189.678 C635.366,189.289 636.303,189.092 637.344,189.092 ZM638.171,196.525 C637.121,196.525 636.221,196.657 635.467,196.915 C634.716,197.175 634.139,197.541 633.735,198.016 C633.334,198.491 633.132,199.053 633.132,199.703 C633.132,200.222 633.262,200.693 633.519,201.114 C633.776,201.534 634.147,201.870 634.629,202.116 C635.110,202.361 635.673,202.484 636.322,202.484 C637.417,202.484 638.368,202.224 639.183,201.701 C639.997,201.178 640.582,200.502 640.942,199.677 L640.942,196.525 L638.171,196.525 ZM608.905,73.944 L601.071,73.944 L601.071,110.281 L584.165,110.281 L584.165,26.425 L610.657,26.425 C625.089,26.425 632.305,34.467 632.305,50.548 C632.305,59.036 630.243,65.058 626.118,68.611 C621.996,72.168 616.259,73.944 608.905,73.944 ZM615.707,43.560 C615.296,41.938 614.421,40.679 613.080,39.782 C611.741,38.885 609.729,38.435 607.049,38.435 L601.071,38.435 L601.071,61.935 L607.152,61.935 C610.794,61.935 613.232,61.074 614.473,59.346 C615.707,57.622 616.325,54.584 616.325,50.236 C616.325,47.409 616.119,45.181 615.707,43.560 ZM579.886,195.690 C582.326,199.142 583.545,203.869 583.545,209.874 C583.545,226.300 575.437,234.512 559.217,234.512 L534.271,234.512 L534.271,150.659 L555.506,150.659 C563.616,150.659 569.904,152.228 574.372,155.368 C578.838,158.508 581.071,164.184 581.071,172.396 C581.071,177.366 580.022,181.285 577.929,184.147 C575.830,187.011 572.824,188.789 568.910,189.478 C573.786,190.171 577.445,192.240 579.886,195.690 ZM563.341,164.788 C561.418,163.166 558.428,162.355 554.373,162.355 L551.178,162.355 L551.178,184.508 L555.506,184.508 C559.632,184.508 562.448,183.578 563.961,181.715 C565.470,179.851 566.228,176.885 566.228,172.813 C566.228,169.085 565.265,166.410 563.341,164.788 ZM564.630,199.160 C562.879,197.054 559.904,196.001 555.713,196.001 L551.178,196.001 L551.178,222.504 L556.023,222.504 C560.145,222.504 563.050,221.467 564.733,219.397 C566.418,217.328 567.259,214.050 567.259,209.562 C567.259,204.732 566.382,201.265 564.630,199.160 ZM556.952,91.854 L543.758,91.854 L540.561,110.281 L524.585,110.281 L540.768,26.425 L559.632,26.425 L575.712,110.281 L560.044,110.281 L556.952,91.854 ZM550.251,47.545 L545.305,81.294 L555.302,81.294 L550.251,47.545 ZM489.950,110.281 L474.075,26.425 L488.815,26.425 L498.710,84.400 L507.988,26.425 L523.348,26.425 L507.473,110.281 L489.950,110.281 ZM444.902,197.346 L430.161,197.346 L430.161,234.512 L413.153,234.512 L413.153,150.659 L430.161,150.659 L430.161,185.026 L444.902,185.026 L444.902,150.659 L461.911,150.659 L461.911,234.512 L444.902,234.512 L444.902,197.346 ZM420.405,111.356 L413.153,111.356 L413.153,86.645 L420.405,86.645 L420.405,93.986 L461.293,93.986 L461.293,103.894 L420.405,103.894 L420.405,111.356 ZM413.153,72.321 L432.885,72.321 L432.885,63.788 L413.153,63.788 L413.153,53.938 L461.293,53.938 L461.293,63.788 L439.956,63.788 L439.956,72.321 L461.293,72.321 L461.293,82.170 L413.153,82.170 L413.153,72.321 ZM413.153,25.469 L419.929,25.469 L419.929,36.750 L432.707,36.750 L432.707,28.036 L439.541,28.036 L439.541,36.750 L454.635,36.750 L454.635,25.351 L461.293,25.351 L461.293,46.538 L413.153,46.538 L413.153,25.469 ZM333.480,-0.000 L337.387,-0.000 L337.387,261.000 L333.480,261.000 L333.480,-0.000 ZM176.636,145.889 C174.684,147.023 172.186,146.352 171.059,144.389 L170.917,144.141 C169.789,142.179 170.459,139.672 172.411,138.539 L263.737,85.585 C265.691,84.453 268.187,85.124 269.316,87.086 L269.460,87.335 C270.586,89.295 269.916,91.804 267.964,92.936 L176.636,145.889 ZM261.758,72.860 L156.304,72.860 C154.049,72.860 152.220,71.024 152.220,68.760 L152.220,68.472 C152.220,66.207 154.049,64.371 156.304,64.371 L261.758,64.371 C264.014,64.371 265.841,66.207 265.841,68.472 L265.841,68.760 C265.841,71.024 264.014,72.860 261.758,72.860 ZM170.159,36.888 C172.267,36.888 246.057,36.888 246.057,36.888 L257.986,58.260 L159.669,58.260 L170.159,36.888 ZM261.211,78.969 C261.201,79.326 261.190,79.683 261.170,80.039 C261.007,80.120 260.844,80.201 260.694,80.293 L169.782,132.998 C159.841,118.033 157.427,96.969 156.850,78.969 L261.211,78.969 ZM209.035,152.506 C199.805,152.506 192.197,150.703 185.930,147.555 L258.584,105.434 C253.948,130.034 241.645,152.506 209.035,152.506 ZM164.407,167.925 C175.231,169.453 182.713,161.000 182.794,151.855 C190.218,156.146 199.499,158.746 211.113,158.746 C220.038,158.746 227.594,157.207 233.970,154.545 C230.517,165.467 235.462,175.838 236.315,186.412 C237.777,204.727 223.593,224.112 196.239,224.112 C148.293,224.112 139.885,177.989 115.395,146.785 C115.770,146.428 116.096,146.030 116.400,145.612 L126.382,131.520 C144.860,148.040 156.508,166.802 164.407,167.925 ZM111.434,142.061 C110.376,143.552 108.315,143.899 106.830,142.839 C105.345,141.777 104.998,139.707 106.056,138.215 L117.413,122.193 C118.469,120.701 120.531,120.353 122.017,121.415 C123.502,122.478 123.847,124.547 122.791,126.039 L111.434,142.061 ZM101.285,134.393 C100.229,135.885 98.167,136.232 96.682,135.170 C95.197,134.107 94.850,132.039 95.909,130.546 L107.265,114.526 C108.321,113.034 110.383,112.685 111.869,113.748 C113.354,114.809 113.702,116.880 112.644,118.372 L101.285,134.393 ZM87.869,124.494 C74.597,118.712 32.235,107.999 11.353,107.547 L11.353,109.271 C11.353,111.578 9.491,113.451 7.192,113.451 L4.161,113.451 C1.863,113.451 -0.000,111.578 -0.000,109.271 L-0.000,96.775 C-0.000,94.467 1.863,92.597 4.161,92.597 L7.192,92.597 C9.491,92.597 11.353,94.467 11.353,96.775 L11.353,98.338 C25.598,98.705 71.875,104.833 87.106,108.944 C91.748,110.197 96.143,111.839 100.307,113.787 L91.493,126.229 C90.316,125.605 89.107,125.034 87.869,124.494 ZM490.774,210.391 C490.774,214.395 491.253,217.535 492.216,219.813 C493.178,222.089 495.171,223.229 498.195,223.229 C501.219,223.229 503.212,222.089 504.172,219.813 C505.135,217.535 505.616,214.395 505.616,210.391 L505.616,150.659 L522.420,150.659 L522.420,208.010 C522.420,214.220 521.697,219.330 520.256,223.333 C518.812,227.335 516.320,230.389 512.781,232.494 C509.240,234.597 504.380,235.650 498.195,235.650 C492.011,235.650 487.164,234.597 483.660,232.494 C480.155,230.389 477.683,227.335 476.239,223.333 C474.795,219.330 474.075,214.220 474.075,208.010 L474.075,150.659 L490.774,150.659 L490.774,210.391 ZM620.433,167.072 C620.962,167.727 621.678,168.203 622.580,168.502 C623.436,168.784 624.294,168.924 625.152,168.924 C626.141,168.924 627.011,168.775 627.756,168.476 C628.505,168.177 629.082,167.753 629.489,167.204 C629.897,166.655 630.100,166.024 630.100,165.313 C630.100,164.582 629.934,163.967 629.601,163.468 C629.269,162.967 628.730,162.523 627.981,162.137 C627.231,161.750 626.197,161.371 624.876,161.001 C623.485,160.606 622.339,160.178 621.438,159.717 C620.535,159.255 619.844,158.686 619.358,158.009 C618.872,157.334 618.628,156.508 618.628,155.533 C618.628,154.557 618.900,153.695 619.444,152.948 C619.986,152.202 620.745,151.619 621.719,151.201 C622.695,150.784 623.805,150.575 625.048,150.575 C626.360,150.575 627.510,150.828 628.500,151.334 C629.488,151.839 630.250,152.526 630.789,153.397 C631.327,154.267 631.598,155.238 631.598,156.309 L629.982,156.309 C629.982,155.467 629.786,154.714 629.392,154.054 C628.997,153.397 628.430,152.883 627.685,152.514 C626.942,152.144 626.063,151.960 625.048,151.960 C624.032,151.960 623.164,152.118 622.442,152.435 C621.719,152.750 621.174,153.177 620.808,153.712 C620.440,154.250 620.256,154.843 620.256,155.492 C620.256,156.398 620.614,157.167 621.334,157.799 C622.032,158.441 623.397,159.037 625.428,159.592 C626.846,159.978 628.012,160.417 628.927,160.910 C629.839,161.402 630.536,162.002 631.012,162.709 C631.488,163.417 631.728,164.276 631.728,165.285 C631.728,166.306 631.447,167.193 630.887,167.949 C630.329,168.705 629.551,169.285 628.558,169.689 C627.565,170.094 626.430,170.295 625.152,170.295 C623.954,170.295 622.814,170.089 621.734,169.675 C620.652,169.262 619.770,168.652 619.089,167.843 C618.369,167.009 618.011,165.910 618.011,164.548 L619.638,164.548 C619.638,165.576 619.904,166.417 620.433,167.072 ZM623.996,201.456 L628.303,189.356 L629.930,189.356 L624.614,203.619 L623.340,203.619 L618.011,189.356 L619.638,189.356 L623.996,201.456 ZM620.841,233.614 C621.615,234.075 622.527,234.305 623.577,234.305 C624.337,234.305 624.994,234.187 625.545,233.949 C626.096,233.712 626.517,233.400 626.805,233.013 C627.094,232.626 627.239,232.206 627.239,231.749 C627.239,231.151 627.002,230.584 626.529,230.047 C626.040,229.503 625.007,229.067 623.433,228.743 C622.313,228.505 621.396,228.225 620.683,227.899 C619.969,227.575 619.424,227.156 619.050,226.646 C618.673,226.139 618.484,225.499 618.484,224.735 C618.484,224.025 618.689,223.374 619.101,222.785 C619.512,222.197 620.096,221.728 620.854,221.382 C621.610,221.034 622.487,220.861 623.485,220.861 C624.562,220.861 625.495,221.043 626.288,221.408 C627.078,221.772 627.685,222.277 628.105,222.922 C628.526,223.568 628.735,224.301 628.735,225.118 L627.147,225.118 C627.147,224.617 627.002,224.143 626.714,223.694 C626.424,223.247 626.004,222.886 625.445,222.613 C624.890,222.341 624.238,222.205 623.485,222.205 C622.705,222.205 622.058,222.323 621.542,222.562 C621.025,222.798 620.648,223.105 620.407,223.482 C620.166,223.860 620.046,224.261 620.046,224.684 C620.046,225.298 620.277,225.826 620.741,226.264 C621.195,226.696 622.220,227.091 623.813,227.451 C624.942,227.715 625.866,228.018 626.589,228.360 C627.310,228.704 627.861,229.143 628.243,229.678 C628.623,230.215 628.814,230.878 628.814,231.669 C628.814,232.452 628.599,233.144 628.170,233.747 C627.741,234.347 627.132,234.816 626.338,235.150 C625.548,235.484 624.626,235.650 623.577,235.650 C622.423,235.650 621.424,235.454 620.584,235.063 C619.744,234.673 619.104,234.149 618.667,233.495 C618.229,232.841 618.011,232.135 618.011,231.379 L619.573,231.379 C619.643,232.407 620.065,233.153 620.841,233.614 ZM633.211,217.460 L634.798,217.460 L634.798,221.125 L637.724,221.125 L637.724,222.416 L634.798,222.416 L634.798,231.907 C634.798,232.820 634.962,233.442 635.291,233.771 C635.619,234.101 636.067,234.266 636.635,234.266 C636.959,234.266 637.388,234.217 637.923,234.122 L637.988,235.440 C637.594,235.579 637.034,235.650 636.308,235.650 C635.318,235.650 634.556,235.365 634.017,234.794 C633.480,234.222 633.211,233.260 633.211,231.907 L633.211,222.416 L630.612,222.416 L630.612,221.125 L633.211,221.125 L633.211,217.460 ZM642.889,221.785 C643.848,221.168 644.954,220.861 646.202,220.861 C647.456,220.861 648.560,221.164 649.518,221.770 C650.477,222.377 651.219,223.213 651.742,224.280 C652.267,225.349 652.538,226.559 652.558,227.912 L652.558,228.467 C652.558,229.845 652.293,231.081 651.770,232.170 C651.243,233.260 650.506,234.113 649.550,234.728 C648.598,235.344 647.492,235.650 646.230,235.650 C644.970,235.650 643.858,235.344 642.896,234.728 C641.933,234.113 641.190,233.260 640.665,232.170 C640.141,231.081 639.879,229.845 639.879,228.467 L639.879,228.045 C639.879,226.664 640.141,225.430 640.665,224.340 C641.190,223.251 641.932,222.398 642.889,221.785 ZM641.452,228.467 C641.452,229.539 641.639,230.519 642.011,231.405 C642.382,232.293 642.928,232.998 643.651,233.521 C644.374,234.044 645.233,234.305 646.230,234.305 C647.220,234.305 648.070,234.044 648.790,233.521 C649.507,232.998 650.052,232.293 650.424,231.405 C650.795,230.519 650.982,229.539 650.982,228.467 L650.982,228.045 C650.982,226.999 650.794,226.032 650.416,225.145 C650.042,224.258 649.491,223.546 648.769,223.009 C648.048,222.473 647.192,222.205 646.202,222.205 C645.225,222.205 644.375,222.470 643.658,223.002 C642.940,223.534 642.393,224.245 642.018,225.138 C641.639,226.030 641.452,227.003 641.452,228.059 L641.452,228.467 ZM648.265,201.812 L648.265,209.102 L646.690,209.102 L646.690,189.356 L648.160,189.356 L648.239,191.372 C649.252,189.852 650.737,189.092 652.687,189.092 C653.826,189.092 654.804,189.390 655.623,189.982 C656.441,190.576 657.062,191.417 657.492,192.505 C657.920,193.596 658.135,194.879 658.135,196.355 L658.135,196.632 C658.135,198.055 657.920,199.315 657.492,200.409 C657.062,201.502 656.441,202.356 655.623,202.966 C654.804,203.576 653.834,203.882 652.715,203.882 C650.780,203.882 649.299,203.192 648.265,201.812 ZM652.359,202.537 C653.278,202.537 654.052,202.283 654.682,201.772 C655.314,201.263 655.784,200.561 656.094,199.671 C656.403,198.779 656.560,197.766 656.560,196.632 L656.560,196.355 C656.560,195.220 656.403,194.210 656.094,193.323 C655.784,192.435 655.314,191.736 654.682,191.228 C654.052,190.717 653.269,190.462 652.332,190.462 C651.291,190.462 650.442,190.712 649.781,191.213 C649.119,191.716 648.615,192.369 648.265,193.179 L648.265,200.060 C648.633,200.824 649.156,201.428 649.833,201.871 C650.512,202.316 651.353,202.537 652.359,202.537 ZM651.047,166.162 C651.460,167.029 652.033,167.711 652.768,168.213 C653.503,168.713 654.341,168.964 655.286,168.964 C656.958,168.964 658.285,168.313 659.263,167.013 L660.261,167.764 C659.746,168.529 659.071,169.141 658.239,169.603 C657.408,170.064 656.403,170.295 655.221,170.295 C654.004,170.295 652.913,169.996 651.948,169.399 C650.980,168.801 650.223,167.970 649.675,166.908 C649.129,165.844 648.857,164.640 648.857,163.296 L648.857,162.729 C648.857,161.314 649.134,160.058 649.689,158.959 C650.245,157.860 650.988,157.011 651.920,156.409 C652.852,155.806 653.860,155.506 654.946,155.506 C656.118,155.506 657.129,155.783 657.977,156.336 C658.826,156.890 659.470,157.658 659.907,158.643 C660.343,159.627 660.564,160.756 660.564,162.029 L660.564,162.993 L650.431,162.993 L650.431,163.296 C650.431,164.342 650.636,165.298 651.047,166.162 ZM658.989,161.648 L658.989,161.477 C658.970,160.651 658.807,159.886 658.497,159.184 C658.186,158.480 657.728,157.916 657.124,157.489 C656.521,157.064 655.796,156.850 654.946,156.850 C654.158,156.850 653.448,157.046 652.812,157.443 C652.179,157.838 651.660,158.398 651.258,159.123 C650.855,159.849 650.602,160.690 650.497,161.648 L658.989,161.648 ZM657.374,223.352 C658.213,221.691 659.543,220.861 661.363,220.861 C661.783,220.861 662.133,220.914 662.414,221.019 L662.360,222.456 C661.984,222.394 661.634,222.362 661.311,222.362 C660.287,222.362 659.443,222.649 658.778,223.220 C658.113,223.792 657.645,224.569 657.374,225.553 L657.374,235.388 L655.797,235.388 L655.797,221.125 L657.333,221.125 L657.374,223.352 ZM661.797,189.356 L663.359,189.356 L663.359,203.619 L661.797,203.619 L661.797,189.356 ZM662.585,186.272 C661.866,186.272 661.508,185.924 661.508,185.231 C661.508,184.518 661.866,184.162 662.585,184.162 C663.311,184.162 663.674,184.518 663.674,185.231 C663.674,185.924 663.311,186.272 662.585,186.272 ZM666.804,221.763 C667.735,221.161 668.745,220.861 669.830,220.861 C671.001,220.861 672.014,221.136 672.861,221.691 C673.710,222.245 674.352,223.013 674.789,223.997 C675.227,224.982 675.446,226.111 675.446,227.386 L675.446,228.348 L665.314,228.348 L665.314,228.651 C665.314,229.696 665.520,230.652 665.933,231.519 C666.342,232.383 666.916,233.066 667.652,233.567 C668.386,234.069 669.226,234.317 670.171,234.317 C671.842,234.317 673.167,233.668 674.147,232.368 L675.145,233.119 C674.629,233.884 673.953,234.496 673.123,234.958 C672.292,235.420 671.287,235.650 670.106,235.650 C668.888,235.650 667.797,235.351 666.830,234.754 C665.862,234.155 665.106,233.325 664.559,232.262 C664.011,231.200 663.739,229.995 663.739,228.651 L663.739,228.084 C663.739,226.669 664.016,225.411 664.573,224.314 C665.127,223.215 665.872,222.365 666.804,221.763 ZM673.871,227.003 L673.871,226.832 C673.854,226.006 673.690,225.241 673.380,224.539 C673.068,223.835 672.611,223.271 672.008,222.843 C671.403,222.419 670.677,222.205 669.830,222.205 C669.040,222.205 668.330,222.403 667.697,222.798 C667.062,223.193 666.544,223.754 666.141,224.478 C665.739,225.204 665.486,226.045 665.380,227.003 L673.871,227.003 ZM664.842,166.084 C665.149,166.950 665.638,167.643 666.311,168.166 C666.986,168.689 667.844,168.950 668.885,168.950 C669.557,168.950 670.186,168.821 670.768,168.563 C671.349,168.303 671.826,167.922 672.198,167.422 C672.570,166.920 672.782,166.320 672.835,165.616 L674.331,165.616 C674.287,166.503 674.013,167.305 673.511,168.021 C673.007,168.738 672.351,169.296 671.535,169.695 C670.722,170.095 669.839,170.295 668.885,170.295 C667.607,170.295 666.516,169.989 665.610,169.379 C664.704,168.769 664.016,167.934 663.549,166.876 C663.082,165.817 662.838,164.613 662.821,163.269 L662.821,162.623 C662.821,161.269 663.052,160.055 663.516,158.978 C663.981,157.902 664.667,157.055 665.576,156.435 C666.487,155.816 667.579,155.506 668.857,155.506 C669.872,155.506 670.785,155.712 671.595,156.126 C672.404,156.539 673.052,157.129 673.538,157.899 C674.024,158.666 674.287,159.557 674.331,160.567 L672.835,160.567 C672.790,159.811 672.590,159.154 672.230,158.597 C671.873,158.039 671.400,157.606 670.815,157.305 C670.227,157.000 669.574,156.850 668.857,156.850 C667.826,156.850 666.975,157.111 666.305,157.634 C665.636,158.156 665.149,158.854 664.842,159.724 C664.535,160.593 664.383,161.560 664.383,162.623 L664.383,163.178 C664.383,164.250 664.535,165.219 664.842,166.084 ZM673.440,190.449 C672.405,190.449 671.529,190.770 670.807,191.412 C670.085,192.053 669.554,192.854 669.212,193.810 L669.212,203.619 L667.638,203.619 L667.638,189.356 L669.145,189.356 L669.200,191.767 C669.706,190.933 670.360,190.279 671.156,189.803 C671.950,189.330 672.844,189.092 673.834,189.092 C675.285,189.092 676.400,189.505 677.179,190.330 C677.957,191.157 678.352,192.466 678.361,194.260 L678.361,203.619 L676.786,203.619 L676.786,194.260 C676.777,192.879 676.488,191.901 675.919,191.319 C675.350,190.739 674.523,190.449 673.440,190.449 ZM677.678,155.770 L679.239,155.770 L679.239,170.031 L677.678,170.031 L677.678,155.770 ZM678.465,152.685 C677.748,152.685 677.389,152.337 677.389,151.643 C677.389,150.931 677.748,150.575 678.465,150.575 C679.192,150.575 679.556,150.931 679.556,151.643 C679.556,152.337 679.192,152.685 678.465,152.685 ZM684.346,189.982 C685.169,189.390 686.144,189.092 687.272,189.092 C689.214,189.092 690.688,189.861 691.695,191.398 L691.760,189.356 L693.231,189.356 L693.231,203.369 C693.231,204.589 692.997,205.646 692.527,206.536 C692.060,207.428 691.397,208.115 690.541,208.594 C689.683,209.073 688.682,209.312 687.536,209.312 C686.597,209.312 685.678,209.102 684.772,208.681 C683.866,208.257 683.136,207.655 682.585,206.874 L683.466,205.911 C684.560,207.282 685.885,207.967 687.444,207.967 C688.781,207.967 689.818,207.567 690.553,206.768 C691.288,205.968 691.656,204.853 691.656,203.420 L691.656,201.760 C690.642,203.174 689.171,203.882 687.247,203.882 C686.152,203.882 685.196,203.582 684.378,202.985 C683.560,202.389 682.930,201.553 682.488,200.480 C682.048,199.409 681.817,198.179 681.799,196.790 L681.799,196.355 C681.799,194.888 682.018,193.606 682.457,192.513 C682.894,191.419 683.522,190.576 684.346,189.982 ZM683.375,196.632 C683.375,197.766 683.529,198.775 683.834,199.664 C684.138,200.551 684.606,201.247 685.232,201.752 C685.858,202.259 686.630,202.511 687.547,202.511 C688.572,202.511 689.419,202.275 690.094,201.806 C690.767,201.335 691.288,200.693 691.656,199.875 L691.656,193.284 C691.315,192.449 690.816,191.770 690.159,191.247 C689.503,190.725 688.642,190.462 687.573,190.462 C686.647,190.462 685.868,190.717 685.238,191.228 C684.608,191.736 684.138,192.434 683.834,193.317 C683.529,194.200 683.375,195.213 683.375,196.355 L683.375,196.632 ZM704.832,152.105 L706.421,152.105 L706.421,155.770 L709.348,155.770 L709.348,157.061 L706.421,157.061 L706.421,166.552 C706.421,167.465 706.586,168.087 706.915,168.416 C707.242,168.746 707.690,168.911 708.259,168.911 C708.583,168.911 709.011,168.862 709.545,168.765 L709.611,170.084 C709.216,170.224 708.656,170.295 707.930,170.295 C706.942,170.295 706.180,170.010 705.641,169.437 C705.103,168.867 704.832,167.905 704.832,166.552 L704.832,157.061 L702.235,157.061 L702.235,155.770 L704.832,155.770 L704.832,152.105 ZM712.708,155.770 L717.131,167.764 L721.264,155.770 L722.960,155.770 L716.948,172.325 C716.737,172.895 716.487,173.428 716.192,173.920 C715.899,174.412 715.521,174.834 715.059,175.185 C714.542,175.590 713.845,175.791 712.971,175.791 C712.499,175.791 712.096,175.735 711.762,175.622 L711.762,174.303 C711.973,174.363 712.240,174.393 712.564,174.393 C713.386,174.393 714.028,174.190 714.486,173.780 C714.945,173.372 715.333,172.728 715.648,171.850 L716.357,169.912 L711.002,155.770 L712.708,155.770 Z"/>
</svg>
                </span>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between invoice__content-info">
                                            <div class="invoice__content-info-left">
                                                <p class="title">To:</p>
                                                <p class="bold-title">Customer Name</p>
                                                <p>Wilkinson Way, Blackburn</p>
                                                <p>BB1 2EH, London</p>
                                                <p>United Kingdom</p>
                                            </div>
                                            <div class="invoice__content-info-right">
                                                <p>The Vapors Hub Ltd, GM</p>
                                                <p>Wilkinson Way, Blackburn</p>
                                                <p>Lancashire, BB1 2EH</p>
                                                <p>London, UK</p>
                                                <p>Company number: 47655666</p>
                                                <p>VAT number: 978886765766</p>
                                            </div>
                                        </div>
                                        <h1 class="main-title">INVOICE</h1>
                                        <div class="invoice__table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col" class="text-center">Quantity</th>
                                                        <th scope="col" class="text-center">VAT</th>
                                                        <th scope="col" class="text-center">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="product-td">Kangertech Vola 23 100W Premium Vape
                                                        </td>
                                                        <td>
                                                            <div class="single-item">
                                                                <span>Pods Gold Edition</span>
                                                                <span>$28</span>
                                                            </div>
                                                            <div class="single-item">
                                                                <span>Gold Tobacco Nic.Salts 18mg</span>
                                                                <span>$55</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <span>x 1</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span>£18 (21%)</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="price">£83,00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="product-td">Kangertech Vola 23 100W Premium Vape
                                                        </td>
                                                        <td>
                                                            <div class="single-item">
                                                                <span>Pods Gold Edition</span>
                                                                <span>$28</span>
                                                            </div>
                                                            <div class="single-item">
                                                                <span>Gold Tobacco Nic.Salts 18mg</span>
                                                                <span>$55</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <span>x 1</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span>£18 (21%)</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="price">£83,00</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-flex invoice__content-paid-price">
                                            <div class="invoice__content-paid">
                                                <img src="/public/img/temp/paid-invoice.png"
                                                     alt="paid">
                                            </div>
                                            <div class="invoice__content-price">
                                                <div class="invoice__content-price-item">
                                                    <span class="name">Sub Total</span>
                                                    <span class="price">£18,00</span>
                                                </div>
                                                <div class="invoice__content-price-item">
                                                    <span class="name">Total VAT</span>
                                                    <span class="price">£08,00</span>
                                                </div>
                                                <div class="invoice__content-price-item">
                                                    <span class="name">Shipping</span>
                                                    <span class="price">£10,00</span>
                                                </div>
                                                <div class="invoice__content-price-item">
                                                                        <span
                                                                            class="name total-name">Total Amount</span>
                                                    <span
                                                        class="price total-price"><span>£86,</span><span
                                                            class="sec-price">95</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-between invoice__wrapper-footer">
                                        <ul class="left-list">
                                            <li>The Vapors Hub Ltd, GM</li>
                                            <li>Wilkinson Way, Blackburn</li>
                                            <li>Lancashire, BB1 2EH</li>
                                            <li>London, UK</li>
                                        </ul>
                                        <ul class="right-list">
                                            <li>TheVaporsHub.com</li>
                                            <li>Info@TheVaporsHub.com</li>
                                            <li>Tel: +32 456 586 56</li>
                                        </ul>
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
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Warehouse</th>
                                    <th scope="col">Shilf</th>
                                    <th scope="col">Rak</th>
                                    <th scope="col">Barcode</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="photo-td">
                                        <div class="photo">
                                            <img src="/public/img/product-juice.png" alt="product">
                                        </div>
                                    </td>
                                    <td class="title-td">
                                        <div class="font-16 lh-1 title-block">
                                            <p class="text-tert-clr text-uppercase">dINNER LADY Cubano 32 pRO</p>
                                            <p class="mb-0">Cola Shades E-Juice</p>
                                        </div>
                                    </td>
                                    <td class="info-td align_middle">
                                        <div class="info-product-block">

                                        </div>
                                    </td>
                                    <td class="qty-td">
                                        <div class="d-flex flex-column align-items-center qty-block">
                                            <span class="font-sec-light font-16 lh-1">QTY</span>
                                            <div class="product__single-item-inp-num">
                                                <div class="quantity">
                                                    <input type="number" readonly="" min="1" max="9" step="1" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="warehouse-td align_middle">
                                        <span class="font-sec-reg font-20 text-tert-clr lh-1">London, MS</span>
                                    </td>
                                    <td class="shilf-td align_middle">
                                        <span class="font-sec-reg font-20 text-main-clr lh-1">A17</span>
                                    </td>
                                    <td class="rak-td align_middle">
                                        <span class="font-sec-reg font-20 text-red-clr lh-1">65</span>
                                    </td>
                                    <td class="barcode-td align_middle">
                                        <span class="barcode-block">34232132445</span>
                                    </td>
                                    <td class="last-td">
                                        <div class="check-block">
                                            <span class="check-icon d-none">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="24px" height="19px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)"
      d="M7.636,15.030 L1.909,9.075 L0.000,11.060 L7.636,19.000 L24.000,1.985 L22.091,0.000 L7.636,15.030 Z"/>
</svg></span>
                                            <span class="square-icon"></span>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive table-mt">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td class="photo-td">
                                        <div class="photo">
                                            <img src="/public/img/product-juice.png" alt="product">
                                        </div>
                                    </td>
                                    <td class="title-td">
                                        <div class="font-16 lh-1 title-block">
                                            <p class="text-tert-clr text-uppercase">dINNER LADY Cubano 32 pRO</p>
                                            <p class="mb-0">Cola Shades E-Juice</p>
                                        </div>
                                    </td>
                                    <td class="info-td align_middle">
                                        <div class="info-product-block">
                                            <div class="row">
                                                <div class="col-sm-9 font-15 font-main-bold">
                                                    Mango Harmony Cloud 18mg/ Single Pack
                                                </div>
                                                <div class="col-sm-3 font-main-bold">
                                                    <span>x 2</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9 font-15 font-main-bold">
                                                    Mango Harmony Hit 12mg/ Single Pack
                                                </div>
                                                <div class="col-sm-3 font-main-bold">
                                                    <span>x 1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="qty-td">
                                        <div class="d-flex flex-column align-items-center qty-block">
                                            <span class="font-sec-light font-16 lh-1">QTY</span>
                                            <div class="product__single-item-inp-num">
                                                <div class="quantity">
                                                    <input type="number" readonly="" min="1" max="9" step="1" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="warehouse-td align_middle">
                                        <span class="font-sec-reg font-20 text-tert-clr lh-1">London, MS</span>
                                    </td>
                                    <td class="shilf-td align_middle">
                                        <span class="font-sec-reg font-20 text-main-clr lh-1">A17</span>
                                    </td>
                                    <td class="rak-td align_middle">
                                        <span class="font-sec-reg font-20 text-red-clr lh-1">65</span>
                                    </td>
                                    <td class="barcode-td align_middle">
                                        <span class="barcode-block">34232132445</span>
                                    </td>
                                    <td class="last-td active">
                                        <div class="check-block">
                                            <span class="check-icon">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="24px" height="19px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)"
      d="M7.636,15.030 L1.909,9.075 L0.000,11.060 L7.636,19.000 L24.000,1.985 L22.091,0.000 L7.636,15.030 Z"/>
</svg></span>
                                            <span class="square-icon d-none"></span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex align-items-center total-items-block">
                        <span class="font-16 total-items-count">Total Items: 10</span>
                        <button class="check-item-btn active">
<span class="no-item">
    <span class="icon"></span>
    <span class="font-16 title">Check All Items</span>
</span>
                            <span class="item-checked">
                                <span class="icon">
                                    <span class="first-icon icon-svg"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14px" height="11px">
<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
      d="M4.454,8.702 L1.114,5.254 L0.000,6.403 L4.454,11.000 L14.000,1.149 L12.886,0.000 L4.454,8.702 Z"/>
</svg></span>
                                    <span class="second-icon icon-svg"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14px" height="11px">
<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
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
            <div class="tab-pane fade show active" id="nav-order-logs" role="tabpanel" aria-labelledby="nav-order-logs-tab">
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

            $('body').on('click', '.check-collecting', function (event) {
                let $_this = $(this);
                let item_id = $_this.data('id')
                if ($_this.is(':checked')) {
                    AjaxCall("{!! route('admin_orders_collecting',$order->id) !!}", {
                        item_id: item_id,
                        value: 1
                    }, function (res) {
                        if (!res.error) {
                            $_this.attr('disabled', true);
                            $_this.removeClass('check-collecting');
                            $(".status-box").html(res.message);
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
