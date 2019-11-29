@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_translations') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Products</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link active" id="items-tab" href="{!! route('admin_settings_translations_items') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="attr-tab" href="{!! route('admin_settings_translations_attrs') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Attributes</a>
            </li>
        </ul>
        <div class="tab-content">
            {!! Form::open(['class'=>'form-horizontal']) !!}
            <div class="card panel panel-default mb-3">
                <div class="card-body panel-body">
                    

                    <div class="form-group">
                        <div class="accordion" id="accordionTranslation">
                            @foreach($items as $item)
                                <div class="card">
                                    <div class="card-header" id="heading{!! $item->id !!}">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{!! $item->id !!}" aria-expanded="true" aria-controls="collapse{!! $item->id !!}">
                                                <h6>{!! $item->name !!} translation</h6>
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse{!! $item->id !!}" class="collapse" aria-labelledby="heading{!! $item->id !!}" data-parent="#accordionTranslation">
                                        <div class="card-body">
                                            <div class="text-right mb-2">
                                                {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                                            </div>
                                            @if(count(get_languages()))
                                                <ul class="nav nav-tabs">
                                                    @foreach(get_languages() as $language)
                                                        <li class="nav-item"><a
                                                                class="nav-link @if($loop->first) active @endif"
                                                                data-toggle="tab"
                                                                href="#{{ strtolower($language->code).$item->id }}">
                                                                            <span
                                                                                class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                                            </a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <div class="tab-content mt-20">
                                                @if(count(get_languages()))
                                                    @foreach(get_languages() as $language)
                                                        <div id="{{ strtolower($language->code).$item->id }}"
                                                             class="tab-pane fade  @if($loop->first) in active show @endif">
                                                            <div class="form-group row mt-3">
                                                                <label
                                                                    class="col-xl-2 control-label col-form-label text-xl-right"><span
                                                                        data-toggle="tooltip"
                                                                        title=""
                                                                        data-original-title="Attribute Name Title">Product Name</span></label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::text('translatable['.$item->id.']['.strtolower($language->code).'][name]',get_translated($item,strtolower($language->code),'name'),['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label
                                                                    class="col-xl-2 control-label col-form-label text-xl-right"><span
                                                                        data-toggle="tooltip"
                                                                        title=""
                                                                        data-original-title="Short Description">Short Description</span></label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::textarea('translatable['.$item->id.']['.strtolower($language->code).'][short_description]',get_translated($item,strtolower($language->code),'short_description'),['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-2 control-label col-form-label text-xl-right"><span
                                                                        data-toggle="tooltip"
                                                                        title=""
                                                                        data-original-title="Short Description">Long Description</span></label>
                                                                <div class="col-xl-10">
                                                                    {!! Form::textarea('translatable['.$item->id.']['.strtolower($language->code).'][long_description]',get_translated($item,strtolower($language->code),'long_description'),['class'=>'form-control tinyMcArea','cols'=>30,'rows'=>10]) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
