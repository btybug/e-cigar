@extends('layouts.admin')
@section('content-header')
<div class="list-tabs-head">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
        <li><a data-toggle="tab" href="#menu1">Price</a></li>
        <li><a data-toggle="tab" href="#menu2">Tax& shippings</a></li>
        <li><a data-toggle="tab" href="#menu3">Related & Bundles</a></li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <form action="">
                <div class="text-right btn-save">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="row">
                                <label class="col-sm-3">Info</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="info">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>


                </div>
            </form>
        </div>
        <div id="menu1" class="tab-pane fade">
            <form action="">
                <div class="text-right btn-save">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="row">
                                <label class="col-sm-3">Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Price">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>


                </div>
            </form>
        </div>
        <div id="menu2" class="tab-pane fade">
            <form action="">
                <div class="text-right btn-save">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="row">
                                <label class="col-sm-3">Tax& shippings</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Tax& shippings">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>


                </div>
            </form>
        </div>
        <div id="menu3" class="tab-pane fade">
            <form action="">
                <div class="text-right btn-save">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="row">
                                <label class="col-sm-3">Related & Bundles</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Related & Bundles">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('content')

@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css')}}">
@stop
@section('js')
@stop