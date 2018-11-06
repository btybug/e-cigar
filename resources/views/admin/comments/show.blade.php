@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-6 pull-left"><h2 class="m-0">Comments</h2></div>
                {{--<div class="col-md-6 "><a class="btn btn-primary pull-right" href="{!! route('admin_blog_comments_settings') !!}">Settings</a></div>--}}
            </div>

        </div>
        <div class="col-xs-12">
            <table id="posts-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Post</th>
                    <th>Parent</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Replies</th>
                    <th>Guest name</th>
                    <th>Guest email</th>
                    <th>Added/Last Modified Date</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $('#posts-table').DataTable({
                ajax: "{!! route('datatable_all_post_comments') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                columns: [
                    {data: 'post_id', name: 'post_id'},
                    {data: 'parent_id', name: 'parent_id'},
                    {data: 'author', name: 'author'},
                    {data: 'comment', name: 'comment'},
                    {data: 'status', name: 'status'},
                    {data: 'replies', name: 'replies'},
                    {data: 'guest_name', name: 'guest_name'},
                    {data: 'guest_email', name: 'guest_email'},
                   {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });

    </script>

    @include('_partials.deleteModal')
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop


{{--@extends('layouts.admin')--}}
{{--@section('content-header')--}}
{{--@stop--}}
{{--@section('content')--}}
    {{--<div class="panel-body">--}}
        {{--<table class="table table-hover table-bordered table-striped datatable-comments" style="width:100%">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th>#</th>--}}
                {{--<th>{!! trans('admin.post') !!}</th>--}}
                {{--<th>{!! trans('admin.parent') !!}</th>--}}
                {{--<th>{!! trans('admin.author') !!}</th>--}}
                {{--<th>{!! trans('admin.comment') !!}</th>--}}
                {{--<th>{!! trans('admin.status') !!}</th>--}}
                {{--<th>{!! trans('admin.guest_name') !!}</th>--}}
                {{--<th>{!! trans('admin.guest_email') !!}</th>--}}
                {{--<th>{!! trans('admin.created_at') !!}</th>--}}
                {{--<th>{!! trans('admin.actions') !!}</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
        {{--</table>--}}
    {{--</div>--}}
    {{--@include('_partials.deleteModal')--}}
{{--@stop--}}
{{--@section('js')--}}
    {{--<script src="{{asset('//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js')}}"></script>--}}
{{--@stop--}}