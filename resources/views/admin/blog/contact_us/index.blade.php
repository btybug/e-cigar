@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="panel panel-default">
        <div class="pull-right">
            <a class="btn btn-warning mr-10" href="{!! route('admin_gmail_settings') !!}">Settings</a>
        </div>
        @if(LaravelGmail::check())
        <div class="panel-body">
            <table id="posts-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
        @endif
    </div>
@stop
@if(LaravelGmail::check())
@section('js')
    <script>
        $(function () {
            $('#posts-table').DataTable({
                ajax: "{!! route('datatable_all_contact_us') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'category', name: 'category'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action'}
                ]
            });
        });

    </script>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@endif