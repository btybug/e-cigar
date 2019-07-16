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
                                        {!! Auth::user()->name !!}
                                        {!! Auth::user()->last_name !!}
                                    </span>
                                </div>
                                <div class="row cart-details-address">
                                    <div class="col-md-4">
                                        <h3 class="title">Shipping Address</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="address-info">
                                            <div class="select-wall product__select-wall">
                                                {!! Form::select('address_book',$address->toArray(),$address_id,
                                                ['class' => 'select-2 select-2--no-search main-select not-selected arrow-dark select2-hidden-accessible select-address',
                                                "style" => 'width: 100%']) !!}

                                            </div>
                                            <div class="main-info">
                                                <span>{!! $default_shipping->company !!}</span>
                                                <span>{!! $default_shipping->first_line_address !!}</span>
                                                <span>{!! $default_shipping->second_line_address !!}</span>
                                                <span>{!! $default_shipping->city !!}</span>
                                                <span>{!! $countriesShipping[$default_shipping->country] !!}</span>
                                                <span>{!! getRegionByZone(@$default_shipping->country)[$default_shipping->region] !!}</span>
                                                <span>{!! $default_shipping->post_code !!}</span>
                                            </div>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addNewAddress"
                                               class="font-18 bg-blue-clr text-sec-clr add-address-btn address-book-new">Add
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
                            @include("frontend.shop._partials.shipping_options")
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
                                @if(Auth::check())
                                    @if($default_shipping)
                                        <a class="order-summary-btn font-sec-reg text-uppercase font-24 text-sec-clr shop-detail-btn go-to-payment"
                                           href="javascript:void(0)">
                                            CHECKOUT
                                        </a>
                                    @else

                                        <a class="order-summary-btn font-sec-reg text-uppercase font-24 text-sec-clr shop-detail-btn address-book-new"
                                           href="javascript:void(0)">
                                            CHECKOUT
                                        </a>
                                    @endif
                                @endif


                            </div>
                            <div class="order-summary-btn-wall text-center">
                                <a class="order-summary-btn font-sec-reg text-uppercase font-24 text-main-clr back-btn"
                                   href="#">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--<span class="head d-flex align-items-center">--}}
            {{--<span class="d-inline-block font-20 font-main-bold text-quatr-clr text-uppercase mr-4">Address</span>--}}
            {{--<span>--}}
                {{--<span class="profile-required-icon font-main-bold">&#42;</span>--}}
                {{--Your Billing address is same as your account--}}
            {{--</span>--}}
        {{--</span>--}}

{{--<div class="checkout-note-wrap">--}}
    {{--{!! Form::model($billing_address,['class'=>'form-horizontal']) !!}--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="d-flex flex-wrap mb-4">--}}
                        {{--<span class="col-2">--}}
                            {{--<svg viewBox="0 0 17 18" width="17px" height="18px">--}}
                                {{--<path fill-rule="evenodd" fill="rgb(132, 129, 157)"--}}
                                      {{--d="M15.807,18.000 C14.518,15.165 11.667,13.342 8.498,13.342 C5.333,13.342 2.482,15.165 1.190,18.000 L-0.000,18.000 C0.913,15.667 2.778,13.816 5.157,12.893 L5.604,12.720 L5.185,12.488 C3.049,11.302 1.722,9.074 1.722,6.671 C1.722,2.992 4.762,-0.000 8.498,-0.000 C12.235,-0.000 15.274,2.992 15.274,6.671 C15.274,9.075 13.949,11.304 11.815,12.488 L11.396,12.720 L11.843,12.893 C14.220,13.816 16.083,15.667 17.000,18.000 L15.807,18.000 ZM8.498,1.081 C5.369,1.081 2.824,3.589 2.824,6.671 C2.824,9.753 5.369,12.261 8.498,12.261 C11.629,12.261 14.176,9.753 14.176,6.671 C14.176,3.589 11.629,1.081 8.498,1.081 Z"/>--}}
                            {{--</svg>--}}
                        {{--</span>--}}
                {{--<span class="col-10 font-16 text-uppercase font-main-bold">--}}
                            {{--{!! Auth::user()->name !!}--}}
                    {{--{!! Auth::user()->last_name !!}--}}
                        {{--</span>--}}
            {{--</div>--}}
            {{--<div id="address">--}}
                {{--<div class="d-flex flex-wrap">--}}
                    {{--{{dd($countriesShipping[$default_shipping->country])}}--}}
                    {{--{{dd (getRegionByZone(@$default_shipping->country)[$default_shipping->region] )}}--}}
                    {{--<span class="col-2">--}}
        {{--<svg viewBox="0 0 14 18" width="14px" height="18px">--}}
            {{--<path fill-rule="evenodd" fill="rgb(132, 129, 157)"--}}
                  {{--d="M7.672,17.772 C7.488,17.923 7.244,17.999 7.000,17.999 C6.756,17.999 6.513,17.923 6.328,17.772 C6.328,17.772 -0.000,12.588 -0.000,6.990 C-0.000,3.129 3.134,-0.000 7.000,-0.000 C10.866,-0.000 14.000,3.129 14.000,6.990 C14.000,12.588 7.672,17.772 7.672,17.772 ZM7.000,0.993 C3.688,0.993 0.994,3.683 0.994,6.990 C0.994,8.429 1.506,10.789 3.943,13.864 C5.391,15.690 6.842,16.907 6.952,16.999 C6.959,17.002 6.976,17.006 7.000,17.006 C7.023,17.006 7.041,17.002 7.048,16.999 C7.276,16.809 13.006,11.970 13.006,6.990 C13.006,3.683 10.312,0.993 7.000,0.993 ZM7.000,8.457 C6.232,8.457 5.610,7.836 5.610,7.069 C5.610,6.303 6.232,5.681 7.000,5.681 C7.767,5.681 8.390,6.303 8.390,7.069 C8.390,7.836 7.767,8.457 7.000,8.457 Z"/>--}}
        {{--</svg>--}}
    {{--</span>--}}
                    {{--<div class="col-10">--}}
                        {{--@if($default_shipping)--}}
                            {{--<ul class="list-unstyled mb-0 font-16">--}}
                                {{--<li>{!! $default_shipping->company !!}</li>--}}
                                {{--<li>{!! $default_shipping->first_line_address !!}</li>--}}
                                {{--<li>{!! $default_shipping->second_line_address !!}</li>--}}
                                {{--<li>{!! $default_shipping->city !!}</li>--}}
                                {{--<li>{!! $countriesShipping[$default_shipping->country] !!}</li>--}}
                                {{--<li>{!! getRegionByZone(@$default_shipping->country)[$default_shipping->region] !!}</li>--}}
                                {{--<li>111 street name</li>--}}
                                {{--<li>{!! $default_shipping->post_code !!}</li>--}}
                            {{--</ul>--}}
                        {{--@else--}}
                            {{--NO Address--}}
                        {{--@endif--}}
                        {{--<div class="d-flex flex-wrap align-items-center change-new-btn mt-4">--}}
                            {{--<div class="mr-3">--}}
                {{--<span data-toggle="modal" data-target="#changeAddressModal"--}}
                      {{--class="d-inline-flex align-items-center text-quatr-clr font-main-bold font-15 text-uppercase pointer">--}}
                {{--change--}}
                {{--<span class="d-inline-block ml-1">&#9998;</span>--}}
            {{--</span>--}}

                            {{--</div>--}}
                            {{--<div>--}}
                {{--<span data-toggle="modal" data-target="#addNewAddress"--}}
                      {{--class="d-inline-flex align-items-center text-quatr-clr font-main-bold font-15 text-uppercase pointer  nav-link--new-address address-book-new">--}}
                    {{--add new--}}
                    {{--<span class="d-inline-block ml-1">&#43;</span>--}}
                {{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-8">--}}
            {{--<label for="orderNotes" class="text-gray-clr mb-4">Special Notes</label>--}}
            {{--<div class="position-relative">--}}
                {{--<textarea name="" id="orderNotes" class="oreder-notes-area w-100"></textarea>--}}
                {{--<span class="msg-textarea position-absolute font-12 text-gray-clr">Max 500 character</span>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@include("frontend.shop._partials.shipping_options")--}}

