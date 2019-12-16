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
                    <a class="nav-link active" id="shipping-tab" href="{!! route('admin_seo') !!}" role="tab"
                       aria-controls="shipping" aria-selected="false">Posts</a>
                </li>
                @endok
                @ok('admin_seo_stocks')
                <li class="nav-item ">
                    <a class="nav-link" id="payment_gateways" href="{!! route('admin_seo_stocks') !!}" role="tab"
                       aria-controls="shipping" aria-selected="false">Stocks</a>
                </li>
                @endok
            </ul>
            <div class="row">
                <div class="col-xl-6 col-lg-5">
                    {!! Form::model($general) !!}
                  @ok('post_admin_seo')<div class="text-right mt-20"><button type="submit" class="btn btn-info">Save</button></div>@endok
                    <div class="seo-page-general">
                        <div class="card panel panel-default mt-20">
                            <div class="card-header panel-heading">General</div>
                            <div class="card-body panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="seo-title" class="col-xl-3 col-md-4 col-sm-3">Title</label>
                                        <div class="col-xl-5 col-md-8 col-sm-9">
                                            {!! Form::text('og:title',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="seo-desc" class="col-xl-3 col-md-4 col-sm-3">Description</label>
                                        <div class="col-xl-5 col-md-8 col-sm-9">
                                            {!! Form::text('og:description',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="seo-keywords" class="col-xl-3 col-md-4 col-sm-3">Focus keywords</label>
                                        <div class="col-xl-5 col-md-8 col-sm-9">
                                            {!! Form::text('og:keywords',null,['class'=>'form-control']) !!}
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
                        </div>
                        <div class="card panel panel-default mt-20">
                            <div class="card-header panel-heading">FB</div>
                            <div class="card-body panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="seo-facebook-title" class="col-xl-3 col-md-4 col-sm-3">Facebook Title</label>
                                        <div class="col-xl-5 col-md-8 col-sm-9">
                                            {!! Form::text('fb[og:title]',isset($fb['og:title'])?$fb['og:title']:null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="seo-facebook-desc" class="col-xl-3 col-md-4 col-sm-3">Facebook Description</label>
                                        <div class="col-xl-5 col-md-8 col-sm-9">
                                            {!! Form::text('fb[og:description]',isset($fb['og:description'])?$fb['og:description']:null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="seo-facebook-image" class="col-xl-3 col-md-4 col-sm-3">Facebook Image</label>
                                        <div class="col-xl-5 col-md-8 col-sm-9">
                                            {!! Form::text('fb[og:image]',isset($fb['og:image'])?$fb['og:image']:null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card panel panel-default mt-20">
                            <div class="card-header panel-heading">Twitter</div>
                            <div class="card-body panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="seo-twitter-title" class="col-xl-3 col-md-4 col-sm-3">Twitter Title</label>
                                        <div class="col-xl-5 col-md-8 col-sm-9">
                                            {!! Form::text('twitter[og:title]',isset($twitter['og:title'])?$twitter['og:title']:null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="seo-twitter-desc" class="col-xl-3 col-md-4 col-sm-3">Twitter Description</label>
                                        <div class="col-xl-5 col-md-8 col-sm-9">
                                            {!! Form::text('twitter[og:description]',isset($twitter['og:description'])?$twitter['og:description']:null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="seo-twitter-image" class="col-xl-3 col-md-4 col-sm-3">Twitter Image</label>
                                        <div class="col-xl-5 col-md-8 col-sm-9">
                                            {!! Form::text('twitter[og:image]',isset($twitter['og:image'])?$twitter['og:image']:null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="seo-page-general">
                        <div class="card panel panel-default mt-20">
                            <div class="card-header panel-heading">Shortcodes</div>
                            <div class="card-body panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Code </th>
                                            <th>Description</th>
                                            <th>is translatable  </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{title}</td>
                                            <td>Post Title</td>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>{keywords}</td>
                                            <td>Post Tags will (tag1,tag2,tag3...)</td>
                                            <td>No</td>

                                        </tr>
                                        <tr>
                                            <td>{short_description}</td>
                                            <td>Post short description</td>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>{long_description}</td>
                                            <td>Post long description</td>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>{image}</td>
                                            <td>Post Image</td>
                                            <td>No</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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
