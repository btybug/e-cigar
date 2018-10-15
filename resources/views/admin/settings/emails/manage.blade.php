@extends('layouts.admin')

@section('content')
    <div class="col-md-8">
        {!! Form::open(['class'=>'form-horizontal']) !!}
        <div class="form-group">
            <label for="title" class="control-label col-xs-4">Title</label>
            <div class="col-xs-8">
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="select" class="control-label col-xs-4">Template</label>
            <div class="col-xs-8">
                {!! Form::select('mail_template_id',$templates,null,['class'=>'select form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="textarea" class="control-label col-xs-4">Text Area</label>
            <div class="col-xs-8">
                {!! Form::textarea('description',null,['class'=>'form-control','cols'=>40,'rows'=>5]) !!}
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