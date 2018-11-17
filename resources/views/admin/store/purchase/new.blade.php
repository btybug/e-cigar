@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="coupons_new_page">
        {!! Form::model(null,['files' => true,'id' => 'form-coupon','class' => 'form-horizontal']) !!}

        {!! Form::close() !!}
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
<script>


    
</script>
@stop
