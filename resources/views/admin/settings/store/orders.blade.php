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
            <li class="nav-item active">
                <a class="nav-link"  href="#"
                   role="tab"
                   aria-controls="orders" aria-selected="false">Orders</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_settings_shipping') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Shipping</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link"  href="{!! route('admin_settings_payment_gateways') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Payment gateways</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link"  href="{!! route('admin_settings_couriers') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Courier </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link"  href="#"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Gifts</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link"  href="{!! route('admin_settings_delivery') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Delivery Cost</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_tax_rates') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Tax Rates</a>
            </li>
        </ul>
        <div>
            <div class="" aria-labelledby="general-tab">
                <div class="panel panel-default">
                    <div class="panel-heading">Orders Status</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="text" class="col-md-4">when order is submitted. Order status  is</label>
                                    <div class="col-md-8">
                                        {!! Form::select('order_submited',[],null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="text" class="col-md-4">when order is caneclled. Order status  is</label>
                                    <div class="col-md-8">
                                        {!! Form::select('order_submited',[],null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="text" class="col-md-4">when order is completed. Order status  is</label>
                                    <div class="col-md-8">
                                        {!! Form::select('order_submited',[],null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="text" class="col-md-4">when order is collected. Order status  is</label>
                                    <div class="col-md-8">
                                        {!! Form::select('order_submited',[],null,['class'=>'form-control']) !!}
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