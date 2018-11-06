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
        <div class="seo-page-general">
            <div class="panel panel-default mt-20">
                <div class="panel-heading">General</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-title" class="col-md-2 col-xs-12">Title</label>
                            <div class="col-md-5 col-xs-12">
                                <input id="seo-title" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-desc" class="col-md-2 col-xs-12">Description</label>
                            <div class="col-md-5 col-xs-12">
                                <input id="seo-desc" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-keywords" class="col-md-2 col-xs-12">Focus keywords</label>
                            <div class="col-md-5 col-xs-12">
                                <input id="seo-keywords" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-meta-robots" class="col-md-2 col-xs-12">Meta Robots</label>
                            <div class="col-md-5 col-xs-12">
                                <select name="" id="seo-meta-robots" class="form-control">
                                    <option value="">Index</option>
                                    <option value="">Noindex</option>
                                </select>
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
                                <input id="seo-facebook-title" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-facebook-desc" class="col-md-2 col-xs-12">Facebook Description</label>
                            <div class="col-md-5 col-xs-12">
                                <input id="seo-facebook-desc" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2 col-xs-12">Facebook Image</label>
                            <div class="col-md-5 col-xs-12">
                                <button class="btn btn-info">Image</button>
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
                                <input id="seo-twitter-title" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="seo-twitter-desc" class="col-md-2 col-xs-12">Twitter Description</label>
                            <div class="col-md-5 col-xs-12">
                                <input id="seo-twitter-desc" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2 col-xs-12">Twitter Image</label>
                            <div class="col-md-5 col-xs-12">
                                <button class="btn btn-info">Image</button>
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