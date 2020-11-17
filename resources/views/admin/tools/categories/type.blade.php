@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Category Type</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::model($model) !!}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Slug</label>
                                        {!! Form::text('slug',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Description</label>
                                        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                            <div class="clearfix"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
@stop
