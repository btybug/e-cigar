<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href={{asset("public/frontend/css/bootstrap.min.css")}} rel="stylesheet" />
    <link href={{asset("public/frontend/css/font-awesome.min.css")}} rel="stylesheet" />
    <link href={{asset("public/frontend/css/main.css?v=".rand(111,999))}} rel="stylesheet" />
    {{--<link href="{{'/public'.mix('comments.css', 'vendor/comments')->toHtml() }}" rel="stylesheet">--}}
    {{----}}
    <link rel="stylesheet" href="{{asset('public/css/flag-icon.css')}}">

    @yield('css')


    {{--<script src="{{ '/public'.mix('comments.js', 'vendor/comments')->toHtml() }}"></script>--}}

</head>
<body>
@include('frontend._partials.header')
@yield('content')
@include('frontend._partials.footer')
<img src="/public/images/loader.gif"  class="loader-img" style="width:100px;position: absolute;top:50%;left:50%"/>
<script src={{asset("public/frontend/js/jquery-3.2.1.min.js")}}></script>
<script src={{asset("public/frontend/js/bootstrap.min.js")}}></script>
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