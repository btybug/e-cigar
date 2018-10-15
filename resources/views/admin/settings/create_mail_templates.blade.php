@extends('layouts.admin')

@section('content')
    {!! Form::open() !!}

    <div class="col-md-12">
        <div class="text-right btn-save">
            <button type="submit" class="btn btn-danger btn-view">View Template</button>
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </div>
    <div class="tab-content tabs_content col-md-8">
        <div id="home" class="tab-pane tab_info fade in active">

            <div class="row sortable-panels">
                <div class="col-md-9 ">
                    <div class="form-group row">
                        {{Form::label('type', 'Type',['class' => 'col-sm-3'])}}
                        <div class="col-sm-9">
                            {{Form::select('type',[
                            'registration'=>'Registration',
                            'email_confirmation'=>'Email Confirmation',
                            'new_post'=>'New Post',
                            'order'=>'Order'
                            ] ,null,['class' =>'form-control','id'=>'type'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <ul class="nav nav-tabs tab_lang_horizontal">
                                        <li class="active"><a data-toggle="tab" href="#shortdescAM">AM</a></li>
                                        <li><a data-toggle="tab" href="#shortdescEN">EN</a></li>
                                        <li><a data-toggle="tab" href="#shortdescRU">RU</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="shortdescAM" class="tab-pane fade in active">
                                            <div class="form-group row">
                                                {{Form::label('title_am', 'Title',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::text('translatable[am][title]',null ,['class' =>'form-control','id'=>'title_am','placeholder' => __('Title')])}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{Form::label('subject_am', 'Subject',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::text('translatable[am][subject]',null ,['class' =>'form-control','id'=>'subject_am','placeholder' => __('Subject')])}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{Form::label('content_am', 'Content',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::textarea('translatable[am][content]',null ,['class' =>'form-control','id'=>'content_am','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div id="shortdescEN" class="tab-pane fade ">
                                            <div class="form-group row">
                                                {{Form::label('title_en', 'Title',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::text('translatable[en][title]',null ,['class' =>'form-control','id'=>'title_en','placeholder' => __('Title')])}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{Form::label('subject_en', 'Subject',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::text('translatable[en][subject]',null ,['class' =>'form-control','id'=>'subject_en','placeholder' => __('Subject')])}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{Form::label('content_en', 'Content',['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::textarea('translatable[en][content]',null ,['class' =>'form-control','id'=>'content_en','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div id="shortdescRU" class="tab-pane fade ">
                                            <div class="form-group row">
                                                {{Form::label('title_ru', __('Title'),['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::text('translatable[ru][title]',null ,['class' =>'form-control','id'=>'title_ru','placeholder' => __('Title')])}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{Form::label('subject_ru', __('Subject'),['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::text('translatable[ru][subject]',null ,['class' =>'form-control','id'=>'subject_ru','placeholder' => __('Subject')])}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{Form::label('content_ru', __('Content'),['class' => 'col-sm-3'])}}
                                                <div class="col-sm-9">
                                                    {{Form::textarea('translatable[ru][content]',null ,['class' =>'form-control','id'=>'content_ru','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <div class="tab-content tabs_content col-md-4">

    </div>
@stop

@section('js')
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
        initTinyMce("#content_am")
        initTinyMce("#content_en")
        initTinyMce("#content_ru")
        $('#form').submit(function () {
            tinyMCE.triggerSave()
            // DO STUFF...
            return true; // return false to cancel form action
        });
    </script>
@stop