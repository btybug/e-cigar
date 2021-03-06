<div class="modal modal-accounts fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close main-transition" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="row no-gutters modal-content_inner">
                <div class="col-md-4 col-sm-2">
                    <div class="modal_left-img-holder h-100" style="background-image: url(/img/temp/modal-login-bg.jpg)"></div>
                </div>

                <div class="col-md-8 col-sm-10">
                    <div class="modal_right d-flex flex-column justify-content-between h-100">
                        <div>
                            <h2 class="text-uppercase text-main-clr font-20 modal-title text-center">{!! __('customer_login') !!}</h2>
{{--                            <p class="font-13 text-gray-clr modal-text"> {!! __('login_desc') !!}</p>--}}
                        </div>
                        <form  method="POST" action="{{ route('login') }}" class="register-form mt-5" id="login-form">
                            @csrf

                            <div class="form-group mb-5">
                                <div class="row">
                                    <div class="col-xl-3 col-md-4 pr-md-0 pr-3">
                                        <label for="loginEmail" class="text-gray-clr register-form_label col-form-label">{!! __('e_mail_address') !!}</label>
                                    </div>
                                    <div class="col-xl-9 col-md-8">
                                        <input id="loginEmail" type="email" class="form-control register-form_input-text register-form_input-text--login{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-3 col-md-4 pr-md-0 pr-3">
                                        <label for="loginPass" class="text-gray-clr register-form_label col-form-label">{!! __('password') !!}</label>
                                    </div>
                                    <div class="col-xl-9 col-md-8">
                                        <input id="loginPass" type="password" class="form-control register-form_input-text register-form_input-text--login{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-4 row--modal-bottom">

                                <div class="col-md-6 modal-accounts_btn-holder">
                                    <button type="submit" class="btn text-uppercase btn-submit font-15 sign_in">{!! __('sign_in') !!}</button>
                                </div>
                                <div class="col-md-6 d-flex align-items-center justify-content-end">
                                    <a href="{{ route('password.request') }}" class="font-13 text-gray-clr text-uderlined">{!! __('forgot_password') !!}?</a>
                                    {{--                                    <div class="position-relative">--}}
                                    {{--                                        <input class="form-check-input register-form_input-check" type="checkbox" value="" id="rememberCheck1" name="remember">--}}
                                    {{--                                        <label class="form-check-label text-gray-clr register-form_label pointer" for="rememberCheck1">--}}
                                    {{--                                            {!! __('remember_me') !!}--}}
                                    {{--                                            <span class="check-icon d-inline-flex align-items-center justify-content-center position-absolute">--}}
                                    {{--                                            <svg viewBox="0 0 26 26" enable-background="new 0 0 26 26">--}}
                                    {{--  <path d="m.3,14c-0.2-0.2-0.3-0.5-0.3-0.7s0.1-0.5 0.3-0.7l1.4-1.4c0.4-0.4 1-0.4 1.4,0l.1,.1 5.5,5.9c0.2,0.2 0.5,0.2 0.7,0l13.4-13.9h0.1v-8.88178e-16c0.4-0.4 1-0.4 1.4,0l1.4,1.4c0.4,0.4 0.4,1 0,1.4l0,0-16,16.6c-0.2,0.2-0.4,0.3-0.7,0.3-0.3,0-0.5-0.1-0.7-0.3l-7.8-8.4-.2-.3z"/>--}}
                                    {{--</svg>--}}
                                    {{--                                        </span>--}}
                                    {{--                                        </label>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            {!! Form::hidden('g-recaptcha-response',null,['class'=>'g-recaptcha-response']) !!}
                        </form>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('redirect_login') }}" class="font-13 text-gray-clr text-uderlined">{!! __('Login Wholesale') !!}?</a>
                            </div>
                            <div class="col-md-6 text-right ">
                                <p class="mb-0 font-13 text-gray-clr">

                                    &nbsp;{!! __('sign_up_question') !!}
                                    <span class="text-uderlined text-uppercase text-main-clr pointer" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">{!! __('sign_up') !!}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
