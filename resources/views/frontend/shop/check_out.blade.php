@extends('layouts.frontend')
@section('content')
    <div class="container">
        <ul class="nav nav-pills nav-fill ml-0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="address-tab" data-toggle="tab" href="javascript:void(0)" role="tab"
                   aria-controls="address" aria-selected="true" aria-expanded="true">Address</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="payment-tab" data-toggle="tab" href="javascript:void(0)" role="tab"
                   aria-controls="payment" aria-selected="false">Payment</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in show" id="address" role="tabpanel" aria-labelledby="pricing-tab">
               @include('frontend.shop._partials.checkout_render')
            </div>
            <div class="tab-pane fade payment_tab" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                @include('frontend.shop._partials.checkout_payment')
            </div>
        </div>
    </div>


@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <style>
        .StripeElement {
            width: 389px;
            background-color: white;
            height: 40px;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@stop
@section('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_zr3Wfst8jb4GrKU8BcLEUkh9');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("body").on("click", ".go-to-payment", function (event) {
                AjaxCall(
                    "/get-payment-options",
                    {
                    },
                    res => {
                        if (!res.error) {
                            $(".nav-link").each(function (index,value) {
                                $(value).removeClass('active').addClass('disabled');
                            });

                            $(".tab-pane").each(function (index,value) {
                                $(value).removeClass('active in show');
                            });

                            $("#payment").addClass('active in show');
                            $("#payment-tab").removeClass('disabled').addClass('active');
                        }
                    }
                );
            });

            $("body").on("click", ".nav-link", function (event) {
                event.stopImmediatePropagation();
            });

            $('body').on('change', '.payment_methods input[type=radio][name=payment_method]', function () {
                var method = $(this).val();
                if ($(this).is(':checked')) {
                    $('.payment_box').slideUp();
                    $(this).closest('li').find('.payment_box').slideDown();

                    $(".payment-method-data").each(function (index,value) {
                        $(value).addClass('d-none')
                    })

                    $("#" + method + "-method").removeClass('d-none')
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
                $(".container").css('opacity','0.6');
                $(".loader-img").toggleClass('d-none');
                AjaxCall(
                    "/change-shipping-method",
                    {deliveryId:deliveryId,optionId: optionId},
                    res => {
                        if (!res.error) {
                            $(".container").css('opacity','1');
                            $(".loader-img").toggleClass('d-none');
                            $("#address").html(res.html);
                        }
                    },
                    error => {
                        $(".container").css('opacity','1');
                        $(".loader-img").toggleClass('d-none');
                    }
                );
               console.log($(this).val())
            });
        })
    </script>
@stop