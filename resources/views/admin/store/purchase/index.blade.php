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
                    <th>SKU</th>
                    <th>Owner</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Purchase Date</th>
                    <th>Entry Date</th>
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
            ajax:  "{!! route('datatable_all_purchases') !!}",
            "processing": true,
            "serverSide": true,
            "bPaginate": true,
            columns: [
                {data: 'id',name: 'id'},
                {data: 'sku', name: 'sku'},
                {data: 'user_id',name: 'user_id'},
                {data: 'qty', name: 'qty'},
                {data: 'price', name: 'price'},
                {data: 'purchase_date', name: 'purchase_date'},
                {data: 'created_at', name: 'created_at'},
                {data: 'actions', name: 'actions'}
            ]
            });
        });

    </script>
@stop