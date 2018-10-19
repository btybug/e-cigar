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
                    <div class="chek-title">
                        <input id="cash_paymant" class="gateways_inp" type="checkbox">
                        <label for="cash_paymant" class="title">Cash Paymant</label>
                    </div>
                    <a href="{!! route('admin_payment_gateways_stripe') !!}" class="btn btn-sm btn-warning"><i class="fa fa-cogs"></i></a>
                </li>
                <li class="item">
                    <div class="chek-title">
                        <input id="paypal" type="checkbox" class="gateways_inp">
                        <label for="paypal" class="title">Paypal</label>
                    </div>
                    <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-cogs"></i></a>
                </li>
            </ul>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script>
        $('body').on('change','.payment_gateways_tab .list_paymant .item .gateways_inp',function () {
            if ($(this).is(':checked')) {
                $(this).closest('.item').addClass('active')
            }else {
                $(this).closest('.item').removeClass('active')
            }
        });

    </script>
@stop