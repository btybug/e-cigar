@extends('layouts.admin',['activePage'=>'staff'])
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
                <a class="nav-link active"
                   href="{!! route('app_staff',$current->id) !!}">
                    Staff
                </a>
            </li>
            <li class="nav-item position-relative">
                <a class="nav-link "
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

                    <div class="row justify-content-end">
                        <div class="col-lg-3">
                            {!! Form::select('user_id',$users,null,['class'=>'form-control','id'=>'staff_select']) !!}

                        </div>
                        <div class="col-lg-2 text-right">
                            <button class="btn btn-info staff_add">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body panel-body pt-0">
            <table id="items-table" class="table table-style table-bordered table-items-wrapper" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
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


            var table = $('#items-table').DataTable({
                ajax: {
                    url: "{!! route('datatable_all_app_staff') !!}",
                    data: {warehouse_id: "{!! $q !!}"}
                },
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                // "ordering": false,
                dom: '<"d-flex justify-content-between align-items-baseline"lfB><rtip>',
                displayLength: 10,
                lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                'columnDefs': [{
                    'targets': 0, /* column index */
                    'orderable': false, /* true or false */

                }],
                buttons: [
                    {extend: 'csv', className: 'btn btn-primary'},
                    {extend: 'excel', className: 'btn btn-info'},
                    {extend: 'pdf', className: 'btn btn-success'},
                    {extend: 'print', className: 'btn btn-warning'}
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'last_name', name: 'status'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'gender', name: 'gender'},
                    {data: 'actions', name: 'actions'},
                ]
            });
            $('.staff_add').on('click', function () {
                const warehouse_id = "{!! $q !!}";
                const user_id = $('#staff_select').val();
                $.ajax({
                    type: "post",
                    url: "{!! route('app_staff_add') !!}",
                    cache: false,
                    datatype: "json",
                    data: {
                        warehouse_id,
                        user_id
                    },
                    success: function (data) {
                        if (!data.error) {
                            table.ajax.reload();
                            $('#staff_select option[value="'+user_id+'"]').each(function() {
                                $(this).remove();
                            });
                        }

                        // return data;
                    },
                    error: function (errorThrown) {
                        if (error) {
                            error(errorThrown);
                        }
                        return errorThrown;
                    }
                });
            });
        })
    </script>
@stop
