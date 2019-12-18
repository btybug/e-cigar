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
                        <div class="d-flex justify-content-between">
                        <select name="table_head" id="table_head_id" class="selectpicker text-black" multiple>
                            <option value="#" data-column="0" data-name="#" selected>#</option>
                            <option value="#" data-column="1" data-name="id" selected>id</option>
                            <option value="Name" data-column="2" data-name="name" selected>Name</option>
                            <option value="Short Description" data-column="3" data-name="short_description" selected>Short Description</option>
                            <option value="Brand" data-column="4" data-name="brand_id" selected>Brand</option>
                            <option value="Barcode" data-column="5" data-name="barcode_id" selected>Barcode</option>
                            <option value="Quantity" data-column="6" data-name="quantity" selected>Quantity</option>
                            <option value="Category" data-column="7" data-name="category" selected>Category</option>
                            <option value="Price" data-column="8" data-name="price" selected>Price</option>
                            <option value="Status" data-column="9" data-name="status" selected>Status</option>
                            <option value="Created At" data-column="10" data-name="created_at">Created At</option>
                            <option value="Actions" data-column="11" data-name="actions" selected>Actions</option>
                        </select>
                        <div class="find-wrapper-results-head-right d-flex">
                            <select class="form-control edit_selected_option mr-3 ">
                                <option value="">Action</option>
                                <option value="edit">Edit</option>
                                <option value="barcode">Print Barcode</option>
                                <option value="qr_code">Print Qr Code</option>
                                <option value="download_barcode">Download Barcode</option>
                                <option value="download_qr_code">Download Qr Code</option>
                            </select>
                            <button class="btn btn-warning btn-edit edit_selected">GO</button>
                        </div>
                        </div>
                        <table id="stocks-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th><div class="text-center" style="margin-left: 17.282px"><input type="checkbox" class="select_all_checkbox"/></div></th>
                                <th>id</th>
                                <th>Name</th>
                                <th>Short Description</th>
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
                                <th></th>
                                <th>id</th>
                                <th>Name</th>
                                <th>Short Description</th>
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
        <div id="svg_barcode" style="display: none"></div>
        <div id="qr_codes"></div>
        <svg id="svg_barcode_print" style="display: none"></svg>
    </div>

    <div class="edit-list--container"  id="heading">
        <div class="d-flex justify-content-end heading">
            <button class="heading-btn editing_minimize"><i class="fa fa-minus"></i></button>
            <button class="heading-btn editing_max"><i class="fa fa-window-maximize"></i></button>
            <button class="heading-btn editing_close"><i class="fa fa-times"></i></button>
        </div>
        <div class="edit-list--container-content main-scrollbar">

        </div>
    </div>
@stop
@section('css')
    <link href="/public/plugins/select2/select2.min.css" rel="stylesheet"/>
@stop
@section('js')
    <script src="/public/plugins/select2/select2.full.min.js"></script>

    <script>
        $(function () {
            $("body").on('click','.edit-row',function () {
                let id = $(this).data('id');

                AjaxCall("{!! route('post_admin_items_edit_row') !!}", {id:id}, function (res) {
                    if (!res.error) {
                        $('.edit-list--container .edit-list--container-content').html(res.html);
                        $('.edit-list--container .custom-select').select2();
                        $('.edit-list--container').show();
                        $(".edit-list--container").draggable({ handle:'.heading'});
                    }
                });
            });


            const shortAjax = function(url, data, success, error) {
                $.ajax({
                    type: "get",
                    url: url,
                    cache: false,
                    datatype: "json",
                    data: data,
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function(data) {
                        if (success) {
                            success(data);
                        }
                        return data;
                    },
                    error: function(errorThrown) {
                        if (error) {
                            error(errorThrown);
                        }
                        return errorThrown;
                    }
                });
            };




            const action = function ( dt, url, method, type ) {
                const ids = [];
                dt.rows( { selected: true } ).data().map((r) => ids.push(r.id));
                console.log('data', ids);
                shortAjax(url, {method, type, ids}, (res) => console.log('res', res), (err) => console.log('err', err));
            };


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
                    dom: 'Bflrtip',
                    displayLength: 10,
                    lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        // 'selectAll',
                        // 'selectNone',
                        // {
                        //     extend: 'collection',
                        //     text: 'Export',
                        //     buttons: [

                        //     ]
                        // },
                        {
                            extend: 'collection',
                            text: 'Download',
                            buttons: [
                                {
                                    text: 'Barcode',
                                    action: function(e, dt) {
                                        action(dt, '/admin/inventory/items/datatable-selections', 'download', 'barcode')
                                    }
                                },
                                {
                                    text: 'QR Code',
                                    action: function (e, dt) {
                                        action(dt, '/admin/inventory/items/datatable-selections', 'download', 'qr_code')
                                    }
                                }
                            ]
                        },
                        {
                            extend: 'collection',
                            text: 'Print',
                            buttons: [
                                {
                                    text: 'Barcode',
                                    action: function ( e, dt, node, config ) {
                                        action(dt, '/admin/inventory/items/datatable-selections', 'print', 'barcode')
                                    }
                                },
                                {
                                    text: 'QR Code',
                                    action: function ( e, dt, node, config ) {
                                        action(dt, '/admin/inventory/items/datatable-selections', 'print', 'qr_code')
                                    }
                                }
                            ]
                        }
                    ],
                    // language: {
                    //     buttons: {
                    //         selectAll: "Select all items",
                    //         selectNone: "Select none"
                    //     }
                    // },
                    columnDefs: [ {
                        orderable: false,
                        className: 'select-checkbox',
                        targets:   0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    } ],
                    select: {
                        style:    'multi',
                        selector: '.select-checkbox'
                    },
                    exportOptions: {
                        modifier: {
                            selected: null
                        },
                        columns: ':visible:not(.not-exported)',
                        rows: '.selected'
                    },
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

                $("body").on( "change", ".select_all_checkbox",function(e) {
                    // console.log(table.rows({selected: true}).length);
                    if ($(this).is( ":checked" )) {
                        table.rows(  ).select();
                    } else {
                        table.rows(  ).deselect();
                    }
                });
            }

            tableInit(
                "stock_table",
                [
                    {id: '#', name: 'id'},
                    {id: 'id', name: 'id'},
                    {id: 'Name', name: 'name'},
                    {id: 'Short Description', name: 'short_description'},
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
                        name: 'items.id',
                        defaultContent: '',
                        className: 'select-checkbox',
                        orderable: false},
                    {data: 'id', name: 'items.id'},
                    {data: 'name', name: 'item_translations.name'},
                    {data: 'short_description', name: 'item_translations.short_description'},
                    {data: 'brand_id', name: 'categories_translations.name'},
                    {data: 'barcode_id', name: 'barcodes.code'},
                    {data: 'quantity', name: 'items.quantity'},
                    {data: 'category', name: 'categories_translations.name'},
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
            $('body').on('click', '.edit-list--container .heading-btn', function(ev) {
                if($(ev.target).closest('.heading-btn').hasClass('editing_close')) {
                    $('.edit-list--container').find('.edit-list--container-content').empty();
                    $('body').css('overflow', 'unset');
                    $('.edit-list--container').hide();
                    $(".edit-list--container").draggable('destroy');

                    $('.edit-list--container').removeClass('max-wrap');
                    $('.edit-list--container').removeClass('min-wrap');
                    $('body').css('overflow', 'unset');
                } else if($(ev.target).closest('.heading-btn').hasClass('editing_max')) {
                    i = $(ev.target).closest('.heading-btn').find('i');

                    if(!$('.edit-list--container').hasClass('max-wrap')) {
                        if($(".edit-list--container").data('draggable')) {
                            $(".edit-list--container").draggable('destroy');
                        }
                        min = $('.edit-list--container').hasClass('min-wrap');
                        max = true;
                        min && $('.edit-list--container').removeClass('min-wrap');
                        i.removeClass('fa-window-maximize');
                        i.addClass('fa-window-restore');
                        $('.edit-list--container').addClass('max-wrap');
                        $('body').css('overflow', 'hidden');
                    } else {
                        max = false;
                        $(".edit-list--container").draggable({ handle:'.heading'});
                        min && $('.edit-list--container').addClass('min-wrap');
                        i.removeClass('fa-window-restore');
                        i.addClass('fa-window-maximize');
                        $('.edit-list--container').removeClass('max-wrap');
                        $('body').css('overflow', 'unset');
                    }
                } else if($(ev.target).closest('.heading-btn').hasClass('editing_minimize')) {
                    if($('.edit-list--container').hasClass('min-wrap')) {
                        if(max) {
                            i.removeClass('fa-window-maximize');
                            i.addClass('fa-window-restore');
                            $('.edit-list--container').addClass('max-wrap');
                            $('body').css('overflow', 'hidden');
                        } else {
                            $(".edit-list--container").draggable({ handle:'.heading'});

                        }
                        $('.edit-list--container').removeClass('min-wrap');
                    } else {
                        if(max) {
                            i.removeClass('fa-window-restore');
                            i.addClass('fa-window-maximize');
                            $('.edit-list--container').removeClass('max-wrap');
                            $('body').css('overflow', 'unset');
                        }
                        $('.edit-list--container').addClass('min-wrap');
                    }
                }
            });

        });

    </script>
@stop
