@extends('layouts.admin')
@section('content')
    <div class="col-md-6">
        {!! Form::open(['class'=>'form-horizontal']) !!}
            <fieldset>

                <!-- Form Name -->
                <legend>Export User </legend>

                <!-- Multiple Checkboxes -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="checkboxes">Columns</label>
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label for="name">
                                {!! Form::checkbox('name',1,null,['id'=>'name']) !!}
                                name
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="last_name">
                                {!! Form::checkbox('last_name',1,null,['id'=>'last_name']) !!}
                                last name
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="email">
                                {!! Form::checkbox('email',1,null,['id'=>'email']) !!}
                                email
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="email_verified_at">
                                {!! Form::checkbox('email_verified_at',1,null,['id'=>'email_verified_at']) !!}
                                email verified at
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="phone">
                                {!! Form::checkbox('phone',1,null,['id'=>'phone']) !!}
                                phone
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="avatar">
                                {!! Form::checkbox('avatar',1,null,['id'=>'avatar']) !!}
                                avatar
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="country">
                                {!! Form::checkbox('country',1,null,['id'=>'country']) !!}
                                country
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="gender">
                                {!! Form::checkbox('checkboxes',1,null,['id'=>'gender']) !!}
                                gender
                            </label>
                        </div>
                    </div>
                </div>

            </fieldset>
        {!! Form::close() !!}

    </div>
@stop
