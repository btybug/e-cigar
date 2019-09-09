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
               href="{!! route('shop_check_out') !!}">
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
