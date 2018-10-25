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
                    <li class="active"><a data-toggle="tab" href="#basic">Basic Details</a></li>
                    <li><a data-toggle="tab" href="#media">Media</a></li>
                    <li><a data-toggle="tab" href="#attributes">Technical</a></li>
                    <li><a data-toggle="tab" href="#logistic">Logistic</a></li>
                    <li><a data-toggle="tab" href="#variations">Variations</a></li>
                </ul>
            </div>

            <!-- /.col -->
            {!! Form::model($model,['class'=>'form-horizontal','url' => route('admin_stock_save')]) !!}
            {!! Form::hidden('id',null) !!}
            <div class="col-md-12">
                {!! Form::submit('Save',['class' => 'btn btn-primary pull-right']) !!}
            </div>
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="basic" class="tab-pane fade in active basic-details-tab ">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="basic-center basic-wall">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @if(count(get_languages()))
                                                    <ul class="nav nav-tabs">
                                                        @foreach(get_languages() as $language)
                                                            <li class="@if($loop->first) active @endif"><a
                                                                        data-toggle="tab"
                                                                        href="#{{ strtolower($language->code) }}">
                                                                    <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                                                </a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                <div class="tab-content">
                                                    @if(count(get_languages()))
                                                        @foreach(get_languages() as $language)
                                                            <div id="{{ strtolower($language->code) }}"
                                                                 class="tab-pane fade  @if($loop->first) in active @endif">
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label"><span
                                                                                data-toggle="tooltip"
                                                                                title=""
                                                                                data-original-title="Attribute Name Title">Product Name</span></label>
                                                                    <div class="col-sm-10">
                                                                        {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label"><span
                                                                                data-toggle="tooltip"
                                                                                title=""
                                                                                data-original-title="Short Description">Short Description</span></label>
                                                                    <div class="col-sm-10">
                                                                        {!! Form::textarea('translatable['.strtolower($language->code).'][short_description]',get_translated($model,strtolower($language->code),'short_description'),['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label"><span
                                                                                data-toggle="tooltip"
                                                                                title=""
                                                                                data-original-title="Short Description">Long Description</span></label>
                                                                    <div class="col-sm-10">
                                                                        {!! Form::textarea('translatable['.strtolower($language->code).'][long_description]',get_translated($model,strtolower($language->code),'long_description'),['class'=>'form-control tinyMcArea','cols'=>30,'rows'=>10]) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="product_id" class="control-label col-sm-4">Product
                                                            Type</label>
                                                        <div class="col-sm-8">
                                                            {!! Form::select('type',['' => 'Select type'] + \App\Models\Stock::TYPES, null,
                                                            ['class' => 'form-control select-stock-type']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="sku" class="control-label col-sm-4">SKU</label>
                                                        <div class="col-sm-8">
                                                            <div id="stock-sku">{{ @$model->sku }}</div>
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
                                                            {!! media_button('image',$model) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="media" class="tab-pane basic-details-tab media-new-tab fade ">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list">
                                            <ul class="nav nav-tabs media-list">
                                                <li><a data-toggle="tab" href="#mediaotherimage">Other images</a></li>
                                                <li class="active"><a data-toggle="tab" href="#mediavideos">Videos</a>
                                                <li><a data-toggle="tab" href="#mediaposters">Posters</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="basic-center basic-wall">
                                        <div class="tab-content">
                                            <div id="mediaotherimage" class="tab-pane fade ">
                                                {!! media_button('other_images',$model,true) !!}
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
                                                        @if(isset($model->videos) && $model->videos && count($model->videos))
                                                            @foreach($model->videos as $video)
                                                                <div class="video-single-item" style="display: flex">
                                                                    <iframe width="200" height="200" src="https://www.youtube.com/embed/{{ $video }}">
                                                                    </iframe><div><button class="btn btn-danger remove-video-single-item">
                                                                    <i class="fa fa-trash"></i></button></div><input type="hidden" name="videos[]" value="{{ $video }}"> </div>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>

                                            </div>
                                            <div id="mediaposters" class="tab-pane fade ">
                                                {!! media_button('posters',$model,true) !!}
                                            </div>
                                        </div>
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
                                                @if(isset($attrs) && count($attrs))
                                                    @foreach($attrs as $attribute)
                                                        <li style="display: flex"
                                                            data-option-container="{!! $attribute->id !!}"
                                                            data-id="{!! $attribute->id !!}"
                                                            class="option-elm-attributes"><a
                                                                    href="#">{!! $attribute->name !!}</a>
                                                            <div class="buttons">
                                                                <a href="javascript:void(0)"
                                                                   class="btn btn-sm all-option-add-variations btn-success"><i
                                                                            class="fa fa-money"></i></a>
                                                                <a href="javascript:void(0)"
                                                                   class="remove-all-attributes btn btn-sm btn-danger"><i
                                                                            class="fa fa-trash"></i></a>
                                                            </div>
                                                            <input type="hidden" name="attributes[{!! $attribute->id !!}][attributes_id]"
                                                                   value="{!! $attribute->id !!}">
                                                            <input type="hidden" class="is-shared-attributes" name="attributes[{!! $attribute->id !!}][is_shared]"
                                                            value="{!! $attribute->is_shared !!}">      
                                                        </li>
                                                    @endforeach
                                                @endif
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
                                            @if(isset($attrs) && count($attrs))
                                                @foreach($attrs as $attribute)
                                                    <div style="height: 50px" data-attr-id="{{$attribute->id}}"
                                                         class="attributes-container-{{$attribute->id}} main-attr-container">
                                                        <input data-id="{{$attribute->id}}"
                                                               class="attributes-item-input-{{$attribute->id}}"
                                                               value="{{ implode(',',$attribute->children->pluck('name')->all()) }}">
                                                        <input type="hidden" class="input-items-value" name="options[{{$attribute->id}}]"
                                                               value="{{ implode(',',$attribute->children->pluck('id')->all()) }}">
                                                    </div>
                                                @endforeach
                                            @endif
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
                                                                           name=""
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
                                                                           name=""
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
                                                                           name=""
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
                                                                           name=""
                                                                           id="packaging_weight" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
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
                                                <a href="javascript:void(0)"
                                                   class="btn btn-info btn-block get-variation"><i
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
            {!! Form::close() !!}
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
    <script src="/public/js/custom/stock.js?v=" .rand(111,999)></script>
    <script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.js"></script>
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script>
        $(document).ready(function () {
            function guid() {
                return "ss".replace(/s/g, s4);
            }

            function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(7)
                    .substring(1);
            }

            $("body").on('change', '.select-stock-type', function () {
                var type = $(this).val();
                var generatedString = type + '-' + guid();
                $('#sku').val(generatedString);
                $('#stock-sku').html(generatedString);
            })
        });
    </script>
@stop