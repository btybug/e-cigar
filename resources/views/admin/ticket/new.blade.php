@extends('layouts.admin')
@section('content-header')

@stop

@section('content')
    <div class="col-md-12">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>New ticket</h2></div>
        </div>
        {!! Form::model(null,['url' => route('admin_new_post'), 'id' => 'post_form','files' => true]) !!}
            {!! Form::hidden('id',null) !!}
            <div class="text-right btn-save">
                <button type="button" class="btn btn-success btn-view">View Product</button>
                {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
            </div>
            <div class="row sortable-panels">
                <div class="col-md-9 ">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Title</label>
                                        {!! Form::text('subject',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        {!! Form::textarea('short_description',null,['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Long Description</label>
                                        {!! Form::textarea('long_description',null,['class'=>'form-control tinyMcArea','cols'=>30,'rows'=>10]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-3">Featured image</label>
                                        <div class="col-sm-9">
                                            {!! media_button('image',null) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3">Gallery images</label>
                                        <div class="col-sm-9">
                                            {!! media_button('gallery',null,true) !!}
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="panel panel-default mt-20">--}}
                                    {{--<div class="panel-heading d-flex justify-content-between align-items-center">--}}
                                        {{--<span>--}}
                                            {{--Related Products--}}
                                        {{--</span>--}}
                                        {{--<button type="button" class="btn btn-info select-products">Select</button>--}}
                                    {{--</div>--}}
                                    {{--<div class="panel-body product-body">--}}
                                        {{--<ul class="get-all-attributes-tab">--}}
                                            {{--@if(isset($post) && count($post->stocks))--}}
                                                {{--@foreach($post->stocks as $stock)--}}
                                                    {{--<li style="display: flex" data-id="{{ $stock->id }}"--}}
                                                        {{--class="option-elm-attributes">--}}
                                                        {{--<a href="#">{!! $stock->name !!}</a>--}}
                                                        {{--<div class="buttons">--}}
                                                            {{--<a href="javascript:void(0)"--}}
                                                               {{--class="remove-all-attributes btn btn-sm btn-danger">--}}
                                                                {{--<i class="fa fa-trash"></i></a>--}}
                                                        {{--</div>--}}
                                                        {{--<input type="hidden" name="stocks[]" value="{{ $stock->id }}">--}}
                                                    {{--</li>--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="col-sm-6">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="view-product-wall">
                        <div class="author-wall wall">
                            <div class="row">
                                {{Form::label('author', 'Author',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {!! Form::select('user_id',[],null,
                                                ['class' => 'form-control','id'=> 'status']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="status-wall wall">
                            <div class="row">
                                {{Form::label('status', 'Status',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {!! Form::select('status',[0 => 'Draft',1 => 'Published'],null,
                                                ['class' => 'form-control','id'=> 'status']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="comment-wall wall">
                            <div class="row">
                                {{Form::label('comment', 'Enable comment',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    YES {!! Form::radio('comment_enabled',1,true,['class' => '']) !!}
                                    NO {!! Form::radio('comment_enabled',0,null,['class' => '']) !!}
                                </div>
                            </div>
                        </div>
                    <!-- <div class="tag-wall wall">
                            <div class="row">
                                {{--{{Form::label('tags', 'Tags',['class' => 'col-sm-3'])}}--}}
                            <div class="col-sm-9">
                                {{--{{Form::text('tags', null,['class' =>'form-control','id'=>'tags','data-role'=>'tagsinput'])}}--}}
                            </div>
                        </div>
                    </div> -->
                        <div class="tag-wall wall">
                            <div class="row">
                                <label class="col-sm-3 control-label" for="input-category"><span
                                            data-toggle="tooltip" title=""
                                            data-original-title="Choose all products under selected category.">Tags</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="" value="" placeholder="Tags"
                                           id="input-tags" class="form-control" autocomplete="off">
                                    <ul class="dropdown-menu"></ul>
                                    <div id="coupon-category" class="well well-sm view-coupon">
                                        <ul class="coupon-tags-list">
                                            {{--@if($post && $post->tags)--}}
                                                {{--<?php--}}
                                                {{--$tags = json_decode($post->tags, true);--}}
                                                {{--?>--}}
                                                {{--@foreach($tags as $tag)--}}
                                                    {{--<li><span class="remove-search-tag"><i--}}
                                                                    {{--class="fa fa-minus-circle"></i></span>{{ $tag }}--}}
                                                    {{--</li>--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}
                                        </ul>
                                    </div>
                                    {!! Form::hidden('tags',null,['id' => 'tags-names','class' => 'search-hidden-input']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="category-wall wall">
                            <div class="row">
                                <label class="col-sm-3 control-label" for="input-category"><span
                                            data-toggle="tooltip" title=""
                                            data-original-title="Choose all products under selected category.">Category</span></label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        {!! Form::hidden('categories',(isset($checkedCategories))
                                        ? json_encode($checkedCategories) : null,['id' => 'categories_tree']) !!}
                                        <div id="treeview_json"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/flagstrap/css/flags.css')}}">
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.css">
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css"/>

    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')

    <script src="{{asset('public/admin_theme/flagstrap/js/jquery.flagstrap.js')}}"></script>
    <script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.js"></script>
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

    <script src="/public/js/tinymce/tinymce.min.js"></script>
    <script>

        function render_categories_tree() {
            $("#treeview_json").jstree({
                "checkbox": {
                    "three_state": false,
                    "cascade": 'undetermined',
                    "keep_selected_style": false
                },
                plugins: ["wholerow", "checkbox", "types"],
                core: {
                    themes: {
                        responsive: !1
                    },
                    data: {!! json_encode([]) !!}
                },
                types: {
                    "default": {
                        icon: "fa fa-folder text-primary fa-lg"
                    },
                    file: {
                        icon: "fa fa-file text-success fa-lg"
                    }
                }
            })
        }

        $('#treeview_json').on("changed.jstree", function (e, data) {
            if (data.node) {
                var selectedNode = $('#treeview_json').jstree(true).get_selected(true)
                var dataArr = [];
                for (var i = 0, j = selectedNode.length; i < j; i++) {
                    dataArr.push(selectedNode[i].id);
                    dataArr.push(selectedNode[i].parent);
                }

                var uniqueNames = [];

                if (dataArr.length > 0) {
                    $.each(dataArr, function (i, el) {
                        if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
                    });
                }

                var index = uniqueNames.indexOf("#");
                if (index > -1) {
                    uniqueNames.splice(index, 1);
                }

                $("#categories_tree").val(JSON.stringify(uniqueNames));
            }
        });

        render_categories_tree()

        function removeA(arr) {
            var what, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax = arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }

        function initTinyMce(e) {
            tinymce.init({
                selector: e,
                height: 500,
                theme: 'modern',
                plugins: 'print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern help',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
                image_advtab: true,
                templates: [
                    {title: 'Test template 1', content: 'Test 1'},
                    {title: 'Test template 2', content: 'Test 2'}
                ],
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'
                ]
            });
        }

        initTinyMce(".tinyMcArea")
        /*$('form').submit(function(e) {
         tinymce.get().forEach(item => {
         console.log(item.id)
         let html = item.getBody().innerHTML
         $(`#${item.id}`).val(html)
         console.log($(`#${item.id}`).val())
         })
         // DO STUFF...
         e.preventDefault()
         return false; // return false to cancel form action
         });*/
    </script>
    <script>


    </script>
    <script>
        $(function () {
            $(".sortable-panels").sortable();
            $(".sortable-panels").disableSelection();
        });
    </script>
    <script src="/public/admin_theme/blog_new.js"></script>

@stop