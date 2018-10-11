@extends('layouts.admin')
@section('content')
   languages
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/flagstrap/css/flags.css')}}">
@stop
@section('js')
    <script src="{{asset('public/admin_theme/flagstrap/js/jquery.flagstrap.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#flag-select').flagStrap({
                countries: {
                    "AM": "Armenia",
                    "GB": "United Kingdom",
                    "RU": "Russia"
                },
                buttonSize: "btn-sm",
                buttonType: "btn-info",
                labelMargin: "10px",
                scrollable: false,
                scrollableHeight: "350px"
            });
        });
    </script>
@stop