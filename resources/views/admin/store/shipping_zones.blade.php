@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div id="content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="pull-right">
                    <a href="{!! route('admin_store_shipping_zones_new') !!}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                    <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-geo-zone').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                </div>
                <h1>Geo Zones</h1>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Geo Zones</a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list"></i> Geo Zone List</h3>
                </div>
                <div class="panel-body">
                    <form action="#" method="post" enctype="multipart/form-data" id="form-geo-zone">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td style="width: 1px;" class="text-center">
                                        <input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                                    <td class="text-left">
                                        <a href="#" class="asc">Geo Zone Name</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="#">Description</a>
                                    </td>
                                    <td class="text-right">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" name="selected[]" value="4">
                                    </td>
                                    <td class="text-left">UK Shipping</td>
                                    <td class="text-left">UK Shipping Zones</td>
                                    <td class="text-right">
                                        <a href="#" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" name="selected[]" value="3">
                                    </td>
                                    <td class="text-left">UK VAT Zone</td>
                                    <td class="text-left">UK VAT</td>
                                    <td class="text-right">
                                        <a href="#" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-6 text-left"></div>
                        <div class="col-sm-6 text-right">Showing 1 to 2 of 2 (1 Pages)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')

@stop