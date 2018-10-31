@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container">
        {!! Form::open(['class'=>'form-horizontal'])!!}
        <div class="form-group">
            <label for="text" class="control-label col-xs-4">Payment Name</label>
            <div class="col-xs-8">
                {!! Form::text('cash',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="text" class="control-label col-xs-4">Description</label>
            <div class="col-xs-8">
                {!! Form::textarea('cash',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="text" class="control-label col-xs-4">Image</label>
            <div class="col-xs-8">
                {!! media_button('image') !!}
            </div>
        </div>

        <div class="form-group">
            <label for="text1" class="control-label col-xs-4">Icon</label>
            <div class="col-xs-8">
                {!! Form::text('icon',null,['class'=>'form-control']) !!}
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