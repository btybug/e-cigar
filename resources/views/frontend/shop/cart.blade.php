@extends('layouts.frontend')
@section('content')
    <section class="site-content section-cart-page">
        <div class="container">
            <div class="breadcum-area">
                <div class="breadcum-inner">
                    <h3>Shopping cart</h3>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="http://demo.laravelcommerce.com">Home</a></li>
                    </ol>
                </div>
            </div>
            <div class="cart-area">
                <div class="row">

                    <div class="col-12 col-lg-8 cart-left">
                        <div class="row">

                            <form method='POST' id="update_cart_form" action='http://demo.laravelcommerce.com/updateCart'>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th align="left">Item(s)</th>
                                            <th align="right">Price</th>
                                            <th align="right">Qty</th>
                                            <th align="right">Sub Total</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                            <td align="left" class="item">
                                                <input type="hidden" name="cart[]" value="4925">
                                                <a href="http://demo.laravelcommerce.com/product-detail/custom-slim-fit-weathered-polo"
                                                   class="cart-thumb">
                                                    <img class="img-fluid"
                                                         src="http://demo.laravelcommerce.com/resources/assets/images/product_images/1502177321.pPOLO2-26314634_standard_v400.jpg"
                                                         alt="CUSTOM SLIM FIT WEATHERED POLO" alt="">
                                                </a>
                                                <div class="cart-product-detail">
                                                    <a href="http://demo.laravelcommerce.com/product-detail/custom-slim-fit-weathered-polo"
                                                       class="title">
                                                        CUSTOM SLIM FIT WEATHERED POLO
                                                    </a>
                                                    <ul>
                                                        <li>Size<span>Small</span></li>
                                                    </ul>
                                                </div>
                                            </td>

                                            <td align="right" class="price"><span>$89.5</span></td>
                                            <td align="right" class="Qty">
                                                <div class="input-group">
                                                  <span class="input-group-btn qtyminus_4925">
                                                    	<i class="fa fa-minus" aria-hidden="true"></i>
                                                  </span>
                                                    <input name="quantity[]" type="text" readonly value="1"
                                                           class="form-control qty">
                                                    <span class="input-group-btn qtypluscart_4925">
                                                  		<i class="fa fa-plus" aria-hidden="true"></i>
                                                  </span>
                                                </div>
                                            </td>

                                            <td align="right" class="subtotal"><span class="cart_price_4925">$89.5</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="buttons">
                                                <a href="http://demo.laravelcommerce.com/editcart?id=4925"
                                                   class="btn btn-sm btn-secondary">Edit</a>
                                                <a href="http://demo.laravelcommerce.com/deleteCart?id=4925"
                                                   class="btn btn-sm btn-secondary">Remove Item</a>
                                            </td>
                                        </tr>
                                        </tbody>

                                        <tbody>
                                        <tr>
                                            <td align="left" class="item">
                                                <input type="hidden" name="cart[]" value="4926">
                                                <a href="http://demo.laravelcommerce.com/product-detail/custom-slim-fit-cotton-shirt"
                                                   class="cart-thumb">
                                                    <img class="img-fluid"
                                                         src="http://demo.laravelcommerce.com/resources/assets/images/product_images/1502176579.pPOLO2-26316348_standard_v400.jpg"
                                                         alt="CUSTOM SLIM FIT COTTON SHIRT" alt="">
                                                </a>
                                                <div class="cart-product-detail">
                                                    <a href="http://demo.laravelcommerce.com/product-detail/custom-slim-fit-cotton-shirt"
                                                       class="title">
                                                        CUSTOM SLIM FIT COTTON SHIRT
                                                    </a>
                                                    <ul>
                                                        <li>Size<span>Small</span></li>
                                                    </ul>
                                                </div>
                                            </td>

                                            <td align="right" class="price"><span>$98.5</span></td>
                                            <td align="right" class="Qty">
                                                <div class="input-group">
                                                  <span class="input-group-btn qtyminus_4926">
                                                    	<i class="fa fa-minus" aria-hidden="true"></i>
                                                  </span>
                                                    <input name="quantity[]" type="text" readonly value="1"
                                                           class="form-control qty">
                                                    <span class="input-group-btn qtypluscart_4926">
                                                  		<i class="fa fa-plus" aria-hidden="true"></i>
                                                  </span>
                                                </div>
                                            </td>

                                            <td align="right" class="subtotal"><span class="cart_price_4926">$98.5</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="buttons">
                                                <a href="http://demo.laravelcommerce.com/editcart?id=4926"
                                                   class="btn btn-sm btn-secondary">Edit</a>
                                                <a href="http://demo.laravelcommerce.com/deleteCart?id=4926"
                                                   class="btn btn-sm btn-secondary">Remove Item</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>

                        <div class="row button back-update-btn">
                            <div class="col-12 col-sm-6">
                                <div class="row">
                                    <a href="http://demo.laravelcommerce.com/shop" class="btn btn-dark">Back To Shopping</a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="row justify-content-end">
                                    <button class="btn btn-dark" id="update_cart">Update Cart</button>
                                </div>
                            </div>
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
                                            <td align="right" id="subtotal">$188</td>
                                        </tr>


                                        <tr>
                                            <td align="left"><span>Discount (Coupon)</span></td>
                                            <td align="right" id="discount">$0</td>
                                        </tr>
                                        <tr>
                                            <td class="last" align="left"><span>Total</span></td>
                                            <td class="last" align="right" id="total_price">$188</td>
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
                                        <div id="coupon_require_error" class="help-block" style="display: none">Please enter
                                            a valid coupon code
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-dark">Apply Coupon</button>
                                </form>


                            </div>

                            <div class="buttons">
                                <a href="http://demo.laravelcommerce.com/checkout" class="btn btn-block btn-secondary">Proceed
                                    To Checkout</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/frontend/css/cart.css')}}">
@stop