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
@stop
@section('js')
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