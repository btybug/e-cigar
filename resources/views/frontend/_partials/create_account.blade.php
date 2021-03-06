<div class="modal modal-accounts fade" id="registerModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close main-transition" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="row no-gutters modal-content_inner">
                <div class="col-md-4 col-sm-2">
                    <div class="modal_left-img-holder h-100"
                         style="background-image: url(/img/temp/modal-acount-bg.jpg)"></div>
                </div>
                <div class="col-md-8 col-sm-10">
                    <div class="modal_right">
                        <h2 class="text-uppercase text-main-clr font-20 modal-title text-center">{!! __('create_account') !!}</h2>
                        {{--                        <p class="font-13 text-gray-clr modal-text">{!! __('create_account_desc') !!}</p>--}}
                        <form method="POST" action="{{ route('register') }}" class="register-form mt-5" id="register-form-1">
                            @csrf
                            {{--                            <div class="d-flex flex-wrap">--}}
                            {{--                                <div class="mr-2">--}}
                            {{--                                    <label class="text-gray-clr register-form_label">{!! __('become_wholesaler') !!}</label>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="row no-gutters form-checkes-outer d-flex justify-content-between">--}}
                            {{--                                    <div>--}}
                            {{--                                        <input class="form-check-input register-form_input-radio wholesaler_radio" type="radio"--}}
                            {{--                                               name="wholesaler" id="wholesaler1" value="0" checked>--}}
                            {{--                                        <label--}}
                            {{--                                            class="form-check-label mb-0 d-flex align-items-center text-gray-clr pointer"--}}
                            {{--                                            for="wholesaler1">--}}
                            {{--                                            {!! __('no') !!}--}}
                            {{--                                        </label>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div>--}}
                            {{--                                        <input class="form-check-input register-form_input-radio wholesaler_radio" type="radio"--}}
                            {{--                                               name="wholesaler" id="wholesaler2" value="1">--}}
                            {{--                                        <label--}}
                            {{--                                            class="form-check-label mb-0 d-flex align-items-center text-gray-clr pointer"--}}
                            {{--                                            for="wholesaler2">--}}
                            {{--                                            {!! __('yes') !!}--}}
                            {{--                                        </label>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="row d-none wholesaler-box">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="companyName" class="text-gray-clr register-form_label">{!! __('company_name') !!}</label>
                                        <input id="companyName" type="text" class="form-control register-form_input-text"
                                               name="company_name" value="{{ old('company_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="companyNumber" class="text-gray-clr register-form_label">{!! __('company_number') !!}</label>
                                        <input id="companyNumber" type="text" class="form-control register-form_input-text"
                                               name="company_number" value="{{ old('company_number') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName" class="text-gray-clr register-form_label">{!! __('first_name') !!} <sup class="font-8 text-danger"><i class="fas fa-star"></i></sup></label>
                                        <input id="firstName" type="text" class="form-control register-form_input-text"
                                               name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName" class="text-gray-clr register-form_label">{!! __('last_name') !!} <sup class="font-8 text-danger"><i class="fas fa-star"></i></sup></label>
                                        <input id="lastName" type="text" class="form-control register-form_input-text"
                                               name="last_name" value="{{ old('last_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="e-mail" class="text-gray-clr register-form_label">{!! __('e_mail_address') !!} <sup class="font-8 text-danger"><i class="fas fa-star"></i></sup></label>
                                        <input id="e-mail" type="text" class="form-control register-form_input-text"
                                               name="email" value="{{ old('email') }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber" class="text-gray-clr register-form_label">{!! __('phone_number') !!}</label>
                                        <input id="phoneNumber" type="text"
                                               class="form-control register-form_input-text"
                                               name="phone" value="{{ old('phone') }}" autofocus>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="text-gray-clr register-form_label">{!! __('password') !!} <sup class="font-8 text-danger"><i class="fas fa-star"></i></sup></label>
                                        <input id="password" name="password" type="password"
                                               class="form-control register-form_input-text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirmPassword" class="text-gray-clr register-form_label">{!! __('confirm_password') !!} <sup class="font-8 text-danger"><i class="fas fa-star"></i></sup></label>
                                        <input id="confirmPassword" type="password"
                                               class="form-control register-form_input-text"
                                               name="password_confirmation">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    @php
                                        $countries = (new \PragmaRX\Countries\Package\Countries())->all()->pluck('name.common', 'name.common')->toArray();
                                    @endphp
                                    <div class="form-group mb-0">
                                        <label for="country" class="text-gray-clr register-form_label">{!! __('country') !!}</label>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::select('country',$countries,null,['id'=>'country',"style" =>"width: 100%",'class' => 'select-2 select-2--no-search main-select main-select-2arrows account-country-select']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="text-gray-clr register-form_label">{!! __('gender') !!}</label>
                                    </div>
                                    <div class="row no-gutters form-checkes-outer d-flex justify-content-between">
                                        <div>
                                            <input class="form-check-input register-form_input-radio" type="radio"
                                                   name="gender" id="genderRadios1" value="male" checked>
                                            <label
                                                class="form-check-label mb-0 d-flex align-items-center text-gray-clr pointer"
                                                for="genderRadios1">
                                                {!! __('male') !!}
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input register-form_input-radio" type="radio"
                                                   name="gender" id="genderRadios2" value="female">
                                            <label
                                                class="form-check-label mb-0 d-flex align-items-center text-gray-clr pointer"
                                                for="genderRadios2">
                                                {!! __('female') !!}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row pt-4 row--modal-bottom">
                                <div class="col-md-7 d-flex align-items-center">
                                    <div class="position-relative">
                                        <input class="form-check-input register-form_input-check"
                                               name="terms_conditions" type="checkbox" value="1" id="defaultCheck1">
                                        <label class="form-check-label text-gray-clr register-form_label pointer"
                                               for="defaultCheck1">
                                            {!! __('reg_agree_to') !!}&nbsp;&nbsp; <a href="#" class="text-uderlined text-gray-clr">{!! __('terms_and_conditions') !!}</a>
                                            <span
                                                class="check-icon d-inline-flex align-items-center justify-content-center position-absolute">
                                            <svg viewBox="0 0 26 26" enable-background="new 0 0 26 26">
  <path
      d="m.3,14c-0.2-0.2-0.3-0.5-0.3-0.7s0.1-0.5 0.3-0.7l1.4-1.4c0.4-0.4 1-0.4 1.4,0l.1,.1 5.5,5.9c0.2,0.2 0.5,0.2 0.7,0l13.4-13.9h0.1v-8.88178e-16c0.4-0.4 1-0.4 1.4,0l1.4,1.4c0.4,0.4 0.4,1 0,1.4l0,0-16,16.6c-0.2,0.2-0.4,0.3-0.7,0.3-0.3,0-0.5-0.1-0.7-0.3l-7.8-8.4-.2-.3z"/>
</svg>
                                        </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-5 text-right modal-accounts_btn-holder">
                                    <button type="submit" class="btn text-uppercase btn-submit font-15">{!! __('sign_up') !!}</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 offset-md-5 text-right">
                                    <p class="mb-0 font-13 text-gray-clr">
                                        {!! __('already_have_account') !!}
                                        <span class="text-uderlined text-uppercase text-gray-clr pointer"
                                              data-toggle="modal" data-target="#loginModal"
                                              data-dismiss="modal">{!! __('sign_in') !!}</span>
                                    </p>
                                </div>
                            </div>
                            {!! Form::hidden('g-recaptcha-response',null,['class'=>'g-recaptcha-response']) !!}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
