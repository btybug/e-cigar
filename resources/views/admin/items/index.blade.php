@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="info-tab" href="{!! route('admin_items') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_items_archives') !!}" role="tab"
                       aria-controls="accounts" aria-selected="true" aria-expanded="true">Archive</a>
                </li>
            </ul>
            <div class="tab-content w-100">
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
                        <select name="table_head" id="table_head_id" class="selectpicker text-black" multiple>
                            <option value="#" data-column="0" data-name="id" selected>#</option>
                            <option value="Name" data-column="1" data-name="name" selected>Name</option>
                            <option value="Brand" data-column="2" data-name="brand_id" selected>Brand</option>
                            <option value="Barcode" data-column="3" data-name="barcode_id" selected>Barcode</option>
                            <option value="Quantity" data-column="4" data-name="quantity" selected>Quantity</option>
                            <option value="Category" data-column="5" data-name="category" selected>Category</option>
                            <option value="Price" data-column="6" data-name="price" selected>Price</option>
                            <option value="Status" data-column="7" data-name="status" selected>Status</option>
                            <option value="Created At" data-column="8" data-name="created_at">Created At</option>
                            <option value="Actions" data-column="9" data-name="actions" selected>Actions</option>
                        </select>
                        <table id="stocks-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Barcode</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Barcode</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
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
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],
                    columnDefs: [ {
                        orderable: false,
                        className: 'select-checkbox',
                        targets:   0
                    } ],
                    columns: tableHeadArray,
                    initComplete: function () {
                        this.api().columns().every(function () {
                            var column = this;
                            var input = document.createElement("input");
                            $(input).appendTo($(column.footer()).empty())
                                .on('keyup change clear', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                        });
                    }
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
                "stock_table",
                [
                    {id: '#', name: 'id'},
                    {id: 'Name', name: 'name'},
                    {id: 'Brand', name: 'brand_id'},
                    {id: 'Barcode', name: 'barcode_id'},
                    {id: 'Quantity', name: 'quantity'},
                    {id: 'Category', name: 'category'},
                    {id: 'Price', name: 'price'},
                    {id: 'Status', name: 'status'},
                    {id: 'Created At', name: 'created_at'},
                    {id: 'Actions', name: 'actions'}
                ],
                '#table_head_id',
                [
                    {  data: null,
                        defaultContent: '',
                        className: 'select-checkbox',
                        orderable: false},
                    {data: 'name', name: 'item_translations.name'},
                    {data: 'brand_id', name: 'categories_translations.name'},
                    {data: 'barcode_id', name: 'barcodes.code'},
                    {data: 'quantity', name: 'items.quantity'},
                    {data: 'category', name: 'category'},
                    {data: 'default_price', name: 'default_price'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ],
                '#stocks-table',
                "{!! route('datatable_all_items') !!}"
            )

            {{--$('#stocks-table tfoot th').each( function () {--}}
                {{--var title = $(this).text();--}}
                {{--$(this).html( '<input type="text" placeholder="Search '+title+'" />' );--}}
            {{--} );--}}

            {{--// Apply the search--}}


            {{--var table =  $('#stocks-table').DataTable({--}}
                {{--ajax: "{!! route('datatable_all_items') !!}",--}}
                {{--"processing": true,--}}
                {{--"serverSide": true,--}}
                {{--"bPaginate": true,--}}
                {{--// responsive: true,--}}
                {{--"scrollX": true,--}}
                {{--"pagingType": "full_numbers",--}}
                {{--dom: 'Bfrtip',--}}
                {{--buttons: [--}}
                    {{--'csv', 'excel', 'pdf', 'print'--}}
                {{--],--}}
                {{--columns: [--}}
                    {{--{data: 'id', name: 'id'},--}}
                    {{--{data: 'name', name: 'item_translations.name'},--}}
                    {{--{data: 'type', name: 'type'},--}}
                    {{--{data: 'brand_id', name: 'brand_id'},--}}
                    {{--{data: 'barcode_id', name: 'barcode_id'},--}}
                    {{--{data: 'quantity', name: 'quantity'},--}}
                    {{--{data: 'category', name: 'category'},--}}
                    {{--{data: 'created_at', name: 'created_at'},--}}
                    {{--{data: 'actions', name: 'actions', orderable: false, searchable: false}--}}
                {{--],--}}

            {{--});--}}


        });

    </script>
@stop
