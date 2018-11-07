@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_seo_bulk') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Posts</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_seo_bulk_products') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Products</a>
            </li>
        </ul>
        <div class="" id="myTabContent">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-md-6 pull-left"><h2>Inventory</h2></div>
                    <div class="col-md-6 "><a class="btn btn-primary pull-right" href="{!! route('admin_stock_new') !!}">Add new</a></div>
                </div>
                <div class="col-xs-12">
                    <table id="stocks-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Image</th>
                            <th>Added/Last Modified Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop
@section('js')
    <script>
        $(function () {
            $('#stocks-table').DataTable({
                ajax: "{!! route('datatable_bulk_stocks') !!}",
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
                    {data: 'sku', name: 'sku'},
                    {data: 'image', name: 'image'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });

    </script>
@stop
