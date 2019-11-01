@extends('layouts.admin')
@section('content')

    <div class="card panel panel-default">
        <div class="card-header panel-heading">
            <h2 class="m-0">SEO</h2>
        </div>
        <div class="card-body panel-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">

                @ok('admin_seo')
                <li class="nav-item ">
                    <a class="nav-link" id="shipping-tab" href="{!! route('admin_seo') !!}" role="tab"
                       aria-controls="shipping" aria-selected="false">Posts</a>
                </li>
                @endok
                @ok('admin_seo_stocks')
                <li class="nav-item ">
                    <a class="nav-link" id="payment_gateways" href="{!! route('admin_seo_stocks') !!}" role="tab"
                       aria-controls="shipping" aria-selected="false">Stocks</a>
                </li>
                @endok
                @ok('admin_seo_pages')
                <li class="nav-item">
                    <a class="nav-link active" id="payment_gateways" href="{!! route('admin_seo_pages') !!}" role="tab"
                       aria-controls="shipping" aria-selected="false">Pages</a>
                </li>
                @endok
            </ul>
            <div class="seo-pages mt-20">
                <div class="">
                    <div class="row m-0 justify-content-end">
                        @ok('post_admin_seo_pages')
                        <button class="btn btn-info" id="form-submit">Save</button>
                        @endok
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-3 col-4 pr-md-3 pr-0">
                            <div class="seo-pages-left-list">
                                <ul>
                                    @foreach($pages as $key=>$page)
                                        <li>
                                            <a href="?p={!! $page['text'] !!}" class="link">{!! $page['url'] !!}</a>
                                        </li>
                                    @endforeach
                                    {{--<li>--}}
                                    {{--<a href="#" class="link">Categories</a>--}}
                                    {{--<ul>--}}
                                    {{--<li>--}}
                                    {{--<a href="#vape" class="sub-link">Vape</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="#parts" class="sub-link">Parts</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="#juice" class="sub-link">Juice</a>--}}
                                    {{--<ul>--}}
                                    {{--<li>--}}
                                    {{--<a href="#vape" class="sub-link">Vape</a>--}}
                                    {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="#" class="link">Item 2</a>--}}
                                    {{--<ul>--}}
                                    {{--<li>--}}
                                    {{--<a href="#" class="sub-link">Sub Item 1</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="#" class="sub-link">Sub Item 1</a>--}}
                                    {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="#categories" class="link"></a>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 col-8">
                            <div class="card panel panel-default">
                                <div class="card-header panel-heading">General</div>
                                {!! Form::model($model) !!}
                                <div class="card-body panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="seo-title" class="col-xl-3 col-md-4 col-sm-3">Title</label>
                                            <div class="col-xl-5 col-md-8 col-sm-9">
                                                {!! Form::text('go:title',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="seo-desc" class="col-xl-3 col-md-4 col-sm-3">Description</label>
                                            <div class="col-xl-5 col-md-8 col-sm-9">
                                                {!! Form::text('go:description',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="seo-keywords" class="col-xl-3 col-md-4 col-sm-3">Focus keywords</label>
                                            <div class="col-xl-5 col-md-8 col-sm-9">
                                                {!! Form::text('go:keywords',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="seo-meta-robots" class="col-xl-3 col-md-4 col-sm-3">Meta Robots</label>
                                            <div class="col-xl-5 col-md-8 col-sm-9">
                                                {!! Form::select('robots',['1'=>'Index','0'=>'No Index'],isset($robot)?$robot->robots:null,['class'=>'form-control']) !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::hidden('p',$p) !!}
                                <button type="submit" id="submit" class="hidden"></button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script>
        $('#form-submit').on('click',function () {
            $('#submit').click();
        })
    </script>
@stop
