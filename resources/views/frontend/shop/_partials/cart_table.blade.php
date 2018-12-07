<div class="row">
    <div class="col-12 col-lg-8 cart-left">
        <div class="row">
            <form method='POST' id="update_cart_form"
                  action='http://demo.laravelcommerce.com/updateCart'>
                <div class="table-responsive">
                    <table class="table table-bordered cart-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th align="left">Product</th>
                            <th align="right">Qty</th>
                            <th align="right">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td valign="center" align="center">
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                            <td class="table-product">
                                <div class="d-flex">
                                    <div class="col-4 p-0">
                                        <div class="image-name">
                                            <img class="img-responsive w-100"
                                                 src="https://cdn.newsapi.com.au/image/v1/2b74874798de42d5de6e4711150946d3"
                                                 alt="product">
                                            <div class="name">
                                                Product Name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="procudt-info">
                                            <div class="procudt-main">
                                                <div class="single">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <span class="title">
                                                                Color
                                                            </span>

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="h5"><span class="badge badge-secondary">red</span></div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="h5"><span class="badge badge-secondary">50</span></div>
                                                        </div>
                                                        <div class="col-sm-2">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <span class="title">
                                                                Juice
                                                            </span>

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="h5 mr-1"><span class="badge badge-secondary">Apple</span></div>
                                                                <div class="h5"><span class="badge badge-secondary">1 Pack</span></div>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-2 align-self-center">
                                                            <div class="h5"><span class="badge badge-secondary">0</span></div>
                                                        </div>
                                                        <div class="col-sm-2">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-extra">
                                                <h4>Extra</h4>
                                                <div class="single">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <span class="title">
                                                                Coil
                                                            </span>

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="h4"><span class="badge badge-primary">Yes</span></div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="h5"><span class="badge badge-secondary">30</span></div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td valign="center" align="center" class="Qty w-8">
                                <div class="input-group">
                                              <span data-condition="{{ false }}" data-uid=""
                                                    class="input-group-btn qtycount">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                              </span>
                                    <input name="quantity[]" type="text" readonly
                                           value=""
                                           class="form-control qty">
                                    <span data-condition="{{ true }}" data-uid="" class="input-group-btn qtycount">
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                              </span>
                                </div>
                            </td>
                            <td valign="center" align="center" class="w-8">
                                <span>
                                    80
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
                                {{--{!! dd($item) !!}--}}
                                @php
                                    $stock = $item->attributes->variation->stock
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
                                        <div class="input-group">
                                            @foreach($item->attributes->variation->options as $voption)
                                                <div class="form-group row">
                                                    <label class="mr-2"
                                                           for="color1"><strong>{{ $voption->attr->name }}
                                                            : </strong> {{ $voption->option->name }}
                                                    </label>

                                                </div>
                                            @endforeach
                                        </div>

                                        @if($item->attributes->requiredItems && count($item->attributes->requiredItems))
                                            @foreach($item->attributes->requiredItems as $vid)
                                                <div class="input-group">
                                                    @php
                                                        $variationReq = \App\Services\CartService::getVariation($vid)
                                                    @endphp
                                                    <div class="col-md-12">
                                                        <strong> {{ $variationReq->stock->name }} - free</strong>
                                                    </div>

                                                    @if($variationReq->stock->type == 'variation_product')
                                                        @foreach($variationReq->options as $voption)
                                                            <div class="form-group row">
                                                                <label class="mr-2"
                                                                       for="color1"><strong>{{ $voption->attr->name }}
                                                                        : </strong> {{ $voption->option->name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endif

                                        @if($item->attributes->optionalItems && count($item->attributes->optionalItems))
                                            @foreach($item->attributes->optionalItems as $vid)
                                                <div class="input-group">
                                                    @php
                                                        $variationOpt = \App\Services\CartService::getVariation($vid)
                                                    @endphp
                                                    <div class="col-md-12">
                                                        <strong> {{ $variationOpt->stock->name }}</strong>
                                                    </div>
                                                    <div class="col-md-12">
                                                        @if($variationOpt->stock->type == 'variation_product')
                                                            @foreach($variationOpt->options as $voption)
                                                                <div class="form-group row">
                                                                    <label class="mr-2"
                                                                           for="color1"><strong>{{ $voption->attr->name }}
                                                                            : </strong> {{ $voption->option->name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12">
                                                        <strong> ${{ $variationOpt->price }}</strong>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td align="right" class="Qty">
                                        <div class="input-group mb-4">
                                              <span data-condition="{{ false }}" data-uid="{{ $item->id }}"
                                                    class="input-group-btn qtycount">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                              </span>
                                            <input name="quantity[]" type="text" readonly
                                                   value="{{ $item->quantity }}"
                                                   class="form-control qty">
                                            <span data-condition="{{ true }}" data-uid="{{ $item->id }}"
                                                  class="input-group-btn qtycount">
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                              </span>
                                        </div>
                                    </td>

                                    <td align="right" class="price">
                                        <div class="d-flex justify-content-end">
                                            <span class="d-block cart_price_4925 mb-4">${{ $item->price }}</span>
                                            <a data-uid="{{ $item->id }}" href="javascript:void(0)"
                                               class="btn btn-danger btn-sm align-self-start ml-1 remove-from-cart"><i
                                                        class="fa fa-times"></i></a>
                                        </div>
                                    </td>
                                    <td align="right" class="subtotal">
                                        <div class="d-flex justify-content-end">
                                            <span class="d-block cart_price_4925 mb-4">${{ $item->getPriceSum() }}</span>
                                        </div>
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
                                ${!! \Cart::getSubTotal() !!}
                            </td>
                        </tr>
                        <tr>
                            <td align="left"><span>Tax</span></td>
                            <td align="right" id="subtotal">$0</td>
                        </tr>
                        <tr>
                            <td align="left">
                                <span>Shipping {!! ($shipping) ? '('.$shipping->getAttributes()->courier->name.')' : '' !!}</span>
                            </td>
                            <td align="right" id="subtotal">${!! ($shipping) ? $shipping->getValue():0 !!}</td>
                        </tr>
                        <tr>
                            <td align="left"><span>Discount (Coupon)</span></td>
                            <td align="right" id="discount">$0</td>
                        </tr>
                        <tr>
                            <td class="last" align="left"><span>Total</span></td>
                            <td class="last" align="right" id="total_price">
                                ${!! \Cart::getTotal() !!}
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