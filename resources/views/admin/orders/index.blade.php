@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">

        <div class="col-xs-12">
            <div class="col-md-6 pull-left">
                <h2 class="m-0">{!! __('orders') !!}</h2>
            </div>
        </div>
        <div class="col-xs-12">
            <table id="users-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Country</th>
                    <th>Region</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Shipping method</th>
                    <th>Currency</th>
                    <th>Created At</th>
                    <th>Updated At</th>
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
                ajax: "{!! route('datatable_all_orders') !!}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'user', name: 'user'},
                    {data: 'country', name: 'country'},
                    {data: 'region', name: 'region'},
                    {data: 'city', name: 'city'},
                    {data: 'amount', name: 'amount'},
                    {data: 'status', name: 'status'},
                    {data: 'membership', name: 'membership'},
                    {data: 'shipping_method', name: 'shipping_method'},
                    {data: 'currency', name: 'currency'},
                    {data: 'created_at', name: 'updated_at'},
                    {data: 'status', name: 'status'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });

    </script>
@stop