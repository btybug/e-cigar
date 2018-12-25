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
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link" id="tab1-tab" data-toggle="tab" href="#tab1">To User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2">To Admin</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-content-store-settings">
                                <div class="tab-pane fade active in" id="tab1" aria-labelledby="tab1-tab">
                                    <div class="form-group row">
                                        <label for="from" class="col-sm-3">From</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="from" name="from">
                                                <option value="hakobyan.sahak88@gmail.com">hakobyan.sahak88@gmail.com
                                                </option>
                                                <option value="hr@hook.am" selected="selected">hr@hook.am</option>
                                            </select>
                                        </div>
                                    </div>
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
                                                    <label for="subject_gb" class="col-sm-3">Subject</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" id="subject_am"
                                                               placeholder="Subject" name="translatable[gb][subject]"
                                                               type="text" value="please confirm">
                                                    </div>
                                                </div>
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
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                    <div class="form-group row">
                                        <label for="admin_from" class="col-sm-3">From</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="admin_from" name="admin[from]">
                                                <option value="hakobyan.sahak88@gmail.com">hakobyan.sahak88@gmail.com
                                                </option>
                                                <option value="hr@hook.am" selected="selected">hr@hook.am</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="to_admin" class="col-sm-3">To</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="to_admin" name="admin[to]">
                                                <option value="hakobyan.sahak88@gmail.com" selected="selected">
                                                    hakobyan.sahak88@gmail.com
                                                </option>
                                            </select>
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
                                                    <label for="subject_gb" class="col-sm-3">Subject</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" id="admin_subject_am"
                                                               placeholder="Subject"
                                                               name="admin[translatable][gb][subject]" type="text"
                                                               value="xascsdcsd">
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
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[app_name]</b></td>
                        <td>your site name</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[app_name]</b></td>
                        <td>your site url</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[app_blog_url]</b></td>
                        <td>your site blog url</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[receiver_name]</b></td>
                        <td>email receiver user name</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[receiver_last_name]</b></td>
                        <td>email receiver user last name</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[receiver_last_phone]</b></td>
                        <td>email receiver user last name</td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group row border-top">
                    <label for="is_active" class="col-sm-3">Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="to_admin" name="is_active">
                            <option value="1" selected="selected">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
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