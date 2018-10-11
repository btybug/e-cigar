@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="col-md-6">
        {!! Form::model($role,['class'=>'form-horizontal']) !!}

            <fieldset>

                <!-- Form Name -->
                <legend>Edit Role</legend>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="passwordinput">Title</label>
                    <div class="col-md-4">
                        {!! Form::text('title',null,['class'=>'form-control input-md']) !!}
                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="passwordinput">Description</label>
                    <div class="col-md-4">
                        {!! Form::textarea('description',null,['class'=>'form-control input-md']) !!}
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <div class="col-md-4">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </fieldset>
        {!! Form::close() !!}

    </div>
    <div class="col-md-6">

    </div>
@stop
@section('js')
@stop