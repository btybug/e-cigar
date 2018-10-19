@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <section class="content-header">
        <h1> Admin Profile </h1>
        <ol class="breadcrumb">
            <li><a href="http://demo0.laravelcommerce.com/admin/dashboard/this_month"><i class="fa fa-dashboard"></i>
                    Dashboard</a></li>
            <li class="active">Admin Profile</li>
        </ol>
    </section>

    <section class="content stock-page">

        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary mar-0">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="http://demo0.laravelcommerce.com/resources/views/admin/images/admin_profile/1539074891.42792796_2710973195795309_228747741981835264_n.png"
                             alt="Václav profile picture">

                        <h3 class="profile-username text-center">Václav Kutiš</h3>

                        <p class="text-muted text-center">Administrator</p>

                        <!-- <ul class="list-group list-group-unbordered">
                           <li class="list-group-item">
                             <b>Followers</b> <a class="pull-right">1,322</a>
                           </li>
                           <li class="list-group-item">
                             <b>Following</b> <a class="pull-right">543</a>
                           </li>
                           <li class="list-group-item">
                             <b>Friends</b> <a class="pull-right">13,287</a>
                           </li>
                         </ul>

                         <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <div class="col-md-12">
                <ul class="nav nav-tabs admin-profile-left">
                    <li><a data-toggle="tab" href="#basic">Basic Details</a></li>
                    <li class="active"><a data-toggle="tab" href="#media">Media</a></li>
                    <li><a data-toggle="tab" href="#attributes">Technical</a></li>
                    <li><a data-toggle="tab" href="#logistic">Logistic</a></li>
                    <li><a data-toggle="tab" href="#variations">Variations</a></li>
                </ul>
            </div>

            <!-- /.col -->
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="basic" class="tab-pane fade basic-details-tab ">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="basic-center basic-wall">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="" class="form-horizontal">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="product_name" class="control-label col-sm-4">Product
                                                                name</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" name="product_name"
                                                                       id="product_name" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="product_id" class="control-label col-sm-4">Product
                                                                Type</label>
                                                            <div class="col-sm-8">
                                                                {!! Form::select('type',['' => 'Select type'],null,['class' => 'form-control select-stock-type']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="sku" class="control-label col-sm-4">SKU</label>
                                                            <div class="col-sm-8">
                                                                <div id="stock-sku"></div>
                                                                {!! Form::hidden('sku',null,['id' => 'sku']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="sku"
                                                                   class="control-label col-sm-4">Barcode</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-control">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="feature_image"
                                                                   class="control-label col-sm-4">Feature image</label>
                                                            <div class="col-sm-8">
                                                                <button class="btn btn-sm btn-primary">Upload</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="media" class="tab-pane basic-details-tab media-new-tab fade in active">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list">
                                            <ul class="nav nav-tabs media-list">
                                                <li><a data-toggle="tab" href="#mediaotherimage">Other images</a></li>
                                                <li class="active"><a data-toggle="tab" href="#mediavideos">Videos</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="basic-center basic-wall">
                                        <div class="tab-content">
                                            <div id="mediaotherimage" class="tab-pane fade ">
                                                Other Image
                                            </div>
                                            <div id="mediavideos" class="tab-pane fade in active">
                                                <div class="media-videos">
                                                    <div class="input-group " style="display: flex">
                                                        <input type="text" class="form-control video-url-link"
                                                               placeholder="Video Url" aria-label="Video Url"
                                                               aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info add-video-url"
                                                                    type="button">Add Link
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="media-videos-preview" style="display: flex">


                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="basic-right basic-wall">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="attributes" class="tab-pane basic-details-tab  fade attributes_tab">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list-attributes">
                                            <ul class="get-all-attributes-tab">

                                            </ul>
                                        </div>
                                        <div class="button-add text-center">
                                            <a href="javascript:void(0)"
                                               class="btn btn-info btn-block get-all-attributes-tab-event"><i
                                                        class="fa fa-plus"></i>Add new
                                                option</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="basic-center basic-wall">
                                        <ul class="choset-attributes">


                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="logistic" class="tab-pane basic-details-tab stock-new-tab fade">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="basic-left basic-wall">
                                        <form action="" class="form-horizontal">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset>
                                                            <legend>Packaging Size</legend>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="packaging_length"
                                                                           class="control-label col-sm-4">Length</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-control"
                                                                               name="packaging_length"
                                                                               id="packaging_length" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="packaging_width"
                                                                           class="control-label col-sm-4">Width</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-control"
                                                                               name="packaging_width"
                                                                               id="packaging_width" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="packaging_height"
                                                                           class="control-label col-sm-4">Height</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-control"
                                                                               name="packaging_height"
                                                                               id="packaging_height" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="packaging_weight"
                                                                           class="control-label col-sm-4">Weight</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-control"
                                                                               name="packaging_weight"
                                                                               id="packaging_weight" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="basic-right basic-wall logistic-right">
                                        <div class="head">
                                            <h4>Order Request</h4>
                                        </div>
                                        <div class="logistic-right-content">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="logistic-quantity"
                                                           class="control-label col-sm-4">Quantity</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="logistic-quantity"
                                                               id="logistic-quantity" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sumbit-logistic text-right">
                                            <input type="submit" value="Submit" class="btn btn-info">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="variations" class="tab-pane basic-details-tab stock-variations-tab fade">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list-attrs" style="min-height:300px;">
                                            <!-- <ul class="attribute-list-items">

                                            </ul> -->
                                        </div>
                                        <div class="button-add text-center">
                                            <div class="col-md-6">
                                                <a href="javascript:void(0)" class="btn btn-info btn-block get-variation"><i
                                                            class="fa fa-plus"></i>More
                                                    option</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="javascript:void(0)"
                                                   class="btn btn-warning btn-block get-all-variations"><i
                                                            class="fa fa-plus"></i>Link all
                                                    option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 variation-settings">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>

    <div class="modal fade" id="attributesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Options</h4>
                </div>
                <div class="modal-body">
                    <div class="all-list">
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.css">
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script src="/public/js/custom/stock.js"></script>
    <script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.js"></script>
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
@stop