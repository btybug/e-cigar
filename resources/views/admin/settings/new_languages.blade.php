@extends('layouts.admin')
@section('content')
    <section class="setting_add_lang">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add Language</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box box-info">
                                    <!-- form start -->
                                    <div class="box-body">
                                        {!! Form::model($model,['class' => 'form-horizontal form-validate']) !!}
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">Name
                                                </label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::text('name',null,['class' => 'form-control','id' => 'name']) !!}
                                                    <span class="help-block">Language name such as &quot;English&quot;</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="original_name" class="col-sm-2 col-md-3 control-label">Original Name
                                                </label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::text('original_name',null,['class' => 'form-control','id' => 'original_name']) !!}
                                                    <span class="help-block">Language name such as &quot;España&quot;</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">Code</label>
                                                <div class="col-sm-10 col-md-4">
                                                    <div class="form-control code-place"></div>
                                                    <span class="help-block">Language code such as &quot;en&quot; for english.</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="direction"
                                                       class="col-sm-2 col-md-3 control-label">Direction</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::select('direction',[
                                                        'rtl' => 'Right To Left',
                                                        'ltr' => 'Left To Right'
                                                    ],null,['class' => 'form-control','id' => 'direction']) !!}
                                                    <span class="help-block">Language Direction</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">Icon</label>
                                                <div class="col-sm-10 col-md-4">
                                                    <div class="form-control lang-place"></div>
                                                    <span class="help-block">Language Flag</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="is_default"
                                                       class="col-sm-2 col-md-3 control-label">Default</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::select('default',[
                                                        '0' => 'No',
                                                        '1' => 'Yes'
                                                    ],null,['class' => 'form-control','id' => 'is_default']) !!}
                                                    <span class="help-block">Set default language.</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="shared"
                                                       class="col-sm-2 col-md-3 control-label">Share to Front</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::select('shared',[
                                                        '0' => 'No',
                                                        '1' => 'Yes'
                                                    ],null,['class' => 'form-control','id' => 'shared']) !!}
                                                    <span class="help-block">Share language.</span>
                                                </div>
                                            </div>

                                            <!-- /.box-body -->
                                            <div class="box-footer text-right">
                                                <div class="col-sm-offset-2 col-md-offset-3 col-sm-10 col-md-4">
                                                    {!! Form::submit('Save Language',['class' => 'btn btn-primary']) !!}
                                                    <a href="#"
                                                       type="button" class="btn btn-default">Back</a>
                                                </div>
                                            </div>
                                            <!-- /.box-footer -->
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')

@stop