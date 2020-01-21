@extends('layouts.frontend')

@section('content')
    {!! $faq->question !!}
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('public/frontend/css/faq-page.css?v='.rand(111,999))}}">
@stop
@section('js')

@stop
