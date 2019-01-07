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
                                @if($user->status)
                                    {!! Form::model($user,['url' => route('my_account_save_contact_data')]) !!}
                                @else
                                    {!! Form::model($user) !!}
                                @endif
                                <h3>Essential</h3>
                                @if($user->status)
                                    <div class="form-group row">
                                        <label for="username" class="col-md-4">
                                            First Name
                                        </label>
                                        <div class="col-md-8">
                                            <div class="form-control">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-md-4">
                                            Last Name
                                        </label>
                                        <div class="col-md-8">
                                            <div class="form-control">{{ $user->last_name }}</div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username" class="col-md-4">
                                            Date of birth
                                        </label>
                                        <div class="col-sm-6">
                                            <div class="form-control">{{ $user->dob }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            {{ ($user->age) ? $user->age .' years' : null }}
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="username" class="col-md-4">
                                            Gender
                                        </label>
                                        <div class="col-md-8">
                                            <div class="form-control">{{ ucfirst($user->gender) }}</div>
                                        </div>
                                    </div>
                                @else
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

                                    <div class="form-group row">
                                        <label for="username" class="col-md-4">
                                            Date of birth
                                            <span class="required text-danger">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <div class="input-group date">
                                                {!! Form::text('dob',null,['placeholder' => 'Date of Birth',
                                              'id'=>'dob', 'class'=> 'form-control date']) !!}
                                                <span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div>
                                        </div>
                                        <div class="col-md-2">
                                            {{ ($user->age) ? $user->age .' years' : null }}
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
                                @endif

                                <h3>Contact</h3>

                                <div class="form-group row mail">
                                    <label for="username" class="col-md-4">
                                        Email address
                                        <span class="required text-danger">*</span>
                                    </label>

                                    <div class="col-md-8">
                                        {!! Form::email('email',null,['class'=>'form-control','id'=>'exampleInputEmail1','aria-describedby'=>"emailHelp"]) !!}
                                    </div>
                                </div>

                                {{--<div class="form-group row">--}}
                                {{--<label for="username" class="col-md-4">--}}
                                {{--Country--}}
                                {{--<span class="required text-danger">*</span>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-8">--}}
                                {{--{!! Form::text('country',null,['class'=>'form-control']) !!}--}}
                                {{--</div>--}}
                                {{--</div>--}}
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
                            <!-- Multiple Checkboxes (inline) -->
                            <div class="form-group">
                                <label class="col-md-8 control-label" for="checkboxes">Subscribe To</label>
                                <div class="col-md-4">
                                    <label class="checkbox-inline" for="checkboxes-0">
                                        <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                        Marketing
                                    </label>
                                    <label class="checkbox-inline" for="checkboxes-1">
                                        <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
                                        Newsletter
                                    </label>
                                </div>
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
                                                        <input type="password" name='current_password'
                                                               class="form-control"
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
                                                    <label for="exampleInputPassword3" class="one col-md-4">
                                                        Confirm New Password
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input type="password" name="password_confirmation"
                                                               class="form-control"
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
            @include('frontend.my_account._partials.verify_bar')
        </div>
    </main>
@stop
@section('css')
    {!! Html::style("public/admin_theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") !!}
@stop

@section('js')
    {!! Html::script("public/admin_theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")!!}
    <script>
        $(function () {
            $("#dob").datepicker({
                format: 'yyyy-mm-dd',
                changeMonth: true,
                changeYear: true,
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                // maxYear: parseInt(moment().format('YYYY'),10)
            });
        });
    </script>
@stop