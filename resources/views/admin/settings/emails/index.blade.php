@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">

        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Emails</h2></div>
        </div>
        <div><a class="btn btn-info pull-right" href="{!! route('admin_mail_create_templates') !!}">Create Email</a></div>
        <div class="col-xs-12">
            <table id="users-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $('#users-table').DataTable({
                ajax:  "{!! route('datatable_all_emails') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                columns: [
                    {data: 'id',name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'slug',name: 'slug'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });

    </script>
@stop