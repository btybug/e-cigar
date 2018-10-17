@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div id="content">
        {!! Form::model($shipping_zone,['url'=> route('admin_store_shipping_zone_save'),'class' => 'form-horizontal','files' => true ]) !!}
        {!! Form::hidden('id',null) !!}
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid"> <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Geo Zone</h3>
                </div>
                <div class="panel-body panel-body--new-shipping-zone">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name">Geo Zone Name</label>
                            <div class="col-sm-10">
                                {!! Form::text('name',$shipping_zone->name??null,['placeholder'=>'Geo Zone Name','id' => 'input-name','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-description">Description</label>
                            <div class="col-sm-10">
                                {!! Form::text('description',$shipping_zone->description??null,['placeholder'=>'Description','id' => 'input-description','class' => 'form-control']) !!}
                            </div>
                        </div>
                            <div class="form-group row required">
                                <label class="col-sm-2 control-label" for="input-tax">Tax</label>
                                <div class="col-sm-5">
                                    {!! Form::text('tax',$shipping_zone->tax??null,['placeholder'=>'Tax','id' => 'input-tax','class' => 'form-control']) !!}
                                </div>
                                <div class="col-sm-5">
                                    {!! Form::select('percentage',[1 =>'percentage', 2 => 'other'],[$shipping_zone->percentage??null],['id' => 'pecentage', 'class'=>'form-control']) !!}
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
                                        {!! Form::select('country',[$countries],[$shipping_zone->country??null],['id' => 'country', 'class'=>'form-control']) !!}
                                    </td>
                                    <td>
                                        <div>
                                            {!! Form::text('region',$shipping_zone->region??null,['placeholder'=>'Region','id' => 'region','class' => 'form-control','autocomplete' => 'off']) !!}
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
        $("body").on("change", "#region", function (e) {
            e.preventDefault()
            let country = $('#country').val();
            let val = $(this).val();
            console.log(country,val)
            AjaxCall("/admin/store/shipping-zones/find-region", {id: val,country: country}, function (res) {
                if(!res.error){
                    res.data.forEach(item => {
                        $("#category").append(`<option>${item}</option>`)
                })
                })
            })
        });
    </script>
@stop