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
            <li class="nav-item active">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_account') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Account</a>
            </li>
        </ul>
        <div class="" id="myTabContent">

        </div>
    </div>
@stop