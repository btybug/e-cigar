<div class="row">
    <div class="col-12 col-lg-8 cart-left">
        <div class="row">
            <form method='POST' id="update_cart_form"
                  action='http://demo.laravelcommerce.com/updateCart'>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th align="left">Product</th>
                            <th align="left">Options</th>
                            <th align="right">Qty</th>
                            <th align="right">Price</th>
                            <th align="right">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($items))
                            @foreach($items as $item)
                                @php
                                    $stock = array_first($item)->attributes->variation->stock
                                @endphp
                                <tr>
                                    <td align="left" class="item">
                                        <input type="hidden" name="cart[]" value="4925">
                                        <a href="#"
                                           class="cart-thumb">
                                            <img class="img-fluid"
                                                 src="{{ $stock->image }}"
                                                 alt="{!! $stock->name !!}">
                                        </a>
                                        <div>
                                            {!! $stock->name !!}
                                        </div>
                                    </td>

                                    <td align="right" class="options">
                                        @foreach($item as $option)
                                            <div class="input-group">
                                                @foreach($option->attributes->variation->options as $voption)
                                                    <div class="form-group row">
                                                        <label class="mr-2"
                                                               for="color1"><strong>{{ $voption->attr->name }}
                                                                : </strong> {{ $voption->option->name }}
                                                        </label>

                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </td>
                                    <td align="right" class="Qty">
                                        @foreach($item as $option)
                                            <div class="input-group mb-4">
                                                  <span data-condition="{{ false }}" data-uid="{{ $option->id }}" class="input-group-btn qtycount">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                  </span>
                                                <input name="quantity[]" type="text" readonly
                                                       value="{{ $option->quantity }}"
                                                       class="form-control qty">
                                                <span data-condition="{{ true }}" data-uid="{{ $option->id }}" class="input-group-btn qtycount">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                  </span>
                                            </div>
                                        @endforeach
                                    </td>

                                    <td align="right" class="price">
                                        @foreach($item as $option)
                                            <div class="d-flex justify-content-end">
                                                <span class="d-block cart_price_4925 mb-4">${{ $option->price }}</span>
                                                <a data-uid="{{ $option->id }}" href="javascript:void(0)"
                                                   class="btn btn-danger btn-sm align-self-start ml-1 remove-from-cart"><i
                                                            class="fa fa-times"></i></a>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td align="right" class="subtotal">
                                        @foreach($item as $option)
                                            <div class="d-flex justify-content-end">
                                                <span class="d-block cart_price_4925 mb-4">${{ $option->getPriceSum() }}</span>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="row button back-update-btn">
            <div class="col-12 col-sm-6">
                <div class="row">
                    <a href="http://demo.laravelcommerce.com/shop" class="btn btn-dark">Back To
                        Shopping</a>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="row justify-content-end">
                    <button class="btn btn-dark" id="update_cart">Update Cart</button>
                </div>
            </div>
        </div>
        <div class="row button back-update-btn">
            @if($geoZone)
                <span>*</span> Your Shipping cost based on &nbsp;<strong> {{ $geoZone->name }} </strong>
            @endif
        </div>
    </div>
    <div class="col-12 col-lg-4 cart-right">
        <div class="order-summary-outer">
            <div class="order-summary">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th align="left" colspan="2">Order Summary</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td align="left"><span>Sub Total</span></td>
                            <td align="right" id="subtotal">
                                @if(Auth::check())
                                    ${!! \Cart::session(Auth::id())->getSubTotal() !!}
                                @else
                                    ${!! \Cart::getSubTotal() !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td align="left"><span>Tax</span></td>
                            <td align="right" id="subtotal">$0</td>
                        </tr>
                        <tr>
                            <td align="left"><span>Shipping {!! ($shipping) ? '('.$shipping->getAttributes()->courier->name.')' : '' !!}</span></td>
                            <td align="right" id="subtotal">${!! ($shipping) ? $shipping->getValue():0 !!}</td>
                        </tr>
                        <tr>
                            <td align="left"><span>Discount (Coupon)</span></td>
                            <td align="right" id="discount">$0</td>
                        </tr>
                        <tr>
                            <td class="last" align="left"><span>Total</span></td>
                            <td class="last" align="right" id="total_price">
                                @if(Auth::check())
                                    ${!! \Cart::session(Auth::id())->getTotal() !!}
                                @else
                                    ${!! \Cart::getTotal() !!}
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="coupons">
                <!-- applied copuns -->

                <form id="apply_coupon" class="form-validate">
                    <div class="form-group">
                        <label>Coupon Code</label>
                        <input type="text" name="coupon_code" class="form-control" id="coupon_code">

                        <div id="coupon_error" class="help-block" style="display: none"></div>
                        <div id="coupon_require_error" class="help-block" style="display: none">Please
                            enter
                            a valid coupon code
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-dark">Apply Coupon</button>
                </form>


            </div>

            <div class="buttons">
                <a href="{!! route('shop_check_out') !!}" class="btn btn-block btn-secondary">Proceed
                    To Checkout</a>
            </div>
        </div>
    </div>


</div>