@extends('layouts.admin')
@section('content')
    <div class="col-md-6">
        {!! Form::model($model,['class'=>'form-horizontal']) !!}
        <fieldset>
            <!-- Form Name -->
            <legend>Connection</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Client ID</label>
                <div class="col-md-6">
                    {!! Form::text('client_id',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Secret</label>
                <div class="col-md-6">
                    {!! Form::text('client_secret',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button  type="submit" name="singlebutton" class="btn btn-primary">Connect</button>
                </div>
            </div>
        </fieldset>
        {!! Form::close() !!}
    </div>
    <div class="col-md-6">

    </div>

@stop
