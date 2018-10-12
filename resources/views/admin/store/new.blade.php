@extends('layouts.admin')
@section('content-header')

    <div class="list-tabs-head">
        <div class="head">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
                <li><a data-toggle="tab" href="#menu1">Price</a></li>
                <li><a data-toggle="tab" href="#menu2">Tax& shippings</a></li>
                <li><a data-toggle="tab" href="#menu3">Related & Bundles</a></li>
            </ul>
        </div>
    </div>
@stop
@section('content')
    <div class="tab-content tabs_content">
        <div id="home" class="tab-pane fade in active">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-danger btn-view">View Product</button>
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <ul class="nav nav-tabs tab_lang">
                                            <li class="active"><a data-toggle="tab" href="#infoAM">AM</a></li>
                                            <li><a data-toggle="tab" href="#infoEN">EN</a></li>
                                            <li><a data-toggle="tab" href="#infoRU">RU</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="tab-content">
                                            <div id="infoAM" class="tab-pane fade in active">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Info</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="info am">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="infoEN" class="tab-pane fade">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Info</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="info en">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="infoRU" class="tab-pane fade">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Info</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="info ru">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Short Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="" id="" cols="30" rows="2"
                                                  placeholder="Description"></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Long Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="" id="" cols="30" rows="10"
                                                  placeholder="Description"></textarea>

                                    </div>
                                </div>
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
                <div class="col-md-3">
                    <div class="view-product-wall">
                        <div class="status-wall wall">
                            <div class="row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control">
                                        <option value="">Published</option>
                                        <option value="">UnPublish</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tag-wall wall">
                            <div class="row">
                                <label class="col-sm-3">Tags</label>
                                <div class="col-sm-9">
                                    <input type="text" value="tag1" data-role="tagsinput" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="category-wall wall">
                            <h6>Category</h6>
                            <div class="cat-checkbox">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Parent</label>
                                </div>
                                <div class="child-checkbox">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Child1</label>
                                    </div>
                                </div>
                                <div class="child-checkbox">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Child2</label>
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Parent 2</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-3">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-3">Tax& shippings</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Tax& shippings">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
            <div class="text-right btn-save">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-3">Related & Bundles</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Related & Bundles">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

@stop