@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_store') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">General</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_settings_shipping') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Shipping</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_payment_gateways') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Payment gateways</a>
            </li>
        </ul>
        <div class="" id="myTabContent">
            <div class="" aria-labelledby="general-tab">

            </div>
        </div>
        <div class="payment_gateways_tab">
            <ul class="list_paymant">
                <li class="item">
                    <div class="title">Cash Paymant</div>
                    <a href="{!! route('admin_settings_payment_gateways_settings') !!}" class="btn btn-sm btn-warning"><i class="fa fa-cogs"></i></a>
                </li>
                <li class="item">
                    <div class="title">Paypal</div>
                    <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-cogs"></i></a>
                </li>
            </ul>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop