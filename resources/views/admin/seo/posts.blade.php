@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item active">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_seo') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Posts</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_seo_stocks') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Stocks</a>
            </li>
        </ul>
        <div class="" id="myTabContent">

        </div>
    </div>
    <div class="container-fluid">
        {!! Form::model($general) !!}
        <div class="pull-right"><button type="submit" class="btn btn-success">Save</button></div>
        <div class="seo-page-general">
            <div class="panel panel-default mt-20">
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

            <div class="panel panel-default mt-20">
                <div class="panel-heading">FB</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-facebook-title" class="col-md-2 col-xs-12">Facebook Title</label>
                            <div class="col-md-5 col-xs-12">
                                {!! Form::text('fb[go:title]',isset($fb['go:title'])?$fb['go:title']:null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-facebook-desc" class="col-md-2 col-xs-12">Facebook Description</label>
                            <div class="col-md-5 col-xs-12">
                                {!! Form::text('fb[go:description]',isset($fb['go:description'])?$fb['go:description']:null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-facebook-image" class="col-md-2 col-xs-12">Facebook Image</label>
                            <div class="col-md-5 col-xs-12">
                                {!! Form::text('fb[go:image]',isset($fb['go:image'])?$fb['go:image']:null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default mt-20">
                <div class="panel-heading">Twitter</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-twitter-title" class="col-md-2 col-xs-12">Twitter Title</label>
                            <div class="col-md-5 col-xs-12">
                                {!! Form::text('twitter[go:title]',isset($twitter['go:title'])?$twitter['go:title']:null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-twitter-desc" class="col-md-2 col-xs-12">Twitter Description</label>
                            <div class="col-md-5 col-xs-12">
                                {!! Form::text('twitter[go:description]',isset($twitter['go:description'])?$twitter['go:description']:null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-twitter-image" class="col-md-2 col-xs-12">Twitter Image</label>
                            <div class="col-md-5 col-xs-12">
                                {!! Form::text('twitter[go:image]',isset($twitter['go:image'])?$twitter['go:image']:null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>


    @stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop