@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">

        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Users</h2></div>
        </div>
        <div class="col-xs-12">
            <table id="users-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Registered</th>
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
                ajax:  "{!! route('dt_all_users') !!}",
                columns: [
                    {data: 'id',name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'last_name',name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'country', name: 'country'},
                    {data: 'gender', name: 'gender'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action'}
                ]
            });
        });

    </script>
@stop