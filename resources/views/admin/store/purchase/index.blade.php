@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-6"><h2 class="m-0">Purchase</h2></div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="{!! route('admin_store_purchase_new') !!}">Add new</a>
                </div>
            </div>

        </div>
        <div class="col-xs-12">
            <table id="categories-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>type</th>
                    <th>Discount</th>
                    <th>Total Amount</th>
                    <th>Shipping type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
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
            $('#categories-table').DataTable({
            ajax:  "",
            "processing": true,
            "serverSide": true,
            "bPaginate": true,
            columns: [
            {data: 'id',name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'code',name: 'Code'},
            {data: 'type', name: 'type'},
            {data: 'discount', name: 'discount'},
            {data: 'total_amount', name: 'total_amount'},
            {data: 'shipping_type', name: 'shipping_type'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'status', name: 'status'},
            {data: 'actions', name: 'actions'}
            ]
            });
        });

    </script>
@stop