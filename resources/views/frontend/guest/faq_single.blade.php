@extends('layouts.frontend')

@section('content')
    <div class="main-content">
        <div class="faq-single-page-wrapper">
            <div class="container main-max-width">
                <div class="row">
                    <div class="col-md-3">
                        <div class="faq-single-ads">
                            <img src="http://webneel.com/daily/sites/default/files/images/project/creative-advertisement%20(13).jpg" alt="ads">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="faq-single-content">
                            <h1 class="font-sec-reg font-36 text-main-clr faq-single-main-title">{!! $faq->question !!}</h1>
                            <div class="faq-single-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Ab aperiam consequuntur deleniti ducimus earum enim, eos et eum explicabo fugit iure minima modi natus obcaecati perspiciatis quam recusandae repellendus rerum.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="faq-single-ads">
                            <img src="http://webneel.com/daily/sites/default/files/images/project/creative-advertisement%20(13).jpg" alt="ads">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('public/frontend/css/faq-page.css?v='.rand(111,999))}}">
@stop
@section('js')

@stop
