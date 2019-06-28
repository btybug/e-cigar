@extends('layouts.admin')
@section('content')
    <div class="card panel panel-default">
        <div class="card-header panel-heading d-flex justify-content-between">
            <h2 class="m-0 pull-left">Items</h2>
           @ok('admin_items_new')
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownAddItemButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Add new
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownAddItemButton">
                    <a class="dropdown-item" href="{!! route('admin_items_new') !!}">Simple Item</a>
                    <a class="dropdown-item" href="{!! route('admin_items_new_bundle') !!}">Bundle Item</a>
                </div>
            </div>
            @endok
        </div>
        <div class="card-body panel-body">
            <table id="stocks-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Sku</th>
                    <th>Barcode</th>
                    <th>Quantity</th>
                    <th>Description</th>
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
            $('#stocks-table').DataTable({
                ajax: "{!! route('datatable_all_items') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'type', name: 'type'},
                    {data: 'sku', name: 'sku'},
                    {data: 'barcode_id', name: 'barcode_id'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'short_description', name: 'short_description'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });

    </script>
@stop
