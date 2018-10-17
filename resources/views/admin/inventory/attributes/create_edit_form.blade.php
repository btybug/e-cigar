@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <div class="inventory_attributes container-fluid">
        <div class="row dis-flex-wrap">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-7 pl-0">
                                <h2>Attribute</h2>
                            </div>
                            <div class="col-sm-5 p-0">
                                <div class="button-save  text-right">
                                    <a class="btn btn-primary pull-right"
                                       href="{!! route('admin_store_attributes') !!}">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body">
                        <div>
                            {!! Form::model($model,['class'=>'form-horizontal']) !!}
                            @if(count(get_languages()))
                                <ul class="nav nav-tabs">
                                    @foreach(get_languages() as $language)
                                        <li class="@if($loop->first) active @endif"><a data-toggle="tab"
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
                                                <label class="col-sm-2 control-label"><span data-toggle="tooltip"
                                                                                            title=""
                                                                                            data-original-title="Attribute Name Title">Attribute Name</span></label>
                                                <div class="col-sm-10">
                                                    {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group bord-top">
                                <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip"
                                                                                              title=""
                                                                                              data-original-title="Icon Title">Icon</span></label>
                                <div class="col-sm-9">
                                    {!! Form::text('icon',null,['class'=>'form-control icon-picker']) !!}
                                </div>
                                <div class="col-sm-1 text-center font-icon-added">
                                    <i id="font-show-area"></i>
                                </div>
                            </div>
                            <div class="form-group bord-top">
                                <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip"
                                                                                              title=""
                                                                                              data-original-title="Available for blog Desc">Available for blog</span></label>
                                <div class="col-sm-10">
                                    {!! Form::select("name",['Blog','Tickets','Products','Stock'],null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group bord-top">
                                <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip"
                                                                                              title=""
                                                                                              data-original-title="Image Title">Image</span></label>
                                <div class="col-sm-10">
                                    {!! media_button('image',$model) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    {!! Form::submit('Save',['class' => 'btn btn-info button_save']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                @if($model)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>Options {{ $model->name }} </h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @include('admin.inventory.attributes.options')
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <div class="right_col">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-7 pl-0">
                                    Display as
                                </div>
                                <div class="col-sm-5 p-0">
                                    <select name="" id="" class="form-control display_as-select">
                                        <option value="radio">Radio</option>
                                        <option value="select_menu">Select menu</option>
                                        <option value="multi_select">Multi select</option>
                                        <option value="multi_select_tag">Multi select tag</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="right-main-content">
                                <div class="display-as-wall " data-displayas="radio">
                                    <h3>Courier</h3>
                                    @if(count($model->children))
                                        @foreach($model->children as $item)
                                            <div class="form-group row bord-top bg-light attr-option" data-item-id="{!! $item->id !!}" data-parent-id="{!! $model->id !!}">
                                                <div class="col-sm-1">
                                                    <input type="radio" id="radio-{!! $item->id !!}" name="radio_item">
                                                </div>
                                                <div class="col-sm-11">
                                                    <label for="radio-{!! $item->id !!}"> {!! $item->name !!}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        No Options
                                    @endif
                                </div>
                                <div class="display-as-wall d-none" data-displayas="select_menu">
                                    <h3>Courier</h3>
                                    <select name="" id="" class="form-control">
                                        @if(count($model->children))
                                            @foreach($model->children as $item)
                                                <option class="form-group attr-option" data-item-id="{!! $item->id !!}" data-parent-id="{!! $model->id !!}">
                                                    {!! $item->name !!}

                                                </option>
                                            @endforeach
                                        @else
                                            No Options
                                        @endif
                                    </select>

                                </div>
                                <div class="display-as-wall d-none" data-displayas="multi_select">
                                    <h3>Courier</h3>
                                    @if(count($model->children))
                                        @foreach($model->children as $item)
                                            <div class="form-group row bord-top bg-light attr-option" data-item-id="{!! $item->id !!}" data-parent-id="{!! $model->id !!}">
                                                <div class="col-sm-1">
                                                    <input type="checkbox" id="checkbox-{!! $item->id !!}">
                                                </div>
                                                <div class="col-sm-11">
                                                    <label for="checkbox-{!! $item->id !!}"> {!! $item->name !!}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        No Options
                                    @endif
                                </div>
                                <div class="display-as-wall d-none" data-displayas="multi_select_tag">
                                    <h3>Courier</h3>
                                    <div class="multi_select_tag_wall">
                                        @if(count($model->children))
                                            @foreach($model->children as $item)
                                                <div class="form-group attr-option" data-item-id="{!! $item->id !!}" data-parent-id="{!! $model->id !!}">
                                                    <span class="label label-primary">{!! $item->name !!}</span>
                                                </div>
                                            @endforeach
                                        @else
                                            No Options
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="https://farbelous.io/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
    <script>

        $('body').on('change', '.inventory_attributes .display_as-select', function () {
                $(".display-as-wall").addClass("d-none")
                console.log($(this).val())
                $(`[data-displayas="${$(this).val()}"]`).removeClass("d-none")

        });
        $('.icon-picker').iconpicker();
        $("body").on("click", ".iconpicker-item", function () {
            let value = $(".icon-picker").val()
            $("#font-show-area").attr("class", value)
        })

        $("body").on("click", ".attr-option", function () {
            var id = $(this).data('item-id');
            var parentId = $(this).data('parent-id');
            AjaxCall("/admin/inventory/attributes/options-show-form", {id: id, parentId: parentId}, function (res) {
                if (!res.error) {
                    $(".options-form").html(res.html);
                    $('.icon-picker').iconpicker();
                }
            });
        });

        $("body").on("click", ".delete-option", function () {
            var id = $(this).data('item-id');
            AjaxCall("/admin/inventory/attributes/options-delete", {id: id}, function (res) {
                if (!res.error) {
                    $(".options-form").html('');
                    $("body").find('.attr-option').each(function () {
                        if ($(this).attr('data-item-id') == id) {
                            $(this).remove()
                        }
                    })
                    // $('.icon-picker').iconpicker();
                }
            });
        });

    </script>
@stop
@section("css")
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://farbelous.io/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <style>
        #font-show-area {
            font-size: 50px;
            margin-top: 15px;
        }
    </style>
@stop