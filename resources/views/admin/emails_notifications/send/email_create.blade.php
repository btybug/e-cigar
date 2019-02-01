@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <div class="pull-left">
                <h3></h3>
                {!! Form::model($model,['method'=>'POST','id'=>'form']) !!}
                {!! Form::hidden('id') !!}
            </div>
            <div class="pull-right">
                <div class="text-right btn-save">
                    <button type="button" class="btn btn-success save btn-view create">Save for later</button>
                    <button type="button" class="btn btn-info save send_now">Send Now</button>
                </div>
            </div>
        </div>

        <div class="panel-body">

            <div class="tab-content tabs_content col-md-8">

                <div id="home" class="tab-pane tab_info fade in active">

                    <div class="sortable-panels">
                        <div class="form-group">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link" id="tab1-tab" data-toggle="tab" href="#tab1">To User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2">To Admin</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-content-store-settings">
                                <div class="tab-pane fade active in" id="tab1"
                                     aria-labelledby="tab1-tab">
                                    <div class="form-group row">
                                        {{Form::label('from', 'From',['class' => 'col-sm-3'])}}
                                        <div class="col-sm-9">
                                            {{Form::select('from',$froms,null,['class' =>'form-control','id'=>'from'])}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('to', 'To',['class' => 'col-sm-3'])}}
                                        <div class="col-sm-9">
                                            {!! Form::select('users[]',$users,null,['class' => 'form-control tag-input-v select-user','multiple'=>'multiple']) !!}

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
                                        <div class="tab-content pt-25">
                                            @if(count(get_languages()))
                                                @foreach(get_languages() as $language)
                                                    <div id="{{ strtolower($language->code) }}"
                                                         class="tab-pane fade  @if($loop->first) in active @endif">
                                                        <div class="form-group row">
                                                            {{Form::label('subject_'.strtolower($language->code), 'Subject',['class' => 'col-sm-3'])}}
                                                            <div class="col-sm-9">
                                                                {{Form::text('translatable['.strtolower($language->code).'][subject]',get_translated($model,strtolower($language->code),'subject'),['class' =>'form-control','id'=>'subject_am','placeholder' => __('Subject')])}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{Form::label('content_'.strtolower($language->code), 'Content',['class' => 'col-sm-3'])}}
                                                            <div class="col-sm-9">
                                                                {{Form::textarea('translatable['.strtolower($language->code).'][content]',get_translated($model,strtolower($language->code),'content') ,['class' =>'form-control content_editor','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                    <div class="form-group row">
                                        {{Form::label('admin_from', 'From',['class' => 'col-sm-3'])}}
                                        <div class="col-sm-9">
                                            {{Form::select('admin[from]',$froms,null,['class' =>'form-control','id'=>'admin_from'])}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('to_admin', 'To',['class' => 'col-sm-3'])}}
                                        <div class="col-sm-9">
                                            {{Form::select('admin[to]',$users,null,['class' =>'form-control','id'=>'to_admin'])}}
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
                                        <div class="tab-content pt-25">
                                            @if(count(get_languages()))
                                                @foreach(get_languages() as $language)
                                                    <div id="{{ strtolower($language->code) }}"
                                                         class="tab-pane fade  @if($loop->first) in active @endif">
                                                        <div class="form-group row">
                                                            {{Form::label('subject_'.strtolower($language->code), 'Subject',['class' => 'col-sm-3'])}}
                                                            <div class="col-sm-9">
                                                                {{Form::text('admin[translatable]['.strtolower($language->code).'][subject]',null ,['class' =>'form-control','id'=>'admin_subject_am','placeholder' => __('Subject')])}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{Form::label('content_'.strtolower($language->code), 'Content',['class' => 'col-sm-3'])}}
                                                            <div class="col-sm-9">
                                                                {{Form::textarea('admin[translatable]['.strtolower($language->code).'][content]',null ,['class' =>'form-control content_editor','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
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
                <div class="form-group row border-top">
                    <label for="email_type" class="col-sm-3">Type</label>
                    <div class="col-sm-9">
                        {!! Form::select('category',$categories,null,['class'=>'form-control','id'=>'email_type']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="/public/js/tinymce/tinymce.min.js"></script>
    <script>
        $(".tag-input-v").select2({width: '100%'});
        function initTinyMce(e) {
            tinymce.init({
                selector: e,
                height: 500,
                theme: 'modern',
                plugins: 'print preview  searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern help',
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
        initTinyMce(".content_editor");
        $('#form').submit(function () {
            tinyMCE.triggerSave()
            // DO STUFF...
            return true; // return false to cancel form action
        });
        $('body').on('click', '.create', function () {
            $('body').find('#form')
                .attr('action', '{!! route('post_create_admin_emails_notifications_send_email') !!}')
                .submit();
        });
        $('body').on('click', '.send_now', function () {
            $('body').find('#form')
                .attr('action', '{!! route('post_create_send_admin_emails_notifications_send_email') !!}')
                .submit();
        });
    </script>
@stop