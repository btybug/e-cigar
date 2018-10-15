@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Attribute</h2></div>
            <div class="col-md-6 "><a class="btn btn-primary pull-right" href="{!! route('admin_store_attributes') !!}">Back</a></div>
        </div>
        <div class="col-xs-12">
            {!! Form::model($model) !!}
            @if(count(get_languages()))
                <ul class="nav nav-tabs">
                    @foreach(get_languages() as $language)
                        <li class="@if($loop->first) active @endif"><a data-toggle="tab" href="#{{ strtolower($language->code) }}">
                                <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}</a></li>
                    @endforeach
                </ul>
            @endif

            <div class="tab-content">
                @if(count(get_languages()))
                    @foreach(get_languages() as $language)
                        <div id="{{ strtolower($language->code) }}" class="tab-pane fade  @if($loop->first) in active @endif">
                            <div class="form-group">
                                <label>Attribute Name</label>
                                {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-10">
                        <label>Icon</label>
                        {!! Form::text('icon',null,['class'=>'form-control icon-picker']) !!}
                    </div>
                    <div class="col-md-2">
                        <i id="font-show-area"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Image</label>
                {!! media_button('image',$model) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        @if($model)
            <div class="col-xs-12">
                <div class="col-md-6 pull-left"><h2>Options {{ $model->name }} </h2></div>
            </div>
            @include('admin.inventory.attributes.options')
        @endif
    </div>
@stop
@section('js')
    <script src="https://farbelous.io/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
    <script>
        $('.icon-picker').iconpicker();
        $("body").on("click", ".iconpicker-item", function () {
            let value = $(".icon-picker").val()
            $("#font-show-area").attr("class", value)
        })

        $("body").on("click", ".attr-option", function () {
            var id = $(this).data('item-id');
            var parentId = $(this).data('parent-id');
            AjaxCall("/admin/inventory/attributes/options-show-form", {id: id,parentId:parentId}, function (res) {
                if(! res.error){
                    $(".options-form").html(res.html);
                    $('.icon-picker').iconpicker();
                }
            });
        });

    </script>
@stop
@section("css")
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://farbelous.io/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
    <style>
        #font-show-area {
            font-size: 50px;
            margin-top: 15px;
        }
    </style>
@stop