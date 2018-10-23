@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_store') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">General</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_settings_shipping') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Shipping</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_payment_gateways') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Payment gateways</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_couriers') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Courier </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_delivery') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Delivery Cost</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_tax_rates') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Tax Rates</a>
            </li>
        </ul>
        <div class="text-right mb-10">
            <a href="{!! route('admin_settings_tax_create') !!}" class="btn btn-primary">Create new</a>
        </div>
        <div class="" id="myTabContent">

            <div class="" aria-labelledby="general-tab">
                <div class="payment_gateways_tab">
                    <ul class="list_paymant">
                        <li class="item ">
                            <div class="chek-title">
                                <input id="cash_paymant" name="2" class="gateways_inp" type="checkbox">
                                <label for="cash_paymant" class="title">Tax 1</label>
                            </div>
                            <a href="#"
                               class="btn btn-sm btn-warning"><i class="fa fa-cogs"></i></a>
                        </li>
                        <li class="item ">
                            <div class="chek-title">
                                <input id="cash_paymant"  name="3" class="gateways_inp" type="checkbox">
                                <label for="cash_paymant" class="title">Tax 2</label>
                            </div>
                            <a href="#"
                               class="btn btn-sm btn-warning"><i class="fa fa-cogs"></i></a>
                        </li>
                        <li class="item ">
                            <div class="chek-title">
                                <input id="cash_paymant" checked="" name="4" class="gateways_inp" type="checkbox">
                                <label for="cash_paymant" class="title">Tax 3</label>
                            </div>
                            <a href="#"
                               class="btn btn-sm btn-warning"><i class="fa fa-cogs"></i></a>
                        </li>
                        <li class="item ">
                            <div class="chek-title">
                                <input id="cash_paymant" checked="" name="4" class="gateways_inp" type="checkbox">
                                <label for="cash_paymant" class="title">Tax 4</label>
                            </div>
                            <a href="#"
                               class="btn btn-sm btn-warning"><i class="fa fa-cogs"></i></a>
                        </li>
                        <li class="item ">
                            <div class="chek-title">
                                <input id="cash_paymant" checked="" name="4" class="gateways_inp" type="checkbox">
                                <label for="cash_paymant" class="title">Tax 5</label>
                            </div>
                            <a href="#"
                               class="btn btn-sm btn-warning"><i class="fa fa-cogs"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop