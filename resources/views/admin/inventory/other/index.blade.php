@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="info-tab" href="{!! route('admin_inventory_purchase') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Purchase</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="general-tab" href="javascript:void(0)" role="tab"
                       aria-controls="accounts" aria-selected="true" aria-expanded="true">Others</a>
                </li>

            </ul>
            <div class="tab-content w-100">
                <div class="mb-2 clearfix">
                    {{--                        <div class="pull-left">--}}
                    {{--                            <h2 class="m-0">Others</h2>--}}
                    {{--                        </div>--}}
                    @ok('admin_inventory_others_new')<div class="pull-right"><a class="btn btn-primary pull-right" href="{!! route('admin_inventory_others_new') !!}">Add new</a></div>@endok

                </div>
                <div class="card panel panel-default">
                    <div class="card-body panel-body">
                        <table id="stocks-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Reason</th>
                                <th>Moderator</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        $(function () {
            $('#stocks-table').DataTable({
                ajax: "{!! route('datatable_all_others') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                "scrollX": true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'item_id', name: 'item_id'},
                    {data: 'qty', name: 'qty'},
                    {data: 'reason', name: 'reason'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [ [0, 'desc'] ]
            });
        });

    </script>
@stop
