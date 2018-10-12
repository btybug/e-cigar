@extends('layouts.frontend')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="registration-area">
            <div class="heading">
                <h2>Login Or Create an Account</h2>
                <hr>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-6 new-customers">
                    <h5 class="title-h5">New Customers</h5>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>

                    <hr class="featurette-divider">
                    <p class="text-center">Don't have account? <a href="http://laravelcommerce.com/signup" class="btn btn-link ml-1"><b>Sign Up</b></a></p>
                    <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in with:</p>

                    <div class="row my-3 d-flex justify-content-center">
                        <!--Facebook-->
                        <a href="login/facebook" class="btn btn-light facebook"><i class="fa fa-facebook"></i>Login with Facebook</a>
                        <!--Google +-->
                        <a href="login/google" class="btn btn-light google"><i class="fa fa-google-plus"></i>Login with Google</a>
                    </div>
                </div>

                <div class="col-12 col-md-6 registered-customers">

                    <h5 class="title-h5">
                        Registered Customers			</h5>
                    <p>If you have an account with us, please log in</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">{{ __('Register') }}</div>

            <div class="card-body">
            </div>
        </div>
    </div>
</div>
@endsection
