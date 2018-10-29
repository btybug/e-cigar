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
                @include('frontend.shop._partials.cart_table')
            </div>
        </div>
    </section>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/frontend/css/cart.css')}}">
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $("body").on('click','.qtycount',function () {
                var uid = $(this).data('uid');
                var condition = $(this).data('condition');
                if(uid && uid != ''){
                    $.ajax({
                        type: "post",
                        url: "/update-cart",
                        cache: false,
                        datatype: "json",
                        data: {  uid : uid, condition: condition },
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function(data) {
                            if(! data.error){
                                $('.cart-area').html(data.html)
                            }else{
                                alert('error')
                            }
                        }
                    });
                }else{
                    alert('Select available variation');
                }
            });


            $("body").on('click','.remove-from-cart',function () {
                var uid = $(this).data('uid');
                if(uid && uid != ''){
                    $.ajax({
                        type: "post",
                        url: "/remove-from-cart",
                        cache: false,
                        datatype: "json",
                        data: {  uid : uid },
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function(data) {
                            if(! data.error){
                                $('.cart-area').html(data.html)
                                $(".cart-count").html(data.count)
                            }else{
                                alert('error')
                            }
                        }
                    });
                }else{
                    alert('Select available variation');
                }
            })
        });
    </script>
@stop