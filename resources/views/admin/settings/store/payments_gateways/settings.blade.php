@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container">
        {!! Form::model($model,['class'=>'form-horizontal'])!!}
            <div class="form-group">
                <label for="text" class="control-label col-xs-4">Payment Name</label>
                <div class="col-xs-8">
                    {!! Form::text('stripe_payment_name',null,['class'=>'form-control']) !!}
                </div>
            </div>
        <div class="form-group">
            <label for="text" class="control-label col-xs-4">Description</label>
            <div class="col-xs-8">
                {!! Form::textarea('description',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
                <label for="text" class="control-label col-xs-4">Image</label>
                <div class="col-xs-8">
                    {!! media_button('stripe_image',$model) !!}
                </div>
            </div>
        <div class="form-group">
            <label for="text1" class="control-label col-xs-4">Icon</label>
            <div class="col-xs-8">
                {!! Form::text('icon',null,['class'=>'form-control icon-picker']) !!}
            </div>
        </div>
        <div class="form-group">
                <label for="text" class="control-label col-xs-4">Stripe Key</label>
                <div class="col-xs-8">
                    {!! Form::text('stripe_key',null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="text1" class="control-label col-xs-4">Stripe Secret</label>
                <div class="col-xs-8">
                    {!! Form::text('stripe_secret',null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-offset-4 col-xs-8">
                    <button  type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://farbelous.io/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script src="https://farbelous.io/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
    <script>
        $('.icon-picker').iconpicker();
    </script>
@stop