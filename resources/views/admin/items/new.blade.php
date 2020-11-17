@extends('layouts.admin')
@section('content')
    <div class="card panel panel-default border-0">
        {!! Form::model($model,['class'=>'form-horizontal','url' => route('post_admin_items_new')]) !!}
        <div class="card-header panel-heading d-flex">
                <div class="col-9 pr-0 pl-sm-3 pl-0">
                    <h2 class="m-0">{{ ($model) ? $model->name : "Add new item" }}</h2>
                </div>

            <div class="col-3 pr-sm-3 pr-0">
                <button class="btn btn-info ml-4 float-right" type="submit">Save</button>
            </div>
        </div>
        <div class="card-body panel-body item-edit-page--body">
            <div class="content main-content p-0">
{{--                <ul class="nav nav-tabs admin-profile-left">--}}
{{--                    <li class="nav-item" data-tab="info"><a class="nav-link active" data-toggle="tab" href="#info">Info</a></li>--}}

{{--                    <li class="nav-item @if(! $bundle) hide @endif" data-tab="package">--}}
{{--                        <a class="nav-link" data-toggle="tab" href="#package">Package</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
                <div class="tab-content">
                    <div id="info" class="tab-pane fade in active show media-new-tab basic-details-tab">

                        {!! Form::hidden('id',null) !!}
                        {!! Form::hidden('type',($bundle)?"bundle":"simple") !!}

                        <div class="row">
                            <div class="col-xl-3 col-4 pr-sm-3 pr-0">
                                <div class="basic-left basic-wall">
                                    <div class="all-list">
                                        <ul class="nav nav-tabs media-list">
                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#basics">Basics</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#media">Media</a>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#logistic">Logistic</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#downloads">Downloads</a></li>
{{--                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Settings</a></li>--}}
{{--                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#management">Management</a></li>--}}
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#specifications">Specifications</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-8">
                                <div class="basic-center basic-wall">
                                    <div class="tab-content media-list-tab-content">
                                        <div id="basics" class="tab-pane fade in active show">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="card mb-3">
                                                        <div class="card-header">
                                                            Basic Details
                                                        </div>
                                                        <div class="card-body">
                                                            @if(count(get_languages()))
                                                                <ul class="nav nav-tabs mb-3">
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
                                                                                <label class="col-xl-2 control-label col-form-label"><span
                                                                                        data-toggle="tooltip"
                                                                                        title=""
                                                                                        data-original-title="Attribute Name Title">Product Name</span></label>
                                                                                <div class="col-xl-10">
                                                                                    {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control product_name_for_barcode']) !!}
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-xl-2 control-label col-form-label"><span
                                                                                        data-toggle="tooltip"
                                                                                        title=""
                                                                                        data-original-title="Attribute Name Title">Short Name</span></label>
                                                                                <div class="col-xl-10">
                                                                                    {!! Form::text('translatable['.strtolower($language->code).'][short_name]',get_translated($model,strtolower($language->code),'short_name'),['class'=>'form-control']) !!}
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-xl-2 control-label col-form-label"><span
                                                                                        data-toggle="tooltip"
                                                                                        title=""
                                                                                        data-original-title="Short Description">Short Description</span></label>
                                                                                <div class="col-xl-10">
                                                                                    {!! Form::textarea('translatable['.strtolower($language->code).'][short_description]',get_translated($model,strtolower($language->code),'short_description'),['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-xl-2 control-label col-form-label"><span
                                                                                        data-toggle="tooltip"
                                                                                        title=""
                                                                                        data-original-title="Short Description">Long Description</span></label>
                                                                                <div class="col-xl-10">
                                                                                    {!! Form::textarea('translatable['.strtolower($language->code).'][long_description]',get_translated($model,strtolower($language->code),'long_description'),['class'=>'form-control tinyMcArea','cols'=>30,'rows'=>10]) !!}
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-xl-2 control-label col-form-label text-right"><span
                                                                                        data-toggle="tooltip"
                                                                                        title=""
                                                                                        data-original-title="what_is_content">What`s in box</span></label>
                                                                            <div class="col-xl-10">
                                                                                {!! Form::textarea('translatable['.strtolower($language->code).'][what_is_content]',get_translated($model,strtolower($language->code),'what_is_content'),['class'=>'form-control tinyMcArea','cols'=>30,'rows'=>10]) !!}
                                                                            </div>
                                                                        </div>

                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="row">
                                                                    <label for="feature_image"
                                                                           class="control-label col-sm-4 col-form-label text-right">What`s in box Image</label>
                                                                    <div class="col-sm-8">
                                                                        {!! media_button('what_is_image',$model) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="landing"
                                                                       class=" col-xl-2">Allow landing</label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::hidden('landing',0) !!}
                                                                    {!! Form::checkbox('landing',1,null,['class' => 'check-landing','id' => 'landing']) !!}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card mb-3">
                                                        <div class="card-header">
                                                            Connections
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="barcode" class="control-label col-lg-4 col-form-label">Barcode</label>

                                                                    <div class="col-lg-8">
                                                                        {!! Form::text('barcode', null,
                                                                        ['class' => 'form-control','id' => 'barcode']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="product_id" class="control-label col-lg-4 col-form-label">Product
                                                                        SKU</label>
                                                                    <div class="col-lg-8">
                                                                        {!! Form::text('sku', null,
                                                                        ['class' => 'form-control sku_for_barcode']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {!! Form::hidden('status',1) !!}

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-lg-4 control-label">Brands</label>
                                                                    <div class="col-sm-8">
                                                                        {!! Form::select('brand_id',[null=>'Select Brand']+$brands->pluck('name','id')->toArray(),null,['class'=>'form-control']) !!}

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="col-lg-4 control-label">Default Price</label>
                                                                    <div class="col-sm-8">
                                                                        {!! Form::number('default_price',null,['class' => 'form-control','min'=>0,'step' => 'any']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="media" class="tab-pane fade">
                                            {!! media_widget('image',$model, false, 'drive', null, 'Feature Image') !!}
                                            <div class="card panel panel-default mb-3 other_images-block">
                                                            <div class="card-header panel-heading clearfix">
                                                                <p class="d-inline-block">Extra Images</p>
                                                                <div class="col-sm-2 pull-right">
                                                                    <button type="button"
                                                                            class="btn btn-primary add-new-other_images-input">
                                                                        <i
                                                                            class="fa fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div
                                                                    class="form-group d-flex flex-wrap align-items-center other_images-group">

                                                                    @if($model && $model->other_images && count($model->other_images))
                                                                        @foreach($model->other_images as $key => $other_image)
                                                                            <div
                                                                                class="col-md-12 mb-5 d-flex flex-wrap other_images-item" data-key="other_images[{{ $key }}][url]">
                                                                                <div class="col-sm-11 p-0 d-flex">

                                                                                    <div class="input-group" style="width: 250px">
                                                                                        <div class="input-group-prepend">
                                                                                            {!! media_button("other_images[$key][image]",$other_image['image']) !!}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div style="width: 80%; margin-top: 40px">

                                                                                        <input type="hidden"
                                                                                               name="other_images[{{ $key }}][product_id]" value="null"
                                                                                               class="form-control product_id_hidden_js">

                                                                                        <div class="form-group row mt-3">
                                                                                            <label for="staticEmail"
                                                                                                   style="width: 70px">Url</label>
                                                                                            <div class="d-flex" style="width: calc(100% - 120px)">
                                                                                                <input type="text"
                                                                                                       name="other_images[{{ $key }}][url]" value="{{ $other_image['url'] }}"
                                                                                                       class="form-control url_feald mr-1">
                                                                                                <button type="button" class="btn btn-info select_product_for_url_js" data-key="other_images[{{ $key }}][url]">
                                                                                                    Select
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label for="staticEmail"
                                                                                                style="width: 70px">Tag</label>
                                                                                            <div  style="width: calc(100% - 120px)">
                                                                                                <input type="text"
                                                                                                       name="other_images[{{ $key }}][tags]" value="{{ $other_image['tags'] }}"
                                                                                                       class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label for="staticEmail"
                                                                                                style="width: 70px">Alt text</label>
                                                                                            <div style="width: calc(100% - 120px)">
                                                                                                <input type="text"
                                                                                                       name="other_images[{{ $key }}][alt]" value="{{ $other_image['alt'] }}"
                                                                                                       class="form-control alt_text">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-sm-1">
                                                                                    <button class="plus-icon remove-new-other_images-input btn btn-danger">
                                                                                        <i class="fa fa-minus"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card panel panel-default mb-3 banner-block">
                                                            <div class="card-header panel-heading clearfix">
                                                                <p class="d-inline-block">Banners</p>
                                                                <div class="col-sm-2 pull-right">
                                                                    <button type="button"
                                                                            class="btn btn-primary add-new-banner-input">
                                                                        <i
                                                                            class="fa fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div
                                                                    class="form-group d-flex flex-wrap align-items-center banner-group">

                                                                    @if($model && $model->banners && count($model->banners))
                                                                        @foreach($model->banners as $key => $banner)
                                                                            <div
                                                                                class="col-md-12 mb-2 d-flex flex-wrap banner-item" data-key="banners[{{ $key }}][product_id]">
                                                                                <div class="col-sm-11 p-0 d-flex">

                                                                                    <div class="input-group" style="width: 250px">
                                                                                        <div class="input-group-prepend">
                                                                                            {!! media_button("banners[$key][image]",$banner->image) !!}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div style="width: 80%; margin-top: 40px">
                                                                                        <input type="hidden"
                                                                                            name="banners[{{ $key }}][product_id]" value="null"
                                                                                            class="form-control product_id_hidden_js">

                                                                                        <div class="form-group row mt-3">
                                                                                            <label for="staticEmail"
                                                                                                style="width: 70px">Url</label>
                                                                                            <div class="d-flex" style="width: calc(100% - 120px)">
                                                                                                <input type="text"
                                                                                                    name="banners[{{ $key }}][url]" value="{{ $banner->url }}"
                                                                                                    class="form-control url_feald mr-1">
                                                                                                <button type="button" class="btn btn-info select_product_for_url_js" data-key="banners[{{ $key }}][product_id]">
                                                                                                    Select
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label for="staticEmail"
                                                                                                style="width: 70px">Tag</label>
                                                                                            <div class="d-flex" style="width: calc(100% - 120px)">
                                                                                                <input type="text"
                                                                                                    name="banners[{{ $key }}][tags]" value="{{ $banner->tags }}"
                                                                                                    class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label for="staticEmail"
                                                                                                style="width: 70px">Alt text</label>
                                                                                            <div class="d-flex" style="width: calc(100% - 120px)">
                                                                                                <input type="text"
                                                                                                    name="banners[{{ $key }}][alt]" value="{{ $banner->alt }}"
                                                                                                    class="form-control alt_text">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-sm-1">
                                                                                    <button class="plus-icon remove-new-banner-input btn btn-danger">
                                                                                        <i class="fa fa-minus"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>


{{--                                            <div class="card panel panel-default mb-3">--}}
{{--                                                <div class="card-header panel-heading">--}}
{{--                                                    <p class="pull-left mb-0">--}}
{{--                                                        <b data-toggle="tooltip" title="" data-original-title="Change featured image">Image</b>--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body stock-basic-future-photo-body-wrap">--}}
{{--                                                    {!! media_button('media',$model,true) !!}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            <div class="card panel panel-default mb-3">
                                                <div class="card-header panel-heading">
                                                    <p class="pull-left mb-0">
                                                        <b data-toggle="tooltip" title="" data-original-title="Change featured image">Videos</b>
                                                    </p>
                                                </div>
                                                <div class="card-body stock-basic-future-photo-body-wrap">
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
                                                        <div class="media-videos-preview" style="display: flex;flex-wrap: wrap">
                                                            @if(isset($model->videos) && $model->videos && count($model->videos))
                                                                @foreach($model->videos as $video)
                                                                    <div class="video-single-item" style="display: flex">
                                                                        <iframe width="200" height="200"
                                                                                src="https://www.youtube.com/embed/{{ $video->url }}">
                                                                        </iframe>
                                                                        <div>
                                                                            <button class="btn btn-danger remove-video-single-item">
                                                                                <i class="fa fa-trash"></i></button>
                                                                        </div>
                                                                        <input type="hidden" name="video[]"
                                                                               value="{{  $video->url }}"></div>
                                                                @endforeach
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div id="logistic" class="tab-pane basic-details-tab stock-new-tab fade">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card panel panel-default mb-3">
                                                        <div class="card-header panel-heading">
                                                            <div class="row">
                                                                <div class="col-sm-12 clearfix">
                                                                    <h3 class="pull-left m-0">All Suppliers</h3>
                                                                    <button type="button" class="btn btn-primary pull-right select-suppliers"><i class="fa fa-plus fa-sm mr-10"></i>Add supplier</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body panel-body">
                                                            <div class="d-flex flex-wrap suppliers-block">
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
                                                <div class="col-md-12">
                                                    <div class="card mb-3">
                                                        <div class="card-header">
                                                            Packaging Size
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label for="packaging_length"
                                                                       class=" col-xl-2">Length</label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::text('length',null,['class' => 'form-control']) !!}

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="packaging_width"
                                                                       class="col-xl-2">Width</label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::text('width',null,['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="packaging_height"
                                                                       class="col-xl-2">Height</label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::text('height',null,['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="packaging_weight"
                                                                       class="col-xl-2">Weight</label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::text('weight',null,['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card mb-3">
                                                        <div class="card-header">
                                                            Item size
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label for="packaging_length"
                                                                       class=" col-xl-2">Length</label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::text('item_length',null,['class' => 'form-control']) !!}

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="packaging_width"
                                                                       class="col-xl-2">Width</label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::text('item_width',null,['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="packaging_height"
                                                                       class="col-xl-2">Height</label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::text('item_height',null,['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="packaging_weight"
                                                                       class="col-xl-2">Weight</label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::text('item_weight',null,['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    @if($model == null || $model->type != 'bundle')
                                                        <div class="card">
                                                            <div class="card-header">
                                                                Alert
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                    <label for="packaging_weight"
                                                                           class="col-sm-2">Alert</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control"
                                                                               name="alert"
                                                                               id="packaging_weight" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div id="downloads" class="tab-pane fade">
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                    Barcode
                                                </div>
                                                <div class="card-body">
                                                    <div class="">
                                                        <div class="d-flex flex-wrap mb-5">
                                                            <label class="col-form-label mr-2">Select Manual downloads</label>
                                                            {!! Form::select('select_download',['' => 'Select']+$downloads,null,['class' =>'form-control select-download w-20']) !!}
                                                        </div>

                                                        <div class="manual-codes mb-5">
                                                            @if($model && $model->manual_codes)
                                                                @foreach($model->manual_codes as $key => $item)
                                                                    @if(isset($item['id']))
                                                                        @php
                                                                            $manual = \App\Models\Category::where('type', 'downloads')->whereNull('parent_id')->where('id',$item['id'])->first();
                                                                        @endphp
                                                                        @if($manual)
                                                                            <div class="row manual-code mt-5" data-id="{!! $manual->id !!}">
                                                                                {!! Form::hidden("manual_codes[$key][id]",$manual->id) !!}
                                                                                <div class="col-xl-3">
                                                                                    {!! $manual->name !!}
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    {!! media_button("manual_codes[$key][image]",$item['image']) !!}
                                                                                </div>
                                                                                <div class="col-xl-3">
                                                                                    <a class="btn btn-success" href="{{ route("admin_items_download_code",[$key,'manual',$model->id]) }}">Download</a>
                                                                                    <a class="btn btn-danger delete-manual-code" href="javascript:void(0)">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        @if($model && $model->barcode)
                                                            <div class="row mt-5">
                                                                <div class="col-xl-3">
                                                                    BARCODE
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    @if(strlen($model->barcode) == 13)
                                                                        <div class="printing_barcode"></div>
                                                                    @else
                                                                        Barcode is invalid, need to be 13 numbers
                                                                    @endif
                                                                </div>

                                                                <div class="col-xl-3">
                                                                    <a class="btn btn-secondary"  href="javascript:void(0)" id="print_barcode_item">Print barcode</a>

                                                                @if(strlen($model->barcode) == 13)
                                                                        <a class="btn btn-success" href="{{ route("admin_items_download_code",[$model->barcode,'barcode',($model)?$model->name: null]) }}">Download Barcode</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="qr-code card @if($model && $model->landing)@else d-none @endif">
                                                <div class="card-header">
                                                     QR code
                                                </div>
                                                <div class="card-body">
                                                    @if($model && $model->barcode)
                                                        @include("admin.items._partials.qr",['code' => $model->barcode])
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
{{--                                        <div id="settings" class="tab-pane fade">--}}
{{--                                            --}}
{{--                                        </div>--}}
{{--                                        <div id="management" class="tab-pane fade">--}}

{{--                                        </div>--}}
                                        <div id="specifications" class="tab-pane fade">
                                            <div class="card mb-3">
                                                <div class="card-header panel-heading d-flex justify-content-between align-items-center mb-2">
                                                    <h4>
                                                        Stickers
                                                    </h4>
                                                    <button type="button" class="btn btn-info select-stickers">
                                                        Select
                                                    </button>
                                                </div>
                                                <div class="card-body panel-body product-body">
                                                    <ul class="get-all-stickers-tab stickers--all--lists">
                                                        @if(isset($model) && $model->stickers && count($model->stickers))
                                                            @foreach($model->stickers()->orderBy('ordering','asc')->get() as $key => $sticker)
                                                                <li style="display: flex"
                                                                    data-id="{{ $sticker->id }}"
                                                                    class="option-elm-attributes">
                                                                    <a href="#"
                                                                       class="stick--link">{!! $sticker->name !!}</a>
                                                                    <div class="buttons">
                                                                        <a href="javascript:void(0)"
                                                                           class="remove-all-attributes btn btn-sm btn-danger">
                                                                            <i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                    <input type="hidden" name="stickers[{{$key}}][id]"
                                                                           value="{{ $sticker->id }}">
                                                                    <input type="hidden" class="sticker-ordering" name="stickers[{{ $key }}][ordering]"
                                                                           value="{{ $sticker->ordering }}">
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>


                                            <div class="card panel panel-default">
                                                <div class="card-header">
                                                    Specifications
                                                </div>
                                                <div class="card-body panel-body" id="v-option-form">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4">

                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label pl-sm-0">Categories</label>
                                                                    {!! Form::hidden('categories',(isset($checkedCategories))
                                                                    ? json_encode($checkedCategories) : null,['id' => 'categories_tree']) !!}
                                                                    <div id="treeview_json"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
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
                                                                @foreach($model->specifications()->whereNull('parent_id')->orderBy('attributes_id')->get() as $selected)
                                                                    @include('admin.items._partials.specifications')
                                                                @endforeach
                                                            @endif
                                                            </tbody>

                                                            <tfoot>
                                                            {{--<tr class="add-new-ship-filed-container">--}}
                                                                {{--<td colspan="4" class="text-right">--}}
                                                                    {{--<button type="button" class="btn btn-primary add-specification_button"><i--}}
                                                                            {{--class="fa fa-plus-circle add-specification"></i>--}}
                                                                    {{--</button>--}}
                                                                {{--</td>--}}
                                                            {{--</tr>--}}
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
                    </div>
                    <div id="package" data-tab="package" class="tab-pane fade media-new-tab package-details-tab
                    @if(!$bundle) hide @endif">
                        <div class="my-2">
                                <button class="btn btn-primary pull-right add-package-item"
                                        type="button">
                                    <i class="fa fa-plus"></i> Add new
                                </button>
                        </div>
                        <div class="table-responsive">
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
        </div>
        {!! Form::close() !!}
    </div>
    <div id="svg_barcode"></div>
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
                    <div class="form-group row">
                        <label for="search-attr" class="col-sm-2 col-form-label">Search</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="search-attr" placeholder="Search">
                        </div>
                    </div>
                    <ul class="all-list modal-stickers--list">

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Done</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="stickerModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Stickers</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="search-sticker" class="col-sm-2 col-form-label">Search</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control search-attr" id="search-sticker" placeholder="Search">
                        </div>
                    </div>
                    <ul class="all-list modal-stickers--list">

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Done</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="template" id="add-more-banners-tags">
        <div class="col-md-12 mb-2 d-flex flex-wrap banner-item" data-key="banners[{count}][product_id]">
            <div class="col-sm-11 p-0 d-flex">
                <div class="input-group" style="width: 250px">
                    <div class="input-group-prepend added_section_js">
                        {!! media_button('banners[{count}][image]',$model) !!}

                    </div>
                </div>
                <div style="width: 80%; margin-top: 40px">
                    <input type="hidden"
                        name="banners[{count}][product_id]" value="null"
                        class="form-control product_id_hidden_js">
                    <div class="form-group row mt-3">
                        <label for="staticEmail" style="width: 70px">Url</label>
                        <div class="d-flex"  style="width: calc(100% - 120px)">
                            <input type="text" name="banners[{count}][url]" class="form-control url_feald mr-1" value="">
                            <button type="button" class="btn btn-info select_product_for_url_js" data-key="banners[{count}][product_id]">
                                Select
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" style="width: 70px">Tag</label>
                        <div class="d-flex"  style="width: calc(100% - 120px)">
                            <input type="text" name="banners[{count}][tags]" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" style="width: 70px">Alt text</label>
                        <div class="d-flex"  style="width: calc(100% - 120px)">
                            <input type="text" name="banners[{count}][alt]" class="form-control alt_text" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1">
                <button class="plus-icon remove-new-banner-input btn btn-danger">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
    </script>

    <script type="template" id="add-more-other_images-tags">
        <div class="col-md-12 mb-5 d-flex flex-wrap other_images-item" data-key="other_images[{count}][url]">
            <div class="col-sm-11 p-0 d-flex">
                <div class="input-group" style="width: 250px">
                    <div class="input-group-prepend added_section_js">
                        {!! media_button('other_images[{count}][image]',$model) !!}

                    </div>
                </div>
                <div style="width: 80%; margin-top: 40px">
                    <input type="hidden"
                        name="other_images[{count}][product_id]" value="null"
                        class="form-control product_id_hidden_js">

                    <div class="form-group row mt-3">
                        <label for="staticEmail" style="width: 70px">Url</label>
                        <div class="d-flex"  style="width: calc(100% - 120px)">
                            <input type="text" name="other_images[{count}][url]" class="form-control url_feald mr-1"  value="">
                            <button type="button" class="btn btn-info select_product_for_url_js" data-key="other_images[{count}][url]">
                                Select
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" style="width: 70px">Tag</label>
                        <div style="width: calc(100% - 120px)">
                            <input type="text" name="other_images[{count}][tags]" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" style="width: 70px">Alt text</label>
                        <div style="width: calc(100% - 120px)">
                            <input type="text" name="other_images[{count}][alt]" class="form-control alt_text" value="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-1">
                <button class="plus-icon remove-new-other_images-input btn btn-danger">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
    </script>

    <div class="modal fade select-products__modal" id="productsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Products</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <select class="form-control search_option_js">
                                <option value="general" selected>General</option>
                                <option value="brand">Brands</option>
                                <option value="category">Categories</option>
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control search-attr" id="search-product" placeholder="Search">
                            <select class="form-control d-none" id="brand_select">

                            </select>
                            <select class="form-control d-none" id="category_select">

                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <input type="checkbox" class="all_select_products_js" style="margin: 0 18.240px"/>
                        <p class="mb-0">Select All</p>
                    </div>
                    <ul class="all-list modal-stickers--list" id="stickers-modal-list">

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary done_select_product_js" data-dismiss="modal">Add</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="barcodePrintModal" tabindex="-1" role="dialog" aria-labelledby="barcodePrintModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="barcodeModalCenterTitle">Barcode Print</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label>
                            <input type="checkbox" name="print_type" id="num_check"/>
                            <span>Show numbers</span>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="print_type" value="name" id="name_check"/>
                            <span>Show item name</span>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="print_type" value="price" id="price_check"/>
                            <span>Show price</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_barcode_print_js">Print</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css"/>
    <link rel="stylesheet" href="{{asset('css/custom.css?v='.rand(111,999))}}">

@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{asset('admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script src="/plugins/tinymce/tinymce.js"></script>
    <script src="/js/custom/stock.js?v=" .rand(111,999)></script>

    <script>
        $(function () {

            $("body").on("click", ".remove-new-other_images-input", function () {
                $(this).closest(".other_images-item").remove();
            });

            const barcode_settings = JSON.parse($('#barcode-settings').text());
            let text = 5060730202285;
            let width = Number(barcode_settings.width);
            let height = Number(barcode_settings.height);
            let margin = Number(barcode_settings.margin);
            let back_color = barcode_settings.background_color;
            let line_color = barcode_settings.line_color;
            let text_align = barcode_settings.text_align;
            let text_font = barcode_settings.text_font;
            let format = barcode_settings.format;
            let font_size = Number(barcode_settings.font_size);
            let text_margin = Number(barcode_settings.text_margin);
            let displayValue = Boolean(Number(barcode_settings.text_switch));
            let bold = Number(barcode_settings.bold);
            let italic = Number(barcode_settings.italic);
            let fontOptions = '';

                if(bold && italic) {
                    fontOptions = 'bold italic'
                } else if(bold) {
                    fontOptions = 'bold'
                } else if(italic) {
                    fontOptions = 'italic'
                } else {
                    fontOptions = ''
                }
                $('#barcode_height').val(barcode_settings.height);
                $('#barcode_height').next('.value').text(height)
                $('#barcode_width').val(barcode_settings.width);
                $('#barcode_width').next('.value').text(width)
                $('#barcode_margin').val(barcode_settings.margin);
                $('#barcode_margin').next('.value').text(margin)
                $('#barcode_background_color').val(back_color);
                $('#barcode_line_color').val(line_color);
                $('#barcode_text_switch').attr('checked', displayValue);
                $('#barcode_text_font').val(text_font);
                $('#barcode_format').val(format);
                $('#barcode_font_size').val(barcode_settings.font_size);
                $('#barcode_font_size').next('.value').text(font_size)
                $('#barcode_text_margin').val(barcode_settings.text_margin);
                $('#barcode_text_margin').next('.value').text(text_margin)
                $('#barcode_background_color').val(back_color);
                $('#barcode_background_color').css('background-color', back_color);
                $('#barcode_line_color').val(line_color);
                $('#barcode_line_color').css('background-color', line_color);
                $('#text_bold').attr('checked', !!bold);
                $('#text_italic').attr('checked', !!italic);


                shortAjax('/admin/find/items/barcodes', {ids: [$('[name="id"]').val()]}, function(res) {

                    res.barcodes.map(function(barcode) {
                        $('.printing_barcode').append(`<svg class="svg_${barcode.value}"></svg>`)
                    });

                    res.barcodes.map(function(barcode, key) {
                        JsBarcode(`.svg_${barcode.value}`, barcode.value, {
                            format,
                            font: text_font,
                            fontSize: font_size,
                            textMargin: text_margin,
                            height,
                            width,
                            margin,
                            background: back_color,
                            lineColor: line_color,
                            textAlign: text_align,
                            fontOptions,
                            displayValue,
                        })
                            .render();
                        // const svg = $(`#svg_${barcode.value}`);
                        // $('.loader_container').css('display', 'none');
                        // $('body').css('overflow', 'auto');
                        // saveSvgAsPng(document.getElementById(`svg_${barcode.value}`), `${barcode.file_name.replace(/\s/g, '_').trim()}.png`, {scale: 10});
                    })
                })

                $("body").on('click', '#print_barcode_item', function() {
                    $("#barcodePrintModal").modal("show");
                });

                $("#save_barcode_print_js").on('click', function() {
                    const ids = [];
                    const priceCheck = $("#price_check").prop('checked');
                    const nameCheck = $("#name_check").prop('checked');
                    const numCheck = $("#num_check").prop('checked');
                    const name = $($(".product_name_for_barcode")[0]).val();
                    const barcode = $("#barcode").val();
                    const price = $('[name="default_price"]').val();

                    const ifr = $('<iframe>', {
                        name: 'myiframe',
                        class: 'printFrame'
                    })
                        .appendTo('body')
                        .contents().find('body');
                    $('#svg_barcode').append(`<svg id="svg_${barcode}"></svg>`)
                    JsBarcode(`#svg_${barcode}`, barcode, {
                        format,
                        font: text_font,
                        fontSize: font_size,
                        textMargin: text_margin,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        fontOptions,
                        displayValue: numCheck,
                    }).render();
                    const svg = $(`#svg_${barcode}`);
                    ifr.append(svg);
                    if(priceCheck && nameCheck) {
                        ifr.append(`<div>${name} - ${price}</div>`)
                    } else if(priceCheck && !nameCheck) {
                        ifr.append(`<div>${price}</div>`)
                    } else if(!priceCheck && nameCheck) {
                        ifr.append(`<div>${name}</div>`)
                    }
                    window.frames['myiframe'].focus();
                    window.frames['myiframe'].print();

                    setTimeout(() => {
                        $(".printFrame").remove();
                        $("#barcodePrintModal").modal("hide");
                    }, 1000);
                })

            $('#landing'). click(function() {
                if ($(this).prop("checked") == true) {
                    var code  = $("#barcode").val();
                    AjaxCall("{{ route('admin_items_render_barcode') }}", {code: code}, function (res) {
                        if (!res.error) {
                            $(".qr-code").html(res.html);
                        }else{
                            $(".qr-code").html('Barcode is not selected');
                        }

                        $(".qr-code").removeClass('d-none');
                    });
                } else if ($(this).prop("checked") == false) {
                    $(".qr-code").addClass('d-none');

                }
            });

            $("body").on('change','.warehouse',function () {
                let w_id = $(this).val();
                let parent = $(this).closest(".location-item");
                render_racks(w_id,parent)
            })

            $("body").on('change','.rack',function () {
                let r_id = $(this).val();
                let parent = $(this).closest(".location-item");

                render_shelves(r_id,parent)
            })

            $("body").on("click", ".add-new-banner-input", function () {
                var uid = Math.random().toString(36).substr(2, 9);
                var html = $("#add-more-banners-tags").html();
                const media_uuid = 'media_' + uid;
                html = html.replace(/{count}/g, uid);
                html = html.replaceAll(/modal-input-path .*"$/gmi, 'modal-input-path"');
                html = html.replace(/modal-input-path/g, "modal-input-path " + media_uuid);
                html = html.replaceAll(/media_.*"$/gmi, media_uuid+'"');
                $(".banner-group").append(html);
                $(".banner-group").find(".banner-item").last().find(".bestbetter-modal").append(`<img src="/images/no_image.jpg" class="img img-responsive ${media_uuid}_media_single_img" width="100px" data-id="${media_uuid}_media_single_img" alt="/images/no_image.jpg" style="max-width: 200px; width: 100%; margin-top: 10px;">`);
            });

// ----------
            $("body").on("click", ".add-new-other_images-input", function () {
                var uid = Math.random().toString(36).substr(2, 9);
                var html = $("#add-more-other_images-tags").html();
                const media_uuid = 'media_' + uid;
                html = html.replace(/{count}/g, uid);
                html = html.replaceAll(/modal-input-path .*"$/gmi, 'modal-input-path"');
                html = html.replace(/modal-input-path/g, "modal-input-path " + media_uuid);
                html = html.replaceAll(/media_.*"$/gmi, media_uuid+'"');
                $(".other_images-group").append(html);
                $(".other_images-group").find(".other_images-item").last().find(".bestbetter-modal").append(`<img src="/images/no_image.jpg" class="img img-responsive ${media_uuid}_media_single_img" width="100px" data-id="${media_uuid}_media_single_img" alt="/images/no_image.jpg" style="max-width: 200px; width: 100%; margin-top: 10px;">`);
                // $().append(`
                //     <img src="/images/no_image.jpg" class="img img-responsive media_5fa16c92c4d1f_media_single_img" width="100px" data-id="media_5fa16c92c4d1f_media_single_img" alt="/images/no_image.jpg" style="max-width: 200px; width: 100%; margin-top: 10px;">
                // `)
            });

            function render_racks(w_id,parent){
                parent.find(".rack").html('<option value="0">Select Rack</option>');
                parent.find(".shelve").html('<option value="0">Select Shelve</option>');
                if(w_id){
                    AjaxCall("{{ route('admin_warehouses_rack_by_warehouse') }}", {w_id: w_id}, function (res) {
                        if (!res.error) {
                            parent.find(".rack").empty();
                            var html = '<option value="0">Select Rack</option>';
                            for (var prop in res.data) {
                                html += '<option value="'+res.data[prop].id+'">'+res.data[prop].name+'</option>';
                            }

                            parent.find(".rack").append(html);
                        }
                    });
                }

            }

            function render_shelves(r_id,parent){
                parent.find(".shelve").html('<option value="0">Select Shelve</option>');
                if(r_id){
                    AjaxCall("{{ route('admin_warehouses_shelve_by_rack') }}", {r_id: r_id}, function (res) {
                        if (!res.error) {
                            parent.find(".shelve").empty();

                            var html = '<option value="0">Select Shelve</option>';
                            for (var prop in res.data) {
                                html += '<option value="'+res.data[prop].id+'">'+res.data[prop].name+'</option>';
                            }

                            parent.find(".shelve").append(html);
                        }
                    });
                }
            }

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

            $("body").on('change', '.select-download', function () {
                let id = $(this).val();
                let exists = $("body").find('.manual-code[data-id="'+id+'"]');
                if(! exists.length){
                    AjaxCall(
                        "/admin/inventory/items/get-download-html",
                        {id:$(this).val()},
                        function (res) {
                            if (!res.error) {

                                $('.manual-codes').append(res.html)
                            }
                        }
                    );
                }
            });

            $("body").on('click', '.delete-manual-code', function () {
                $(this).closest('.manual-code').remove();
            });

            $("body").on('click', '.add-location', function () {
                AjaxCall(
                    "/admin/inventory/items/add-location",
                    {},
                    function (res) {
                        if (!res.error) {
                            $('.v-options-list-locations').append(res.html)
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
                console.log(4444444)
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
    <script>
        $(document).ready(function () {
            $("body").on('click', '.select-stickers', function () {
                let arr = [];
                $(".get-all-stickers-tab")
                    .children()
                    .each(function () {
                        arr.push($(this).attr("data-id"));
                    });
                AjaxCall("/admin/tools/stickers/get-all", {arr}, function (res) {
                    if (!res.error) {
                        $("#stickerModal .modal-body .all-list").empty();
                        res.data.forEach(item => {
                            let html = `<li data-id="${item.id}" class="option-elm-modal"><a
                                                href="#">${item.name}
                                                </a> <div class="btn btn-primary add-sticker-event searchable" data-name="${item.name}"
                                                data-id="${item.id}">ADD</div></li>`;
                            $("#stickerModal .modal-body .all-list").append(html);
                        })
                        ;
                        $("#stickerModal").modal();
                    }
                });
            });

            $("body").on("click", ".add-sticker-event", function () {
                let id = $(this).data("id");
                let name = $(this).data("name");
                let gu = guid();
                let ordering = Number($(".get-all-stickers-tab").find('.option-elm-attributes').length) + 1;
                $(".get-all-stickers-tab")
                    .append(`<li style="display: flex" data-id="${id}" class="option-elm-attributes"><a
                                href="#">${name}</a>
                                <div class="buttons">
                                <a href="javascript:void(0)" class="remove-all-attributes btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                                <input type="hidden" name="stickers[${gu}][id]" value="${id}">
                                <input type="hidden" class="sticker-ordering" name="stickers[${gu}][ordering]" value="${ordering}">
                                </li>`);
                $(this)
                    .parent()
                    .remove();
            });

            function render_categories_tree() {
                $("#treeview_json").jstree({
                    "checkbox": {
                        "three_state": false,
                        "cascade": 'undetermined',
                        "keep_selected_style": false
                    },
                    plugins: ["wholerow", "checkbox", "types"],
                    core: {
                        themes: {
                            responsive: !1
                        },
                        data: {!! json_encode((isset($data)?$data:[])) !!}
                    },
                    types: {
                        "default": {
                            icon: "fa fa-folder text-primary fa-lg"
                        },
                        file: {
                            icon: "fa fa-file text-success fa-lg"
                        }
                    }
                })

            }

            $('#treeview_json').on("changed.jstree", function (e, data) {

                if (data.node) {
                    var selectedNode = $('#treeview_json').jstree(true).get_selected(true)
                    var dataArr = [];
                    for (var i = 0, j = selectedNode.length; i < j; i++) {
                        dataArr.push(selectedNode[i].id);
                        dataArr.push(selectedNode[i].parent);
                    }

                    var uniqueNames = [];

                    if (dataArr.length > 0) {
                        $.each(dataArr, function (i, el) {
                            if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
                        });
                    }

                    var index = uniqueNames.indexOf("#");
                    if (index > -1) {
                        uniqueNames.splice(index, 1);
                    }

                    $("#categories_tree").val(JSON.stringify(uniqueNames));

                    AjaxCall("/admin/inventory/items/get-specifications-by-category", {ids: data.selected}, function (res) {
                        if (!res.error) {
                            $("#specifications").find('.v-options-list').html(res.html);
                            $(".tag-input-v").select2({width: '100%'});
                        }
                    });
                }
            });



            render_categories_tree()

            function initTinyMce(e) {
                tinymce.init({
                    selector: e,
                    plugins: 'print preview fullpage   importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists  wordcount   imagetools textpattern noneditable help    charmap   quickbars  emoticons ',
                    //   imagetools_cors_hosts: ['picsum.photos'],
                    //   tinydrive_token_provider: function (success, failure) {
                    //     success({ token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huZG9lIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Ks_BdfH4CWilyzLNk8S2gDARFhuxIauLa8PwhdEQhEo' });
                    //   },
                    //   tinydrive_demo_files_url: '/docs/demo/tiny-drive-demo/demo_files.json',
                    //   tinydrive_dropbox_app_key: 'jee1s9eykoh752j',
                    //   tinydrive_google_drive_key: 'AIzaSyAsVRuCBc-BLQ1xNKtnLHB3AeoK-xmOrTc',
                    //   tinydrive_google_drive_client_id: '748627179519-p9vv3va1mppc66fikai92b3ru73mpukf.apps.googleusercontent.com',
                    // mobile: {
                    //     plugins: 'print preview fullpage   importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists  wordcount   textpattern noneditable help   charmap  quickbars  emoticons '
                    // },
                    menu: {
                        tc: {
                            title: 'TinyComments',
                            items: 'addcomment showcomments deleteallconversations'
                        }
                    },
                    menubar: '',
                    //   'file edit view insert format tools table tc help',
                    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist  | forecolor backcolor    removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
                    autosave_ask_before_unload: true,
                    //   autosave_interval: "30s",
                    //   autosave_prefix: "{path}{query}-{id}-",
                    //   autosave_restore_when_empty: false,
                    //   autosave_retention: "2m",
                    image_advtab: true,
                    content_css: [
                        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                        '//www.tiny.cloud/css/codepen.min.css'
                    ],
                    link_list: [
                        { title: 'My page 1', value: 'http://www.tinymce.com' },
                        { title: 'My page 2', value: 'http://www.moxiecode.com' },
                        { title: 'Kaliony', value: 'http://e-cigar.com' }
                    ],
                    image_list: [
                        { title: 'My page 1', value: 'http://www.tinymce.com' },
                        { title: 'My page 2', value: 'http://www.moxiecode.com' }
                    ],
                    image_class_list: [
                        { title: 'None', value: '' },
                        { title: 'Some class', value: 'class-name' }
                    ],
                    importcss_append: true,
                    height: 400,
                    //   file_picker_callback: function (callback, value, meta) {
                    //     /* Provide file and text for the link dialog */
                    //     if (meta.filetype === 'file') {
                    //       callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                    //     }

                    //     /* Provide image and alt text for the image dialog */
                    //     if (meta.filetype === 'image') {
                    //       callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                    //     }

                    //     /* Provide alternative source and posted for the media dialog */
                    //     if (meta.filetype === 'media') {
                    //       callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                    //     }
                    //   },
                    templates: [
                        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
                    ],
                    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                    height: 600,
                    image_caption: true,
                    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                    noneditable_noneditable_class: "mceNonEditable",
                    toolbar_drawer: 'sliding',
                    spellchecker_dialog: true,
                    spellchecker_whitelist: ['Ephox', 'Moxiecode'],
                    tinycomments_mode: 'embedded',
                    content_style: ".mymention{ color: gray; }",
                    contextmenu: "link image imagetools table configurepermanentpen",
                    mentions_selector: '.mymention',
                    //   mentions_fetch: mentions_fetch,
                    //   mentions_menu_hover: mentions_menu_hover,
                    //   mentions_menu_complete: mentions_menu_complete,
                    //   mentions_select: mentions_select,
                });
            }

            initTinyMce(".tinyMcArea")

            function guid() {
                return "ss".replace(/s/g, s4);
            }

            function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(7)
                    .substring(1);
            }
        })
    </script>
@stop
