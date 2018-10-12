@extends('layouts.admin')
@section('content-header')
    <div class="list-tabs-head">
        <div class="head">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
                <li><a data-toggle="tab" href="#menu1">SEO</a></li>
            </ul>
            <div id="flag-select"
                 data-input-name="country"
                 data-selected-country="GB"
                 data-button-size="btn-sm"
                 data-button-type="btn-warning"
                 data-scrollable="true"
                 data-scrollable-height="250px">

            </div>
        </div>
    </div>
@stop
@php
    $posts = \App\Models\Posts::class;
@endphp
@section('content')
    <div class="tab-content tabs_content">
        {!! Form::model($posts,['url' => route('admin_new_post'), 'id' => 'post_form','files' => true]) !!}

        <div id="home" class="tab-pane fade in active">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-danger btn-view">View Product</button>
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    {{Form::label('purl', 'Post Url',['class' => 'col-sm-3'])}}
                                    <div class="col-sm-9">
                                        {{Form::text('post_url', null,['class' =>'form-control','id'=>'purl','placeholder' => ''])}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('ptitle', 'Post title',['class' => 'col-sm-3'])}}
                                    <div class="col-sm-9">
                                        {{Form::text('post_title', null,['class' =>'form-control','id'=>'ptitle','placeholder' => 'Some Title'])}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('sh_desc', 'Short Description',['class' => 'col-sm-3'])}}
                                    <div class="col-sm-9">
                                        {{Form::textarea('short_description', null,['class' =>'form-control','id'=>'sh_desc','cols'=>30,'rows'=>2,'placeholder' => 'Description'])}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('lg_desc', 'Long Description',['class' => 'col-sm-3'])}}
                                    <div class="col-sm-9">
                                        {{Form::textarea('long_description',null,['class' =>'form-control','id'=>'lg_desc','cols'=>30,'rows'=>10,'placeholder' => 'Description'])}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Featured image</label>

                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success">Image</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Gallery images</label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success">Image</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">
                    <div class="view-product-wall">
                        <div class="status-wall wall">
                            <div class="row">
                                {{Form::label('status', 'Status',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {!! Form::select('status',['published' => 'Published','unpublished' => 'UnPublish',],null,
                                                ['class' => 'form-control','id'=> 'status']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="tag-wall wall">
                            <div class="row">
                                {{Form::label('tags', 'Tags',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('tags', 'tag1',['class' =>'form-control','id'=>'tags','data-role'=>'tagsinput'])}}
                                </div>
                            </div>
                        </div>
                        <div class="category-wall wall">
                            <h6>Category</h6>
                            <div class="cat-checkbox">
                                <div class="checkbox">
                                    <label>{!! Form::checkbox('Parent','parent',null, array('id'=>'parent'))  !!}Parent</label>
                                </div>
                                <div class="child-checkbox">
                                    <div class="checkbox">
                                        <label>{!! Form::checkbox('Child1','child1',null, array('id'=>'child1'))  !!}Child1</label>
                                    </div>
                                </div>
                                <div class="child-checkbox">
                                    <div class="checkbox">
                                        <label>{!! Form::checkbox('Child2','child2',null, array('id'=>'child2'))  !!}Child2</label>
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <label>{!! Form::checkbox('Parent3','parent3',null, array('id'=>'parent3'))  !!}Parent 2</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-3">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-3">Tax& shippings</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Tax& shippings">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-3">Related & Bundles</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Related & Bundles">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/flagstrap/css/flags.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script src="{{asset('public/admin_theme/flagstrap/js/jquery.flagstrap.js')}}"></script>
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
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
    <script src="/public/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector: '#lg_desc' });</script>
    <script>

    </script>
@stop