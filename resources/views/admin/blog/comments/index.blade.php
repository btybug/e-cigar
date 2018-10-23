@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-6 pull-left"><h2 class="m-0">Comments</h2></div>
                <div class="col-md-6 "><a class="btn btn-primary pull-right" href="{!! route('admin_blog_comments_settings') !!}">Settings</a></div>
            </div>

        </div>
        <div class="col-xs-12">
            <table id="posts-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Replies</th>
                    {{--<th>Author</th>--}}
                    {{--<th>Message</th>--}}
                    {{--<th>Status</th>--}}
                    {{--<th>Added/Last Modified Date</th>--}}
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
                    {data: 'author', name: 'author'},
                    {data: 'comment', name: 'comment'},
                    {data: 'replies', name: 'replies'},
//                    {data: 'user_id', name: 'user_id'},
//                    {data: 'message', name: 'message'},
//                    {data: 'status', name: 'status'},
//                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });

    </script>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop