@extends('layouts.admin')
@section('content-header')

@stop

@section('content')
    <section class="content stock-page">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Settings</h2></div>
        </div>
        {!! Form::model($settings,[]) !!}
            <div class="text-right btn-save">
                <a href="{!! route('admin_orders') !!}" class="btn btn-action">Back</a>
                {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
            </div>
            <div class="row sortable-panels">
                <div class="col-md-9 ">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select status - Order made</label>
                                        {!! Form::select('open',$statuses,null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </section>
@stop
@section('css')

@stop
@section('js')

@stop