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

                                        <form method="POST"
                                              action=""
                                              accept-charset="UTF-8" class="form-horizontal form-validate"
                                              enctype="multipart/form-data"><input name="_token" type="hidden"
                                                                                   value="eWIORi0IImLFJ1jm0g72IoUOHA3RgBpLlk4ZFl4j">

                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">Name

                                                </label>
                                                <div class="col-sm-10 col-md-4">
                                                    <input class="form-control field-validate" id="name" name="name"
                                                           type="text" value="">
                                                    <span class="help-block">Language name such as &quot;English&quot;</span>
                                                    <span class="help-block hidden">This field is required.</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">Code</label>
                                                <div class="col-sm-10 col-md-4">
                                                    <input class="form-control field-validate" id="code" name="code"
                                                           type="text" value="">
                                                    <span class="help-block">Language code such as &quot;en&quot; for english.</span>
                                                    <span class="help-block hidden">This field is required.</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name"
                                                       class="col-sm-2 col-md-3 control-label">Direction</label>
                                                <div class="col-sm-10 col-md-4">
                                                    <select class="form-control field-validate" id="direction"
                                                            name="direction">
                                                        <option value="rtl">Right To Left</option>
                                                        <option value="ltr">Left To Right</option>
                                                    </select>
                                                    <span class="help-block">Language Direction</span>
                                                    <span class="help-block hidden">This field is required.</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">Icon</label>
                                                <div class="col-sm-10 col-md-4">
                                                    <input id="newImage" name="newImage" type="file">
                                                    <span class="help-block">Language Flag</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name"
                                                       class="col-sm-2 col-md-3 control-label">Directory</label>
                                                <div class="col-sm-10 col-md-4">
                                                    <input class="form-control" id="directory" name="directory"
                                                           type="text" value="">
                                                    <span class="help-block">
								Language Directory such as &quot;english&quot;</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name"
                                                       class="col-sm-2 col-md-3 control-label">Default</label>
                                                <div class="col-sm-10 col-md-4">
                                                    <select class="form-control field-validate" id="is_default"
                                                            name="is_default">
                                                        <option value="1">Yes</option>
                                                        <option value="0" selected>No</option>
                                                    </select>
                                                    <span class="help-block">Set default language.</span>
                                                    <span class="help-block hidden">This field is required.</span>
                                                </div>
                                            </div>

                                            <!-- /.box-body -->
                                            <div class="box-footer text-right">
                                                <div class="col-sm-offset-2 col-md-offset-3 col-sm-10 col-md-4">
                                                    <button type="submit" class="btn btn-primary">Add Language</button>
                                                    <a href="#"
                                                       type="button" class="btn btn-default">Back</a>
                                                </div>
                                            </div>
                                            <!-- /.box-footer -->
                                        </form>
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