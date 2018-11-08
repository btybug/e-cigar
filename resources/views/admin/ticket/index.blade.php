@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-6 pull-left"><h2 class="m-0">Tickets</h2></div>
                <div class="col-md-6 ">
                    <a class="btn btn-warning pull-right" href="{!! route('admin_tickets_settings') !!}">Settings</a>
                    <a class="btn btn-primary pull-right" href="{!! route('admin_tickets_new') !!}">Add new</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <table id="posts-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Subject</th>
                    <th>Summary</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Priority</th>
                    <th>Tags</th>
                    <th>Attachments</th>
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
                ajax: "{!! route('datatable_tickets') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'subject', name: 'subject'},
                    {data: 'summary', name: 'summary'},
                    {data: 'status_id', name: 'status_id'},
                    {data: 'category_id', name: 'category_id'},
                    {data: 'priority_id', name: 'priority_id'},
                    {data: 'tags', name: 'tags'},
                    {data: 'attachments', name: 'attachments'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });

    </script>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop