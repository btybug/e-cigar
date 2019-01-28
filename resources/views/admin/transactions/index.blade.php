@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
           <h2 class="m-0 pull-left">{!! __('Transactions') !!}</h2>
        </div>
        <div class="panel-body">
            <table id="orders-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Transaction ID</th>
                    <th>Method</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Order ID</th>
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
            $('#orders-table').DataTable({
                ajax: "{!! route('datatable_all_transactions') !!}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'transaction_id', name: 'transaction_id'},
                    {data: 'payment_method', name: 'payment_method'},
                    {data: 'date', name: 'date'},
                    {data: 'time', name: 'time'},
                    {data: 'user', name: 'user'},
                    {data: 'amount', name: 'amount'},
                    {data: 'order_id', name: 'order_id'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [ [0, 'desc'] ]
            });
        });

    </script>
@stop