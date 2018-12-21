@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <h2 class="pull-left m-0">Coupons</h2>
            <div class="pull-right">
                <a class="btn btn-primary" href="{!! route('admin_store_coupons_new') !!}">Add new</a>
            </div>
        </div>
        <div class="panel-body">
            <table id="categories-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>type</th>
                    <th>Discount</th>
                    <th>Minimal order amount</th>
                    <th>Coupon Based</th>
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
            ajax:  "{!! route('datatable_all_coupons') !!}",
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
            {data: 'based', name: 'shipping_type'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'status', name: 'status'},
            {data: 'actions', name: 'actions'}
            ]
            });
        });

    </script>
@stop