@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">

        <div class="col-xs-12">
            <div class="col-md-6 pull-left">
                <h2 class="m-0">Users</h2>
            </div>
        </div>
        <div class="col-xs-12">
            <table id="users-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Url</th>
                    <th>Method</th>
                    <th>Ip</th>
                    <th>Iso Code</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>State</th>
                    <th>State Name</th>
                    <th>Postal Code</th>
                    <th>Lat</th>
                    <th>Lon</th>
                    <th>Timezone</th>
                    <th>Continent</th>
                    <th>Currency</th>
                    <th>Agent</th>
                    <th>Date</th>
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
            $('#users-table').DataTable({
                ajax:  "{!! route('datatable_user_activity',$user->id) !!}",
                columns: [
                    {data: 'id',name: 'id'},
                    {data: 'subject', name: 'subject'},
                    {data: 'url',name: 'url'},
                    {data: 'method', name: 'method'},
                    {data: 'ip', name: 'ip'},
                    {data: 'iso_code', name: 'iso_code'},
                    {data: 'country', name: 'country'},
                    {data: 'city', name: 'city'},
                    {data: 'state', name: 'state'},
                    {data: 'state_name', name: 'state_name'},
                    {data: 'postal_code', name: 'postal_code'},
                    {data: 'lat', name: 'lat'},
                    {data: 'lon', name: 'lon'},
                    {data: 'timezone', name: 'timezone'},
                    {data: 'continent', name: 'continent'},
                    {data: 'currency', name: 'currency'},
                    {data: 'agent', name: 'agent'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'},
                ],
                order: [ [0, 'desc'] ]
            });
        });

    </script>
@stop