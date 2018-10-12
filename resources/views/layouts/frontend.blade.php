<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href={{asset("public/frontend/css/bootstrap.min.css")}} rel="stylesheet" />
    <link href={{asset("public/frontend/css/font-awesome.min.css")}} rel="stylesheet" />
    <link href={{asset("public/frontend/css/main.css")}} rel="stylesheet" />

    @yield('css')
</head>
<body>

@include('frontend._partials.header')
@yield('content')
@include('frontend._partials.footer')

<script src={{asset("public/frontend/js/jquery-3.2.1.min.js")}}></script>
<script src={{asset("public/frontend/js/bootstrap.min.js")}}></script>


@yield('js')
</body>
</html>