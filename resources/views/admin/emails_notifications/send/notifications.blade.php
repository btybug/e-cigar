@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">

        <li class="nav-item ">
            <a class="nav-link "  href="{!! route('admin_emails_notifications_send_email') !!}" role="tab"
               aria-controls="general" aria-selected="true" aria-expanded="true">Send Email</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link "  href="{!! route('admin_emails_notifications_send_notifications') !!}" role="tab"
               aria-controls="general" aria-selected="true" aria-expanded="true">Send Notifications</a>
        </li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="m-0 pull-left">Notifications</h2>
            <div class="text-right">
                <a class="btn btn-primary" href="{!! route('create_admin_emails_notifications_send_notifications') !!}">Create Notifications</a>
            </div>

        </div>
        <div class="panel-body">
            <table id="users-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Module</th>
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
            $('#users-table').DataTable();
        });

    </script>
@stop