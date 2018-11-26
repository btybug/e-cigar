@extends('layouts.admin')
@section('content')
    <div class="content main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-9">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="" data-original-title="Attribute Name Title">Product Name</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="translatable[gb][name]" type="text" value="Apple Hit">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="" data-original-title="Short Description">Short Description</span></label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" cols="30" rows="2" name="translatable[gb][short_description]">Short description for apple hits</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="" data-original-title="Short Description">Long Description</span></label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control tinyMcArea" cols="30" rows="10" name="translatable[gb][long_description]">long description for apple hits</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@stop