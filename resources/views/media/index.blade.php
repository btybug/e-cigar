@extends('layouts.admin')
@section('content')
    <div id="page-wrapper" class="gray-bg">

        <div class="wrapper wrapper-content h-100">
            <div class="row dis-flex">
                <div class="col-lg-3">
                    <div class="ibox scrollbar_custom float-e-margins over-auto">
                        <div class="ibox-content {!! $settings['leftcontainer']??null !!}">
                            <div class="file-manager">
                                {{--<h5>Show:</h5>--}}
                                {{--<a href="#" class="file-control active">Ale</a>--}}
                                {{--<a href="#" class="file-control">Documents</a>--}}
                                {{--<a href="#" class="file-control">Audio</a>--}}
                                {{--<a href="#" class="file-control">Images</a>--}}
                                <div class="hr-line-dashed"></div>
                                <button class="btn btn-info btn-block {!! $settings['uploadbutton']??null !!}">
                                    Upload Files
                                </button>
                                <div class="hr-line-dashed">
                                

                                </div>

                                <h5><a class="pull-right {!! $settings['addbutton']??null !!}" data-toggle="collapse"
                                       role="button" href="#createFolder"><i class="fa fa-plus" aria-hidden="true"></i></a>Folders
                                    <span data-media="selected"><a href="#">back Foder</a></span></h5>
                                <div class="collapse" id="createFolder">
                                    <div class="input-group">
                                        <input type="text" class="form-control new-folder-input" data-mediafield="addfolder"
                                               placeholder="Folder name">
                                        <span class="input-group-btn">
                                      <button class="btn btn-primary-reset-back" type="button" bb-media-click="add_new_folder" data-media="addfolder">Add</button>
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
                <div class="col-lg-9">
                    <div class="over-auto scrollbar_custom">
                        <div class="row m-0">
                            <div class="col-lg-12 m-b-10 text-right d-flex" style="justify-content: space-between;">
                            <ul class="multiple-actions">
                                <li><button class="btn btn-danger"><i class="fa fa-trash"></i></button></li>
                                <li><button class="btn btn-info"><i class="fa fa-share"></i></button></li>
                                <li><button class="btn btn-primary"><i class="fa fa-clone"></i></button></li>
                            </ul>
                            <div class="upload-content">
                            <div class="uploader-container d-none">
                                <input id="uploader" class="file-loading" data-folder-id="{!! 1 !!}" multiple   name="item[]" type="file" data-upload-url="{!! route('media_upload') !!}">
                            </div>
                                <button type="button" class="btn btn-default mb-20" data-role="btnUploader" bb-media-click="show_uploader">Uploader</button>
                            </div>
                            </div>
                        </div>
                        <div class="row m-0 collapse show-uploder" data-targetiuploder="folder">
                            <div class="col-lg-12 m-b-15"></div>
                        </div>
                        <div class="row m-0 {!! $settings['rightcontainer']??null !!} media_right_content">
                            <div class="bread-crumbs">
                                <ul class="bread-crumbs-list" style="display: flex; color: white; list-style: none">
                                   
                                </ul>
                            </div>
                            <div class="row m-0 d-flex flex-wrap" style="position: relative;" data-media="folderitem" data-type="main-container">
                            </div>
                            <!-- <div id="coverup"></div> -->

                            <!-- <div class="col-lg-12 hide">
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

                            </div> -->


                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- <div class="hide">
        <div data-template="itemthumb">
            <div class="file-box" data-dragitem="{id}" data-id="{id}" data-name="{original_name}" data-mediatype="item">
                <div class="file {!! $settings['thumbnailclass']??null !!}">
                    <a href="{url}" data-lightbox="image" >
                        <span class="corner"></span>

                        <div class="icon">
                            <img width="180px" data-lightbox="image" src="{url}">
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
    </div> -->
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
    <div class="adminmodal modal fade " id="imageload" tabindex="-1" role="dialog" aria-labelledby="imageloadLabel">
        <div class="modal-dialog modal-lg row" role="document">
            <div class="modal-content col-md-8 p-0">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="iconaction iconClose"></i></button>
                    <button type="button" class="btn btn-action-popup" title="Edit image" data-dismiss="modal" data-toggle="modal" data-target="#imageeditMode"><i class="iconaction iconEditImageGrey"></i></button>
                    <button type="button" class="btn btn-action-popup" title="Download"  data-slideshow="download" ><i class="iconaction iconDownloadGrey"></i></button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-action-popup dropdown-toggle" title="Rename" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="iconaction iconRenameGrey"></i></button>
                        <div class="dropdown-menu form-inline width-sm p-l-0 p-r-0" aria-labelledby="dLabel">
                            <div class="form-group col-sm-7 p-l-5">
                                <input name="rename_img" id="rename_img" type="text" class="form-control" placeholder="File name will be come here"  data-slideshow="renameval">
                            </div>
                            <div class="form-group col-sm-5 p-r-5">
                                <button class="btn btn-success btn-block" data-slideshow="save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body text-center">
                    <div id="imgViewCarousel" class="carousel slide">
                        <div class="carousel-inner" role="listbox" data-slideshow="view"> </div>
                    </div>
                </div>
                <div class="modal-footer col-md-8">
                    <h4 class="modal-title"><a href="#imgViewCarousel" role="button" data-slideshow="prev" data-nextid="" class="popuparrow" ><i class="fa fa-arrow-left"></i></a> <img src="" data-slideshow="typeext"> <span data-slideshow="title">Cars BMW</span> <a class="popuparrow" href="#imgViewCarousel" role="button" data-slideshow="next" data-nextid=""><i class="fa fa-arrow-right"></i></a> </h4>
                </div>
            </div>
            <div class="popupDetail col-md-4 p-0">
                <div class="row p-t-10 p-b-10">
                    <div class="col-xs-4 col-md-4">
                        <button class="btn btn-default btn-block active" type="button" data-tabaction="details">Details</button>
                    </div>
                    <div class="col-xs-4 col-md-4">
                        <button class="btn btn-default btn-block" type="button" data-tabaction="seo">SEO</button>
                    </div>
                    <div class="col-xs-4 col-md-4">
                        <button class="btn btn-default btn-block" type="button">Option 3</button>
                    </div>
                </div>
                <div class="row rowsection collapse in" data-tabcontent="details">
                    <div class="col-xs-12 col-md-12">
                        <h4><i class="fa fa-bars text-primary"></i> GENERAL INFO</h4>
                        <div class="table-responsive">
                            <table class="table tableborder0">
                                <tr>
                                    <th width="30%">Type</th>
                                    <td><img src="" data-slideshow="typeext"> <span data-slideshow="ext"></span></td>
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <td><span data-slideshow="size"> </span></td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td><i class="fa fa-folder"></i> <span data-slideshow="location"></span></td>
                                </tr>
                                <tr>
                                    <th>Uploaded By</th>
                                    <td><span data-slideshow="uploaded_by"></span></td>
                                </tr>
                                <tr>
                                    <th>Created</th>
                                    <td><span data-slideshow="created_at"></span></td>
                                </tr>
                                <tr>
                                    <th>Opened</th>
                                    <td><span data-slideshow="updated_at"></span></td>
                                </tr>
                                <tr>
                                    <th>Version</th>
                                    <td>
                                        <div class=" col-xs-3 p-l-0">
                                            <select class="form-control"  data-slideshow="version"></select>
                                        </div>
                                        <button type="button" class="btn btn-default p-l-5 p-r-5" data-action="makeasDefault">Make as Default</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row rowsection collapse"  data-tabcontent="seo">
                    <div class="loadingimg lodingSeo hide" data-loadin="seo"></div>
                    <div class="col-xs-12 col-md-12">
                        <h4><i class="fa fa-bars text-primary"></i> Seo Detail</h4>
                        <div class="table-responsive">
                            <table class="table tableborder0">

                                <tr>
                                    <th width="23%">Alt Tags</th>
                                    <td>
                                        <input type="text" data-slideshow="alt_tags" class="form-control hide" value="" >
                                        <div class="altTagsdata"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <th width="23%">Keywords</th>
                                    <td>
                                        <input type="text" data-slideshow="keywords" class="form-control" >
                                    </td>
                                </tr>

                                <tr>
                                    <th width="23%">Caption</th>
                                    <td>
                                        <input type="text" data-slideshow="caption" class="form-control" >
                                    </td>
                                </tr>
                                <tr>
                                    <th width="23%">Description</th>
                                    <td><textarea name="description" data-slideshow="description" class="form-control"></textarea>

                                    </td>
                                </tr>
                                <tr>
                                    <th width="23%">Alt Text</th>
                                    <td>
                                        <input type="text" data-slideshow="alt_text" class="form-control" >
                                    </td>
                                </tr>


                                <tr>
                                    <th></th>
                                    <td>

                                        <button type="button" class="btn btn-default p-l-5 p-r-5" data-action="saveSeo">Save Detail</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row rowsection hide" data-slideshow="getlink">
                    <div class="col-xs-12 col-md-12">
                        <h4><i class="glyphicon glyphicon-link text-primary"></i> GET lINKS</h4>
                        <div class="btn-group btn-group-justified btn-tab p-b-15" role="group" aria-label="">
                            <div class="btn-group" role="group" data-gl='core'> <a href="#slideOrginalLink" class="btn btn-default active" data-toggle="tab">Orginal</a> </div>
                            <div class="btn-group" role="group" data-gl='sm'> <a href="#slidesmallThumb" class="btn btn-default" data-toggle="tab">Small thumb</a> </div>
                            <div class="btn-group" role="group" data-gl='md'> <a href="#slideMedThumb" class="btn btn-default" data-toggle="tab">Med thumb</a> </div>
                            <div class="btn-group" role="group" data-gl='lg'> <a href="#slideLargeThumb" class="btn btn-default" data-toggle="tab">Large thumb</a> </div>
                        </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="slideOrginalLink">
                                <div class="form-horizontal">
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slidedirectlinkcore" class="col-sm-3 control-label text-left">Direct Link</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slidedirectlinkcore" data-getlink="directlinkcore" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slidedirectlinkcore"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slidedownloadlink" class="col-sm-3 control-label text-left">Download Link</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slidedownloadlink" data-getlink="downloadcore" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slidedownloadlink"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slideembedHTML" class="col-sm-3 control-label text-left">Embed HTML</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slideembedHTML" data-getlink="linkcore" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slideembedHTML"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slideembedForum" class="col-sm-3 control-label text-left">Embed Forum</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slideembedForum" data-getlink="Forumcore" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slideembedForum"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="slidesmallThumb">
                                <div class="form-horizontal">
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slideDirectlinksm" class="col-sm-3 control-label text-left">Direct Link</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slideDirectlinksm" data-getlink="directlinksm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slideDirectlinksm"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slidedownloadlinksm" class="col-sm-3 control-label text-left">Download Link</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slidedownloadlinksm" data-getlink="downloadsm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slidedownloadlinksm"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slideembedHTMLsm" class="col-sm-3 control-label text-left">Embed HTML</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slideembedHTMLsm" data-getlink="linksm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slideembedHTMLsm"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slideembedForumsm" class="col-sm-3 control-label text-left">Embed Forum</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slideembedForumsm" data-getlink="Forumsm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slideembedForumsm"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="slideMedThumb">
                                <div class="form-horizontal">
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slidedirectlinkmt" class="col-sm-3 control-label text-left">Direct Link</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slidedirectlinkmt" data-getlink="directlinkmd" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slidedirectlinkmt"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slidedownloadlinkmt" class="col-sm-3 control-label text-left">Download Link</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slidedownloadlinkmt" data-getlink="downloadmd" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slidedownloadlinkmt"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slideembedHTMLmt" class="col-sm-3 control-label text-left">Embed HTML</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slideembedHTMLmt" data-getlink="linkmd" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slideembedHTMLmt"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slideembedForummt" class="col-sm-3 control-label text-left">Embed Forum</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slideembedForummt" data-getlink="Forummd" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red"  data-clipboard-target="#slideembedForummt"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="slideLargeThumb">
                                <div class="form-horizontal">
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slidedirectlinklg" class="col-sm-3 control-label text-left">Direct Link</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="directlinklg" data-getlink="directlinklg"  value="slideLargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red"  data-clipboard-target="#directlinklg"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slidedownloadlinklg" class="col-sm-3 control-label text-left">Download Link</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slidedownloadlinklg" data-getlink="downloadlg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slidedownloadlinklg"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slideembedHTMLlg" class="col-sm-3 control-label text-left">Embed HTML</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slideembedHTMLlg" data-getlink="linklg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red" data-clipboard-target="#slideembedHTMLlg"><i class="iconCopys"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-l-0 m-r-0">
                                        <label for="slideembedForumlg" class="col-sm-3 control-label text-left">Embed Forum</label>
                                        <div class="col-sm-9 input-group">
                                            <input type="text" class="form-control" id="slideembedForumlg" data-getlink="Forumlg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                            <div class="input-group-addon addon-red"  data-clipboard-target="#slideembedForumlg"><i class="iconCopys"></i></div>
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

    {!! Form::hidden(null,'drive',['data-type'=>'folder']) !!}
@stop
@section('css')
    {{--@push("css")--}}
    {{--{!! Html::style("/resources/assets/js/animate/css/animate.css") !!}--}}
    {!! Html::style("public/media_template/css/media-plus.css?v='.rand(111,999))") !!}
    {!! Html::style("public/media_template/css/style.css?v='.rand(111,999))") !!}
    {!! Html::style("public/admin_theme/media/css/lightbox.css") !!}
    {!! Html::style("public/js/bootstrap-select/css/bootstrap-select.min.css") !!}
    {!! Html::style("public/js/tag-it/css/jquery.tagit.css") !!}
    {{--@endpush--}}
    <style>
        .active >.file {
            border: 1px solid #000000;
            box-shadow: 0px 0 4px 3px #f39c12;
        }
        .show {
            opacity: 1 !important
        }
        .d-none {
            display: none !important; 
        }
        .folder-container.over {
            border: 1px solid yellow;
        }
        .file.start {
            border: 2px dashed #00c0ef;
            max-height: 200px;
            max-width: 200px;
        }
        #coverup {
            background: white;
            width: 170px;
            height: 100px;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 2;
        }
        .multiple-actions {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
        }
        .multiple-actions .btn{
            margin-left:4px;
        }
    </style>
{!!  Html::style('public/js/bootstrap-fileinput/css/fileinput.min.css') !!}

@stop
@section("js")
{!!  Html::script('public/js/bootstrap-fileinput/js/fileinput.min.js') !!}
    {!! Html::script("public/js/nestedSortable/jquery.mjs.nestedSortable.js") !!}
    {!! Html::script("public/admin_theme/media/js/lightbox.js") !!}
    {!! Html::script("public/js/bootstrap-select/js/bootstrap-select.min.js") !!}
    {!! Html::script("public/js/tag-it/js/tag-it.js") !!}
    {!! Html::script("public/js/media_button.js") !!}
    {!! Html::script("public/js/media_button_new.js") !!}
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.8/lib/draggable.bundle.js"></script>

    <script>
    $("body").on("click", ".fileinput-remove", function(){
        retryDrawing()
        $("body").find(".show-uploder").removeClass("in")
    })
    $("body").on("click", ".file-drop-zone", function() {
    $(".btn.btn-file>input[type='file']").click();
});
    </script>
@stop
