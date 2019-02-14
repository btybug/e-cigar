@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h2 class="m-0 pull-left">{!! __('Customers from').' '!!}<a href="{!! $user->channel->url !!}" target="_blank">{!! $user->channel->url !!}</a></h2>
            <div class="pull-right">


            </div>
        </div>
        <div class="panel-body">
            <table id="orders-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Root ID</th>
                    <th>Customer number</th>
                    <th>Name</th>
                    <th>Last_name</th>
                    <th>Email</th>
                    <th>Email verified at</th>
                    <th>Phone</th>
                    <th>Avatar</th>
                    <th>Country</th>
                    <th>Gender</th>
                    <th>Imported at</th>
                    <th>Created at</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            var table=  $('#orders-table').DataTable({
                ajax: "{!! route('datatable_all_channel_customers',$id) !!}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'root_id', name: 'root_id'},
                    {data: 'customer_number', name: 'customer_number'},
                    {data: 'name', name: 'name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'email_verified_at', name: 'email_verified_at'},
                    {data: 'phone', name: 'phone'},
                    {data: 'avatar', name: 'avatar'},
                    {data: 'country', name: 'country'},
                    {data: 'gender', name: 'gender'},
                    {data: 'imported_at', name: 'imported_at'},
                    {data: 'created_at', name: 'created_at'},
                ],
                order: [[0, 'desc']]
            });

        });

    </script>
@stop