@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " id="info-tab" href="{!! route('admin_settings_general') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_settings_accounts') !!}" role="tab"
                       aria-controls="accounts" aria-selected="true" aria-expanded="true">Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_settings_regions') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Regions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_settings_footer') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Footer</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_settings_tc') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">T&C</a>
                </li>
            </ul>
            <div class="tab-content">
                {!! Form::open(['class'=>'form-horizontal']) !!}
                <div class="pull-right">
                    <button class="btn btn-success">Save</button>
                </div>
                <div class="clearfix"></div>
                <div class="tab-content tab-content-store-settings">
                    <div class="tab-pane fade active in" id="tab1"
                         aria-labelledby="tab1-tab">
                        Tynimc
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>


        </div>


        @stop

        @section('css')


        @stop


        @section('js')
            <script type="text/javascript">
                $(function () {

                })
            </script>
@stop