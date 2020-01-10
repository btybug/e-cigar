@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " id="info-tab" href="{!! route('admin_stock') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Stocks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_stock_offers') !!}" role="tab"
                       aria-controls="accounts" aria-selected="true" aria-expanded="true">Offers</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_stock_settings') !!}" role="tab"
                       aria-controls="accounts" aria-selected="true" aria-expanded="true">Settings</a>
                </li>
            </ul>
            <div class="tab-content w-100">
                <div class="card panel panel-default">
                    <div class="card-header panel-heading d-flex flex-wrap justify-content-between">
                        <h2 class="m-0">Settings</h2>
                    </div>
                    <div class="card-body panel-body">

                        <div class="card panel panel-default">
                            <div class="card-header panel-heading head-space-between">
                                <h2>{!! ucfirst(str_replace("_"," ",'stocks')) !!} Category</h2>
                                <div class="button-area text-right">
                                    <a class="btn btn-primary add-category" href="javascript:void(0)"><span class="icon-plus"><i class="fa fa-plus"></i></span>Add new</a>
                                </div>
                            </div>
                            <div class="card-body panel-body">
                                <div class="payment_gateways_tab w-100">
                                    <ul class="list_paymant">
                                        <li class="item">
                                            <div class="chek-title">

                                                <label for="cash_paymant" class="title font-weight-bold">Stocks</label>
                                            </div>
                                            @ok('admin_stock_categories')<a href="{!! route('admin_stock_categories','stocks') !!}" class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i></a>@endok
                                        </li>
                                        <li class="item">
                                            <div class="chek-title">
                                                <label for="stripe_paymant"  class="title font-weight-bold">Offers</label>
                                            </div>
                                            @ok('admin_stock_categories')<a href="{!! route('admin_stock_categories','offers') !!} " class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i></a>@endok
                                        </li>

                                        <li class="item">
                                            <div class="chek-title">
                                                <label for="stripe_paymant"  class="title font-weight-bold">Product downloads</label>
                                            </div>
                                            @ok('admin_stock_categories')<a href="{!! route('admin_stock_categories','downloads') !!} " class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i></a>@endok
                                        </li>
                                    </ul>
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
