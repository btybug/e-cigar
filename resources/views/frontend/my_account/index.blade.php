@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account'])
            </div>
            <div class="col-md-8">
                <div class="my-account p-5 card">
                    <div class="container">
                        {!! Form::model($user) !!}
                        <div class="mb-4">
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
                                    {!! Form::text('gender',null,['class'=>'form-control']) !!}
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
                        </div>
                        {!! Form::close() !!}
                        <div>
                            <h3 class="mb-4">Password Change</h3>
                            <div class="form-group row username">
                                <label for="username" class="col-md-4">
                                    Current Password
                                </label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                            <div class="form-group row confirm">
                                <label for="username" class="col-md-4">
                                    New Password
                                </label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" id="exampleInputPassword2">
                                </div>
                            </div>
                            <div class="form-group row confirm">
                                <label for="username" class="one col-md-4">
                                    Confirm New Password
                                </label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" id="exampleInputPassword3">
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

                            <div>
                                <input type="submit" class="btn btn-primary" value="Save changes">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@stop
@section('css')
    {{--<link rel="stylesheet" href="{{asset('public/frontend/css/my-account.css?v='.rand(111,999))}}">--}}
@stop