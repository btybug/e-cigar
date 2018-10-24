@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>{!! $model->title !!}</h3>
            {!! Form::model($model) !!}
        </div>
        <div class="col-md-4">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-danger btn-view">View Template</button>
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </div>
    </div>

    <div class="tab-content tabs_content col-md-8">

        <div id="home" class="tab-pane tab_info fade in active">

            <div class="row sortable-panels">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item active">
                                        <a class="nav-link" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true" aria-expanded="true">To User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="mail" aria-selected="false">To Admin</a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-content-store-settings">
                                    <div class="tab-pane fade active in" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                        <div class="form-group row">
                                            {{Form::label('from', 'From',['class' => 'col-sm-3'])}}
                                            <div class="col-sm-9">
                                                {{Form::text('from',null ,['class' =>'form-control','id'=>'from','placeholder' => 'hr@hook.am'])}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{Form::label('to', 'To',['class' => 'col-sm-3'])}}
                                            <div class="col-sm-9">
                                                {{Form::text(null,'{user}' ,['class' =>'form-control','id'=>'from','readonly','disabled'])}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @if(count(get_languages()))
                                                <ul class="nav nav-tabs">
                                                    @foreach(get_languages() as $language)
                                                        <li class="@if($loop->first) active @endif"><a data-toggle="tab"
                                                                                                       href="#{{ strtolower($language->code) }}">
                                                                <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                                            </a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <div class="tab-content tab-content-store-settings">
                                                <div id="shortdescAM" class="tab-pane fade in active">
                                                    <div class="form-group row">
                                                        {{Form::label('subject_am', 'Subject',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::text('translatable[am][subject]',get_translated($model,'am','subject') ,['class' =>'form-control','id'=>'subject_am','placeholder' => __('Subject')])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{Form::label('content_am', 'Content',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::textarea('translatable[am][content]',get_translated($model,'am','content') ,['class' =>'form-control','id'=>'content_am','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="shortdescGB" class="tab-pane fade ">
                                                    <div class="form-group row">
                                                        {{Form::label('from', 'From',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::text('from',null ,['class' =>'form-control','id'=>'from','placeholder' => 'hr@hook.am'])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{Form::label('subject_gb', 'Subject',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::text('translatable[gb][subject]',get_translated($model,'gb','subject') ,['class' =>'form-control','id'=>'subject_en','placeholder' => __('Subject')])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{Form::label('content_gb', 'Content',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::textarea('translatable[gb][content]',get_translated($model,'gb','content') ,['class' =>'form-control','id'=>'content_en','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="shortdescRU" class="tab-pane fade ">
                                                    <div class="form-group row">
                                                        {{Form::label('from', 'From',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::text('from',null ,['class' =>'form-control','id'=>'from','placeholder' => 'hr@hook.am'])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{Form::label('subject_ru', __('Subject'),['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::text('translatable[ru][subject]',get_translated($model,'ru','subject') ,['class' =>'form-control','id'=>'subject_ru','placeholder' => __('Subject')])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{Form::label('content_ru', __('Content'),['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::textarea('translatable[ru][content]',get_translated($model,'ru','content') ,['class' =>'form-control','id'=>'content_ru','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                        <div class="form-group row">
                                            {{Form::label('admin_from', 'From',['class' => 'col-sm-3'])}}
                                            <div class="col-sm-9">
                                                {{Form::text('admin[from]',null ,['class' =>'form-control','id'=>'admin_from','placeholder' => 'hr@hook.am'])}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{Form::label('to_admin', 'To',['class' => 'col-sm-3'])}}
                                            <div class="col-sm-9">
                                                {{Form::text('admin[to]',null ,['class' =>'form-control','id'=>'to_admin'])}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @if(count(get_languages()))
                                                <ul class="nav nav-tabs">
                                                    @foreach(get_languages() as $language)
                                                        <li class="@if($loop->first) active @endif"><a data-toggle="tab"
                                                                                                       href="#{{ strtolower($language->code) }}">
                                                                <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                                            </a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <div class="tab-content tab-content-store-settings">
                                                <div id="shortdescAM" class="tab-pane fade in active">
                                                    <div class="form-group row">
                                                        {{Form::label('subject_am', 'Subject',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::text('translatable[am][subject]',get_translated($model,'am','subject') ,['class' =>'form-control','id'=>'subject_am','placeholder' => __('Subject')])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{Form::label('content_am', 'Content',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::textarea('translatable[am][content]',get_translated($model,'am','content') ,['class' =>'form-control','id'=>'content_am','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="shortdescGB" class="tab-pane fade ">
                                                    <div class="form-group row">
                                                        {{Form::label('from', 'From',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::text('from',null ,['class' =>'form-control','id'=>'from','placeholder' => 'hr@hook.am'])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{Form::label('subject_gb', 'Subject',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::text('admin[translatable[gb][subject]]',get_translated($model,'gb','subject') ,['class' =>'form-control','id'=>'subject_en','placeholder' => __('Subject')])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{Form::label('content_gb', 'Content',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::textarea('translatable[gb][content]',get_translated($model,'gb','content') ,['class' =>'form-control','id'=>'content_en','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="shortdescRU" class="tab-pane fade ">
                                                    <div class="form-group row">
                                                        {{Form::label('from', 'From',['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::text('from',null ,['class' =>'form-control','id'=>'from','placeholder' => 'hr@hook.am'])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{Form::label('subject_ru', __('Subject'),['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::text('translatable[ru][subject]',get_translated($model,'ru','subject') ,['class' =>'form-control','id'=>'subject_ru','placeholder' => __('Subject')])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{Form::label('content_ru', __('Content'),['class' => 'col-sm-3'])}}
                                                        <div class="col-sm-9">
                                                            {{Form::textarea('translatable[ru][content]',get_translated($model,'ru','content') ,['class' =>'form-control','id'=>'content_ru','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
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
        </div>
    </div>
    <div class="col-md-4">
        @if($shortcodes->relatedShortcoders[$model->slug])
        <table class="table table-striped table--email-temp">
            <thead>
            <tr class="table--email-temp_top">
                <th colspan="3">Specific shortcodes for this type</th>
            </tr>
            <tr class="table--email-temp_bottom">
                <th></th>
                <th>Code</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>

            @foreach($shortcodes->relatedShortcoders[$model->slug] as $shortcode)
            <tr>
                <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                <td><b>{!! '['.$shortcode['code'].']' !!}</b></td>
                <td>{!! $shortcode['description'] !!}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
        <table class="table table-striped table--email-temp">
            <thead>
            <tr class="table--email-temp_top">
                <th colspan="3">Common Shortcodes</th>
            </tr>
            <tr class="table--email-temp_bottom">
                <th></th>
                <th>Property</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shortcodes->mailShortcodes as $shortcode)
                <tr>
                    <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                    <td><b>{!! '['.$shortcode['code'].']' !!}</b></td>
                    <td>{!! $shortcode['description'] !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <div class="form-group row">
                {{Form::label('is_active', 'Status',['class' => 'col-sm-3'])}}
                <div class="col-sm-9">
                    {{Form::select('is_active',[1=>'Active',0=>'Inactive'] ,null,['class' =>'form-control','id'=>'to_admin'])}}
                </div>
            </div>
    </div>

    {!! Form::close() !!}

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