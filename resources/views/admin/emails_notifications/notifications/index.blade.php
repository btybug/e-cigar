@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="m-0 pull-left">Notifications</h2>
         

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