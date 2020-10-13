@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex flex-wrap justify-content-between w-100 admin-general--tabs-wrapper">
            <ul class="nav nav-tabs new-main-admin--tabs mb-3 admin-general--tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="info-tab" href="{!! route('admin_inventory_purchase') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Purchase</a>
                </li>
                @ok('admin_inventory_other')
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_inventory_other') !!}" role="tab"
                       aria-controls="accounts" aria-selected="true" aria-expanded="true">Others</a>
                </li>
                @endok
                <li class="nav-item">
                    <a class="nav-link active" id="invoices-tab" href="javascript:void(0)" role="tab"
                       aria-controls="invoices" aria-selected="true" aria-expanded="true">Purchase Invoices</a>
                </li>
            </ul>
            </div>
            <div class="tab-content w-100">
                <div class="clearfix mb-2">
                    {{--                        <h2 class="m-0 pull-left">Purchase</h2>--}}

                </div>
                <div class="card panel panel-default">
                    <div class="d-flex justify-content-between px-4 mt-2">
                        <div>
                            <select name="table_head" id="table_head_id" class="selectpicker" multiple>
                                <option value="#" data-column="0" data-name="id">#</option>
                                <option value="Invoice Number" data-column="1" data-name="invoice_number">Invoice Number</option>
                                <option value="Description" data-column="2" data-name="description">Description</option>
                                <option value="Created Date" data-column="3" data-name="created_at">Created Date</option>
                                <option value="Actions" data-column="4" data-name="actions">Actions</option>
                            </select>
                        </div>
                        <div>
                            @ok('admin_inventory_purchase_invocies_new')
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{!! route('admin_inventory_purchase_invocies_new') !!}">Add new</a>
                            </div>
                            @endok
                        </div>
                    </div>
                    <div class="card-body panel-body pt-0">

                        <table id="categories-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice Number</th>
                                <th>Description</th>
                                <th>Created Date</th>
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

        $(document).ready(function() {

            function tableInit(storageName, selectData, selectId, tableData, tableId, ajaxUrl) {
                if(!localStorage.getItem(storageName)) {
                    localStorage.setItem(storageName, JSON.stringify(selectData))
                }

                let selId = JSON.parse(localStorage.getItem(storageName)).map((el) => {
                    return el.id;
                });

                $(selectId).selectpicker({
                    // actionsBox: true,
                    dropupAuto: true,
                    // header: 'Select',
                    liveSearch: true,
                    liveSearchPlaceholder: 'Search',
                    multipleSeparator: ' | ',
                    style: 'btn-default',
                    // width: 'auto'
                });
                $(selectId).selectpicker('val', selId);
                var tableHeadArray = tableData;

                tableArray = tableHeadArray.map((head) => {
                    const id = head.data;

                    var visible = JSON.parse(localStorage.getItem(storageName)).find((el) => {
                        return el.name === id;
                    });
                    if(visible) {
                        return head;
                    } else {
                        return {
                            ...head,
                            visible: false
                        };
                    }
                });
                var table = $(tableId).DataTable({
                    ajax: ajaxUrl,
                    "processing": true,
                    "serverSide": true,
                    "bPaginate": true,
                    "scrollX": true,
                    dom: '<"d-flex justify-content-between align-items-baseline"lfB><rtip>',
                    displayLength: 10,
                    lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],
                    columns: tableHeadArray
                });

                function init() {
                    var selected_items = [];
                    $(`${selectId} option`).each(function() {
                        var column = table.column($(this).attr('data-column'));
                        if($(this).is(':selected')) {
                            selected_items.push({
                                id: $(this).val(),
                                text: $(this).val(),
                                name: $(this).attr("data-name")
                            });
                            column.visible(true);
                        } else {
                            column.visible(false);
                        }
                    });
                    console.log(selected_items, 'selected_items')
                    localStorage.setItem(storageName, JSON.stringify(selected_items))
                }

                init();

                $(selectId).on('changed.bs.select', function (e) {
                    init();
                });
            }

            tableInit(
                "inventory_purchase_table",
                [
                    {id: '#', name: 'id'},
                    {id: 'Invoice Number', name: 'invoice_number'},
                    {id: 'Description', name: 'description'},
                    {id: 'Created Date', name: 'created_at'},
                    {id: 'actions', name: 'actions'}
                ],
                '#table_head_id',
                [
                    {data: 'id', name: 'id'},
                    {data: 'invoice_number', name: 'invoice_number'},
                    {data: 'description', name: 'description'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ],
                '#categories-table',
                "{!! route('datatable_all_purchase_invoices') !!}"
            )
        });


    </script>
@stop
