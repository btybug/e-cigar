@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="m-0 pull-left">Emails</h2>
        <div class="text-right">
            <a class="btn btn-primary" href="{!! route('admin_mail_create_templates') !!}">Create Email</a>
        </div>

    </div>
    <div class="panel-body">
        <table id="users-table" class="table table-style table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Slug</th>
                <th>Is Active</th>
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
                    {data: 'slug',name: 'slug'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });

    </script>
@stop