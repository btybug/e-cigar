@extends('layouts.admin')
@section('content')

    <div class="card panel panel-default">
        {!! Form::model($model,['class'=>'form-horizontal','url' => route('post_admin_items_new')]) !!}
        <div class="card-header panel-heading d-flex">
                <div class="col-md-8">
                    <h2 class="m-0">{{ ($model) ? $model->name : "Add new item" }}</h2>
                </div>

            <div class="col-md-4 d-flex">
                {!! Form::select('type',['simple' => 'Simple','bundle' => 'Bundle'],null,['class' => 'form-control','id' => 'selectItemType']) !!}
                <button class="btn btn-info ml-4" type="submit">Save</button>
            </div>
        </div>
        <div class="card-body panel-body">
            <div class="content main-content">
                <ul class="nav nav-tabs admin-profile-left">
                    <li class="nav-item" data-tab="info"><a class="nav-link active" data-toggle="tab" href="#info">Info</a></li>
                    <li class="nav-item @if($model == null || $model->type != 'bundle') hide @endif" data-tab="package"><a class="nav-link" data-toggle="tab" href="#package">Package</a></li>
                </ul>
                <div class="tab-content">
                    <div id="info" class="tab-pane fade in active show media-new-tab basic-details-tab">

                        {!! Form::hidden('id',null) !!}

                        <div class="row">
                            <div class="col-md-3">
                                <div class="basic-left basic-wall h-100">
                                    <div class="all-list">
                                        <ul class="nav nav-tabs media-list">
                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#basics">Basics</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#videos">Videos</a>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images">Images</a>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#logistic">Logistic</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#downloads">Downloads</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Settings</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#management">Management</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#specifications">Specifications</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="basic-center basic-wall">
                                    <div class="tab-content media-list-tab-content">
                                        <div id="basics" class="tab-pane fade in active show">
                                            @if(count(get_languages()))
                                                <ul class="nav nav-tabs">
                                                    @foreach(get_languages() as $language)
                                                        <li class="nav-item "><a class="nav-link @if($loop->first) active @endif"
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
                                                             class="tab-pane fade  @if($loop->first) in active show @endif">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 control-label col-form-label text-right"><span
                                                                            data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="Attribute Name Title">Product Name</span></label>
                                                                <div class="col-sm-10">
                                                                    {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 control-label col-form-label text-right"><span
                                                                            data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="Short Description">Short Description</span></label>
                                                                <div class="col-sm-10">
                                                                    {!! Form::textarea('translatable['.strtolower($language->code).'][short_description]',get_translated($model,strtolower($language->code),'short_description'),['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 control-label col-form-label text-right"><span
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
                                                    <label for="barcode" class="control-label col-sm-4 col-form-label text-right">Barcode</label>
                                                    @if(! count($barcodes))
                                                        <div class="col-sm-8">
                                                            <a href="{{route('admin_inventory_barcodes_new')}}">New Barcode</a>
                                                        </div>
                                                    @else
                                                        <div class="col-sm-8">
                                                            {!! Form::select('barcode_id', $barcodes,null,
                                                            ['class' => 'form-control','id' => 'barcode']) !!}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="product_id" class="control-label col-sm-4 col-form-label text-right">Product
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
                                                           class="control-label col-sm-4 col-form-label text-right">Feature image</label>
                                                    <div class="col-sm-8">
                                                        {!! media_button('image',$model) !!}
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="barcode" class="control-label col-sm-4 col-form-label text-right">Default price</label>

                                                        <div class="col-sm-8">
                                                            {!! Form::number('default_price', 0,['class' => 'form-control','step'=>0.1,'min'=>0]) !!}
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
                                                        <legend class="border-bottom">Packaging Size</legend>
                                                        <div class="form-group row">
                                                            <label for="packaging_length"
                                                                   class=" col-sm-2">Length</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control"
                                                                       name=""
                                                                       id="packaging_length" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="packaging_width"
                                                                   class="col-sm-2">Width</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control"
                                                                       name=""
                                                                       id="packaging_width" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="packaging_height"
                                                                   class="col-sm-2">Height</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control"
                                                                       name=""
                                                                       id="packaging_height" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
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
                                        <div id="settings" class="tab-pane fade">
                                            @if($model == null || $model->type != 'bundle')
                                                <div class="form-group row">
                                                    <label for="packaging_weight"
                                                           class="col-sm-2">Alert</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control"
                                                               name="alert"
                                                               id="packaging_weight" type="text">
                                                    </div>
                                                </div>
                                                @endif
                                        </div>
                                        <div id="management" class="tab-pane fade">
                                            <div class="card panel panel-default">
                                                <div class="card-header panel-heading">
                                                    <div class="row">
                                                        <div class="col-sm-12 clearfix">
                                                            <h3 class="pull-left m-0">All Suppliers</h3>
                                                            <button type="button" class="btn btn-primary pull-right select-suppliers"><i class="fa fa-plus fa-sm mr-10"></i>Add supplier</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body panel-body">
                                                    <div class="d-flex suppliers-block">
                                                        @if($model)
                                                            @foreach($model->suppliers as $supplier)
                                                                <div class="inventory-attr-item" data-id="{{ $supplier->id }}">
                                                                    <h4 class="text">{{ $supplier->name }}</h4>
                                                                    <button type="button" class="btn btn-danger remove-suppliers"><i class="fa fa-close"></i></button>
                                                                    <input type="hidden" name="suppliers[]" value="{{ $supplier->id }}" />
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="specifications" class="tab-pane fade">
                                            <div class="panel panel-default">
                                                <div class="panel-body" id="v-option-form">
                                                    <table class="table table--store-settings">
                                                        <thead>
                                                        <tr class="bg-my-light-pink">
                                                            <th>Attributes</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody class="v-options-list">
                                                        @if($model && $model->specifications)
                                                            @foreach($model->specifications()->whereNull('parent_id')->get() as $selected)
                                                                @include('admin.items._partials.specifications')
                                                            @endforeach
                                                        @endif
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="add-new-ship-filed-container">
                                                            <td colspan="4" class="text-right">
                                                                <button type="button" class="btn btn-primary add-specification_button"><i
                                                                        class="fa fa-plus-circle add-specification"></i>
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
                    <div id="package" data-tab="package" class="tab-pane fade media-new-tab package-details-tab @if($model == null || $model->type != 'bundle') hide @endif">
                        <div class="col-md-12">
                                <button class="btn btn-primary pull-right add-package-item"
                                        type="button">
                                    <i class="fa fa-plus"></i> Add new
                                </button>
                        </div>
                        <table class="table table-style table-bordered mt-2" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Items</th>
                                <th>Qty</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="package-variation-box">
                                @if($model && count($model->packages))
                                    @foreach($model->packages as $package)
                                        @include('admin.items._partials.package_item')
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
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

    <div class="modal fade" id="suppliersModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Suppliers</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <ul class="all-list modal-stickers--list">

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">

@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="/public/js/custom/stock.js?v=" .rand(111,999)></script>
    <script>
        $(function () {
            $("body").on('click', '.delete-v-option_button', function () {
                $(this).closest('tr').remove();
            });

            $("body").on('click', '.add-package-item', function () {
                AjaxCall(
                    "/admin/inventory/items/add-package",
                    {},
                    function (res) {
                        if (!res.error) {
                            $('.package-variation-box').append(res.html)
                        }
                    }
                );
            });

            function changeVariationOptions() {
                var list = $(".list-attrs-single-item");
                attributesJson = {};
                $(".get-all-attributes-tab")
                    .children()
                    .each(function () {
                        addAttributeToJSONNew($(this))
                    });

                list.each(function (i, e) {
                    var box = $(e).find('.variation-options-place');
                    var options = box.find('select');
                    box.empty();
                    var objData = {};
                    options.each(function (i, e) {
                        var attrId = $(e).data("attribute_id");
                        objData[attrId] = $(e).val();
                    });
                    var variation = $(e).data('variation');
                    AjaxCall(
                        "/admin/stock/render-variation-new-options",
                        {variation: variation, objData: objData, attributesJson: attributesJson},
                        function (res) {
                            if (!res.error) {
                                box.append(res.html)
                            }
                        }
                    );

                })
            }
            $(".tag-input-v").select2({ width: '100%' });

            $("body").on("change", ".tag-input-v", function (e) {
                changeVariationOptions()
            });

            $("body").on('change', '#selectItemType', function () {
                let value = $(this).val();
                if(value =='bundle'){
                    $("body").find('[data-tab="package"]').removeClass('hide');
                }else{
                    $("body").find('[data-tab="package"]').addClass('hide');

                    $("body").find('[data-tab="info"]').trigger('click');
                }
            });

            $("body").on('click', '.select-suppliers', function () {
                let arr = [];
                $(".suppliers-block")
                    .children()
                    .each(function () {
                        arr.push($(this).attr("data-id"));
                    });
                AjaxCall("/admin/inventory/suppliers/get-list", {arr:arr}, function (res) {
                    if (!res.error) {
                        $("#suppliersModal .modal-body .all-list").empty();
                        res.data.forEach(item => {
                            let html = `<li data-id="${item.id}" class="option-elm-modal"><a
                                                href="#">${item.name}
                                                </a> <a class="btn btn-primary add-related-event" data-name="${item.name}"
                                                data-id="${item.id}">ADD</a></li>`;
                            $("#suppliersModal .modal-body .all-list").append(html);
                        });
                        $("#suppliersModal").modal();
                    }
                });
            });

            $("body").on("click", ".add-related-event", function () {
                let id = $(this).data("id");
                let name = $(this).data("name");
                let html = ` <div class="inventory-attr-item" data-id="${id}">
                            <h4 class="text">${name}</h4>
                            <button type="button" class="btn btn-danger remove-suppliers"><i class="fa fa-close"></i></button>
                            <input type="hidden" name="suppliers[]" value="${id}" />
                        </div>`;
                $(".suppliers-block")
                    .append(html);
                $(this)
                    .parent()
                    .remove();
            });

            $("body").on("click", ".remove-suppliers", function() {
                $(this)
                    .closest(".inventory-attr-item")
                    .remove();
            });

            $("body").on('click', '.add-new-v-option', function () {
                let $this = $(this);
                AjaxCall("/admin/inventory/stock/get-option-by-id", {id: null}, function (res) {
                    if (!res.error) {
                        $this.closest("table").find(".v-options-list").append(res.html);
                        $(".tag-input-v").tagsinput();
                    }
                });
            });

            $("body").on('click', '.add-specification_button', function () {
                let $this = $(this);
                AjaxCall("/admin/inventory/items/get-specifications", {id: null}, function (res) {
                    if (!res.error) {
                        $this.closest("table").find(".v-options-list").append(res.html);
                        $(".tag-input-v").select2({ width: '100%' });
                    }
                });
            });

            $("body").on('change', '.select-specification', function () {
                var value = $(this).val();
                let vID = $(this).data('uid');
                if (value != '') {
                    AjaxCall("/admin/inventory/items/get-specifications", {id: value}, function (res) {
                        if (!res.error) {
                            $(".select-specification[data-uid=" + vID + "]").closest('.v-options-list-item').replaceWith(res.html);
                            $(".tag-input-v").select2({width: '100%'});
                        }
                    });
                }
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
