@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="general-tab" href="{!! route('admin_settings_translations') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Products</a>
            </li>
        </ul>
        <div class="tab-content">
            {!! Form::model($model,['class'=>'form-horizontal']) !!}
            <div class="card panel panel-default mb-3">
                <div class="card-body panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="text" class="col-md-4">we ship to</label>
                            <div class="col-md-8">
                                {!! Form::text('we_ship_to',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">

@stop
@section('js')
    <script>
        $(function () {
            function makeid() {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (var i = 0; i < 9; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text;
            }
        })
    </script>

@stop
