@extends('layouts.frontend')
@section('content')
    <main class="page-main-content">
        <div class="d-flex h-100">

            @include('frontend._partials.left_bar')
            <div class="main-right-wrapp">
                <div class="container mt-5">
                    {{--<div class="col-md-4">--}}
                    {{--@include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account'])--}}
                    {{--</div>--}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="my-account p-5 card">
                        <div class="container">
                            <div class="mb-4">
                                {!! Form::model($user) !!}
                                <div class="form-group row">
                                    <label for="username" class="col-md-4">
                                        First Name
                                        <span class="required text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-md-4">
                                        Last Name
                                        <span class="required text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row mail">
                                    <label for="username" class="col-md-4">
                                        Email address
                                        <span class="required text-danger">*</span>
                                    </label>

                                    <div class="col-md-8">
                                        {!! Form::email('email',null,['class'=>'form-control','id'=>'exampleInputEmail1','aria-describedby'=>"emailHelp"]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-md-4">
                                        Gender
                                        <span class="required text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        {!! Form::select('gender',['male'=>'Male','female'=>'Female'],null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-md-4">
                                        Country
                                        <span class="required text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        {!! Form::text('country',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="username" class="col-md-4">
                                        Phone
                                        <span class="required text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        {!! Form::text('phone',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row avatar align-items-center mb-4 border-top border-bottom py-3">
                                    <span class="col-md-4">Avatar</span>
                                    <div class="col-md-8">
                                        <img width="150" src="/public/images/{!!$user->gender!!}.png" alt="">
                                        <div>
                                            <button type="button" class="btn btn-secondary">Change Avatar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <input type="submit" class="btn btn-primary" value="Save changes">
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="mb-4">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                    Change Password
                                </button>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    {!! Form::open(['url'=>route('my_account_change_password')]) !!}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="form-group row username">
                                                    <label for="currentPass" class="col-md-4">
                                                        Current Password
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input type="password" name='current_password' class="form-control"
                                                               id="currentPass">
                                                    </div>
                                                </div>
                                                <div class="form-group row confirm">
                                                    <label for="exampleInputPassword2" class="col-md-4">
                                                        New Password
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input type="password" name="password" class="form-control"
                                                               id="exampleInputPassword2">
                                                    </div>
                                                </div>
                                                <div class="form-group row confirm">
                                                    <label for="exampleInputPassword3"  class="one col-md-4">
                                                        Confirm New Password
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input type="password" name="password_confirmation" class="form-control"
                                                               id="exampleInputPassword3">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
@stop
@section('css')
    {{--<link rel="stylesheet" href="{{asset('public/frontend/css/my-account.css?v='.rand(111,999))}}">--}}
@stop