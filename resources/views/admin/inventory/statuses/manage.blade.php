@extends('layouts.admin')

@section('content')
    @php
        $model=null
    @endphp
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
                        @foreach($statuses as $key=>$status)
                            <div class="form-group row bord-top bg-light attr-option" data-item-id="{!! $key !!}"
                                 data-parent-id="1">
                                <div class="col-md-8">
                                    {!! $status !!}
                                </div>
                                <div class="col-md-4 text-right">

                                </div>
                            </div>
                        @endforeach
                        <div class="form-group row bord-top">
                            <form method="POST" action="#" accept-charset="UTF-8"><input name="_token" type="hidden"
                                                                                         value="UKBHve7gjHFA4dy2Q9XlXbVRF6dkzcRhlOzt49ej">
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

                    @include('admin.inventory.statuses._patrials.status_form')
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
