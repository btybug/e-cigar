@extends('layouts.admin')
@section('content')
    <section class="content-top">
        <div class="row m-0">
            <div class="col-md-4">
                <input type="text" placeholder="Product Name" class="form-control" value="{{ @$model->name }}" readonly>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder="SKU" class="form-control" value="{{ @$model->sku }}" readonly>
            </div>
            <div class="col-md-4">
                {!! Form::submit('Save',['class' => 'btn btn-info pull-right']) !!}
            </div>
        </div>
    </section>
    <div class="content main-content">
        <ul class="nav nav-tabs admin-profile-left">
            <li class="active"><a data-toggle="tab" href="#info">Info</a></li>
            <li><a data-toggle="tab" href="#purchases">Purchases</a></li>
            <li><a data-toggle="tab" href="#sales">Sales</a></li>
        </ul>
        <div class="tab-content">
            <div id="info" class="tab-pane basic-details-tab info-new-tab fade active in">
                            <div class="row d-flex">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall h-100">
                                        <div class="all-list">
                                            <ul class="nav nav-tabs info-list">
                                                <li class="active"><a data-toggle="tab" href="#innerBasics">Basics</a></li>
                                                <li><a data-toggle="tab" href="#mediavideos">Videos</a>
                                                <li><a data-toggle="tab" href="#mediastickers">Stickers</a></li>
                                                <li><a data-toggle="tab" href="#mediarelatedproducts">Related
                                                        Products</a></li>
                                                <li><a data-toggle="tab" href="#mediaspecifications">Specifications</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="basic-center basic-wall scrollbar_media_tab">
                                        <div class="tab-content">
                                            <div id="innerBasics" class="tab-pane fade in active">
                                                    <form class="form-horizontal">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-2 control-label"><span data-toggle="tooltip" title="" data-original-title="Attribute Name Title">Product Name</span></label>
                                                            <div class="col-sm-10">
                                                                <input id="name" class="form-control" type="text" value="Apple Hit">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="shortDescr" class="col-sm-2 control-label"><span data-toggle="tooltip" title="" data-original-title="Short Description">Short Description</span></label>
                                                            <div class="col-sm-10">
                                                                <textarea id="shortDescr" class="form-control" cols="30" rows="2">Short description for apple hits</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="longDescr" class="col-sm-2 control-label"><span data-toggle="tooltip" title="" data-original-title="Long Description">Long Description</span></label>
                                                            <div id="longDescr" class="col-sm-10">
                                                                <textarea id="longDescr" class="form-control tinyMcArea" cols="30" rows="10">long description for apple hits</textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



            </div>
            <div id="purchases" class="tabe-pane fade"></div>
            <div id="sales" class="tabe-pane fade"></div>
        </div>
    </div>


@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop