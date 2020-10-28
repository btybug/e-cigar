@extends('layouts.admin',['activePage'=>'discounts'])
@section('content')
    <b>{!! $current->warehouse->name !!}</b>
    <div class="d-flex flex-wrap justify-content-between w-100 admin-general--tabs-wrapper">
        <ul class="nav nav-tabs new-main-admin--tabs mb-3 admin-general--tabs">
            <li class="nav-item position-relative">
                <a class="nav-link  "
                   href="{!! route('admin_app_products',$current->id) !!}">
                    Products
                </a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link "
                   href="{!! route('app_staff',$current->id) !!}">
                    Staff
                </a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link active "
                   href="{!! route('admin_app_orders',$current->id) !!}">
                    Orders
                </a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link "
                   href="{!! route('admin_app_settings',$current->id) !!}">
                    Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{!! route("app_customer_discounts",$current->id) !!}">
                    Admin discounts
                    <div class="ripple-container"></div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{!! route("app_customer_offers",$current->id) !!}">
                    Offers
                    <div class="ripple-container"></div>
                </a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="px-3 mt-3">
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </div>

        <div class="card-body panel-body pt-0">
            <table id="orders-table" class="table table-style table-bordered table-items-wrapper" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Order number</th>
                    <th>Staff</th>
                    <th>Discount</th>
                    <th>Payment method</th>
                    <th>Status</th>
                    <th>Sub Total</th>
                    <th>Total</th>
                    <th>tax</th>
                    <th>Finished at</th>
                    <th>Updated at</th>
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
            var table = $('#orders-table').DataTable({
                ajax: {
                    url: "{!! route('datatable_all_app_orders') !!}",
                    data: {warehouse_id: "{!! $q !!}"}
                },
                // "ordering": false,
                dom: '<"d-flex justify-content-between align-items-baseline"lfB><rtip>',
                lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],

                buttons: [
                    {extend: 'csv', className: 'btn btn-primary'},
                    {extend: 'excel', className: 'btn btn-info'},
                    {extend: 'pdf', className: 'btn btn-success'},
                    {extend: 'print', className: 'btn btn-warning'}
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'order_number', name: 'order_number'},
                    {data: 'staff_id', name: 'staff_id'},
                    {data: 'admin_discount_id', name: 'admin_discount_id'},
                    {data: 'payment_method', name: 'payment_method'},
                    {data: 'status', name: 'status'},
                    {data: 'sub_total', name: 'sub_total'},
                    {data: 'total', name: 'total'},
                    {data: 'tax', name: 'tax'},
                    {data: 'finished_at', name: 'finished_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions'}
                ],
                "order": [[ 8, 'asc' ],[9,'desc']]
            });

        })
    </script>
    @stop
