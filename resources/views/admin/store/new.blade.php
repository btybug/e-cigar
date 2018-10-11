@extends('layouts.admin')
@section('content-header')

    <div class="list-tabs-head">
        <div class="head">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
                <li><a data-toggle="tab" href="#menu1">Price</a></li>
                <li><a data-toggle="tab" href="#menu2">Tax& shippings</a></li>
                <li><a data-toggle="tab" href="#menu3">Related & Bundles</a></li>
            </ul>
            <div id="flag-select"
                 data-input-name="country"
                 data-selected-country="GB"
                 data-button-size="btn-sm"
                 data-button-type="btn-warning"
                 data-scrollable="true"
                 data-scrollable-height="250px">

            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="tab-content tabs_content">
        <div id="home" class="tab-pane  fade in active">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3">Info</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="info">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Short Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control"  name="" id="" cols="30" rows="2" placeholder="Description"></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Long Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control"  name="" id="" cols="30" rows="10" placeholder="Description"></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Featured image</label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success">Image</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Gallery images</label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success">Image</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
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
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
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
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
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
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/flagstrap/css/flags.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script src="{{asset('public/admin_theme/flagstrap/js/jquery.flagstrap.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#flag-select').flagStrap({
                countries: {
                    "AM": "Armenia",
                    "GB": "United Kingdom",
                    "RU": "Russia"
                },
                buttonSize: "btn-sm",
                buttonType: "btn-info",
                labelMargin: "10px",
                scrollable: false,
                scrollableHeight: "350px"
            });
        });

    </script>
@stop