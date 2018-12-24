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
                        {!! Form::model($model) !!}
                <button  type="submit" class="btn btn-primary pull-right">Save</button>
                <div class="panel panel-default">
                    <div class="panel-heading">Orders Status </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="text" class="col-md-4">when order is submitted</label>
                                    <div class="col-md-4">
                                        {!! Form::select('submitted',$statuses,null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-4">
                                            {!! Form::hidden('notify_if_submitted',0) !!}
                                            {!! Form::checkbox('notify_if_submitted',1) !!}
                                        </div>
                                        <label for="text" class="col-md-8">notify customer</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-4">
                                        {!! Form::hidden('email_submitted',0) !!}
                                        {!! Form::checkbox('email_submitted',1) !!}
                                    </div>
                                    <label for="text" class="col-md-8">email customer</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="text" class="col-md-4">when order is Canceled</label>
                                    <div class="col-md-4">
                                        {!! Form::select('canceled',$statuses,null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-4">
                                            {!! Form::hidden('notify_if_canceled',0) !!}
                                            {!! Form::checkbox('notify_if_canceled',1) !!}
                                        </div>
                                        <label for="text" class="col-md-8">notify customer</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-4">
                                        {!! Form::hidden('email_canceled',0) !!}
                                        {!! Form::checkbox('email_canceled',1) !!}
                                    </div>
                                    <label for="text" class="col-md-8">email customer</label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="text" class="col-md-4">when order is Partially collected</label>
                                    <div class="col-md-4">
                                        {!! Form::select('partially_collected',$statuses,null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-4">
                                            {!! Form::hidden('notify_if_partially_collected',0) !!}
                                            {!! Form::checkbox('notify_if_partially_collected',1) !!}
                                        </div>
                                        <label for="text" class="col-md-8">notify customer</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-4">
                                        {!! Form::hidden('email_partially_collected',0) !!}
                                        {!! Form::checkbox('email_partially_collected',1) !!}
                                    </div>
                                    <label for="text" class="col-md-8">email customer</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="text" class="col-md-4">when order is  completely collected</label>
                                    <div class="col-md-4">
                                        {!! Form::select('collected',$statuses,null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-4">
                                            {!! Form::hidden('notify_if_collected',0) !!}
                                            {!! Form::checkbox('notify_if_collected',1) !!}
                                        </div>
                                        <label for="text" class="col-md-8">notify customer</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-4">
                                        {!! Form::hidden('email_collected',0) !!}
                                        {!! Form::checkbox('email_collected',1) !!}
                                    </div>
                                    <label for="text" class="col-md-8">email customer</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="text" class="col-md-4">when order is completed</label>
                                        <div class="col-md-4">
                                            {!! Form::select('completed',$statuses,null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-4">
                                                {!! Form::hidden('notify_if_completed',0) !!}
                                            {!! Form::checkbox('notify_if_completed',1) !!}
                                            </div>
                                            <label for="text" class="col-md-8">notify customer</label>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-4">
                                        {!! Form::hidden('email_completed',0) !!}
                                        {!! Form::checkbox('email_completed',1) !!}
                                    </div>
                                    <label for="text" class="col-md-8">email customer</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop