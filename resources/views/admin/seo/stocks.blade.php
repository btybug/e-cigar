@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item ">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_seo') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Posts</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_seo_stocks') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Stocks</a>
            </li>
        </ul>
        <div class="" id="myTabContent">

        </div>
    </div>
    @stop
