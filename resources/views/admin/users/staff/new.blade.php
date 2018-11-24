@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <section class="content-header">
        <h1> New Staff</h1>
        <ol class="breadcrumb">
            <li><a href="http://demo0.laravelcommerce.com/admin/dashboard/this_month"><i class="fa fa-dashboard"></i>
                    Dashboard</a></li>
            <li class="active">New Staff</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div id="users_profile" class="tab-pane fade in active">
                            {!! Form::open(['class'=>'form-horizontal']) !!}
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">First Name</label>

                                <div class="col-sm-10">
                                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">
                                    {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">E-mail </label>

                                <div class="col-sm-10">
                                    {!! Form::text('email',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    {!! Form::text('phone',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    {!! Form::select('country',$countries,null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Gender</label>
                                <div class="col-sm-10">
                                    {!! Form::select('gender',['male'=>'Male','female'=>'Female'],null,['class'=>'form-control']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    {!! Form::select('status',[0=>'In Active',1=>'Active'],null,['class'=>'form-control']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Role</label>
                                <div class="col-sm-10">
                                    {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                        <div id="users_logs" class="tab-pane fade">
                            <h3>Logs</h3>
                        </div>
                        <div id="users_favourites" class="tab-pane fade">
                            <h3>Favourites</h3>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
@stop