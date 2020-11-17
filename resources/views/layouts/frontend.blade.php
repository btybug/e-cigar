<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-recaptcha-key" content="{!!env('GOOGLE_RECAPTCHA_KEY')!!}">
    <meta name="google-site-verification" content="bYambdrAC-nymmiVMr-A2jiKeKW8gEsCcCRozCLDp4o" />
    {!! main_pages_seo(isset($page_name)?$page_name:null) !!}

    @yield('meta')
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async
            src="https://www.googletagmanager.com/gtag/js?id={!! env('GOOGLE_ANALYTICS_TRACKING_ID') !!}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{!! env('GOOGLE_ANALYTICS_TRACKING_ID') !!}');
    </script>
    <!-- End Google Analytics -->
    <link rel="shortcut icon" href="{!! url('/favicon.ico') !!}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    {{--<link href={{asset("frontend/css/bootstrap.min.css")}} rel="stylesheet" />--}}
    {{--<link href={{asset("plugins/jquery-ui/jquery-ui.min.css")}} rel="stylesheet" />--}}
    {{--<link href={{asset("plugins/select2/select2.min.css")}} rel="stylesheet" />--}}
    {{--<link href={{asset("css/global.css")}} rel="stylesheet" />--}}
    {{--<link href={{asset("css/products.css?v=".rand(111,999))}} rel="stylesheet" />--}}
    {{--<link href={{asset("css/product-cards.css?v=".rand(111,999))}} rel="stylesheet" />--}}
    {{--<link href={{asset("css/main.css?v=".rand(111,999))}} rel="stylesheet"/>--}}
    {{--<link href="{{asset('css/flag-icon.css')}}" rel="stylesheet" />--}}
    {{--<link href="{{asset('css/custom.css')}}" rel="stylesheet" />--}}
    {{--*****packed in css/bundle.css***** --}}
    <link href="{{asset('css/invoice.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/bundle.css?v='.rand(111,999))}}">
    <link rel="stylesheet" href="{{asset('css/comments.css?v='.rand(111,999))}}">
    {{-- ********************************************* --}}
    {{-- <script src={{asset("js/jQuery3.3.1.js")}}></script> --}}
    {{-- <script src={{asset("plugins/jquery-ui/jquery-ui.min.js")}}></script> --}}
    {{-- *****packed in plugins/jquery.js***** --}}
    <script src={{asset("js/bundle/jquery.js")}}></script>

    {{--<script src={{asset("plugins/fancytree.js",['type' => 'module'])}}></script>--}}

<!--[if lt IE 9]>-->
    <script src={{asset("plugins/crossbrowserjs/html5shiv.js")}}></script>
    <script src={{asset("plugins/crossbrowserjs/respond.min.js")}}></script>
    <!--<![endif]-->
    <!--[if !IE]><!-->
    <script src={{asset("plugins/crossbrowserjs/ofi.min.js")}}></script>
    <script src={{asset("plugins/crossbrowserjs/customFit.js")}}></script>
    <!--<![endif]-->
{{--    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5d00a4864351e90012650424&product=inline-share-buttons"></script>--}}
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5d00a4864351e90012650424&product=custom-share-buttons"></script>
    <script src={{asset("plugins/autocomplete/jquery.autocomplete.min.js")}}></script>
    @if(!Auth::check())
        <script
            src="https://www.google.com/recaptcha/api.js?onload=onRecaptchaLoadCallback&render={!! env('GOOGLE_RECAPTCHA_KEY') !!}"
            async defer></script>
    @endif
    @yield('css')

</head>
<body @if(\Request::route() && \Request::route()->getName() == 'product_single')class="single-product-page" @endif>
@include('cookieConsent::index')
@include('frontend._partials.header')
<div id="inline-badge" style="z-index: 999999999999"></div>

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
                <button type="button" class="close d-flex justify-content-center align-items-center"
                        data-dismiss="modal">
                    &times;
                </button>
                <span class="message-place">Do you want request ?</span>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="close btn btn-success btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<img src="/images/loader.gif" class="loader-img d-none" style="width:100px;position: absolute;top:50%;left:50%"/>
@include("frontend.products._partials.extra_modal")
@if(is_enabled_filter_modal())
  {!! filter_modal_html() !!}
@endif
@include('frontend._partials.footer')

@yield('afterFooter')


{{-- ********************************************* --}}
{{--<script src={{asset("plugins/select2/select2.full.min.js")}}></script>--}}
{{--<script src={{asset("js/bootstrap.bundle.min.js")}}></script>--}}
{{--<script src={{asset("js/hover-slider.js")}}></script>--}}
{{--<script src={{asset("js/main.js?v=".rand(111,999))}}></script>--}}
{{--<script src={{asset("js/login.js")}}></script>--}}
{{--<script src={{asset("js/register.js")}}></script>--}}
{{-- *****packed in js/bundle/bundle.js***** --}}
<script src={{asset("js/bundle/bundle.js?v=".rand(111,999))}}></script>
{!! Html::script('js/custom/comments.js') !!}
@stack('style')

@yield('js')
@stack('javascript')
<!--Start of Tawk.to Script-->
{{--<script type="text/javascript">--}}
{{--var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();--}}
{{--(function () {--}}
{{--var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];--}}
{{--s1.async = true;--}}
{{--s1.src = 'https://embed.tawk.to/5c6144366cb1ff3c14cbf14c/default';--}}
{{--s1.charset = 'UTF-8';--}}
{{--s1.setAttribute('crossorigin', '*');--}}
{{--s0.parentNode.insertBefore(s1, s0);--}}
{{--})();--}}
{{--</script>--}}
<!--End of Tawk.to Script-->
</body>

</html>
