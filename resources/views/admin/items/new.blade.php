@extends('layouts.admin')
@section('content')

    <div class="content main-content">
        <ul class="nav nav-tabs admin-profile-left">
            <li class="active"><a data-toggle="tab" href="#info">Info</a></li>
        </ul>
        <div class="tab-content">
            <div id="info" class="tab-pane fade in active media-new-tab basic-details-tab">
                {!! Form::model($model,['class'=>'form-horizontal']) !!}
                <div class="form-group pull-right">
                    <div class="row">
                        <label for="feature_image"
                               class="control-label col-sm-4"></label>
                        <div class="col-sm-8">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid p-25">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="basic-left basic-wall h-100">
                                <div class="all-list">
                                    <ul class="nav nav-tabs media-list">
                                        <li class="active"><a data-toggle="tab" href="#basics">Basics</a></li>
                                        <li><a data-toggle="tab" href="#videos">Videos</a>
                                        <li><a data-toggle="tab" href="#images">Images</a>
                                        <li><a data-toggle="tab" href="#logistic">Logistic</a></li>
                                        <li><a data-toggle="tab" href="#downloads">Downloads</a></li>
                                        <li><a data-toggle="tab" href="#settings">Settings</a></li>
                                        <li><a data-toggle="tab" href="#management">Management</a></li>
                                        <li><a data-toggle="tab" href="#specifications">Specifications</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="basic-center basic-wall">
                                <div class="tab-content media-list-tab-content">
                                    <div id="basics" class="tab-pane fade in active">
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
                                                        SKU</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('sku', null,
                                                        ['class' => 'form-control']) !!}
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
                                    <div id="videos" class="tab-pane fade">
                                        <div class="media-videos">
                                            <div class="input-group " style="display: flex">
                                                <input type="text" class="form-control video-url-link"
                                                       placeholder="Video Url" aria-label="Video Url"
                                                       aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary add-video-url"
                                                            type="button">Add Link
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="media-videos-preview" style="display: flex">
                                                @if(isset($model->videos) && $model->videos && count($model->videos))
                                                    @foreach($model->videos as $video)
                                                        <div class="video-single-item" style="display: flex">
                                                            <iframe width="200" height="200"
                                                                    src="https://www.youtube.com/embed/{{ $video }}">
                                                            </iframe>
                                                            <div>
                                                                <button class="btn btn-danger remove-video-single-item">
                                                                    <i class="fa fa-trash"></i></button>
                                                            </div>
                                                            <input type="hidden" name="videos[]"
                                                                   value="{{ $video }}"></div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div id="images" class="tab-pane fade">
                                        {!! media_button('other_images',$model,true) !!}
                                    </div>
                                    <div id="logistic" class="tab-pane basic-details-tab stock-new-tab fade">
                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <fieldset>
                                                                    <legend>Packaging Size</legend>
                                                                    <div class="form-group">
                                                                        <label for="packaging_length"
                                                                               class=" col-sm-2">Length</label>
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control"
                                                                                   name=""
                                                                                   id="packaging_length" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="packaging_width"
                                                                               class="col-sm-2">Width</label>
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control"
                                                                                   name=""
                                                                                   id="packaging_width" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="packaging_height"
                                                                               class="col-sm-2">Height</label>
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control"
                                                                                   name=""
                                                                                   id="packaging_height" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="packaging_weight"
                                                                               class="col-sm-2">Weight</label>
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control"
                                                                                   name=""
                                                                                   id="packaging_weight" type="text">
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                    </div>
                                    <div id="downloads" class="tab-pane fade">
                                        {!! media_button('downloads',$model,true) !!}
                                    </div>
                                    <div id="settings" class="tab-pane fade"></div>
                                    <div id="management" class="tab-pane fade">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-sm-12 clearfix">
                                                        <h3 class="pull-left m-0">All Suppliers</h3>
                                                        <button type="button" class="btn btn-primary pull-right select-stickers"><i class="fa fa-plus fa-sm mr-10"></i>Add supplier</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="d-flex">
                                                    <div class="inventory-attr-item">
                                                        <h4 class="text">Supplier 1</h4>
                                                        <button type="button" class="btn btn-danger remove-all-attributes"><i class="fa fa-close"></i></button>
                                                    </div>
                                                    <div class="inventory-attr-item">
                                                        <h4 class="text">Supplier 2</h4>
                                                        <button type="button" class="btn btn-danger remove-all-attributes"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-sm-12 clearfix">
                                                        <h3 class="pull-left m-0">Sale Chanels</h3>
                                                        <button type="button" class="btn btn-primary pull-right select-stickers"><i class="fa fa-plus fa-sm mr-10"></i>Add sale chanel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="d-flex">
                                                    <div class="inventory-attr-item">
                                                        <h4 class="text">Sale Chanel 1</h4>
                                                        <button type="button" class="btn btn-danger remove-all-attributes"><i class="fa fa-close"></i></button>
                                                    </div>
                                                    <div class="inventory-attr-item">
                                                        <h4 class="text">Sale Chanel 2</h4>
                                                        <button type="button" class="btn btn-danger remove-all-attributes"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="specifications" class="tab-pane fade">
                                        <div class="panel panel-default">
                                            <div class="panel-body" id="v-option-form">
                                                    <table class="table table-responsive table--store-settings">
                                                        <thead>
                                                        <tr class="bg-my-light-pink">
                                                            <th>Attributes</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody class="v-options-list">
                                                        @include("admin.inventory._partials.variation_option_item")
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="add-new-ship-filed-container">
                                                            <td colspan="4" class="text-right">
                                                                <button type="button" class="btn btn-primary"><i
                                                                            class="fa fa-plus-circle add-new-v-option"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script type="template" id="add-more-video">
        <div class="input-group " style="display: flex">
            <input type="text" class="form-control video-url-link"
                   placeholder="Video Url" name="video" aria-label="Video Url"
                   aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-danger remove-vido" type="button"><i class="fa fa-trash"></i></button>
            </div>
        </div>
</script>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">

@stop
@section('js')
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="/public/js/custom/stock.js?v=" .rand(111,999)></script>
    <script>
        $(function () {
            $("body").on('click', '.add-new-v-option', function () {
                let $this = $(this);
                AjaxCall("/admin/inventory/stock/get-option-by-id", {id: null}, function (res) {
                    if (!res.error) {
                        $this.closest("table").find(".v-options-list").append(res.html);
                        $(".tag-input-v").tagsinput();
                    }
                });
            });
            $("body").on('click', '.get-all-extra-tab-event', function () {
                AjaxCall("/admin/inventory/stock/get-option-by-id", {id: null}, function (res) {
                    if (!res.error) {
                        $("#v-option-form")[0].reset();
                        $("#v-option-form .v-options-list").html(res.html);
                        $(".tag-input-v").tagsinput();
                        $("#myExtraTabModal").modal();
                    }
                });
            })

            $("body").on('click', '.save-v-option', function () {
                var data = $("#v-option-form").serialize();
                AjaxCall("/admin/inventory/stock/add-extra-option", data, function (res) {
                    if (!res.error) {
                        $(".get-all-extra-tab").append(res.html);
                        $("#myExtraTabModal").modal('hide');
                        $("#v-option-form")[0].reset();
                    }
                });
            });
        })

    </script>
@stop
