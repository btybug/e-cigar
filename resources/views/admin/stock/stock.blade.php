@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="info-tab" href="{!! route('admin_stock') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Stocks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_stock_offers') !!}" role="tab"
                       aria-controls="accounts" aria-selected="true" aria-expanded="true">Offers</a>
                </li>
            </ul>
            <div class="tab-content w-100">
                <div class="card panel panel-default">
                    <div class="card-header panel-heading clearfix">
                        <div class="pull-left">
                            <h2 class="m-0">Stock</h2>
                        </div>
                        <div class="pull-right">
                            @ok('admin_stock_new')<div class="pull-right "><a class="btn btn-primary pull-right" href="{!! route('admin_stock_new') !!}">Add new</a></div>@endok
                        </div>
                    </div>
                    <div class="card-body panel-body">

                        <select name="table_head" id="table_head_id" class="selectpicker text-black" multiple>
                            <!-- <option value="id" data-column="1" data-name="id">#</option> -->
                            <option value="Name" data-column="2" data-name="name">Name</option>
                            <option value="Short Description" data-column="3" data-name="short_description">Short Description</option>
                            <option value="Image" data-column="4" data-name="image">Image</option>
                            <option value="Added/Last Modified Date" data-column="5" data-name="created_at">Added/Last Modified Date</option>
                            <option value="Actions" data-column="6" data-name="actions">Actions</option>
                        </select>
                        <table id="stocks-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th><div class="text-center"><input type="checkbox" class="select_all_checkbox"/></div></th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Short Description</th>
                                <th>Image</th>
                                <th>Added/Last Modified Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Select</th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Short Description</th>
                                <th>Image</th>
                                <th>Added/Last Modified Date</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
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
        $(document).ready(function() {

            var table;

            $("body").on('click','.edit-row',function () {
                let id = $(this).data('id');

                AjaxCall("{!! route('post_admin_stock_edit_row') !!}", {id:id}, function (res) {
                    if (!res.error) {
                        $('.edit-list--container .edit-list--container-content').html(res.html);
                        $('.edit-list--container .custom-select').select2();
                        $('.edit-list--container').show();
                        $(".edit-list--container").draggable({ handle:'.heading'});
                    }
                });
            });


            $("body").on('click','.edit_item_custom',function (e) {
                e.preventDefault();
                let form = $(this).closest('form').serialize();

                AjaxCall("{!! route('post_admin_stock_edit_row_save') !!}", form, function (res) {
                    if (!res.error) {

                        $('.edit-list--container').find('.edit-list--container-content').empty();
                        $('body').css('overflow', 'unset');
                        $('.edit-list--container').hide();
                        $(".edit-list--container").draggable('destroy');

                        $('.edit-list--container').removeClass('max-wrap');
                        $('.edit-list--container').removeClass('min-wrap');
                        $('body').css('overflow', 'unset');
                        table.ajax.reload();
                    }
                });
            });

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
                table = $(tableId).DataTable({
                    ajax: ajaxUrl,
                    "processing": true,
                    "serverSide": true,
                    "bPaginate": true,
                    "scrollX": true,
                    "order": [[ 1, "asc" ]],
                    dom: 'Bflrtip',
                    displayLength: 10,
                    lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                    buttons: [
                        {
                            extend: 'collection',
                            text: 'Export',
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
                                }
                            ]
                        },
                        {
                            text: 'Edit',
                            className: 'd-none edit_hidden_button',
                            action: function ( e, dt, node, config ) {
                                const ids = [];
                                $('#stocks-table tbody tr.selected').each(function() {
                                    ids.push($(this).find('.classes__id').text());
                                });


                                if(ids.length > 0){
                                    // alert(666)
                                    window.location.href = '/admin/stock/edit-rows/'+encodeURI(ids);
                                }
                                {{--ids.length > 0 && AjaxCall('{{ route('post_admin_items_edit_row_many') }}', {ids}, function(res) {--}}
                                {{--    console.log(res)--}}
                                {{--})--}}
                            }
                        }
                    ],
                    "autoWidth": false,
                    columns: tableHeadArray,
                    columnDefs: [
                        {
                            orderable: false,
                            className: 'select-checkbox',
                            targets: 0,
                            width: '30px',
                            'checkboxes': {
                                'selectRow': true
                            }
                        },
                        {
                            className: 'classes__id',
                            targets: 1,
                        }
                    ],
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
                    initComplete: function () {
                        this.api().columns().every(function () {
                            var column = this;
                            var input = document.createElement("input");
                            column[0][0] !== 0 && column[0][0] !== 6 && column[0][0] !== 4 && $(input).appendTo($(column.footer()).empty())
                                .on('keyup change clear', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                        });
                    }
                });

                table.on( 'select', function ( e, dt, type, indexes ) {
                    if ( type === 'row' ) {
                        if($('tr[role="row"].selected').length !== 0) {
                            console.log(111)

                            $('.edit_hidden_button').removeClass('d-none');
                            $('.edit_hidden_button').addClass('d-block');
                        }
                    }
                });

                table.on( 'deselect', function ( e, dt, type, indexes ) {
                    if ( type === 'row' ) {
                        if($('tr[role="row"].selected').length === 0) {
                            console.log(222)

                            $('.edit_hidden_button').removeClass('d-block');
                            $('.edit_hidden_button').addClass('d-none');
                        }
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
                    {id: 'Image', name: 'image'},
                    {id: 'Added/Last Modified Date', name: 'created_at'},
                    {id: 'Actions', name: 'actions'}
                ],
                '#table_head_id',
                [
                    {  data: null,
                        name: 'id',
                        defaultContent: '',
                        className: 'select-checkbox',
                        orderable: false},
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'stock_translations.name'},
                    {data: 'short_description', name: 'stock_translations.short_description'},
                    {data: 'image', name: 'image'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ],
                '#stocks-table',
                "{!! route('datatable_all_stocks') !!}"
            )

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
