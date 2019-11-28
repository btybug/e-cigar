@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="general-tab" href="{!! route('admin_settings_translations') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Products</a>
            </li>
        </ul>
        <div class="tab-content">
            {!! Form::open(['class'=>'form-horizontal']) !!}
            <div class="card panel panel-default mb-3">
                <div class="card-body panel-body">
                    <div class="form-group">
                        {!! Form::submit('Save',['class' => 'btn btn-primary pull-right']) !!}
                    </div>

                    <div class="form-group">
                        @foreach($products as $product)
                        <div class="row">
                            <h3>{!! $product->name !!} translation</h3>
                        </div>
                        <div class="row">
                            @if(count(get_languages()))
                                <ul class="nav nav-tabs">
                                    @foreach(get_languages() as $language)
                                        <li class="nav-item"><a
                                                class="nav-link @if($loop->first) active @endif"
                                                data-toggle="tab"
                                                href="#{{ strtolower($language->code).$product->id }}">
                                                                            <span
                                                                                class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="tab-content mt-20">
                                @if(count(get_languages()))
                                    @foreach(get_languages() as $language)
                                        <div id="{{ strtolower($language->code).$product->id }}"
                                             class="tab-pane fade  @if($loop->first) in active show @endif">
                                            <div class="form-group row mt-3">
                                                <label
                                                    class="col-xl-2 control-label col-form-label text-xl-right"><span
                                                        data-toggle="tooltip"
                                                        title=""
                                                        data-original-title="Attribute Name Title">Product Name</span></label>
                                                <div class="col-xl-10">
                                                    {!! Form::text('translatable['.$product->id.']['.strtolower($language->code).'][name]',get_translated($product,strtolower($language->code),'name'),['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label
                                                    class="col-xl-2 control-label col-form-label text-xl-right"><span
                                                        data-toggle="tooltip"
                                                        title=""
                                                        data-original-title="Short Description">Short Description</span></label>
                                                <div class="col-xl-10">
                                                    {!! Form::textarea('translatable['.$product->id.']['.strtolower($language->code).'][short_description]',get_translated($product,strtolower($language->code),'short_description'),['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-xl-2 control-label col-form-label text-xl-right"><span
                                                        data-toggle="tooltip"
                                                        title=""
                                                        data-original-title="Short Description">Long Description</span></label>
                                                <div class="col-xl-10">
                                                    {!! Form::textarea('translatable['.$product->id.']['.strtolower($language->code).'][long_description]',get_translated($product,strtolower($language->code),'long_description'),['class'=>'form-control tinyMcArea','cols'=>30,'rows'=>10]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Save',['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">

@stop
@section('js')
    <script src="/public/js/tinymce/tinymce.min.js"></script>

    <script>
        $(function () {
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

            function makeid() {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (var i = 0; i < 9; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text;
            }
        })
    </script>

@stop
