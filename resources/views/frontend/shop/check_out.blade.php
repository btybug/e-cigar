@extends('layouts.frontend')
@section('content')
    <div class="container">
        <ul class="nav nav-pills nav-fill ml-0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="address-tab" data-toggle="tab" href="#address" role="tab"
                   aria-controls="address" aria-selected="true" aria-expanded="true">Address</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab"
                   aria-controls="payment" aria-selected="false">Payment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="artWork-tab" data-toggle="tab" href="#artWork" role="tab"
                   aria-controls="artWork" aria-selected="false">Art Work</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                   aria-controls="reviews" aria-selected="false">Reviews <span>(2)</span></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in show" id="address" role="tabpanel" aria-labelledby="pricing-tab">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="container">
                                    <h2>Billing Address</h2>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            {!! Form::model($billing_address,['class'=>'form-horizontal']) !!}
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">Name</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="col-sm-6">
                                                                {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">Company
                                                        name</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('company',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">1st Line
                                                        address</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">2nd line
                                                        address</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('second_line_address',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">Country</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::select('country',['' => 'SELECT'] + $countries,null,['class'=>'form-control','id' => 'country']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group hide">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">Regions</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::select('region',getRegions(@$billing_address->country,true),null,['class'=>'form-control','id' => 'regions']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group hide">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">City</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('city',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">Post Code</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('post_code',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::hidden('type','billing_address') !!}
                                            {!! Form::hidden('id') !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="container">
                                    <h2>Default Shipping</h2>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            {!! Form::model($default_shipping,['class'=>'form-horizontal']) !!}
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">Name</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                                                            </div>
                                                            <div class="col-sm-6">
                                                                {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">Company
                                                        name</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('company',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">1st Line
                                                        address</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">2nd line
                                                        address</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('second_line_address',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">Country</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::select('country',$countriesShipping,null,['class'=>'form-control','id' => 'geo_country']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">Regions</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::select('region',getRegionByZone(@$default_shipping->country),null,['class'=>'form-control','id' => 'geo_region']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group hide">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">City</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('city',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4">Post Code</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('post_code',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::hidden('type','default_shipping') !!}
                                            {!! Form::hidden('id') !!}

                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="order-summary-outer">
                            <div class="order-summary">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th align="left" colspan="2">Order Summary</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td align="left"><span>Sub Total</span></td>
                                        <td align="right" id="subtotal">
                                            @if(Auth::check())
                                                ${!! \Cart::session(Auth::id())->getSubTotal() !!}
                                            @else
                                                ${!! \Cart::getSubTotal() !!}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><span>Tax</span></td>
                                        <td align="right" id="subtotal">$0</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><span>Shipping</span></td>
                                        <td align="right" id="subtotal">$0</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><span>Discount (Coupon)</span></td>
                                        <td align="right" id="discount">$0</td>
                                    </tr>
                                    <tr>
                                        <td class="last" align="left"><span>Total</span></td>
                                        <td class="last" align="right" id="total_price">
                                            @if(Auth::check())
                                                ${!! \Cart::session(Auth::id())->getTotal() !!}
                                            @else
                                                ${!! \Cart::getTotal() !!}
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button class="btn btn-block btn-info mt-2">Go to payment</button>
                    </div>
                </div>
                <div class="row">
                    <h3>Delivery cost</h3>
                    <table class="table table-style table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Order Amount</th>
                                <th>Courier</th>
                                <th>Cost</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($geoZone && count($geoZone->deliveries))
                                @foreach($geoZone->deliveries as $delivery)
                                    <tr>
                                        <td>{!! $delivery->min !!} To {!! $delivery->max !!}</td>
                                        <td colspan="3"></td>
                                    </tr>
                                    @if(count($delivery->options))
                                        @foreach($delivery->options as $option)
                                            <tr>
                                                <td></td>
                                                <td>
                                                    {!! $option->courier->name !!}
                                                </td>
                                                <td>
                                                    {!! $option->cost !!}
                                                </td>
                                                <td>
                                                    {!! $option->time !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="tab-pane fade payment_tab" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                <div class="row">
                    <div class="col-md-4">
                        @php
                            $payment_options = ($geoZone) ? json_decode($geoZone->payment_options,true) : [];
                        @endphp
                        @if(count($payment_options))
                            <ul class="payment_methods methods">
                                @if(in_array('cash',$payment_options))
                                    <li class="payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio"
                                               name="payment_method" value="bacs" checked="checked"
                                               data-order_button_text="">

                                        <label for="payment_method_bacs">
                                            Direct Bank Transfer </label>
                                        <div class="payment_box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order won’t be shipped until the funds
                                                have cleared in our account.</p>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('stripe',$payment_options))
                                    <li class="payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio"
                                               name="payment_method" value="cheque" data-order_button_text="">

                                        <label for="payment_method_cheque">
                                            Stripe </label>
                                        <div class="payment_box payment_method_cheque" style="display:none;">
                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store
                                                State / County, Store Postcode.</p>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('paypal',$payment_options))
                                    <li class="payment_method_paypal">
                                        <input id="payment_method_paypal" type="radio" class="input-radio"
                                               name="payment_method" value="paypal"
                                               data-order_button_text="Proceed to PayPal">

                                        <label for="payment_method_paypal">
                                            PayPal <img
                                                    src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"
                                                    alt="PayPal Acceptance Mark"><a
                                                    href="https://www.paypal.com/gb/webapps/mpp/paypal-popup"
                                                    class="about_paypal">What is PayPal?</a> </label>
                                        <div class="payment_box payment_method_paypal" style="display:none;">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.</p>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="artWork" role="tabpanel" aria-labelledby="artWork-tab">
                ..3..
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                ..4..
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script>
        $(document).ready(function () {
            $('body').on('change', '.payment_methods input[type=radio][name=payment_method]', function () {
                if ($(this).is(':checked')) {
                    $('.payment_box').slideUp();
                    $(this).closest('li').find('.payment_box').slideDown();
                }
            })
        });

    </script>
    <script>
        $(document).ready(function () {
            function getRegionsPackage() {
                let value = $("#country").val();
                AjaxCall(
                    "/get-regions-by-country",
                    {country: value},
                    res => {
                        let select = document.getElementById('regions');
                        select.innerText = null;
                        if (!res.error) {
                            $.each(res.data, function (index, value) {
                                var opt = document.createElement('option');
                                opt.value = res.data[value];
                                opt.innerHTML = res.data[value];
                                select.appendChild(opt);
                            })

                        }
                    }
                );
            }

            function getRegions() {
                let value = $("#geo_country").val();
                AjaxCall(
                    "/get-regions-by-geozone",
                    {country: value},
                    res => {
                        let select = document.getElementById('geo_region');
                        select.innerText = null;
                        if (!res.error) {
                            var opt = document.createElement('option');
                            opt.value = res.data.id;
                            opt.innerHTML = res.data.name;
                            select.appendChild(opt);
                        }
                    }
                );
            }

            $("body").on("change", "#country", function () {
                getRegionsPackage();
            });

            $("body").on("change", "#geo_country", function () {
                getRegions();
            });
        })
    </script>
@stop