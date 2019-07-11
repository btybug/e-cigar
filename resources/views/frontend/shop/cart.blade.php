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
                    {{--                    --------------------- shopping cart no registr start------------------}}
                    <div class="shopping__cart-no-reg">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left-content">
                                    <form action="">
                                        <div class="main-wrap">
                                            <h2 class="font-40 text-tert-clr title">SIGHN IN</h2>
                                            <p class="font-26 text-main-clr sec-title">Already a customer</p>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="E-mail">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="d-flex bottom-wrap">
                                            <a href="#" class="btn-log-reg">log in</a>
                                            <a href="#" class="forgot-password">forget your password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="right-content">
                                    <h2>REGISTER</h2>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-logo">
                            <div class="logo">
                                <img src="/public/img/vapors-logo.png" alt="logo">
                            </div>
                        </div>
                    </div>
                    {{--                    --------------------- shopping cart no registr end------------------}}
                    {{--            ------------------        shoping details tab start   ----------------   --}}
                    <div id="singleProductPageCnt" class="shopping-cart-content">
                        <div class="shopping-cart-inner">
                            <div class="d-flex flex-wrap">
                                <div class="col-lg-10 pl-0">
                                    <div class="shopping__cart-tab-details">
                                        <div class="row">
                                            <div class="col-md-6 detail-left-col">
                                                <div class="cart-details">
                                                    <div class="d-flex align-items-center cart-details-head">
    <span class="cart-details-avatar">
        <span class="icon-avatar">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="41px" height="41px" viewBox="0 0 41 41">
            <path fill-rule="evenodd" opacity="0.502" fill="rgb(0, 0, 0)"
                  d="M34.996,26.504 C32.763,24.271 30.105,22.619 27.206,21.618 C30.311,19.479 32.351,15.899 32.351,11.852 C32.351,5.317 27.035,-0.000 20.500,-0.000 C13.965,-0.000 8.648,5.317 8.648,11.852 C8.648,15.899 10.689,19.479 13.794,21.618 C10.895,22.619 8.237,24.271 6.004,26.504 C2.132,30.376 -0.000,35.524 -0.000,41.000 L3.203,41.000 C3.203,31.462 10.962,23.703 20.500,23.703 C30.037,23.703 37.797,31.462 37.797,41.000 L41.000,41.000 C41.000,35.524 38.868,30.376 34.996,26.504 ZM20.500,20.500 C15.731,20.500 11.852,16.620 11.852,11.852 C11.852,7.083 15.731,3.203 20.500,3.203 C25.269,3.203 29.148,7.083 29.148,11.852 C29.148,16.620 25.269,20.500 20.500,20.500 Z"/>
        </svg>
        </span>
    </span>
                                                        <span class="font-28 lh-1 text-tert-clr name">
        User Name
    </span>
                                                    </div>
                                                    <div class="row cart-details-address">
                                                        <div class="col-md-4">
                                                            <h3 class="title">Shipping Address</h3>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="address-info">
                                                                <div class="select-wall product__select-wall">
                                                                    <select name="" id=""
                                                                            class="select-2 select-2--no-search main-select not-selected arrow-dark select2-hidden-accessible"
                                                                            style="width: 100%">
                                                                        <option value="">Grand street 178, London
                                                                        </option>
                                                                        <option value="">Grand street 55, London 2
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="main-info">
                                                                    <span>Prime Minister</span>
                                                                    <span>178 Grand Street</span>
                                                                    <span>London</span>
                                                                    <span>SW1A 2AA</span>
                                                                    <span>United Kingdom</span>
                                                                </div>
                                                                <a href="#"
                                                                   class="font-18 bg-blue-clr text-sec-clr add-address-btn">Add
                                                                    New Address</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="cart-details-special">
                                                        <h3 class="title">
                                                            Special Notes
                                                        </h3>
                                                        <textarea name="" cols="30" rows="10" class="note"></textarea>
                                                        <p class="font-16 text-tert-clr note-info">
                                                            * Your Billing address is same as your account
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 detail-right-col">
                                                <div class="cart-delivery">
                                                    <div class="head-delivery">
                                                        <h3 class="title">Delivery Methode</h3>
                                                        <p class="delivery-sec-title font-18">Select your delivery
                                                            service</p>
                                                    </div>

                                                    <div class="method">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" checked class="custom-control-input"
                                                                   id="customRadio1" name="example1" value="customEx">
                                                            <label class="custom-control-label" for="customRadio1">
                                                                <span class="d-flex method-wrap pointer">
                                                                    <span class="method-left">
                                                                         <span class="photo">
<img src="/public/img/temp/dpd-method-icon.jpg" alt="brand">
                                                                </span>
                                                                    </span>
                                                                     <span class="method-right">
                                                                         <span class="method-item-title">Standrd Delivery</span>
                                                                         <span class="font-main-light method-item-info">Shipping: <span
                                                                                 class="text-red-clr">Free</span></span>
                                                                         <span class="font-main-light method-item-info">Delivery Time: 2 days</span>

                                                                    </span>
                                                                </span>
                                                                <span class="check-line"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="method">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                   id="customRadio2" name="example1" value="customEx">
                                                            <label class="custom-control-label" for="customRadio2">
                                                                <span class="d-flex method-wrap pointer">
                                                                    <span class="method-left">
                                                                         <span class="photo">
<img src="/public/img/temp/dhl-method-icon.jpg" alt="brand">
                                                                </span>
                                                                    </span>
                                                                     <span class="method-right">
                                                                         <span
                                                                             class="method-item-title">DHL Delivery</span>
                                                                         <span class="font-main-light method-item-info">Shipping: <span
                                                                                 class="font-weight-bold">$5</span></span>
                                                                         <span class="font-main-light method-item-info">Delivery Time: 3 days</span>

                                                                    </span>
                                                                </span>
                                                                <span class="check-line"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="method">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                   id="customRadio3" name="example1" value="customEx">
                                                            <label class="custom-control-label" for="customRadio3">
                                                                <span class="d-flex method-wrap pointer">

                                                                    <span class="method-left">
                                                                         <span class="photo">
                                                                <img src="/public/img/temp/fedex-method-icon.jpg"
                                                                     alt="brand">
                                                                </span>
                                                                    </span>
                                                                     <span class="method-right">
                                                                         <span class="method-item-title">Priority Delivery</span>
                                                                         <span class="font-main-light method-item-info">Shipping: $10</span>
                                                                         <span class="font-main-light method-item-info">Delivery Time: <span
                                                                                 class="text-tert-clr">1 day</span></span>

                                                                    </span>
                                                                </span>
                                                                <span class="check-line"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 pr-md-right">
                                    <div class="right-content">
                                        {{--                    <h3 class=" head font-main-bold font-20 text-uppercase">ORDER--}}
                                        {{--                        SUMMARY</h3>--}}
                                        <div class="card order-summary">
                                            <div class="card-header text-tert-clr font-26">
                                                ORDER SUMMARY
                                            </div>
                                            <div class="card-body border-top-0">
                                                <div
                                                    class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                    <div class="name">
                                                        Sub Total
                                                    </div>
                                                    <div
                                                        class="price font-main-bold">{!! convert_price(\App\Services\CartService::getTotalPriceSum()+\Cart::getSubTotal(),$currency, false) !!}</div>
                                                </div>
                                                <div
                                                    class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                    <div class="name">
                                                        Tax
                                                    </div>
                                                    <div
                                                        class="price font-main-bold">{!! convert_price(0,$currency, false) !!}</div>
                                                </div>
                                                <div
                                                    class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                    <div class="name">
                                                        Shipping {!! ($shipping) ? '('.$shipping->getAttributes()->courier->name.')' : '' !!}
                                                    </div>
                                                    <div
                                                        class="w-100 d-flex flex-wrap justify-content-between align-items-center row_with-select">
                                                        <div class="select-wall">
                                                            <select name="" id=""
                                                                    class="select-2 select-2--no-search main-select not-selected arrow-dark select2-hidden-accessible"
                                                                    style="width: 175px">
                                                                <option value="">United Kingdom</option>
                                                                <option value="">Armenia</option>
                                                            </select>
                                                        </div>
                                                        <div
                                                            class="price font-main-bold">{!! ($shipping) ? convert_price($shipping->getValue(),$currency, false) : convert_price(0,$currency, false) !!}</div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                    <div
                                                        class="w-100 d-flex flex-wrap justify-content-between align-items-center">
                                                        <div class="name">
                                                            Coupon Discount
                                                        </div>
                                                        <div
                                                            class="price font-main-bold">{{ convert_price(0,$currency, false) }}</div>
                                                    </div>
                                                    <div class="w-100 row_with-select">
                                                        <div class="code">
                                                            <input type="text" class="form-control" name="coupon_code"
                                                                   id="coupon_code">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center border-bottom-0">
                                                    <div class="name">
                                                        Total
                                                    </div>
                                                    <div
                                                        class="price text-tert-clr font-main-bold">{!! convert_price(\App\Services\CartService::getTotalPriceSum()+\Cart::getTotal(),$currency, false) !!}</div>
                                                </div>
                                                {{--                            <div class="coupon-code font-17 d-flex flex-wrap justify-content-between align-items-center">--}}
                                                {{--                                <div class="name">--}}
                                                {{--                                    Coupon code--}}
                                                {{--                                </div>--}}
                                                {{--                                <div class="code">--}}
                                                {{--                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code">--}}
                                                {{--                                </div>--}}
                                                {{--                            </div>--}}
                                                {{--                            <div class="checkout-btn text-center">--}}
                                                {{--                                <a class="btn btn-primary text-uppercase font-15"--}}
                                                {{--                                   href="{!! route('shop_check_out') !!}">--}}
                                                {{--                                    CHECKOUT--}}
                                                {{--                                </a>--}}
                                                {{--                            </div>--}}
                                                <div class="order-summary-btn-wall text-center mb-2">
                                                    <a class="order-summary-btn font-sec-reg text-uppercase font-24 text-sec-clr shop-detail-btn"
                                                       href="#">
                                                        SHOPPING DETAILS
                                                    </a>
                                                </div>
                                                <div class="order-summary-btn-wall text-center">
                                                    <a class="order-summary-btn font-sec-reg text-uppercase font-24 text-main-clr back-btn"
                                                       href="#">
                                                        Back
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        {{--                    <div class="secure d-flex flex-wrap justify-content-between align-items-center">--}}
                                        {{--                        <span class="secure-icon">--}}
                                        {{--                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                                        {{--                                 width="24px" height="26px">--}}
                                        {{--                                <path fill-rule="evenodd" fill="rgb(81, 132, 229)"--}}
                                        {{--                                      d="M12.000,26.000 C0.711,21.986 0.882,13.191 1.034,5.421 C1.043,4.954 1.052,4.502 1.057,4.059 C5.462,3.878 8.985,2.571 12.000,-0.000 C15.016,2.571 18.538,3.878 22.945,4.059 C22.950,4.502 22.959,4.954 22.969,5.421 C23.121,13.189 23.290,21.986 12.000,26.000 ZM21.282,5.596 C17.725,5.220 14.666,4.076 12.000,2.125 C9.335,4.076 6.276,5.220 2.720,5.596 C2.647,9.347 2.587,13.215 3.816,16.559 C5.134,20.144 7.742,22.594 12.000,24.232 C16.259,22.594 18.867,20.144 20.185,16.558 C21.415,13.213 21.355,9.346 21.282,5.596 ZM10.783,17.740 C10.783,17.740 10.288,17.352 10.126,17.226 L5.719,13.776 C5.716,13.772 5.716,13.772 5.713,13.769 L6.869,12.462 L10.576,15.367 L17.033,8.254 L18.365,9.386 L11.339,17.127 C11.164,17.316 10.783,17.740 10.783,17.740 Z"/>--}}
                                        {{--                            </svg>--}}
                                        {{--                        </span>--}}
                                        {{--                        <p class="mb-0 font-12">--}}
                                        {{--                            Full Refund if you don't receive your order. <br>--}}
                                        {{--                            Full or Partial Refund, if the item is not as described.--}}
                                        {{--                        </p>--}}
                                        {{--                    </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--            ------------------        shoping details tab end   ----------------   --}}

                    {{--             --------------       shoping cart tab start  -------------------- --}}
                    <div id="singleProductPageCnt" class="shopping-cart-content">
                        <div class="shopping-cart-inner">
                            <div class="d-flex flex-wrap">
                                <div class="col-lg-10 pl-0">
                                    <div class="shopping__cart-tab-main new__scroll h-100">
                                        <div class="shopping__cart-tab-table-wall position-relative">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td class="photo-td">
                                                            <div class="product-photo-col">
                                                                <img src="/public/img/product-juice.png" alt="product">
                                                            </div>
                                                        </td>
                                                        <td class="info-td">
                                                            <div class="product-info-col">
                                                                <h3 class="font-sec-reg font-28 text-tert-clr lh-1 text-uppercase first-title">
                                                                    dINNER LADY Cubano 32 pRO e-jUICE </h3>
                                                                <div
                                                                    class="font-sec-reg font-26 text-main-clr lh-1 sec-title">
                                                                    Cola Shades
                                                                    E-Juice
                                                                </div>
                                                                <div class="d-flex align-items-center edit-favourite">
<span class="icon">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        width="32px" height="31px" viewBox="0 0 31 32">
<path fill-rule="evenodd" stroke-width="2px" stroke="rgb(53, 53, 53)" opacity="0.702" fill="rgb(255, 255, 255)"
      d="M21.852,2.990 C19.636,2.990 17.428,4.080 15.999,5.846 C14.571,4.080 12.363,2.990 10.147,2.990 C6.125,2.990 3.001,6.258 3.001,10.466 C3.001,15.639 7.419,19.857 14.178,26.113 L15.999,28.011 L17.821,26.113 C24.580,19.857 28.998,15.639 28.998,10.466 C28.998,6.258 25.875,2.990 21.852,2.990 L21.852,2.990 Z"/>
</svg>
</span>
                                                                    <a href="#"
                                                                       class="text-tert-clr font-18 lh-1 edit-link">Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="main-info-td">
                                                            <div class="product-main-info">
                                                                <ul class="list-unstyled mb-0">
                                                                    <li class="single-row-product">
                                                                        <div class="d-flex flex-column w-100 col-9 p-0">
                                                                            <div class="w-100">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-sm-8 font-15 font-main-bold">
                                                                                        Mango Harmony Hit
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">
                                                                                        <span>x 2</span>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="w-100">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-sm-8 font-15 font-main-bold">
                                                                                        Mango Harmony Cloud
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">
                                                                                        <span>x 1</span>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="font-15 font-main-bold align-self-center col-3 pr-0 text-right">
                                                                            $120
                                                                        </div>
                                                                    </li>
                                                                    <li class="single-row-product">

                                                                        <div class="d-flex flex-column w-100 col-9 p-0">
                                                                            <div class="w-100">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-sm-8 font-15 font-main-bold">
                                                                                        Mango Harmony 18
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">
                                                                                        <span>x 2</span>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div
                                                                            class="font-15 font-main-bold align-self-center col-3 pr-0 text-right">
                                                                            $20
                                                                        </div>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <td class="qty-td">
                                                            <div class="d-flex align-items-center qty-col">
                                                                <span class="font-sec-light font-24 lh-1">QTY</span>
                                                                <div class="product__single-item-inp-num">
                                                                    <div class="quantity">
                                                                        <input type="number" min="1" max="9" step="1"
                                                                               value="1">
                                                                        <div class="inp-icons">
                                                                            <span class="inp-up"></span>
                                                                            <span class="inp-down"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </td>
                                                        <td class="price-td">
                                                            <div class="price-col">
                                                                <span class="lh-1 text-tert-clr">£25,78</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class=" d-flex footer">
                                                                <div class="add-offers font-26 font-sec-reg">Added <br/>Offers
                                                                </div>
                                                                <ul class="d-flex flex-wrap list-product">
                                                                    <li class="single-wall no-product">
                                                                        <span class="font-26">No offer is added</span>
                                                                    </li>
                                                                    <li class="single-wall">
                                                                        <div class="photo-item">
                                                                            <img src="/public/img/product-juice.png"
                                                                                 alt="product">
                                                                        </div>
                                                                        <div class="info-product">
                                                                            <h6 class="font-21 text-tert-clr title">
                                                                                Kangertech Vola 23 100W
                                                                                Premium Vape copy 2</h6>
                                                                            <div
                                                                                class="d-flex align-items-center price-wall">
                                                                                <span class="price">£25,78 </span>
                                                                                <a href="#" class="remove-btn">
                                                                                    Remove
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="single-wall">
                                                                        <div class="photo-item">
                                                                            <img src="/public/img/product-juice.png"
                                                                                 alt="product">
                                                                        </div>
                                                                        <div class="info-product">
                                                                            <h6 class="font-21 text-tert-clr title">
                                                                                Kangertech Vola 23 100W
                                                                                Premium Vape copy 2</h6>
                                                                            <div
                                                                                class="d-flex align-items-center price-wall">
                                                                                <span class="price">£25,78 </span>
                                                                                <a href="#" class="remove-btn">
                                                                                    Remove
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <a href="#"
                                                                   class="d-flex flex-column align-items-center justify-content-center text-sec-clr bg-blue-clr add-offers-btn">
                                                                    <span class="icon"><i
                                                                            class="fas fa-plus"></i></span>
                                                                    <div class="text">
                                                                        Added <br/>Offers
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <a href="#" class="remove-btn">
                                                Remove
                                            </a>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-2 pr-md-right">
                                    <div class="right-content">
                                        {{--                    <h3 class=" head font-main-bold font-20 text-uppercase">ORDER--}}
                                        {{--                        SUMMARY</h3>--}}
                                        <div class="card order-summary">
                                            <div class="card-header text-tert-clr font-26">
                                                ORDER SUMMARY
                                            </div>
                                            <div class="card-body border-top-0">
                                                <div
                                                    class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                    <div class="name">
                                                        Sub Total
                                                    </div>
                                                    <div
                                                        class="price font-main-bold">{!! convert_price(\App\Services\CartService::getTotalPriceSum()+\Cart::getSubTotal(),$currency, false) !!}</div>
                                                </div>
                                                <div
                                                    class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                    <div class="name">
                                                        Tax
                                                    </div>
                                                    <div
                                                        class="price font-main-bold">{!! convert_price(0,$currency, false) !!}</div>
                                                </div>
                                                <div
                                                    class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                    <div class="name">
                                                        Shipping {!! ($shipping) ? '('.$shipping->getAttributes()->courier->name.')' : '' !!}
                                                    </div>
                                                    <div
                                                        class="w-100 d-flex flex-wrap justify-content-between align-items-center row_with-select">
                                                        <div class="select-wall">
                                                            <select name="" id=""
                                                                    class="select-2 select-2--no-search main-select not-selected arrow-dark select2-hidden-accessible"
                                                                    style="width: 175px">
                                                                <option value="">United Kingdom</option>
                                                                <option value="">Armenia</option>
                                                            </select>
                                                        </div>
                                                        <div
                                                            class="price font-main-bold">{!! ($shipping) ? convert_price($shipping->getValue(),$currency, false) : convert_price(0,$currency, false) !!}</div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                    <div
                                                        class="w-100 d-flex flex-wrap justify-content-between align-items-center">
                                                        <div class="name">
                                                            Coupon Discount
                                                        </div>
                                                        <div
                                                            class="price font-main-bold">{{ convert_price(0,$currency, false) }}</div>
                                                    </div>
                                                    <div class="w-100 row_with-select">
                                                        <div class="code">
                                                            <input type="text" class="form-control" name="coupon_code"
                                                                   id="coupon_code">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center border-bottom-0">
                                                    <div class="name">
                                                        Total
                                                    </div>
                                                    <div
                                                        class="price text-tert-clr font-main-bold">{!! convert_price(\App\Services\CartService::getTotalPriceSum()+\Cart::getTotal(),$currency, false) !!}</div>
                                                </div>
                                                {{--                            <div class="coupon-code font-17 d-flex flex-wrap justify-content-between align-items-center">--}}
                                                {{--                                <div class="name">--}}
                                                {{--                                    Coupon code--}}
                                                {{--                                </div>--}}
                                                {{--                                <div class="code">--}}
                                                {{--                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code">--}}
                                                {{--                                </div>--}}
                                                {{--                            </div>--}}
                                                {{--                            <div class="checkout-btn text-center">--}}
                                                {{--                                <a class="btn btn-primary text-uppercase font-15"--}}
                                                {{--                                   href="{!! route('shop_check_out') !!}">--}}
                                                {{--                                    CHECKOUT--}}
                                                {{--                                </a>--}}
                                                {{--                            </div>--}}
                                                <div class="order-summary-btn-wall text-center mb-2">
                                                    <a class="order-summary-btn font-sec-reg text-uppercase font-24 text-sec-clr shop-detail-btn"
                                                       href="#">
                                                        SHOPPING DETAILS
                                                    </a>
                                                </div>
                                                <div class="order-summary-btn-wall text-center">
                                                    <a class="order-summary-btn font-sec-reg text-uppercase font-24 text-main-clr back-btn"
                                                       href="#">
                                                        Back
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        {{--                    <div class="secure d-flex flex-wrap justify-content-between align-items-center">--}}
                                        {{--                        <span class="secure-icon">--}}
                                        {{--                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                                        {{--                                 width="24px" height="26px">--}}
                                        {{--                                <path fill-rule="evenodd" fill="rgb(81, 132, 229)"--}}
                                        {{--                                      d="M12.000,26.000 C0.711,21.986 0.882,13.191 1.034,5.421 C1.043,4.954 1.052,4.502 1.057,4.059 C5.462,3.878 8.985,2.571 12.000,-0.000 C15.016,2.571 18.538,3.878 22.945,4.059 C22.950,4.502 22.959,4.954 22.969,5.421 C23.121,13.189 23.290,21.986 12.000,26.000 ZM21.282,5.596 C17.725,5.220 14.666,4.076 12.000,2.125 C9.335,4.076 6.276,5.220 2.720,5.596 C2.647,9.347 2.587,13.215 3.816,16.559 C5.134,20.144 7.742,22.594 12.000,24.232 C16.259,22.594 18.867,20.144 20.185,16.558 C21.415,13.213 21.355,9.346 21.282,5.596 ZM10.783,17.740 C10.783,17.740 10.288,17.352 10.126,17.226 L5.719,13.776 C5.716,13.772 5.716,13.772 5.713,13.769 L6.869,12.462 L10.576,15.367 L17.033,8.254 L18.365,9.386 L11.339,17.127 C11.164,17.316 10.783,17.740 10.783,17.740 Z"/>--}}
                                        {{--                            </svg>--}}
                                        {{--                        </span>--}}
                                        {{--                        <p class="mb-0 font-12">--}}
                                        {{--                            Full Refund if you don't receive your order. <br>--}}
                                        {{--                            Full or Partial Refund, if the item is not as described.--}}
                                        {{--                        </p>--}}
                                        {{--                    </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--             --------------       shoping cart tab end  -------------------- --}}

                    {{--                @include('frontend.shop._partials.cart_table')--}}
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
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/frontend/css/cart.css')}}">
@stop
