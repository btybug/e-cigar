@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container">
        {!! Form::model($model,['class'=>'form-horizontal'])!!}
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