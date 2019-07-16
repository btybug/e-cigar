<div id="singleProductPageCnt" class="shopping-cart-content">
    <div class="shopping-cart-inner">
        <div class="d-flex flex-wrap">
            <div class="col-lg-10 pl-0">
                @if(! \Cart::isEmpty())
                    @foreach(\Cart::getContent() as $key => $item)
                        @php
                            $stock = $item->attributes->product;
                        @endphp
                        <div class="shopping__cart-tab-main new__scroll h-100">
                            <div class="shopping__cart-tab-table-wall position-relative">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td class="photo-td">
                                                <div class="product-photo-col">
                                                    <img src="{{ checkImage(media_image_tmb($stock->image)) }}"
                                                         alt=" {!! $stock->name !!}">
                                                </div>
                                            </td>
                                            <td class="info-td">
                                                <div class="product-info-col">
                                                    <h3 class="font-sec-reg font-28 text-tert-clr lh-1 text-uppercase first-title">
                                                        {!! $stock->name !!} </h3>
                                                    <div
                                                        class="font-sec-reg font-26 text-main-clr lh-1 sec-title">
                                                        {!! $stock->short_description !!}
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
                                                        @foreach($item->attributes->variations as $option)
                                                            @if($option['group']->price_per =='product')
                                                                <li class="single-row-product">
                                                                    <div class="d-flex flex-column w-100 col-9 p-0">
                                                                        @if(count($option['options']))
                                                                            @foreach($option['options'] as $voption)
                                                                                <div class="w-100">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-sm-8 font-15 font-main-bold">
                                                                                            {{ $voption['option']->name }}

                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">
                                                                                            <span>x {{ $voption['qty'] }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>

                                                                    <div
                                                                        class="font-15 font-main-bold align-self-center col-3 pr-0 text-right">
                                                                        {!!  convert_price($option['group']->price,$currency, false)  !!}
                                                                    </div>
                                                                </li>
                                                            @else
                                                                @if(count($option['options']))
                                                                    @foreach($option['options'] as $voption)
                                                                        <li class="single-row-product">
                                                                            <div class="d-flex flex-column w-100 col-9 p-0">
                                                                                <div class="w-100">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-sm-8 font-15 font-main-bold">
                                                                                            {{ $voption['option']->name }}
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-2 font-main-bold pl-prod-qty-opt                                                                                                                                                                                    ">
                                                                                            <span>x {!! $voption['qty'] !!}</span>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            @php

                                                                                if($voption['option']->price_type == 'discount'){
                                                                                    if($voption['option']->discount_type =='fixed'){
                                                                                        $price = 0;
                                                                                        $discount = \App\Models\StockVariationDiscount::find($voption['discount_id']);
                                                                                        if($discount){
                                                                                            $price = $discount->price;
                                                                                        }
                                                                                    }else{
                                                                                        $price = 0;
                                                                                        $discount = $voption['option']->discounts()->where('from','<=',$voption['qty'])->where('to','>=',$voption['qty'])->first();
                                                                                        if($discount){
                                                                                            $price = $discount->price* $voption['qty'];
                                                                                        }
                                                                                    }
                                                                                }else{
                                                                                    $price = $voption['option']->price * $voption['qty'];
                                                                                }
                                                                            @endphp
                                                                            <div
                                                                                class="font-15 font-main-bold align-self-center col-3 pr-0 text-right">
                                                                                {!!  convert_price($price,$currency, false)  !!}
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="qty-td">
                                                <div class="d-flex align-items-center qty-col">
                                                    <span class="font-sec-light font-24 lh-1">QTY</span>
                                                    <div class="product__single-item-inp-num">
                                                        <div class="quantity">
                                                            <input type="number" min="1" step="1"
                                                                   value="{{ $item->quantity }}">
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
                                                    <span class="lh-1 text-tert-clr">
                                                        {{--\App\Services\CartService::getPriceSum($item->id)+--}}
                                                        {{ convert_price($item->getPriceSum(),$currency,true) }}
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                        @if(! $stock->is_offer)
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
                                        @endif
                                    </table>
                                </div>

                                <a href="javascript:void(0)" data-uid="{{ $key }}" class="remove-btn remove-from-cart">
                                    Remove
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
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
