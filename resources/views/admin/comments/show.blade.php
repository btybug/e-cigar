@extends('layouts.admin')
@section('content-header')
@stop
@section('content')
    <div class="panel-body">
        <table class="table table-hover table-bordered table-striped datatable-comments" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>{!! trans('admin.post') !!}</th>
                <th>{!! trans('admin.parent') !!}</th>
                <th>{!! trans('admin.author') !!}</th>
                <th>{!! trans('admin.comment') !!}</th>
                <th>{!! trans('admin.status') !!}</th>
                <th>{!! trans('admin.guest_name') !!}</th>
                <th>{!! trans('admin.guest_email') !!}</th>
                <th>{!! trans('admin.created_at') !!}</th>
                <th>{!! trans('admin.actions') !!}</th>
            </tr>
            </thead>
        </table>
    </div>
    @include('_partials.deleteModal')
@stop
@section('js')
    <script src="{{asset('//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js')}}"></script>
@stop