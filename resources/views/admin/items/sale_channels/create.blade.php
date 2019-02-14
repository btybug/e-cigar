@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h2 class="m-0 pull-left">{!! __('Channels') !!}</h2>
            <div class="pull-right">
                <a href="#" class="btn btn-info pull-right">
                    Create Channel Users
                </a>
            </div>
        </div>
    <div class="panel-body">
        {!! Form::open(['class'=>'form-horizontal','url'=>route('admin_sale_create_channels')]) !!}
        <fieldset>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Channel Name</label>
                <div class="col-md-4">
                    {!! Form::text('name',null,['class'=>'form-control input-md']) !!}
                    <span class="help-block">Something your users will recognize and trust.</span>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Channel Url</label>
                <div class="col-md-4">
                    {!! Form::text('url',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>

            <legend>User</legend>


            <div class="form-group row">
                <label for="email" class="col-md-4 control-label">E-mail </label>

                <div class="col-md-4">
                    {!! Form::text('email',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSkills" class="col-md-4 control-label">Country</label>
                <div class="col-md-4">
                    {!! Form::select('country',$countries,0,['class'=>'form-control input-md']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-4">
                    {!! Form::text('password',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>





            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
                </div>
            </div>

        </fieldset>
        {!! Form::close() !!}
    </div>
    </div>

@stop