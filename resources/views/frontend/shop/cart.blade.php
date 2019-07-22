@extends('layouts.frontend')
@section('content')
    <main class="main-content">
        <div class="shopping-cart_wrapper shopping__cart-wrapper">
            <div class="container main-max-width shopping__cart-mw shopping__cart-with-back">
                <div class="d-flex shopping-cart-head">
                    <div class="shopping-cart-head-back-btn">
                        <a href="#">
                            <span class="icon">
                                <svg width="10px" height="13px" viewBox="0 0 10 13">
<path fill-rule="evenodd" opacity="0.8" fill="rgb(53, 53, 53)"
      d="M-0.000,7.000 L10.000,13.000 C10.000,13.000 10.000,11.738 10.000,10.000 C9.031,9.578 4.000,7.000 4.000,7.000 C4.000,7.000 9.156,3.553 10.000,3.000 C10.000,1.262 10.000,-0.000 10.000,-0.000 L-0.000,7.000 Z"/>
</svg>
                            </span>
                            <span class="text-main-clr font-22 name">Back</span>
                        </a>
                    </div>
                    <ul class="nav nav-pills">
                        <li class="nav-item col-md-3">
                            <a class="item active d-flex align-items-center justify-content-between"
                               ref="javascript:void(0);">
                                <span class="font-sec-reg text-main-clr num">1</span>
                                <span
                                    class="name text-uppercase font-main-bold font-16 text-truncate">SHOPPING CART</span>
                                <span class="icon">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="19px">
<path fill-rule="evenodd" fill="rgb(81, 229, 109)"
      d="M7.636,15.030 L1.909,9.075 L-0.000,11.060 L7.636,19.000 L24.000,1.985 L22.091,0.000 L7.636,15.030 Z"/>
</svg>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3">
                            <a class="item d-flex align-items-center justify-content-between"
                               href="javascript:void(0);">
                                <span class="font-sec-reg text-main-clr num">2</span>
                                <span class="name text-uppercase font-main-bold font-16 text-truncate">CHECKOUT</span>
                                <span class="icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="19px">
<path fill-rule="evenodd" fill="rgb(81, 229, 109)"
      d="M7.636,15.030 L1.909,9.075 L-0.000,11.060 L7.636,19.000 L24.000,1.985 L22.091,0.000 L7.636,15.030 Z"/>
</svg>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3">
                            <a class="item d-flex align-items-center justify-content-between"
                               href="javascript:void(0);">
                                <span class="font-sec-reg text-main-clr num">3</span>
                                <span class="name text-uppercase font-main-bold font-16 text-truncate">Payment</span>
                                <span class="icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="19px">
<path fill-rule="evenodd" fill="rgb(81, 229, 109)"
      d="M7.636,15.030 L1.909,9.075 L-0.000,11.060 L7.636,19.000 L24.000,1.985 L22.091,0.000 L7.636,15.030 Z"/>
</svg>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3">
                            <a class="item d-flex align-items-center justify-content-between"
                               href="javascript:void(0);">
                                <span class="font-sec-reg text-main-clr num">4</span>
                                <span
                                    class="name text-uppercase font-main-bold font-16 text-truncate">Confirmation</span>
                                <span class="icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="19px">
<path fill-rule="evenodd" fill="rgb(81, 229, 109)"
      d="M7.636,15.030 L1.909,9.075 L-0.000,11.060 L7.636,19.000 L24.000,1.985 L22.091,0.000 L7.636,15.030 Z"/>
</svg>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container main-max-width shopping__cart-mw">
                <div class="cart-area">
                    @include('frontend.shop._partials.cart_table')
                </div>
            </div>
        </div>

        <button id="scrollTopBtn" class="scroll-top-btn d-flex align-items-center justify-content-center pointer">
            <svg viewBox="0 0 17 10" width="17px" height="10px">
                <path fill-rule="evenodd" fill="rgb(124, 124, 124)"
                      d="M0.000,8.111 L1.984,10.005 L8.498,3.789 L15.010,10.005 L16.995,8.111 L8.498,0.001 L0.000,8.111 Z"/>
            </svg>
        </button>
    </main>

    <div class="modal fade p-0" id="specialPopUpModal" tabindex="-1" role="dialog"
         aria-labelledby="specialPopUpModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable mw-100" role="document">
            <div class="modal-content">
                <div class="modal-header special__popup-head">
                    <h5 class="font-sec-reg font-26 text-sec-clr modal-title" id="specialPopUpModalTitle">Special
                        Offer</h5>
                    <div class="font-main-light font-20 text-main-clr align-self-stretch special__popup-head-mid">You
                        might be interested in the following offers
                    </div>
                    <button type="button" class="align-self-stretch close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="42px" height="42px" viewBox="0 0 42 42">
<path fill-rule="evenodd" fill="rgb(53, 53, 53)"
      d="M42.008,1.300 L40.701,-0.009 L21.000,19.690 L1.301,-0.009 L-0.008,1.300 L19.691,21.000 L-0.008,40.699 L1.301,42.009 L21.000,22.307 L40.701,42.009 L42.008,40.699 L22.309,21.000 L42.008,1.300 Z"/>
</svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body p-0">
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/frontend/css/cart.css')}}">
@stop
@section("js")
    <script>
        $("body").on('keyup', '#coupon_code', function () {
            let value = $(this).val();
            $("body").find("#coupon_require_error").addClass('hide');
            clearTimeout(timeout);
            var timeout = setTimeout(function () {
                console.log(value);
                AjaxCall("/apply-coupon", {
                    code: value,
                    user_id: $("#order_user").val()
                }, function (res) {
                    if (res.error) {
                        $("body").find("#coupon_require_error").text(res.message);
                        $("body").find("#coupon_require_error").removeClass('hide');
                    }else{
                        $(".order-summary").html(res.summaryHtml);
                    }

                });
            }, 500);
        });
    </script>
@stop
