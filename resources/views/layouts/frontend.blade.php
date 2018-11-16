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
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href={{asset("public/frontend/css/bootstrap.min.css")}} rel="stylesheet" />
    <link href={{asset("public/frontend/css/font-awesome.min.css")}} rel="stylesheet" />
    <link href={{asset("public/css/fonts.css?v=".rand(111,999))}} rel="stylesheet" />
    <link href={{asset("public/css/main.css?v=".rand(111,999))}} rel="stylesheet" />
    {{--<link href="{{'/public'.mix('comments.css', 'vendor/comments')->toHtml() }}" rel="stylesheet">--}}
    {{----}}
    <link rel="stylesheet" href="{{asset('public/css/flag-icon.css')}}">

    <script src={{asset("public/js/jQuery3.3.1.js")}}></script>
    <!--[if lt IE 9]>
    <script src={{asset("public/plugins/crossbrowserjs/html5shiv.js")}}></script>
    <script src={{asset("public/plugins/crossbrowserjs/respond.min.js")}}></script>
    <![endif]-->
    <!--[if !IE]><!-->
    <script src={{asset("public/plugins/crossbrowserjs/ofi.min.js")}}></script>
    <script src={{asset("public/plugins/crossbrowserjs/customFit.js")}}></script>
    <!--<![endif]-->
    @yield('css')


    {{--<script src="{{ '/public'.mix('comments.js', 'vendor/comments')->toHtml() }}"></script>--}}

</head>
<body>
@include('frontend._partials.header')
<main class="page-main-content">
    <div class="d-flex h-100">
@yield('content')
    </div>
</main>
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
<script src={{asset("public/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("public/js/main.js")}}></script>
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
</script>
@yield('js')
</body>
</html>