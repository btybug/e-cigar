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
    <div class="seo-pages mt-20">
        <div class="container-fluid">
            <div class="row m-0">
                <button class="btn btn-info pull-right">Save</button>
            </div>
            <div class="row mt-20">
                <div class="col-md-3">
                    <div class="seo-pages-left-list">
                        <ul>
                            <li>
                                <a href="#" class="link">Item 1</a>
                            </li>
                            <li>
                                <a href="#" class="link">Item 2</a>
                                <ul>
                                    <li>
                                        <a href="#" class="sub-link">Sub Item 1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="sub-link">Sub Item 1</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="link">Item 1</a>
                            </li>
                            <li>
                                <a href="#" class="link">Item 3</a>
                                <ul>
                                    <li>
                                        <a href="#" class="sub-link">Sub Item 1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="sub-link">Sub Item 2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="sub-link">Sub Item 3</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">General</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="row">
                                    <label for="seo-title" class="col-md-2 col-xs-12">Title</label>
                                    <div class="col-md-5 col-xs-12">
                                        {!! Form::text('go:title',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="seo-desc" class="col-md-2 col-xs-12">Description</label>
                                    <div class="col-md-5 col-xs-12">
                                        {!! Form::text('go:description',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="seo-keywords" class="col-md-2 col-xs-12">Focus keywords</label>
                                    <div class="col-md-5 col-xs-12">
                                        {!! Form::text('go:keywords',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="seo-meta-robots" class="col-md-2 col-xs-12">Meta Robots</label>
                                    <div class="col-md-5 col-xs-12">
                                        {!! Form::select('robots',['1'=>'Index','0'=>'No Index'],isset($robot)?$robot->robots:null,['class'=>'form-control']) !!}

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