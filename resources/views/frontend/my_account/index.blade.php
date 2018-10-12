@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account'])
            </div>
            <div class="col-md-8">
                <div class="my-account">
                    <div class="container">
                       {!! Form::model($user) !!}
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <label for="username" class="col-sm-4">
                                            First Name
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <label for="username" class="col-sm-4">
                                            Last Name
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mail mt-3">
                                <label for="username" class="col-sm-2">
                                    Email address
                                    <span class="required">*</span>
                                </label>

                                <div class="col-sm-10">
                                    {!! Form::email('email',null,['class'=>'form-control','id'=>'exampleInputEmail1','aria-describedby'=>"emailHelp"]) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <div class="form-bg mt-5 ">
                            <div class="change">
                                <span>Password Change</span>
                            </div>
                            <div class="row username">
                                <label for="username" class="col-sm-2">
                                    Current Password
                                </label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                            <div class="row confirm mt-2">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <label for="username" class="col-sm-4">
                                            New Password
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="exampleInputPassword2">
                                        </div>
                                    </div>


                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <label for="username" class="one col-sm-4">
                                            Confirm New Password
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="exampleInputPassword3">
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                        <div class="avatar d-flex">
                            <span>Avatar</span>
                            <img src="/public/images/{!!$user->gender!!}.png" alt="">
                        </div>
                        <div class="bat">
                            <button type="button" class="btn btn-primary">Change Avatar</button>
                        </div>
                        <div class="log mt-5">
                            <input type="submit" class="button" name="login" value="Save changes">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/frontend/css/my-account.css?v='.rand(111,999))}}">
@stop