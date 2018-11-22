@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_general') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_accounts') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Accounts</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_regions') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Regions</a>
            </li>
        </ul>
        <div class="tab-pane fade in" id="admin_settings_regions">


            {!! Form::open(['id'=>'sites']) !!}
            <button type="submit" class="btn btn-success">Save</button>
            <div class="panel panel-default site-panel">
                <div class="panel-heading">Site 1</div>
                <div class="panel-body form-horizontal">
                    <div class="mb-20">
                            <table class="table table-responsive table--store-settings" data-table-id="20">

                                <tbody>

                                <tr class="bg-my-light-pink">
                                    <th>Language</th>
                                    <th>Currency</th>
                                    <th>Countries</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="">
                                            <option value="1" selected="selected">RUS</option>
                                            <option value="2">AM</option>
                                            <option value="3">FR</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="">
                                            <option value="1" selected="selected">USD</option>
                                            <option value="2">GBP</option>
                                            <option value="3">AMD</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control"  name="" type="text" >

                                    </td>
                                    <td colspan="2" class="text-right">
                                        <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="">
                                            <option value="1">RUS</option>
                                            <option value="2" selected="selected">AM</option>
                                            <option value="3">FR</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="">
                                            <option value="1" selected="selected">USD</option>
                                            <option value="2">GBP</option>
                                            <option value="3">AMD</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control"  name="" type="text" >
                                    </td>
                                    <td colspan="2" class="text-right">
                                        <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
                                    </td>
                                </tr>
                                <tr class="add-new-ship-filed-container">
                                    <td colspan="6" class="text-right">
                                        <button type="button" data-id="2" data-options-count="6" data-exists="true" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            {{--add new item btn--}}
            <div class="text-right">
                <button class="btn btn-primary" id="add-new-panel"><i class="fa fa-plus"></i>&nbsp;Add new item</button>
            </div>
        </div>

    </div>

@stop
@section('js')
    
@stop