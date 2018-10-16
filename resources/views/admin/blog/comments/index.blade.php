@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Comments</h2></div>
            {{--<div class="col-md-6 "><a class="btn btn-primary pull-right" href="{!! route('admin_blog_create') !!}">Add new</a></div>--}}
        </div>
        <div class="col-xs-12">
            <table id="posts-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Post Title</th>
                    <th>Post URL</th>
                    <th>Author</th>
                    <th>Message</th>
                    <th>Status</th>
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
                    {data: 'id', name: 'id'},
                    {data: 'post_title', name: 'title'},
                    {data: 'post_url', name: 'title'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'message', name: 'message'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });

    </script>
@stop