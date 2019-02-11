<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-recaptcha-key" content="{!! env('GOOGLE_RECAPTCHA_KEY') !!}">
    @yield('meta')
    <title>Document</title>
    <link rel="shortcut icon" href="{!! url('/public/img/favicon.png') !!}">
    <link rel="shortcut icon" href="{!! url('/public/img/favicon.ico') !!}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    {{-- ********************************************* --}}
    <link href={{asset("public/frontend/css/bootstrap.min.css")}} rel="stylesheet" />
    <link href={{asset("public/plugins/jquery-ui/jquery-ui.min.css")}} rel="stylesheet" />
    <link href={{asset("public/plugins/select2/select2.min.css")}} rel="stylesheet" />
    <link href={{asset("public/css/global.css")}} rel="stylesheet" />
    <link href={{asset("public/css/products.css?v=".rand(111,999))}} rel="stylesheet" />
    <link href={{asset("public/css/product-cards.css?v=".rand(111,999))}} rel="stylesheet" />
    <link href={{asset("public/css/main.css?v=".rand(111,999))}} rel="stylesheet"/>
    <link href="{{asset('public/css/flag-icon.css')}}" rel="stylesheet" />
     *****packed in public/css/bundle.css***** --}}
    {{-- <link rel="stylesheet" href="{{asset('public/css/bundle.css?v=".rand(111,999)')}}"> --}}
    {{-- ********************************************* --}}
    <script src={{asset("public/js/jQuery3.3.1.js")}}></script>
    <script src={{asset("public/plugins/jquery-ui/jquery-ui.min.js")}}></script>
    {{-- *****packed in public/plugins/jquery.js***** --}}
    <script src={{asset("public/js/bundle/jquery.js")}}></script>

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
        @endif
    @yield('css')

</head>
<body @if(\Request::route()->getName() == 'product_single')class="single-product-page" @endif>
@include('cookieConsent::index')
@include('frontend._partials.header')
@if(Session::has('alert'))
    <div class="alert alert-messages alert-{!! Session::get('alert.class','success') !!} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon {!! getAlertIconByClass(Session::get('alert.class')) !!}"></i> Alert!</h4>
        {!! Session::get('alert.message') !!}
    </div>
    {!! Session::forget('alert') !!}
@endif
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


{{-- ********************************************* --}}
<script src={{asset("public/plugins/select2/select2.full.min.js")}}></script>
<script src={{asset("public/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("public/js/hover-slider.js")}}></script>
<script src={{asset("public/js/main.js?v=".rand(111,999))}}></script>
{{-- *****packed in public/js/bundle/bundle.js***** --}}
{{-- <script src={{asset("public/js/bundle/bundle.js")}}></script> --}}

@yield('js')

@stack('javascript')
</body>

</html>
