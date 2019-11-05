

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

        <div class="w-75 d-flex flex-column mx-auto" style="padding-bottom: 100px">
            <div id="barcode_container" style="margin-bottom: 10px; display: flex; justify-content: center; align-items: center; height: 200px">
                <svg id="barcode"></svg>
                <div id="invalid_barcode" style="display: none; color: red; weight: bold; text-align: center; font-size: 30px">Invalid Value</div>
            </div>
            <div style="margin-bottom: 10px">
{{--                <label for="barcode_text" class="barcode_text">Barcode Text</label>--}}
                <input class="form-control" type="text" placeholder="Default input" id="barcode_text" value="555" />
            </div>
            <div style="margin-bottom: 10px; display: flex; justify-content: space-between">
                <label for="barcode_width" style="width: 15%">Bar Width</label>
                <input type="range" class="custom-range" min="1" max="4" step="1" id="barcode_width" style="width: 75%" value="2">
                <div class="value" style="width: 10%; text-align: end">2</div>
            </div>

            <div style="margin-bottom: 10px; display: flex; justify-content: space-between">
                <label for="barcode_height" style="width: 15%">Height</label>
                <input type="range" class="custom-range" min="10" max="150" step="5" id="barcode_height" style="width: 75%" value="100">
                <div class="value" style="width: 10%; text-align: end">100</div>
            </div>

            <div style="margin-bottom: 10px; display: flex; justify-content: space-between">
                <label for="barcode_margin" style="width: 15%">Margin</label>
                <input type="range" class="custom-range" min="0" max="25" step="1" id="barcode_margin" style="width: 75%" value="10">
                <div class="value" style="width: 10%; text-align: end">10</div>
            </div>

            <div style="margin-bottom: 10px; display: flex; justify-content: space-between">
                <label for="barcode_background_color" class="col-form-label" style="width: 15%">Background</label>
                <div style="width: 75%">
                    <div class="example-content well">
                        <div class="example-content-widget">
                            <input id="barcode_background_color" type="text" class="form-control" value="#ffffff" style="background-color: #ffffff"/>
                        </div>
                    </div>
                </div>
                <div class="value" style="width: 10%; text-align: end"></div>
            </div>

            <div style="margin-bottom: 10px; display: flex; justify-content: space-between">
                <label for="barcode_line_color" class="col-form-label" style="width: 15%">Line Color</label>
                <div style="width: 75%">
                    <div class="example-content well">
                        <div class="example-content-widget">
                            <input id="barcode_line_color" type="text" class="form-control" value="#000000" style="background-color: #000000"/>
                        </div>
                    </div>
                </div>
                <div class="value" style="width: 10%; text-align: end"></div>
            </div>

            <div class="custom-control custom-switch" style="margin-bottom: 10px; display: flex; justify-content: center">
                <input type="checkbox" class="custom-control-input" id="barcode_text_switch" checked>
                <label class="custom-control-label" for="barcode_text_switch">Show text</label>
            </div>

            <div id="barcode_text_options" style="margin-bottom: 10px; display: flex; justify-content: center">
                <label class="col-form-label" style="width: 15%">Text Align</label>
                <div style="margin-bottom: 10px; display: flex; justify-content: space-around; width: 75%">

                    <div>
                        <label class="col-form-label">Left
                            <input type="radio" name="text_align" value="left">
                        </label>
                    </div>
                    <div>
                        <label class="col-form-label">Center
                            <input type="radio" name="text_align" value="center" checked>
                        </label>
                    </div>
                    <div>
                        <label class="col-form-label">Right
                            <input type="radio" name="text_align" value="right">
                        </label>
                    </div>
                </div>
                <div class="value" style="width: 10%; text-align: end"></div>
            </div>

            <div style="margin-bottom: 10px; display: flex; justify-content: center">
                <label  for="barcode_text_font">Font</label>
                <select class="form-control" id="barcode_text_font">
                    <option>Sans-serif</option>
                    <option>Serif</option>
                    <option>Cursive</option>
                </select>
            </div>


            <div style="margin-bottom: 10px; display: flex; justify-content: center">
                <label style="width: 15%">Font Options</label>
                <div style="margin-bottom: 10px; display: flex; justify-content: space-around; width: 75%">
                    <div>
                        <input type="checkbox" class="custom-control-input" id="text_bold">
                        <label class="custom-control-label" for="text_bold"><b>Bold</b></label>
                    </div>
                    <div>
                        <input type="checkbox" class="custom-control-input" id="text_italic">
                        <label class="custom-control-label" for="text_italic"><i>Italic</i></label>
                    </div>
                </div>
                <div class="value" style="width: 10%; text-align: end"></div>
            </div>
{{--            <button id="svg">Svg -></button>--}}
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
            $("body").find(".categories").select2();
            $("body").find(".brands").select2();
            $("body").find(".barcodes").select2();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });

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
                        {label: "Barcode:", name: "barcodes_code",type: "select2"},
                        {label: "Brand:", name: "brands",type: "select"},
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

            // $('#items-table').on( 'click', 'tbody td:not(:first-child)', function (e) {
            //     $('body').find('#DTE_Field_barcodes_code').select2()
            //     editor.inline( this, {
            //         onBlur: 'submit'
            //     } );
            // } );
                // $('body').find('#items-table').on('click', 'tbody td:not(:first-child)', function (e) {
                //     editor.inline(this);
                // });

                    {{$dataTable->generateScripts()}}

                    let text = 555;
                    let width = 2;
                    let height = 100;
                    let margin = 10;
                    let back_color = '#ffffff';
                    let line_color = '#000000';
                    let text_align = 'center';
                    let text_font = 'sans-serif';

                    JsBarcode("#barcode", text, {
                            format: "CODE128",
                            font: text_font,
                            fontSize: 18,
                            textMargin: 0,
                            height,
                            width,
                            margin,
                            backgroundColor: back_color,
                            lineColor: line_color,
                            textAlign: text_align
                        })
                    .render();

                    $('body').on('input', '#barcode_text', function(ev) {
                        text = $(ev.target).val();
                        if(text === '') {
                            $('#barcode').css('display', 'none');
                            $('#invalid_barcode').css('display', 'block');
                        } else {
                            $('#invalid_barcode').css('display', 'none');
                            JsBarcode("#barcode", text, {
                                    format: "CODE128",
                                    font: text_font,
                                    fontSize: 18,
                                    textMargin: 0,
                                    height,
                                    width,
                                    margin,
                                    background: back_color,
                                    lineColor: line_color,
                                    textAlign: text_align
                                })
                                .render();
                        }
                    });

                    $('body').on('input', '#barcode_height', function(ev) {
                        height = $(ev.target).val();
                        $('#barcode_height').next('.value').text(height)
                        JsBarcode("#barcode", text, {
                                format: "CODE128",
                                font: text_font,
                                fontSize: 18,
                                textMargin: 0,
                                height,
                                width,
                                margin,
                                background: back_color,
                                lineColor: line_color,
                                textAlign: text_align
                            })
                            .render();
                    })

                    $('body').on('input', '#barcode_width', function(ev) {
                        width = $(ev.target).val();
                        $('#barcode_width').next('.value').text(width);
                        JsBarcode("#barcode", text, {
                                format: "CODE128",
                                font: text_font,
                                fontSize: 18,
                                textMargin: 0,
                                height,
                                width,
                                margin,
                                background: back_color,
                                lineColor: line_color,
                                textAlign: text_align
                            })
                            .render();
                    })

                    $('body').on('input', '#barcode_margin', function(ev) {
                        margin = $(ev.target).val();
                        $('#barcode_margin').next('.value').text(margin);

                        JsBarcode("#barcode", text, {
                                format: "CODE128",
                                font: text_font,
                                fontSize: 18,
                                textMargin: 0,
                                height,
                                width,
                                margin,
                                background: back_color,
                                lineColor: line_color,
                                textAlign: text_align
                        })
                        .render();
                    });

                    $('#barcode_background_color').colorpicker();
                    $('#barcode_line_color').colorpicker();

                    $('body').on('change', '#barcode_background_color', function(ev) {
                        back_color = $(ev.target).val();

                        $('#barcode_background_color').css('background-color', back_color);
                        JsBarcode("#barcode", text, {
                                format: "CODE128",
                                font: text_font,
                                fontSize: 18,
                                textMargin: 0,
                                height,
                                width,
                                margin,
                                background: back_color,
                                lineColor: line_color,
                                textAlign: text_align
                            })
                            .render();
                    });

                    $('body').on('change', '#barcode_line_color', function(ev) {
                        line_color = $(ev.target).val();

                        $('#barcode_line_color').css('background-color', line_color);
                        JsBarcode("#barcode", text, {
                                format: "CODE128",
                                font: text_font,
                                fontSize: 18,
                                textMargin: 0,
                                height,
                                width,
                                margin,
                                background: back_color,
                                lineColor: line_color,
                                textAlign: text_align
                            })
                            .render();
                    });

                    $('body').on('change', '#barcode_text_switch', function(ev) {
                        console.log($(ev.target).val());
                        if($(ev.target).is(':checked')) {
                            $('#barcode_text_options').addClass('d-flex');
                            $('#barcode_text_options').removeClass('d-none');
                        } else {
                            $('#barcode_text_options').addClass('d-none');
                            $('#barcode_text_options').removeClass('d-flex');
                        }


                    });

                    $('body').on('change', '[name="text_align"]', function(ev) {
                        console.log($(ev.target).val());

                        text_align = $(ev.target).val();
                        JsBarcode("#barcode", text, {
                            format: "CODE128",
                            font: text_font,
                            fontSize: 18,
                            textMargin: 0,
                            height,
                            width,
                            margin,
                            background: back_color,
                            lineColor: line_color,
                            textAlign: text_align
                        })
                            .render();
                    });

                    $('body').on('change', '#barcode_text_font', function(ev) {
                        console.log($(ev.target).val());

                        text_font = $(ev.target).val();
                        JsBarcode("#barcode", text, {
                            format: "CODE128",
                            font: text_font,
                            fontSize: 18,
                            textMargin: 0,
                            height,
                            width,
                            margin,
                            background: back_color,
                            lineColor: line_color,
                            textAlign: text_align
                        })
                            .render();
                    });

                    // $('#svg').on('click', function(ev) {
                    //     svgAsDataUri(document.getElementById("barcode"), {})
                    //         .then(uri => console.log(uri));
                    // })
                    // saveSvgAsPng(document.getElementById("barcode"), "barcode.png", {scale: 10});
                });
    </script>
@stop
