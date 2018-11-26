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
            <div id="info" class="tab-pane fade in active ">
                {!! Form::model($model,['class'=>'form-horizontal']) !!}
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
                                                    SKU</label>
                                                <div class="col-sm-8">
                                                    {!! Form::text('sku', null,
                                                    ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <div class="row">
                                                <label for="product_id" class="control-label col-sm-4">Quantity
                                                    SKU</label>
                                                <div class="col-sm-8">
                                                    {!! Form::number('quantity', null,
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