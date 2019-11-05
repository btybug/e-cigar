

@extends('layouts.admin')
@section('content-header')
@stop
@section('content')
    <div class="admin-find-wrapper">

        <div class="form-group row border-bottom pb-2">
            <label for="find" class="col-sm-2 col-form-label">Find</label>
            <div class="col-sm-4">

            </div>
        </div>
        <div class="find-form">
            @include('admin.find.items.form')
        </div>

        <div class="find-wrapper-results mt-5">
            <div class="find-wrapper-results-head">
                <h3>Results</h3>
                <div class="find-wrapper-results-head-right">
                    <button class="btn btn-warning btn-edit mr-3">Edit</button>
                    <select class="form-control">
                        <option value="">Action</option>
                        <option value="">Print Barcode</option>
                        <option value="">Print Qr Code</option>
                    </select>
                </div>
            </div>

            <div class="find-wrapper-results-content row">
                @include('admin.find.items.results')
            </div>

        </div>
    </div>

@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/public/js/DataTables/css/editor.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
    <link rel="stylesheet" href="/public/js/DataTables/css/editor.dataTables.css">
    <link rel="stylesheet" href="/public/js/DataTables/css/editor.bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.css" integrity="sha256-iu+Hq7JHYN0rAeT3Y+c4lEKIskeGgG/MpAyrj6W9iTI=" crossorigin="anonymous" />
@stop
@section('js')

    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{url('public/js/DataTables/js/dataTables.editor.js')}}"></script>

    <script src="{{url('public/js/DataTables/js/editor.bootstrap4.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>

    <script src="{{url('public/js/DataTables/js/editor.bootstrap.min.js')}}"></script>
    <script src="{{url('public/js/DataTables/js/editor.select2.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>

        (function ($, DataTable) {

            if ( ! DataTable.ext.editorFields ) {
                DataTable.ext.editorFields = {};
            }

            var Editor = DataTable.Editor;
            var _fieldTypes = DataTable.ext.editorFields;

            _fieldTypes.status = {
                create: function ( conf ) {
                    var that = this;

                    conf._enabled = true;

                    // Create the elements to use for the input
                    conf._input = $(
                        '<div id="'+Editor.safeId( conf.id )+'">'+
                        '<button type="button" class="inputButton" value="Draft">Draft</button>'+
                        '<button type="button" class="inputButton" value="Published">Published</button>'+
                        '</div>');

                    // Use the fact that we are called in the Editor instance's scope to call
                    // the API method for setting the value when needed
                    $('button.inputButton', conf._input).click( function () {
                        if ( conf._enabled ) {
                            that.set( conf.name, $(this).attr('value') );
                        }

                        return false;
                    } );

                    return conf._input;
                },

                get: function ( conf ) {
                    return $('button.selected', conf._input).attr('value');
                },

                set: function ( conf, val ) {
                    $('button.selected', conf._input).removeClass( 'selected' );
                    $('button.inputButton[value='+val+']', conf._input).addClass('selected');
                },

                enable: function ( conf ) {
                    conf._enabled = true;
                    $(conf._input).removeClass( 'disabled' );
                },

                disable: function ( conf ) {
                    conf._enabled = false;
                    $(conf._input).addClass( 'disabled' );
                }
            };

        })(jQuery, jQuery.fn.dataTable);

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
            $("body").find(".categories").select2();
            $("body").find(".brands").select2();
            $("body").find(".barcodes").select2();
                var editor = new $.fn.dataTable.Editor({
                    ajax: "/admin/find/items",
                    table: $('body').find("#items-table"),
                    display: "bootstrap",
                    idSrc: 'id',
                    fields: [
                        {label: "ID:", name: "id", type: 'readonly'},
                        {label: "Name:", name: "name"},
                        {label: "status:", name: "status",type:'status'},
                        {label: "Price:", name: "default_price"},
                        {label: "Brand:", name: "brands",type: "select2"},
                        {label: "Categories:", name: "categories_lists",type: "select2",
                            "opts": {
                                "placeholder": "Seleziona una nazione",
                                'multiple':true,
                                "allowClear": true
                            }}
                    ]
                });

            // editor.on("preOpen", function (e, mode, action) {
            //         $('#DTE_Field_categories_lists').val('1');
            //         $('#DTE_Field_categories_lists').trigger('change')
            // });

            $('#items-table').on( 'click', 'tbody td:not(:first-child)', function (e) {
                $('body').find('#DTE_Field_barcodes_code').select2()
                editor.inline( window.LaravelDataTables["items-table"].cell(this).index(), {
                    onBlur: 'submit'
                } );
            } );
                // $('body').find('#items-table').on('click', 'tbody td:not(:first-child)', function (e) {
                //     editor.inline(this);
                // });

                    {{$dataTable->generateScripts()}}


                });
    </script>
@stop
