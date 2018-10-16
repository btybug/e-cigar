@extends('layouts.admin')
@section('content-header')
    <div class="list-tabs-head">
        <div class="head">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
                <li><a data-toggle="tab" href="#seo">SEO</a></li>
            </ul>
        </div>
    </div>
@stop

@section('content')
    <div class="tab-content tabs_content">
        {!! Form::model($post,['url' => route('admin_new_post'), 'id' => 'post_form','files' => true]) !!}
        {!! Form::hidden('id',null) !!}
        <div id="home" class="tab-pane tab_info fade in active">
            <div class="text-right btn-save">
                <button type="button" class="btn btn-danger btn-view">View Product</button>
                {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row sortable-panels">
                <div class="col-md-9 ">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    {{Form::label('purl', 'Post Url',['class' => 'col-sm-3'])}}
                                    <div class="col-sm-9">
                                        <label>blog/</label>
                                        {{Form::text('url', null,['class' =>'form-control','id'=>'purl','placeholder' => 'Enter URL ...'])}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    @if(count(get_languages()))
                                        <ul class="nav nav-tabs tab_lang_horizontal">
                                            @foreach(get_languages() as $language)
                                                <li class="@if($loop->first) active @endif"><a data-toggle="tab"
                                                                                               href="#{{ strtolower($language->code) }}">
                                                        <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    <div class="tab-content">
                                        @if(count(get_languages()))
                                            @foreach(get_languages() as $language)
                                                <div id="{{ strtolower($language->code) }}"
                                                     class="tab-pane fade  @if($loop->first) in active @endif">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        {!! Form::text('translatable['.strtolower($language->code).'][title]',get_translated($post,strtolower($language->code),'title'),['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Short Description</label>
                                                        {!! Form::textarea('translatable['.strtolower($language->code).'][short_description]',get_translated($post,strtolower($language->code),'short_description'),['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Long Description</label>
                                                        {!! Form::textarea('translatable['.strtolower($language->code).'][long_description]',get_translated($post,strtolower($language->code),'long_description'),['class'=>'form-control tinyMcArea','cols'=>30,'rows'=>10]) !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
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
                                    {!! Form::select('user_id',$authors,null,
                                                ['class' => 'form-control','id'=> 'status']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="status-wall wall">
                            <div class="row">
                                {{Form::label('status', 'Status',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {!! Form::select('status',['published' => 'Published','draft' => 'Draft','pending' => 'Pending'],null,
                                                ['class' => 'form-control','id'=> 'status']) !!}
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tag-wall wall">
                            <div class="row">
                                {{Form::label('tags', 'Tags',['class' => 'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('tags', null,['class' =>'form-control','id'=>'tags','data-role'=>'tagsinput'])}}
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
                                        </ul>
                                    </div>
                                    <input type="hidden" class="search-hidden-input" value="" id="tags-names">

                                </div>
                            </div>
                        </div>
                        <div class="category-wall wall">
                            <div class="row">
                                <label class="col-sm-3 control-label" for="input-category"><span
                                            data-toggle="tooltip" title=""
                                            data-original-title="Choose all products under selected category.">Category</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="" value="" placeholder="Category"
                                           id="input-category" class="form-control" autocomplete="off">
                                    <ul class="dropdown-menu"></ul>
                                    <div id="coupon-category" class="well well-sm view-coupon">
                                        <ul class="coupon-category-list">
                                        </ul>
                                    </div>
                                    <input type="hidden" class="search-hidden-input" value="" id="category-names">

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
                                    <select name="" id="seo_meta-robots-noindex"
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
                                           name="" value="0">
                                    <label for="seo_meta-robots-nofollow_0">Follow</label>
                                    <input type="radio" id="seo_meta-robots-nofollow_1"
                                           name="" value="1">
                                    <label for="seo_meta-robots-nofollow_1">Nofollow</label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="seo_meta-robots-adv">Meta Robots Advanced:</label>
                                </th>
                                <td>
                                    <select multiple="multiple" size="7" style="height: 144px;"
                                            name="" id="seo_meta-robots-adv"
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
                                    <input type="text" id="seo_canonical" name="" value=""
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
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.css">
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')

    <script src="{{asset('public/admin_theme/flagstrap/js/jquery.flagstrap.js')}}"></script>
    <script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.js"></script>
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

    <script src="/public/js/tinymce/tinymce.min.js"></script>
    <script>
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