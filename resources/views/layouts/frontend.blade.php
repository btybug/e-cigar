<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <title>Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href={{asset("public/frontend/css/bootstrap.min.css")}} rel="stylesheet" />
    <link href={{asset("public/plugins/jquery-ui/jquery-ui.min.css")}} rel="stylesheet" />
    <link href={{asset("public/plugins/select2/select2.min.css")}} rel="stylesheet" />
    <link href={{asset("public/css/global.css")}} rel="stylesheet" />
    <link href={{asset("public/css/products.css?v=".rand(111,999))}} rel="stylesheet" />
    <link href={{asset("public/css/product-cards.css?v=".rand(111,999))}} rel="stylesheet" />

    <link href={{asset("public/css/main.css?v=".rand(111,999))}} rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('public/css/flag-icon.css')}}">

    <script src={{asset("public/js/jQuery3.3.1.js")}}></script>
    <script src={{asset("public/plugins/jquery-ui/jquery-ui.min.js")}}></script>
    <!--[if lt IE 9]>
    <script src={{asset("public/plugins/crossbrowserjs/html5shiv.js")}}></script>
    <script src={{asset("public/plugins/crossbrowserjs/respond.min.js")}}></script>
    <![endif]-->
    <!--[if !IE]><!-->
    <script src={{asset("public/plugins/crossbrowserjs/ofi.min.js")}}></script>
    <script src={{asset("public/plugins/crossbrowserjs/customFit.js")}}></script>
    <!--<![endif]-->



    @if(!Auth::check())
        <script src='https://www.google.com/recaptcha/api.js?render={!! env('GOOGLE_RECAPTCHA_KEY') !!}'></script>
        <script src={{asset("public/js/adult.js")}}></script>
        @endif
    @yield('css')

</head>
<body @if(\Request::route()->getName() == 'product_single')class="single-product-page" @endif>
@include('cookieConsent::index')
@include('frontend._partials.header')
@yield('content')
<div class="modal fade modal-request" id="msgModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <button type="button" class="close d-flex justify-content-center align-items-center" data-dismiss="modal">&times;</button>
                <span class="message-place">Do you want request ?</span>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="close btn btn-success btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<img src="/public/images/loader.gif"  class="loader-img d-none" style="width:100px;position: absolute;top:50%;left:50%"/>


@include('frontend._partials.footer')

@yield('afterFooter')

<script src={{asset("public/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("public/plugins/select2/select2.full.min.js")}}></script>
<script src={{asset("public/js/hover-slider.js")}}></script>
<script src={{asset("public/js/main.js?v=".rand(111,999))}}></script>
<script>
    window.AjaxCall = function postSendAjax(url, data, success, error) {
        $.ajax({
            type: "post",
            url: url,
            cache: false,
            datatype: "json",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            },
            success: function(data) {
                if (success) {
                    success(data);
                }
                return data;
            },
            error: function(errorThrown) {
                if (error) {
                    error(errorThrown);
                }
                return errorThrown;
            }
        });
    };

    $(document).ready(function () {
        document.getElementById("search-product")
            .addEventListener("keyup", function(event) {
                event.preventDefault();
                if (event.keyCode === 13) {
                    let form = $("#filter-form");
                    let category = $('.all_categories').val();
                    let search_text = $("#search-product").val();
                    let url = "/products/"+category;

                    if(form.length > 0){
                        if(search_text){
                            var input = $("<input>")
                                .attr("type", "hidden")
                                .attr("name", "q").val(search_text);
                            form.append(input);
                        }
                        form.attr('action',url);
                        form.submit();
                    }else{
                        window.location = "/products/"+category +"?q="+$(this).val();
                    }
                }
            });

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
                            $('#cartSidebar').html(data.headerHtml)
                        }else{
                            alert('error')
                        }
                    }
                });
            }else{
                alert('Select available variation');
            }
        });

        $("body").on('change', '.qty-input' ,function () {
            var uid = $(this).data('uid');
            var condition = 'inner';
            var value = $(this).val();
            if(uid && uid != ''){
                $.ajax({
                    type: "post",
                    url: "/update-cart",
                    cache: false,
                    datatype: "json",
                    data: {  uid : uid, condition: condition,value :value },
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function(data) {
                        if(! data.error){
                            $('.cart-area').html(data.html)
                            $('#cartSidebar').html(data.headerHtml)
                        }else{
                            alert('error')
                        }
                    }
                });
            }else{
                alert('Select available variation');
            }
        });


        $("body").on('click','.remove-from-cart',function (e) {
            e.stopPropagation();
            var uid = $(this).data('uid');
            console.log(44444)
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
                            $('#cartSidebar').html(data.headerHtml)
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

        $("#change-currency").change(function () {
            let code = $(this).val();
            $.ajax({
                type: "post",
                url: "/change-currency",
                cache: false,
                datatype: "json",
                data: {
                    code: code
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function (data) {
                    window.location.reload();
                }
            });
        })
    });
</script>
@yield('js')

@stack('javascript')
</body>

</html>