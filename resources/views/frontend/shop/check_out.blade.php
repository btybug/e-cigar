@extends('layouts.frontend')
@section('content')
    <div class="container">
        <ul class="nav nav-pills nav-fill ml-0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="address-tab" data-toggle="tab" href="#address" role="tab"
                   aria-controls="address" aria-selected="true" aria-expanded="true">Address</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab"
                   aria-controls="payment" aria-selected="false">Payment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="artWork-tab" data-toggle="tab" href="#artWork" role="tab"
                   aria-controls="artWork" aria-selected="false">Art Work</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                   aria-controls="reviews" aria-selected="false">Reviews <span>(2)</span></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in show" id="address" role="tabpanel" aria-labelledby="pricing-tab">
               @include('frontend.shop._partials.checkout_render')
            </div>
            <div class="tab-pane fade payment_tab" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                <div class="row">
                    <div class="col-md-4">
                        @php
                            $payment_options = ($geoZone) ? json_decode($geoZone->payment_options,true) : [];
                        @endphp
                        @if(count($payment_options))
                            <ul class="payment_methods methods">
                                @if(in_array('cash',$payment_options))
                                    <li class="payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio"
                                               name="payment_method" value="bacs" checked="checked"
                                               data-order_button_text="">

                                        <label for="payment_method_bacs">
                                            Direct Bank Transfer </label>
                                        <div class="payment_box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order won’t be shipped until the funds
                                                have cleared in our account.</p>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('stripe',$payment_options))
                                    <li class="payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio"
                                               name="payment_method" value="cheque" data-order_button_text="">

                                        <label for="payment_method_cheque">
                                            Stripe </label>
                                        <div class="payment_box payment_method_cheque" style="display:none;">
                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store
                                                State / County, Store Postcode.</p>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('paypal',$payment_options))
                                    <li class="payment_method_paypal">
                                        <input id="payment_method_paypal" type="radio" class="input-radio"
                                               name="payment_method" value="paypal"
                                               data-order_button_text="Proceed to PayPal">

                                        <label for="payment_method_paypal">
                                            PayPal <img
                                                    src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"
                                                    alt="PayPal Acceptance Mark"><a
                                                    href="https://www.paypal.com/gb/webapps/mpp/paypal-popup"
                                                    class="about_paypal">What is PayPal?</a> </label>
                                        <div class="payment_box payment_method_paypal" style="display:none;">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.</p>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="artWork" role="tabpanel" aria-labelledby="artWork-tab">
                ..3..
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                ..4..
            </div>
        </div>
    </div>


@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script>
        $(document).ready(function () {
            $('body').on('change', '.payment_methods input[type=radio][name=payment_method]', function () {
                if ($(this).is(':checked')) {
                    $('.payment_box').slideUp();
                    $(this).closest('li').find('.payment_box').slideDown();
                }
            })
        });

    </script>
    <script>
        $(document).ready(function () {
            function getRegionsPackage() {
                let value = $("#country").val();
                AjaxCall(
                    "/get-regions-by-country",
                    {country: value},
                    res => {
                        let select = document.getElementById('regions');
                        select.innerText = null;
                        if (!res.error) {
                            $.each(res.data, function (index, value) {
                                var opt = document.createElement('option');
                                opt.value = res.data[value];
                                opt.innerHTML = res.data[value];
                                select.appendChild(opt);
                            })

                        }
                    }
                );
            }

            function getRegions() {
                let value = $("#geo_country").val();
                AjaxCall(
                    "/get-regions-by-geozone",
                    {country: value},
                    res => {
                        let select = document.getElementById('geo_region');
                        select.innerText = null;
                        if (!res.error) {
                            var opt = document.createElement('option');
                            opt.value = res.data.id;
                            opt.innerHTML = res.data.name;
                            select.appendChild(opt);
                        }
                    }
                );
            }

            $("body").on("change", "#country", function () {
                getRegionsPackage();
            });

            $("body").on("change", "#geo_country", function () {
                getRegions();
            });

            $("body").on("change", ".select-shipping-method", function () {
                var optionId = $(this).val();
                var deliveryId = $(this).data('delivery');
                $(".container").style('opacity','0.6');
                $(".loader-img").show();
                // AjaxCall(
                //     "/change-shipping-method",
                //     {deliveryId:deliveryId,optionId: optionId},
                //     res => {
                //          $(".container").style('opacity','1');
                //             $(".loader-img").hide();
                //         if (!res.error) {
                //
                //         }
                //     }
                // );
               console.log($(this).val())
            });
        })
    </script>
@stop