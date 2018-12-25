@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <div class="pull-left">
                <h3></h3>
                <form method="POST" action="http://core.bootydev.co.uk/admin/emails-notifications/edit-template/1"
                      accept-charset="UTF-8"><input name="_token" type="hidden"
                                                    value="WvhiiJekhAQ769WfjUlxZuBC761WdW80g2vSROjw">
                </form>
            </div>
            <div class="pull-right">
                <div class="text-right btn-save">
                    <button type="submit" class="btn btn-success btn-view">View Template</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        </div>

        <div class="panel-body">

            <div class="tab-content tabs_content col-md-8">

                <div id="home" class="tab-pane tab_info fade in active">

                    <div class="sortable-panels">
                        <div class="form-group">
                            <div class="tab-content tab-content-store-settings">
                                <div class="tab-pane fade active in" id="tab1" aria-labelledby="tab1-tab">

                                    <div class="form-group row">
                                        <label for="to" class="col-sm-3">To</label>
                                        <div class="col-sm-9">
                                            {!! Form::select('users[]',$users,null,['class' => 'form-control tag-input-v select-user','placeholder' => 'Search','multiple'=>'multiple']) !!}

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <ul class="nav nav-tabs">
                                            <li class=" active "><a data-toggle="tab" href="#gb">
                                                    <span class="flag-icon flag-icon-gb"></span> gb
                                                </a></li>
                                        </ul>
                                        <div class="tab-content pt-25">
                                            <div id="gb" class="tab-pane fade   in active ">
                                                <div class="form-group row">
                                                    {{Form::label('content_', 'Content',['class' => 'col-sm-3'])}}
                                                    <div class="col-sm-9">
                                                        {{Form::textarea('admin[translatable][content]',null,['class' =>'form-control content_editor','cols'=>30,'rows'=>2,'placeholder' => __('Content')])}}
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
              
            </div>


        </div>


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
        initTinyMce(".content_editor")
        $('#form').submit(function () {
            tinyMCE.triggerSave()
            // DO STUFF...
            return true; // return false to cancel form action
        });
    </script>
@stop