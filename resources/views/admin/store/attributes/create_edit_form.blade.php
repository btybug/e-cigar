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
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#en">EN</a></li>
                <li><a data-toggle="tab" href="#ru">RU</a></li>
                <li><a data-toggle="tab" href="#am">AM</a></li>
            </ul>

            <div class="tab-content">
                <div id="en" class="tab-pane fade in active">
                    <div class="form-group">
                        <label>Attribute Name</label>
                        {!! Form::text('translatable[en][name]',get_translated($model,'en','name'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div id="ru" class="tab-pane fade">
                    <div class="form-group">
                        <label>Attribute Name</label>
                        {!! Form::text('translatable[ru][name]',get_translated($model,'ru','name'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div id="am" class="tab-pane fade">
                    <div class="form-group">
                        <label>Attribute Name</label>
                        {!! Form::text('translatable[am][name]',get_translated($model,'am','name'),['class'=>'form-control']) !!}
                    </div>
                </div>
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