@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
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
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_store_gifts') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Gifts</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_delivery') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Delivery Cost</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_tax_rates') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Tax Rates</a>
            </li>
        </ul>
        <div class="" id="myTabContent">
            {!! Form::open(['class'=>'form-horizontal']) !!}

            <div class="form-group">
                <div class="row">
                    <label for="text" class="control-label col-md-4">we ship to</label>
                    <div class="col-md-8">
                        {!! Form::text('we_ship_to',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">Stock availability</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-4">Availabile stock status</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">

                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-4">Out of stock status</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" checked>Enable Back order
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio">Disable order
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Currency</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-4">Default product price in </label>
                                    <div class="col-md-8">
                                        <input type="text" readonly value="GBP" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5" style="border: 1px solid #b1b1b1">
                                <p>Current rate</p>
                                <div class="row">
                                    <label class="col-md-2">1 GBP</label>
                                    <div class="col-md-8">
                                        <input type="text" readonly value="1.281296" class="form-control">
                                    </div>
                                    <label class="col-md-2">USD</label>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">1 GBP</label>
                                    <div class="col-md-8">
                                        <input type="text" readonly value="621.85" class="form-control">
                                    </div>
                                    <label class="col-md-2">AMD</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-4">GBP </label>
                                    <div class="col-md-8">
                                        <input type="text" readonly value="UK" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-4">EURO </label>
                                    <div class="col-md-8">
                                        <input type="text" readonly value="France,Germany" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-4">USD</label>
                                    <div class="col-md-8">
                                        <input type="text" readonly value="" class="form-control">
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
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop