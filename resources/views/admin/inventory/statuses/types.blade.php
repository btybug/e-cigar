@extends('layouts.admin')

@section('content')
    <div class="col-md-12 inventory_attributes">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Options Courier </h2>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row bord-top bg-light attr-option" data-item-id="2" data-parent-id="1">
                            <div class="col-md-8">
                                Local Mail
                            </div>
                            <div class="col-md-4 text-right">

                            </div>
                        </div>
                        <div class="form-group row bord-top bg-light attr-option" data-item-id="3" data-parent-id="1">
                            <div class="col-md-8">
                                DHl
                            </div>
                            <div class="col-md-4 text-right">

                            </div>
                        </div>
                        <div class="form-group row bord-top bg-light attr-option" data-item-id="4" data-parent-id="1">
                            <div class="col-md-8">
                                Fedex
                            </div>
                            <div class="col-md-4 text-right">

                            </div>
                        </div>
                        <div class="form-group row bord-top">
                            <form method="POST" action="http://core.bootydev.co.uk/admin/inventory/attributes/options/1/save" accept-charset="UTF-8"><input name="_token" type="hidden" value="UKBHve7gjHFA4dy2Q9XlXbVRF6dkzcRhlOzt49ej">
                                <input name="id" type="hidden">
                                <input name="parent_id" type="hidden" value="1">
                                <div class="col-md-8">
                                    <input class="form-control" name="translatable[gb][name]" type="text">
                                </div>
                                <div class="col-md-4 text-right">
                                    <input class="btn btn-primary" type="submit" value="Add">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-9 options-form">

                    </div>
                </div>


            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
