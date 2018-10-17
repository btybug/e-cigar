@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div id="content">
        {!! Form::model($shipping_zone,['url'=> route('admin_store_shipping_zone_save'),'class' => 'form-horizontal','files' => true ]) !!}
        <div class="page-header">
            <div class="container-fluid">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i></button>
                    <a href="#" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
                <h1>Geo Zones</h1>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Geo Zones</a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid"> <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Geo Zone</h3>
                </div>
                <div class="panel-body panel-body--new-shipping-zone">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name">Geo Zone Name</label>
                            <div class="col-sm-10">
                                {!! Form::text('name',null,['placeholder'=>'Geo Zone Name','id' => 'input-name','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-description">Description</label>
                            <div class="col-sm-10">
                                {!! Form::text('description',null,['placeholder'=>'Description','id' => 'input-description','class' => 'form-control']) !!}
                            </div>
                        </div>
                            <div class="form-group row required">
                                <label class="col-sm-2 control-label" for="input-tax">Tax</label>
                                <div class="col-sm-5">
                                    {!! Form::text('tax',null,['placeholder'=>'Tax','id' => 'input-tax','class' => 'form-control']) !!}
                                </div>
                                <div class="col-sm-5">
                                    {!! Form::select('percentage',[1 =>'percentage', 2 => 'other'],['percentage'],['id' => 'pecentage', 'class'=>'form-control']) !!}
                                </div>
                            </div>


                        <fieldset>
                            <legend>Geo Zones</legend>
                            <table id="zone-to-geo-zone" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">Country</td>
                                    <td class="text-left">Category</td>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        {!! Form::select('country',['adfga' => 'aga', 'asdfg' => 'v'],[],['id' => 'pecentage', 'class'=>'form-control']) !!}
                                    </td>
                                    <td>
                                        <div>
                                            {!! Form::text('region',null,['placeholder'=>'Region','id' => 'input-region','class' => 'form-control','autocomplete' => 'off']) !!}
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
                </div>
            </div>
        </div>
        {!!   Form::close()   !!}
    </div>
@stop
@section('js')
    <script>
       /* $("body").on("change", "#country", function (e) {
            e.preventDefault()
            let val = $(this).val()
            AjaxCall("/url", {id: val}, function (res) {
                if(!res.error){
                    res.data.forEach(item => {
                        $("#category").append(`<option>${item}</option>`)
                })
                }
            })
        })*/

    </script>
@stop