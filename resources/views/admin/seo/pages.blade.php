@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item ">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_seo') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Posts</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_seo_stocks') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Stocks</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_seo_pages') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Pages</a>
            </li>
        </ul>
        <div class="" id="myTabContent">

        </div>
    </div>
    <div class="container-fluid">

    </div>


@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop