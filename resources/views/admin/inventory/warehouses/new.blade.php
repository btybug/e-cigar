@extends('layouts.admin')
@section('content')

    <div class="card panel panel-default">
        <div class="card-header panel-heading">
            <h2 class="m-0">Add new item</h2>
        </div>
        <div class="card-body panel-body">
            <div class="content main-content">
                <ul class="nav nav-tabs admin-profile-left">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#info">Info</a></li>
                </ul>
                <div class="tab-content">
                    <div id="info" class="tab-pane fade in active show media-new-tab basic-details-tab">
                        {!! Form::model($model,['class'=>'form-horizontal','url' => route('post_admin_items_new')]) !!}
                        {!! Form::hidden('id', null) !!}
                        <div class="row">
                            <label for="feature_image" class="control-label col-sm-4"></label>
                            <div class="col-sm-8 text-right pt-25 mb-25">
                                <button class="btn btn-info" type="submit">Save</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="basic-left basic-wall h-100">
                                    <div class="all-list">
                                        <ul class="nav nav-tabs media-list">
                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#location">Location</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#structure">Structure</a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="basic-center basic-wall">
                                    <div class="tab-content media-list-tab-content">
                                        <div id="location" class="tab-pane fade in active show">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4 col-form-label text-right">1st Line address</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4 col-form-label text-right">2nd line address</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('second_line_address',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4 col-form-label text-right">Country</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::select('country',$countries,null,['class'=>'form-control','id' => 'geo_country']) !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group hide">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4 col-form-label text-right">City</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('city',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="text" class="control-label col-sm-4 col-form-label text-right">Post Code</label>
                                                    <div class="col-sm-8">
                                                        {!! Form::text('post_code',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="structure" class="tab-pane fade">
                                            structure
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">

@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(function () {
            $("#geo_country").select2({ width: '100%' });
        })

    </script>
@stop
