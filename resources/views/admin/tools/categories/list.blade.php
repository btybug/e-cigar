@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

        <div class="payment_gateways_tab w-100">
            <h2>Categories</h2>
            <ul class="list_paymant">

                <li class="item">
                    <div class="chek-title">
                        <label for="stripe_paymant"  class="title font-weight-bold">Notifications</label>
                    </div>
                    @ok('admin_store_categories')<a href="{!! route('admin_store_categories','notifications') !!} " class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i></a>@endok
                </li>
                <li class="item">
                    <div class="chek-title">
                        <label for="stripe_paymant"  class="title font-weight-bold">Offers</label>
                    </div>
                    @ok('admin_store_categories')<a href="{!! route('admin_store_categories','offers') !!} " class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i></a>@endok
                </li>

                <li class="item">
                    <div class="chek-title">
                        <label for="stripe_paymant"  class="title font-weight-bold">Special Filters</label>
                    </div>
                    @ok('admin_store_categories')<a href="{!! route('admin_store_categories','special_filter') !!} " class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i></a>@endok
                </li>

                <li class="item">
                    <div class="chek-title">
                        <label for="stripe_paymant"  class="title font-weight-bold">Product downloads</label>
                    </div>
                    @ok('admin_store_categories')<a href="{!! route('admin_store_categories','downloads') !!} " class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i></a>@endok
                </li>
            </ul>
        </div>

@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
