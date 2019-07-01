@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="card panel panel-default">
        <div class="card-header panel-heading clearfix">
            <h2 class="pull-left m-0">Stock</h2>
            @ok('admin_stock_new')<div class="pull-right "><a class="btn btn-primary pull-right" href="{!! route('admin_stock_new') !!}">Add new</a></div>@endok
        </div>
        <div class="card-body panel-body">
            <select name="table_head" id="table_head_id" multiple>
                <option value="#" data-column="0" data-name="id">#</option>
                <option value="Name" data-column="1" data-name="name">Name</option>
                <option value="Image" data-column="2" data-name="image">Image</option>
                <option value="Added/Last Modified Date" data-column="3" data-name="created_at">Added/Last Modified Date</option>
                <option value="Actions" data-column="4" data-name="actions">Actions</option>
            </select>
            <table id="stocks-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Added/Last Modified Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
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
                JSON.parse(localStorage.getItem(storageName)).map((el) => {
                    $(selectId).find(`[data-name="${el.name}"]`).attr('selected', 'selected')
                });
                $(selectId).select2({
                    multiple: true,
                    initSelection: function (element, callback) {
                        var selected_items = JSON.parse(localStorage.getItem(storageName));

                        callback(selected_items);
                    }
                });

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
                    dom: 'Bfrtip',
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
                    localStorage.setItem(storageName, JSON.stringify(selected_items))
                }

                init();

                $(selectId).on('change.select2', function (e) {
                    init();
                });
            }

            tableInit(
                "stock_table",
                [
                    {id: '#', text: '#', name: 'id'},
                    {id: 'Name', text: 'Name', name: 'name'},
                    {id: 'Image', text: 'Image', name: 'image'},
                    {id: 'Added/Last Modified Date', text: 'Added/Last Modified Date', name: 'created_at'},
                    {id: 'Actions', text: 'Actions', name: 'actions'}
                ],
                '#table_head_id',
                [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ],
                '#stocks-table',
                "{!! route('datatable_all_stocks') !!}"
            )
        });

    </script>
@stop
