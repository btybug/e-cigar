@extends('layouts.admin')
@section('content')
    {!! Form::model($channel) !!}
    <div class="form-group pull-right">
        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                {!! Form::text(null,$channel->id,['class'=>'form-control','readonly']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::text(null,$channel->secret,['class'=>'form-control','readonly']) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-md-2">Channel name</label>
            <div class="col-md-4">
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-md-2">Channel description</label>
            <div class="col-md-10">
                {!! Form::textarea('description',null,['rows'=>'5','cols'=>50]) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-md-2">Icon</label>
            <div class="col-md-4">
                {!! Form::text('icon',null,['class'=>'form-control icon-picker']) !!}
            </div>
            <div class="col-md-1 text-center font-icon-added">
                <i id="font-show-area"></i>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="api-key-table">
            <div class="panel panel-default mt-40">
                <div class="panel-heading d-flex justify-content-between">
                    <input type="hidden" name="permissions[stocks]" value="0">
                    <div class="name">
                        Export stocks
                    </div>
                    <div>
                        <div class="box-1">
                            {!! Form::input('checkbox','permissions[stocks]',1,[($stocks && $stocks->lvl)?'checked':null]) !!}
                            <span class="toogle"></span>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @foreach($groups as $group)
                        <div class="row">
                            <!-- Multiple Radios (inline) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="radios">Group {!! $group !!} </label>
                                <div class="col-md-4">
                                    <label class="radio-inline" for="radios-0">
                                        {!! Form::input('radio','filters[stocks]['.$group.']',0,['checked']) !!}
                                        OFF
                                    </label>
                                    <label class="radio-inline" for="radios-1">
                                        {!! Form::input('radio','filters[stocks]['.$group.']',1,[($stocks && isset($stocks->filter[$group]) && $stocks->filter[$group]==1)?'checked':null]) !!}
                                        ON
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="panel panel-default mt-40">
                <input type="hidden" name="permissions[products]" value="0">
                <div class="panel-heading d-flex justify-content-between">
                    <div class="name">
                        Export products
                    </div>
                    <div>
                        <div class="box-1">

                            {!! Form::input('checkbox','permissions[products]',1,[($products && $products->lvl)?'checked':null]) !!}
                            <span class="toogle"></span>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @foreach($groups as $group)
                    <div class="row">
                        <!-- Multiple Radios (inline) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="radios">Group {!! $group !!} </label>
                            <div class="col-md-4">
                                <label class="radio-inline" for="radios-0">
                                    {!! Form::input('radio','filters[products]['.$group.']',0,['checked']) !!}
                                    OFF
                                </label>
                                <label class="radio-inline" for="radios-1">
                                    {!! Form::input('radio','filters[products]['.$group.']',1,[($products && isset($products->filter[$group]) && $products->filter[$group]==1)?'checked':null]) !!}
                                    ON
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="panel panel-default mt-40">
            <div class="panel-heading d-flex justify-content-between">
                <div class="name">
                    Import Customers
                </div>
                <div>
                    <div class="box-1">
                        {!! Form::input('checkbox','permissions[customers]',1,[($customers && $customers->lvl)?'checked':null]) !!}
                        <span class="toogle"></span>
                    </div>
                </div>
            </div>
            <div class="panel-body">
            </div>
        </div>
        <div class="panel panel-default mt-40">
            <div class="panel-heading d-flex justify-content-between">
                <div class="name">
                    Import Orders
                </div>
                <div>
                    <div class="box-1">
                        {!! Form::input('checkbox','permissions[orders]',1,[($orders && $orders->lvl)?'checked':null]) !!}
                        <span class="toogle"></span>
                    </div>
                </div>
            </div>
            <div class="panel-body">
            </div>
        </div>
        <div class="panel panel-default mt-40">
            <div class="panel-heading d-flex justify-content-between">
                <div class="name">
                    Import
                </div>
                <div>
                    <div class="box-1">
                        <input type="checkbox">
                        <span class="toogle"></span>
                    </div>
                </div>
            </div>
            <div class="panel-body">

            </div>
        </div>

        <div class="form-group pull-right">
            <div class="row">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@stop
@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://farbelous.io/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
    <style>
        .api-key-table .mt-40 {
            margin-top: 40px;
        }

        .api-key-table table tr td {
            border: none;
        }

        .api-key-table .box-1 {
            width: 60px;
            height: 28px;
            background: rgb(200, 200, 200);
            position: relative;
        }

        .api-key-table .box-1 input {
            position: absolute;
            width: 100%;
            height: 100%;
            cursor: pointer;
            opacity: 0;
            z-index: 999;
        }

        .api-key-table .box-1 .toogle {
            display: block;
            position: absolute;
            z-index: 998;
            width: 30px;
            height: 100%;
            background: grey;
            top: 0;
            box-shadow: 0px 0px 3px rgb(50, 50, 50) inset;
            -webkit-transition: all 0.2s ease;
            -moz-transition: all 0.2s ease;
            -ms-transition: all 0.2s ease;
            -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
            text-align: center;
        }

        .api-key-table .box-1 .toogle:before {
            content: "ON";
            color: #fff;
            text-shadow: 1px 1px #000;
            font-size: 11px;
        }

        .api-key-table .box-1 input:checked ~ .toogle {
            margin-left: 30px;
        }

        .api-key-table .box-1 input:checked + .toogle:before {
            content: "OFF";
        }

        .api-key-table table label {
            font-weight: normal;
        }

        .api-key-table table {
            margin-bottom: 0;
        }

        .api-key-table .d-flex {
            display: -ms-flexbox !important;
            display: flex !important
        }

        .api-key-table .justify-content-between {
            -ms-flex-pack: justify !important;
            justify-content: space-between !important
        }

        .api-key-table .pt-2, .api-key-table .py-2 {
            padding-top: .5rem !important
        }

        .api-key-table .pr-2, .api-key-table .px-2 {
            padding-right: .5rem !important
        }

        .api-key-table .pb-2, .api-key-table .py-2 {
            padding-bottom: .5rem !important
        }

        .api-key-table .pr-3, .api-key-table .px-3 {
            padding-right: 1rem !important
        }

        .api-key-table .pb-3, .api-key-table .py-3 {
            padding-bottom: 1rem !important
        }

        .api-key-table .pl-3, .api-key-table .px-3 {
            padding-left: 1rem !important
        }

        .api-key-table .mt-2, .api-key-table .my-2 {
            margin-top: .5rem !important
        }

        .api-key-table .mb-2, .api-key-table .my-2 {
            margin-bottom: .5rem !important
        }

        .api-key-table .align-self-center {
            -ms-flex-item-align: center !important;
            align-self: center !important
        }

        .api-key-table .bg-white {
            background-color: #fff !important
        }

        .api-key-table .pr-3, .api-key-table .px-3 {
            padding-right: 1rem !important
        }

        .api-key-table .pl-3, .api-key-table .px-3 {
            padding-left: 1rem !important
        }

        .api-key-table .pt-4, .api-key-table .py-4 {
            padding-top: 1.5rem !important
        }

        .api-key-table .pb-4, .api-key-table .py-4 {
            padding-bottom: 1.5rem !important
        }

        .api-key-table .pl-4, .api-key-table .px-4 {
            padding-left: 1.5rem !important
        }

        .api-key-table .bg-light {
            background-color: #f8f9fa !important
        }

        .api-key-table .border-top {
            border-top: 1px solid #dee2e6 !important
        }

        .api-key-table .border-bottom {
            border-bottom: 1px solid #dee2e6 !important
        }

        .api-key-table .font-weight-bold {
            font-weight: 700 !important
        }

        .api-key-table .w-100 {
            width: 100% !important
        }

        .api-key-table .w-50 {
            width: 50% !important
        }
    </style>
@stop
@section('js')
    <script src="https://farbelous.io/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
    <script>
        $('.icon-picker').iconpicker();
    </script>
@stop