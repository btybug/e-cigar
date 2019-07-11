@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <div class="container-fluid">
        <div class="row flex-column">
            @include("admin.settings._partials.menu",['active'=> 'main_pages'])
        </div>
        <div>
            <div class="col-3"></div>
            <div class="col-9"></div>
        </div>

    </div>

@stop
