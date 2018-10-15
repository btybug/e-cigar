@extends('layouts.admin')
@section('content-header')
    <div class="list-tabs-head">
        <div class="head">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
                <li><a data-toggle="tab" href="#seo">SEO</a></li>
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

        <div id="home" class="tab-pane tab_info fade in active">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-danger btn-view">View Product</button>
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row sortable-panels">
                <div class="col-md-9 ">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    {{Form::label('purl', 'Post Url',['class' => 'col-sm-3'])}}
                                    <div class="col-sm-9">
                                        {{Form::text('post_url', isset($editable_post) ? $editable_post->post_url : null,['class' =>'form-control','id'=>'purl','placeholder' => ''])}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <ul class="nav nav-tabs tab_lang_horizontal">
                                        <li class="active"><a data-toggle="tab" href="#posttitleAM">AM</a></li>
                                        <li><a data-toggle="tab" href="#posttitleEN">EN</a></li>
                                        <li><a data-toggle="tab" href="#posttitleRU">RU</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="posttitleAM" class="tab-pane fade in active">
                                            <div class="form-group row">
                                                {{Form::label('ptitle', 'Post title',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::text('post_title[am]', isset($editable_post)? $editable_post->getTranslation('am')->post_title : null,['class' =>'form-control','id'=>'ptitle','placeholder' => 'Some Title am'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div id="posttitleEN" class="tab-pane fade">
                                            <div class="form-group row">
                                                {{Form::label('ptitle', 'Post title',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::text('post_title[en]',isset($editable_post)? $editable_post->getTranslation('en')->post_title : null,['class' =>'form-control','id'=>'ptitle','placeholder' => 'Some Title en'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div id="posttitleRU" class="tab-pane fade">
                                            <div class="form-group row">
                                                {{Form::label('ptitle', 'Post title',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::text('post_title[ru]',isset($editable_post)? $editable_post->getTranslation('ru')->post_title : null,['class' =>'form-control','id'=>'ptitle','placeholder' => 'Some Title ru'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <ul class="nav nav-tabs tab_lang_horizontal">
                                        <li class="active"><a data-toggle="tab" href="#shortdescAM">AM</a></li>
                                        <li><a data-toggle="tab" href="#shortdescEN">EN</a></li>
                                        <li><a data-toggle="tab" href="#shortdescRU">RU</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="shortdescAM" class="tab-pane fade in active">
                                            <div class="form-group row">
                                                {{Form::label('sh_desc_am', 'Short Description',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::textarea('short_description[am]', isset($editable_post)? $editable_post->getTranslation('am')->short_description : null ,['class' =>'form-control','id'=>'sh_desc_am','cols'=>30,'rows'=>2,'placeholder' => 'Description am'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div id="shortdescEN" class="tab-pane fade ">
                                            <div class="form-group row">
                                                {{Form::label('sh_desc_en', 'Short Description',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::textarea('short_description[en]',isset($editable_post)? $editable_post->getTranslation('en')->short_description : null,['class' =>'form-control','id'=>'sh_desc_en','cols'=>30,'rows'=>2,'placeholder' => 'Description en'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div id="shortdescRU" class="tab-pane fade ">
                                            <div class="form-group row">
                                                {{Form::label('sh_desc_ru', 'Short Description[ru]',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::textarea('short_description[ru]',isset($editable_post)? $editable_post->getTranslation('ru')->short_description : null,['class' =>'form-control','id'=>'sh_desc_ru','cols'=>30,'rows'=>2,'placeholder' => 'Description ru'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <ul class="nav nav-tabs tab_lang_horizontal">
                                            <li class="active"><a data-toggle="tab" href="#longdescAM">AM</a></li>
                                            <li><a data-toggle="tab" href="#longdescEN">EN</a></li>
                                            <li><a data-toggle="tab" href="#longdescRU">RU</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="longdescAM" class="tab-pane fade in active">
                                                <div class="form-group row">
                                                    {{Form::label('lg_desc_am', 'Long Description',['class' => 'col-sm-3'])}}
                                                    <div class="col-sm-9">
                                                        {{Form::textarea('long_description[am]',isset($editable_post)? $editable_post->getTranslation('am')->long_description : null,['class' =>'form-control','id'=>'lg_desc_am','cols'=>30,'rows'=>10,'placeholder' => 'Description am'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="longdescEN" class="tab-pane fade">
                                                <div class="form-group row">
                                                    {{Form::label('lg_desc_en', 'Long Description',['class' => 'col-sm-3'])}}
                                                    <div class="col-sm-9">
                                                        {{Form::textarea('long_description[en]',isset($editable_post)?$editable_post->getTranslation('en')->long_description : null ,['class' =>'form-control','id'=>'lg_desc_en','cols'=>30,'rows'=>10,'placeholder' => 'Description en'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="longdescRU" class="tab-pane fade">
                                                <div class="form-group row">
                                                    {{Form::label('lg_desc_ru', 'Long Description',['class' => 'col-sm-3'])}}
                                                    <div class="col-sm-9">
                                                        {{Form::textarea('long_description[ru]',isset($editable_post)? $editable_post->getTranslation('ru')->long_description:null ,['class' =>'form-control','id'=>'lg_desc_ru','cols'=>30,'rows'=>10,'placeholder' => 'Description ru'])}}
                                                    </div>
                                                </div>
                                            </div>
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
                </div>
                <div class="col-md-3 ">
                    <div class="view-product-wall">
                        <div class="author-wall wall">
                            <div class="row">
                                {{Form::label('author', 'Author',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    @php
                                        foreach ($authors as $author)
                                    {
                                            $auths[$author->id] =  $author->name;
                                    }
                                    @endphp
                                    {!! Form::select('author',$auths,isset($editable_post)? $editable_post->author : null,
                                                ['class' => 'form-control','id'=> 'status']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="status-wall wall">
                            <div class="row">
                                {{Form::label('status', 'Status',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {!! Form::select('status',['published' => 'Published','unpublished' => 'UnPublish',],isset($editable_post)? $editable_post->status : null,
                                                ['class' => 'form-control','id'=> 'status']) !!}
                                </div>
                            </div>
                        </div>
                        @if(isset($editable_post))
                            {{Form::hidden('ident',$editable_post->id,['class' =>'form-control','id'=>'id'])}}
                        @endif
                        <div class="tag-wall wall">
                            <div class="row">
                                {{Form::label('tags', 'Tags',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('tags',isset($editable_post)? $editable_post->tags : null,['class' =>'form-control','id'=>'tags','data-role'=>'tagsinput'])}}
                                </div>
                            </div>
                        </div>
                        <div class="category-wall wall">
                            <h6>Category</h6>
                            <div class="cat-checkbox">
                                <div class="checkbox">
                                    <label>{!! Form::checkbox('Parent','parent',null, array('id'=>'parent'))  !!}
                                        Parent</label>
                                </div>
                                <div class="child-checkbox">
                                    <div class="checkbox">
                                        <label>{!! Form::checkbox('Child1','child1',null, array('id'=>'child1'))  !!}
                                            Child1</label>
                                    </div>
                                </div>
                                <div class="child-checkbox">
                                    <div class="checkbox">
                                        <label>{!! Form::checkbox('Child2','child2',null, array('id'=>'child2'))  !!}
                                            Child2</label>
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <label>{!! Form::checkbox('Parent3','parent3',null, array('id'=>'parent3'))  !!}
                                        Parent 2</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="seo" class="tab-pane  tab_seo fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="seo-general-content">
                        <table class="form-table">
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <label for="seo_focuskw">Focus Keyword:</label>
                                    <img src="/public/images/question-mark.png" alt="question">
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="seo_focuskw">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="seo_title">SEO Title:</label>
                                    <img src="/public/images/question-mark.png" alt="question">
                                </th>
                                <td>
                                    <input type="text" id="seo_title" class="form-control"
                                           placeholder="Surprisingly think it, you can find several fundamental hints out there which will assist produce your article writing abilities instantly. It really is satisfying to develop your own skills. There are a lot of easy ways to foster your skills, but you simply should know what things to do and the fashion to take action. A very simple method to improve writing abilities is constantly to study unique kinds of article content.  -"><br>
                                    <div>
                                        <p><span class="wrong">Warning:</span>
                                            Title display in Google is limited to a fixed width, yours is too long.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="seo_metadesc">Meta description:</label>
                                    <img src="/public/images/question-mark.png" alt="question">
                                </th>
                                <td>
                                    <textarea class="form-control metadesc" rows="2" id="seo_metadesc"></textarea>
                                    <div>The <code>meta</code> description will be limited to 156 chars, 156 chars left.
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="seo-advanced">
                        <table class="form-table">
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <label for="seo_meta-robots-noindex">Meta Robots Index:</label>
                                </th>
                                <td>
                                    <select name="seo_meta-robots-noindex" id="seo_meta-robots-noindex"
                                            class="">
                                        <option selected="selected" value="0">Default for post type, currently: index
                                        </option>
                                        <option value="2">index</option>
                                        <option value="1">noindex</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Meta Robots Follow</th>
                                <td>
                                    <input type="radio" checked="checked" id="seo_meta-robots-nofollow_0"
                                           name="seo_meta-robots-nofollow" value="0">
                                    <label for="seo_meta-robots-nofollow_0">Follow</label>
                                    <input type="radio" id="seo_meta-robots-nofollow_1"
                                                                                                           name="seo_meta-robots-nofollow"  value="1">
                                    <label for="seo_meta-robots-nofollow_1">Nofollow</label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="seo_meta-robots-adv">Meta Robots Advanced:</label>
                                </th>
                                <td>
                                    <select multiple="multiple" size="7" style="height: 144px;"
                                            name="seo_meta-robots-adv" id="seo_meta-robots-adv"
                                            class="">
                                        <option selected="selected" value="-">Site-wide default: None</option>
                                        <option value="none">None</option>
                                        <option value="noodp">NO ODP</option>
                                        <option value="noydir">NO YDIR</option>
                                        <option value="noimageindex">No Image Index</option>
                                        <option value="noarchive">No Archive</option>
                                        <option value="nosnippet">No Snippet</option>
                                    </select>
                                    <div>Advanced <code>meta</code> robots settings for this page.</div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="seo_canonical">Canonical URL:</label>
                                </th>
                                <td>
                                    <input type="text" id="seo_canonical" name="seo_canonical" value=""
                                           class="form-control"><br>
                                    <div>The canonical URL that this page should point to, leave empty to default to
                                        permalink. <a target="_blank"
                                                      href="#">Cross
                                            domain canonical</a> supported too.
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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
    <script src="/public/js/tinymce/tinymce.min.js"></script>
    <script>
        function initTinyMce(e){
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
        initTinyMce("#lg_desc_am")
        initTinyMce("#lg_desc_en")
        initTinyMce("#lg_desc_ru")
        $('#form').submit(function() {
            tinyMCE.triggerSave()
        // DO STUFF...
        return true; // return false to cancel form action
        });
    </script>
    <script>


    </script>
    <script>
        $(function () {
            $(".sortable-panels").sortable();
            $(".sortable-panels").disableSelection();
        });
    </script>
@stop