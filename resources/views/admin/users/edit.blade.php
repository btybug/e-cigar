@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="panel panel-default users-log-wrapper">
        <div class="panel-heading clearfix">
            <h2 class="m-0 pull-left"> Admin Profile </h2>
            <ol class="breadcrumb pull-right mb-0">
                <li><a href="http://demo0.laravelcommerce.com/admin/dashboard/this_month"><i class="fa fa-dashboard"></i>
                        Dashboard</a></li>
                <li class="active">Admin Profile</li>
            </ol>
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="box box-primary mar-0">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="http://demo0.laravelcommerce.com/resources/views/admin/images/admin_profile/1539074891.42792796_2710973195795309_228747741981835264_n.png"
                                 alt="Václav profile picture">

                            <h3 class="profile-username text-center">{!! $user->name.' '.$user->last_name !!}</h3>

                            <p class="text-muted text-center">{!! ($user->role)?$user->role->title:'User' !!}</p>

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
                        <li>
                            <a href="#orders" data-toggle="tab">Orders</a>
                        </li>
                    </ul>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                        {{--<ul class="nav nav-tabs">--}}
                        {{--<li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>--}}
                        {{--<li><a href="#passwordDiv" data-toggle="tab">Password</a></li>--}}
                        {{--</ul>--}}
                        <div class="tab-content">
                            <div id="users_profile" class="tab-pane fade in active">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="m-0">Profile</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!-- The timeline -->
                                        {!! Form::model($user,['class'=>'']) !!}
                                        {!! Form::hidden('id') !!}

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 control-label">First Name</label>

                                            <div class="col-sm-10">
                                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 control-label">Last Name</label>
                                            <div class="col-sm-10">
                                                {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 control-label">E-mail </label>

                                            <div class="col-sm-10">
                                                {!! Form::text('email',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 control-label">Phone</label>
                                            <div class="col-sm-10">
                                                {!! Form::text('phone',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 control-label">Country</label>
                                            <div class="col-sm-10">
                                                {!! Form::select('country',$countries,null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 control-label">Gender</label>
                                            <div class="col-sm-10">
                                                {!! Form::select('gender',['male'=>'Male','female'=>'Female'],null,['class'=>'form-control']) !!}

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                {!! Form::select('status',[0=>'In Active',1=>'Active'],null,['class'=>'form-control']) !!}

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 control-label">Membership</label>
                                            <div class="col-sm-10">
                                                {!! Form::select('role_id',[null=>'No Membership']+$roles,null,['class'=>'form-control']) !!}

                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                        <div class="text-right">
                                            {!! Form::open(['url'=>route('post_admin_users_reset_pass')]) !!}
                                            {!! Form::hidden('email',$user->email) !!}
                                            <button type="submit" class="btn btn-warning">Send reset password email</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="users_logs" class="tab-pane fade">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="m-0">Logs</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="users-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Url</th>
                                                <th>Method</th>
                                                <th>Ip</th>
                                                <th>Iso Code</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>State Name</th>
                                                <th>Timezone</th>
                                                <th>Agent</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="users_favourites" class="tab-pane fade">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="m-0">Favourites</h3>
                                    </div>
                                    <div class="panel-body">

                                    </div>
                                </div>
                            </div>
                            <div id="orders" class="tab-pane fade">
                                <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="m-0">{!! __('Orders') !!}</h3>
                                        </div>
                                    <div class="panel-body">
                                        <table id="orders-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Amount</th>
                                                <th>Country</th>
                                                <th>Region</th>
                                                <th>City</th>
                                                <th>Status</th>
                                                <th>Shipping method</th>
                                                <th>Payment Method</th>
                                                <th>Currency</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script>
        $(function () {
            $('#users-table').DataTable({
                ajax:  "{!! route('datatable_user_activity',$user->id) !!}",
                columns: [
                    {data: 'id',name: 'id'},
                    {data: 'url',name: 'url'},
                    {data: 'method', name: 'method'},
                    {data: 'ip', name: 'ip'},
                    {data: 'iso_code', name: 'iso_code'},
                    {data: 'country', name: 'country'},
                    {data: 'city', name: 'city'},
                    {data: 'state', name: 'state'},
                    {data: 'state_name', name: 'state_name'},
                    {data: 'timezone', name: 'timezone'},
                    {data: 'agent', name: 'agent'},
                    {data: 'created_at', name: 'created_at'},
                ],
                order: [ [0, 'desc'] ]
            });

                $('#orders-table').DataTable({
                    ajax: "{!! route('datatable_user_orders',$user->id) !!}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'user', name: 'user'},
                        {data: 'amount', name: 'amount'},
                        {data: 'country', name: 'country'},
                        {data: 'region', name: 'region'},
                        {data: 'city', name: 'city'},
                        {data: 'status', name: 'status'},
                        {data: 'shipping_method', name: 'shipping_method'},
                        {data: 'payment_method', name: 'payment_method'},
                        {data: 'currency', name: 'currency'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'updated_at', name: 'updated_at'},
                        {data: 'actions', name: 'actions'}
                    ],
                    order: [ [0, 'desc'] ]
                });
        });

    </script>
@stop