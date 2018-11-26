@extends('layouts.admin')
@section('content')
    <section class="content-top">
        <div class="row m-0">
            <div class="col-md-3">
                <input type="text" placeholder="Product Name" class="form-control" value="{{ @$model->name }}" readonly>
            </div>
            <div class="col-md-3">
                <input type="text" placeholder="SKU" class="form-control" value="{{ @$model->sku }}" readonly>
            </div>
            <div class="col-md-3">
                <input type="text" placeholder="Quantity" class="form-control" value="{{ @$model->quantity }}" readonly>
            </div>
            <div class="col-md-3">
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
            <div id="info" class="tab-pane fade in active media-new-tab basic-details-tab">
                {!! Form::model($model,['class'=>'form-horizontal']) !!}
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
                                        <li><a data-toggle="tab" href="#downloads">downloads</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="basic-center basic-wall">
                                <div class="tab-content">
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
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="feature_image"
                                                           class="control-label col-sm-4"></label>
                                                    <div class="col-sm-8">
                                                        <button type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <div id="videos" class="tab-pane">
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
                                    <div id="images" class="tab-pane">
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
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                {!! Form::close() !!}
            </div>
            <div id="purchases" class="tabe-pane fade"></div>
            <div id="sales" class="tabe-pane fade"></div>
        </div>
    </div>


@stop
@section('css')

    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">

@stop
@section('js')

    <script src="/public/js/custom/stock.js?v=" .rand(111,999)></script>

@stop