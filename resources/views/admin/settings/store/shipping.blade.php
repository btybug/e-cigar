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
            <li class="nav-item active">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_settings_shipping') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Shipping</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_payment_gateways') !!}" role="tab"
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
        </ul>
        <div class="" id="myTabContent">
            <div class="" aria-labelledby="general-tab">
                <div id="content">
                    <div class="page-header">
                        <div class="container-fluid">
                            <div class="pull-right">
                                <a href="{!! route('admin_store_shipping_zones_new') !!}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-geo-zone').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                            </div>
                            <h1>Geo Zones</h1>
                            <ul class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Geo Zones</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-list"></i> Geo Zone List</h3>
                            </div>
                            <div class="panel-body">
                                <form action="#" method="post" enctype="multipart/form-data" id="form-geo-zone">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <td style="width: 1px;" class="text-center">
                                                    <input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                                                <td class="text-left">
                                                    <a href="#" class="asc">Geo Zone Name</a>
                                                </td>
                                                <td class="text-left">
                                                    <a href="#">Description</a>
                                                </td>
                                                <td class="text-left">
                                                    <a href="#">Country</a>
                                                </td>
                                                <td class="text-left">
                                                    <a href="#">Region</a>
                                                </td>
                                                <td class="text-right">Action</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($zones))
                                                @foreach($zones as $zone)
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="selected[]" value="4">
                                                        </td>
                                                        <td class="text-left">{!! $zone->name !!}</td>
                                                        <td class="text-left">{!! $zone->description !!}</td>
                                                        <td class="text-left">{!! $zone->country !!}</td>
                                                        <td class="text-left">{!! $zone->region !!}</td>
                                                        <td class="text-right">
                                                            <a href="{!! route('admin_store_shipping_zones_edit',$zone->id) !!}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-sm-6 text-left"></div>
                                    <div class="col-sm-6 text-right">Showing 1 to 2 of 2 (1 Pages)</div>
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