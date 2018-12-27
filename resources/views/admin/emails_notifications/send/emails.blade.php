@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">

        <li class="nav-item active">
            <a class="nav-link "  href="{!! route('admin_emails_notifications_send_email') !!}" role="tab"
               aria-controls="general" aria-selected="true" aria-expanded="true">Send Email</a>
        </li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="m-0 pull-left">Emails</h2>
            <div class="text-right">
                <a class="btn btn-primary" href="{!! route('create_admin_emails_notifications_send_email') !!}">Create Email</a>
            </div>

        </div>
        <div class="panel-body">
            <table id="users-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>From</th>
                    <th>Subject</th>
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
            $('#users-table').DataTable(
                {
                    ajax:  "{!! route('datatable_all_custom_emails') !!}",
                    "processing": true,
                    "serverSide": true,
                    "bPaginate": true,
                    columns: [
                        {data: 'id',name: 'id'},
                        {data: 'status',name: 'status'},
                        {data: 'type', name: 'type'},
                        {data: 'from', name: 'from'},
                        {data: 'subject', name: 'subject'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'actions', name: 'actions'}
                    ]
                }
            );
        });

    </script>
@stop