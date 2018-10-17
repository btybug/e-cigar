@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div id="content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="pull-right">
                    <button type="submit" form="form-geo-zone" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i></button>
                    <a href="https://demo.opencart.com/admin/index.php?route=localisation/geo_zone&amp;user_token=5ZIhyLUuRBv9guwPRjMVyzvQT7RwHXEo" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
                <h1>Geo Zones</h1>
                <ul class="breadcrumb">
                    <li><a href="https://demo.opencart.com/admin/index.php?route=common/dashboard&amp;user_token=5ZIhyLUuRBv9guwPRjMVyzvQT7RwHXEo">Home</a></li>
                    <li><a href="https://demo.opencart.com/admin/index.php?route=localisation/geo_zone&amp;user_token=5ZIhyLUuRBv9guwPRjMVyzvQT7RwHXEo">Geo Zones</a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid"> <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Geo Zone</h3>
                </div>
                <div class="panel-body">
                    <form action="https://demo.opencart.com/admin/index.php?route=localisation/geo_zone/add&amp;user_token=5ZIhyLUuRBv9guwPRjMVyzvQT7RwHXEo" method="post" enctype="multipart/form-data" id="form-geo-zone" class="form-horizontal">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name">Geo Zone Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="" placeholder="Geo Zone Name" id="input-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-description">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" value="" placeholder="Description" id="input-description" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label" for="input-tax">Tax</label>
                            <div class="form-group col-sm-5 required">

                                    <input type="text" name="description" value=""  id="input-tax" class="form-control">

                            </div>
                            <div class="form-group col-sm-5 required">
                                <select id="pecentage" class="form-control">
                                    <option selected="">Pecentage</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>

                        <fieldset>
                            <legend>Geo Zones</legend>
                            <table id="zone-to-geo-zone" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">Country</td>
                                    <td class="text-left">Category</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        <select id="country" class="form-control">
                                            <option selected="">Choose...</option>
                                            @foreach($countries as $country)
                                                <option value="">{!! $country !!}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="text" name="" value="" placeholder="Category" id="input-category" class="form-control" autocomplete="off">
                                            <ul class="dropdown-menu"></ul>
                                            <div id="coupon-category" class="well well-sm view-coupon">
                                                <ul class="coupon-category-list">
                                                </ul>
                                            </div>
                                            <input type="hidden" class="search-hidden-input" value="" id="category-names">

                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $("body").on("change", "#country", function (e) {
            e.preventDefault()
            let val = $(this).val()
            AjaxCall("/url", {id: val}, function (res) {
                if(!res.error){
                    res.data.forEach(item => {
                        $("#category").append(`<option>${item}</option>`)
                })
                }
            })
        })

    </script>
@stop