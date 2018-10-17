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
                <ul class="nav nav-tabs admin-profile-left">
                    <li class="active"><a data-toggle="tab" href="#basic">Basic Details</a></li>
                    <li><a data-toggle="tab" href="#media">Media</a></li>
                    <li><a data-toggle="tab" href="#attributes">Attributes</a></li>
                    <li><a data-toggle="tab" href="#options">Options</a></li>
                </ul>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="basic" class="tab-pane basic-details-tab fade in active">
                        <div class="container-fluid p-25">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="basic-left basic-wall">
                                        <div class="all-list">
                                            <ul>
                                                <li><a href="#">Flavour</a></li>
                                                <li><a href="#">Flavour</a></li>
                                            </ul>
                                        </div>
                                        <div class="button-add text-center">
                                            <a href="#" class="btn btn-info btn-block"><i class="fa fa-plus"></i>Add new option</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="basic-center basic-wall">
                                        Strawbery
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="basic-right basic-wall">
                                        <ul class="list">
                                            <li><a href="#">Apple</a></li>
                                            <li><a href="#">Banana</a></li>
                                            <li><a href="#">Strawbery</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="media" class="tab-pane fade">
                        Media
                    </div>
                    <div id="attributes" class="tab-pane fade">
                        attributes
                    </div>
                    <div id="options" class="tab-pane fade">
                        options
                    </div>
                </div>
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