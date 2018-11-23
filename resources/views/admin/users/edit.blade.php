@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <section class="content-header">
        <h1> Admin Profile </h1>
        <ol class="breadcrumb">
            <li><a href="http://demo0.laravelcommerce.com/admin/dashboard/this_month"><i class="fa fa-dashboard"></i>
                    Dashboard</a></li>
            <li class="active">Admin Profile</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary mar-0">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="http://demo0.laravelcommerce.com/resources/views/admin/images/admin_profile/1539074891.42792796_2710973195795309_228747741981835264_n.png"
                             alt="Václav profile picture">

                        <h3 class="profile-username text-center">Václav Kutiš</h3>

                        <p class="text-muted text-center">Administrator</p>

                        <!-- <ul class="list-group list-group-unbordered">
                           <li class="list-group-item">
                             <b>Followers</b> <a class="pull-right">1,322</a>
                           </li>
                           <li class="list-group-item">
                             <b>Following</b> <a class="pull-right">543</a>
                           </li>
                           <li class="list-group-item">
                             <b>Friends</b> <a class="pull-right">13,287</a>
                           </li>
                         </ul>

                         <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <ul class=" nav nav-pills nav-stacked admin-profile-left">
                    <li class="active">
                        <a href="#users_profile" data-toggle="tab">Profile</a>
                    </li>
                    <li>
                        <a href="#users_logs" data-toggle="tab">Logs</a>
                    </li>
                    <li>
                        <a href="#users_favourites" data-toggle="tab">Favourites</a>
                    </li>
                </ul>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    {{--<ul class="nav nav-tabs">--}}
                    {{--<li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>--}}
                    {{--<li><a href="#passwordDiv" data-toggle="tab">Password</a></li>--}}
                    {{--</ul>--}}
                    <div class="tab-content">
                        <div id="users_profile" class="tab-pane fade in active">
                            <!-- The timeline -->
                            {!! Form::model($user,['class'=>'form-horizontal']) !!}
                            {!! Form::hidden('id') !!}

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