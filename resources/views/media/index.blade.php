@extends('layouts.admin')
@section('content')
    <div id="page-wrapper" class="gray-bg">

        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content {!! $settings['leftcontainer']??null !!}">
                            <div class="file-manager">
                                {{--<h5>Show:</h5>--}}
                                {{--<a href="#" class="file-control active">Ale</a>--}}
                                {{--<a href="#" class="file-control">Documents</a>--}}
                                {{--<a href="#" class="file-control">Audio</a>--}}
                                {{--<a href="#" class="file-control">Images</a>--}}
                                <div class="hr-line-dashed"></div>
                                <button class="btn btn-primary btn-block {!! $settings['uploadbutton']??null !!}">
                                    Upload Files
                                </button>
                                <div class="hr-line-dashed"></div>

                                <h5><a class="pull-right {!! $settings['addbutton']??null !!}" data-toggle="collapse"
                                       role="button" href="#createFolder"><i class="fa fa-plus" aria-hidden="true"></i></a>Folders
                                    <span data-media="selected"><a href="#">back Foder</a></span></h5>
                                <div class="collapse" id="createFolder">
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-mediafield="addfolder"
                                               placeholder="Folder name">
                                        <span class="input-group-btn">
                                      <button class="btn btn-default" type="button" data-media="addfolder">Add</button>
                                    </span>
                                    </div><!-- /input-group -->
                                </div>
                                <ul class="folder-list" style="padding: 0;" data-media="folder">

                                </ul>
                                {{--<h5 class="tag-title">Tags</h5>--}}
                                {{--<ul class="tag-list" style="padding: 0">--}}
                                    {{--<li><a href="">Family</a></li>--}}
                                    {{--<li><a href="">Work</a></li>--}}
                                    {{--<li><a href="">Home</a></li>--}}
                                    {{--<li><a href="">Children</a></li>--}}
                                    {{--<li><a href="">Holidays</a></li>--}}
                                    {{--<li><a href="">Music</a></li>--}}
                                    {{--<li><a href="">Photography</a></li>--}}
                                    {{--<li><a href="">Film</a></li>--}}
                                {{--</ul>--}}
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12 m-b-10 text-right">
                            <button type="button" class="btn btn-default" data-role="btnUploader">Uploader</button>
                        </div>
                    </div>
                    <div class="row collapse show-uploder" data-targetiuploder="folder">
                        <div class="col-lg-12 m-b-15"></div>
                    </div>
                    <div class="row {!! $settings['rightcontainer']??null !!}">
                        <div class="col-lg-12 " data-media="folderitem">
                        </div>
                        <div class="col-lg-12 hide">
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive"
                                                 src="{!! url('public/media_template/img/p1.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Italy street.jpg
                                            <br/>
                                            <small>Added: Jan 6, 2014</small>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive"
                                                 src="{!! url('public/media_template/img/p2.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            My feel.png
                                            <br/>
                                            <small>Added: Jan 7, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-music"></i>
                                        </div>
                                        <div class="file-name">
                                            Michal Jackson.mp3
                                            <br/>
                                            <small>Added: Jan 22, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive"
                                                 src="{!! url('public/media_template/img/p3.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Fab 11, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="img-responsive fa fa-film"></i>
                                        </div>
                                        <div class="file-name">
                                            Monica's birthday.mpg4
                                            <br/>
                                            <small>Added: Fab 18, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <a href="#">
                                    <div class="file {!! $settings['thumbnailclass']??null !!}">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="file-name">
                                            Annual report 2014.xls
                                            <br/>
                                            <small>Added: Fab 22, 2014</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive"
                                                 src="{!! url('public/media_template/img/p1.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Italy street.jpg
                                            <br/>
                                            <small>Added: Jan 6, 2014</small>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive"
                                                 src="{!! url('public/media_template/img/p2.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            My feel.png
                                            <br/>
                                            <small>Added: Jan 7, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-music"></i>
                                        </div>
                                        <div class="file-name">
                                            Michal Jackson.mp3
                                            <br/>
                                            <small>Added: Jan 22, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive"
                                                 src="{!! url('public/media_template/img/p3.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Fab 11, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="img-responsive fa fa-film"></i>
                                        </div>
                                        <div class="file-name">
                                            Monica's birthday.mpg4
                                            <br/>
                                            <small>Added: Fab 18, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <a href="#">
                                    <div class="file {!! $settings['thumbnailclass']??null !!}">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="file-name">
                                            Annual report 2014.xls
                                            <br/>
                                            <small>Added: Fab 22, 2014</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive"
                                                 src="{!! url('public/media_template/img/p1.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Italy street.jpg
                                            <br/>
                                            <small>Added: Jan 6, 2014</small>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive"
                                                 src="{!! url('public/media_template/img/p2.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            My feel.png
                                            <br/>
                                            <small>Added: Jan 7, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-music"></i>
                                        </div>
                                        <div class="file-name">
                                            Michal Jackson.mp3
                                            <br/>
                                            <small>Added: Jan 22, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive"
                                                 src="{!! url('public/media_template/img/p3.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Fab 11, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass']??null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="img-responsive fa fa-film"></i>
                                        </div>
                                        <div class="file-name">
                                            Monica's birthday.mpg4
                                            <br/>
                                            <small>Added: Fab 18, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <a href="#">
                                    <div class="file {!! $settings['thumbnailclass']??null !!}">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="file-name">
                                            Annual report 2014.xls
                                            <br/>
                                            <small>Added: Fab 22, 2014</small>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="hide">
        <div data-template="itemthumb">
            <div class="file-box" data-dragitem="{id}" data-id="{id}" data-name="{original_name}" data-mediatype="item">
                <div class="file {!! $settings['thumbnailclass']??null !!}">
                    <a href="#">
                        <span class="corner"></span>

                        <div class="icon">
                            <img width="180px" src="{url}">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="file-name">
                            {real_name}
                            <br/>
                            <small>Added: {created_at}</small>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        <div data-template="foldertumb">
            <div class="file-box" data-folderid="{id}" data-name="{title}" data-id="{id}" data-mediatype="folder">
                <div class="file {!! $settings['thumbnailclass']??null !!}">
                    <a href="#" data-id="{id}" data-media="getitem">
                        <span class="corner"></span>

                        <div class="icon">
                            <i class="fa fa-folder"></i>
                        </div>
                        <div class="file-name">
                            {title}
                            <br/>
                            <small>Added: {created_at}</small>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="foldersetting" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Settings <span data-settingmodal="settingtitel"></span></h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#bbsettingfoler">Folder Settings</a>
                        </li>
                        <li><a data-toggle="tab" href="#bbuploadersetting">Uploader Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content p-15">
                        <div id="bbsettingfoler" class="tab-pane active">
                            <input name="folder_id" data-selectmenu="folder_id" type="hidden">
                            <form data-settingmodal="setting">

                                <div class="form-group">
                                    <label for="Action">Action</label>
                                    <select class="form-control" multiple data-selectmenu="action" name="action">
                                        <option value="all_access">all_access</option>
                                        <option value="no_access">no_access</option>
                                        <option value="edit">edit</option>
                                        <option value="delete">delete</option>
                                        <option value="upload">upload</option>
                                        <option value="create_folder">create_folder</option>
                                        <option value="create_item">create_item</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="function">Function</label>
                                    <select class="form-control" name="function" data-selectmenu="function">
                                        <option value="">fucntion</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" rows="3" name="description"
                                              data-selectmenu="description"></textarea>

                                </div>
                                <div class="form-group hide">
                                    <label for="uploader">Uploader</label>
                                    <select class="form-control" name="uploader_slug" data-selectmenu="Uploader-s">

                                    </select>

                                </div>
                            </form>
                        </div>
                        <div id="bbuploadersetting" class="tab-pane">
                            <form data-settingmodal="uploder">

                            </form>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-settingmodal="save" data-dismiss="modal">Save
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    {!! Form::hidden(null,'drive',['data-type'=>'folder']) !!}
@stop
@section('css')
    {{--@push("css")--}}
    {{--{!! Html::style("/resources/assets/js/animate/css/animate.css") !!}--}}
    {!! Html::style("public/media_template/css/style.css") !!}
    {!! Html::style("public/js/bootstrap-select/css/bootstrap-select.min.css") !!}
    {!! Html::style("public/js/tag-it/css/jquery.tagit.css") !!}
    {{--@endpush--}}
@stop
@section("js")
    {!! Html::script("public/js/nestedSortable/jquery.mjs.nestedSortable.js") !!}
    {!! Html::script("public/js/bootstrap-select/js/bootstrap-select.min.js") !!}
    {!! Html::script("public/js/tag-it/js/tag-it.js") !!}
    {!! Html::script("public/js/media_button.js") !!}
    <script>
    $("body").on("click", ".fileinput-remove", function(){
        $("body").find(".show-uploder").removeClass("in")
    })
    </script>
@stop
