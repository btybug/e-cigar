@extends('layouts.admin')
@section('content')
    <div class="card panel panel-default">
        <div class="card-header panel-heading">
            <h2 class="m-0 pull-left">Barcodes</h2>
                <span class="btn btn-success ml-2" data-toggle="modal" data-target="#barcodeModalCenter">
  Settings
</span>

            @ok('admin_inventory_others_new')<div class="pull-right"><a class="btn btn-primary pull-right" href="{!! route('admin_inventory_barcodes_new') !!}">Add new</a></div>@endok
        </div>
        <div class="card-body panel-body">
            <table id="stocks-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Related Item</th>
                    <th>Barcode</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="barcodeModalCenter" tabindex="-1" role="dialog" aria-labelledby="barcodeModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="barcodeModalCenterTitle">Barcode title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="w-75 d-flex flex-column mx-auto" style="padding-bottom: 20px" id="barcode_form">
                        <div id="barcode_container" style="margin-bottom: 15px; display: flex; justify-content: center; align-items: center; height: 200px">
                            <svg id="barcode"></svg>
                            <div id="invalid_barcode" style="display: none; color: red; weight: bold; text-align: center; font-size: 30px">Invalid Value</div>
                        </div>
                        <div style="margin-bottom: 15px; display: flex">
                            {{--                <label for="barcode_text" class="barcode_text">Barcode Text</label>--}}
                            <input class="form-control" type="text" placeholder="Default input" name="text" id="barcode_text" value="5060730202285" style="width: 70%"/>
                            <select class="form-control" name="format" id="barcode_format" style="width: 30%">
                                <option value="CODE128">CODE128 auto</option>
                                <option value="CODE128A">CODE128 A</option>
                                <option value="CODE128B">CODE128 B</option>
                                <option value="CODE128C">CODE128 C</option>
                                <option value="EAN13" selected>EAN13</option>
                                <option value="EAN8">EAN8</option>
                                <option value="UPC">UPC</option>
                                <option value="CODE39">CODE39</option>
                                <option value="ITF14">ITF14</option>
                                <option value="ITF">ITF</option>
                                <option value="MSI">MSI</option>
                                <option value="MSI10">MSI10</option>
                                <option value="MSI11">MSI11</option>
                                <option value="MSI1010">MSI1010</option>
                                <option value="MSI1110">MSI1110</option>
                                <option value="pharmacode">Pharmacode</option>
                            </select>
                        </div>
                        <div style="margin-bottom: 15px; display: flex; justify-content: space-between">
                            <label for="barcode_width" style="width: 15%">Bar Width</label>
                            <input type="range" name="width" class="custom-range" min="1" max="4" step="1" id="barcode_width" style="width: 75%" value="2">
                            <div class="value" style="width: 10%; text-align: end">2</div>
                        </div>

                        <div style="margin-bottom: 15px; display: flex; justify-content: space-between">
                            <label for="barcode_height" style="width: 15%">Height</label>
                            <input type="range" name="height" class="custom-range" min="10" max="150" step="5" id="barcode_height" style="width: 75%" value="100">
                            <div class="value" style="width: 10%; text-align: end">100</div>
                        </div>

                        <div style="margin-bottom: 15px; display: flex; justify-content: space-between">
                            <label for="barcode_margin" style="width: 15%">Margin</label>
                            <input type="range" name="margin" class="custom-range" min="0" max="25" step="1" id="barcode_margin" style="width: 75%" value="10">
                            <div class="value" style="width: 10%; text-align: end">10</div>
                        </div>

                        <div style="margin-bottom: 15px; display: flex; justify-content: space-between">
                            <label for="barcode_background_color" class="col-form-label" style="width: 15%">Background</label>
                            <div style="width: 75%">
                                <div class="example-content well">
                                    <div class="example-content-widget">
                                        <input id="barcode_background_color" name="background_color" type="text" class="form-control" value="#ffffff" style="background-color: #ffffff"/>
                                    </div>
                                </div>
                            </div>
                            <div class="value" style="width: 10%; text-align: end"></div>
                        </div>

                        <div style="margin-bottom: 15px; display: flex; justify-content: space-between">
                            <label for="barcode_line_color" class="col-form-label" style="width: 15%">Line Color</label>
                            <div style="width: 75%">
                                <div class="example-content well">
                                    <div class="example-content-widget">
                                        <input id="barcode_line_color" name="line_color" type="text" class="form-control" value="#000000" style="background-color: #000000"/>
                                    </div>
                                </div>
                            </div>
                            <div class="value" style="width: 10%; text-align: end"></div>
                        </div>

                        <div class="custom-control custom-switch" style="margin-bottom: 15px; display: flex; justify-content: center">
                            <input type="checkbox" name="text_switch" class="custom-control-input" id="barcode_text_switch" checked>
                            <label class="custom-control-label" for="barcode_text_switch">Show text</label>
                        </div>

                        <div id="barcode_text_options">
                            <div style="margin-bottom: 15px; display: flex; justify-content: center">
                                <label class="col-form-label" style="width: 15%">Text Align</label>
                                <div style="display: flex; justify-content: space-around; width: 75%">

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

                            <div style="margin-bottom: 15px">
                                <label  for="barcode_text_font"  class="col-form-label">Font</label>
                                <select class="form-control" name="text_font" id="barcode_text_font">
                                    <option>Sans-serif</option>
                                    <option>Serif</option>
                                    <option>Cursive</option>
                                </select>
                            </div>

                            <div style="margin-bottom: 15px; display: flex; justify-content: center">
                                <label style="width: 15%">Font Options</label>
                                <div style="display: flex; justify-content: space-around; width: 75%">
                                    <div>
                                        <input type="checkbox" name="bold" class="custom-control-input" id="text_bold">
                                        <label class="custom-control-label" for="text_bold"><b>Bold</b></label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="italic" class="custom-control-input" id="text_italic">
                                        <label class="custom-control-label" for="text_italic"><i>Italic</i></label>
                                    </div>
                                </div>
                                <div class="value" style="width: 10%; text-align: end"></div>
                            </div>

                            <div style="margin-bottom: 15px; display: flex; justify-content: space-between">
                                <label for="barcode_font_size" style="width: 15%">Font Size</label>
                                <input type="range" name="font_size" class="custom-range" min="8" max="36" step="1" id="barcode_font_size" style="width: 75%" value="20">
                                <div class="value" style="width: 10%; text-align: end">20</div>
                            </div>

                            <div style="margin-bottom: 15px; display: flex; justify-content: space-between">
                                <label for="barcode_text_margin" style="width: 15%">Text Margin</label>
                                <input type="range" name="text_margin" class="custom-range" min="-15" max="40" step="1" id="barcode_text_margin" style="width: 75%" value="0">
                                <div class="value" style="width: 10%; text-align: end">0</div>
                            </div>
                        </div>
                        {{--            <button id="svg">Svg -></button>--}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_barcode">Save</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{!! url('public/js/jquery.printPage.js') !!}"></script>
    <script>
        $(function () {
            var table = $('#stocks-table').DataTable({
                ajax: "{!! route('datatable_all_barcodes') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                "scrollX": true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf',
                    {
                        extend: "print",
                        exportOptions: {
                            stripHtml: false,
                            columns: [ 0, 1, 2,3 ]
                        }
                    }
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'code', name: 'code'},
                    {data: 'item', name: 'item'},
                    {data: 'barcode', name: 'barcode',orderable : false},
                    {data: 'actions', name: 'actions',orderable : false}
                ],
                order: [ [0, 'desc'] ]
            });

            table.on('draw.dt', function () {
                let width = 2;
                let height = 100;
                let margin = 10;
                let back_color = '#ffffff';
                let line_color = '#000000';
                let text_align = 'center';
                let text_font = 'sans-serif';
                $('body').find('.barcodes').each(function(key, value) {
                    console.log($(value).data('barcode'));
                    JsBarcode(`#code_${$(value).data('barcode')}`, $(value).data('barcode'), {
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
                });
            } );

            const barcode_edit = function() {
                let text = 5060730202285;
                let format = "EAN13";
                let width = 2;
                let height = 100;
                let margin = 10;
                let back_color = '#ffffff';
                let line_color = '#000000';
                let text_align = 'center';
                let text_font = 'sans-serif';
                let font_size = 20;
                let text_margin = 0;
                let displayValue = true;
                let bold = $('#text_bold').is(':checked');
                let italic =  $('#text_italic').is(':checked');
                let fontOptions = '';
                $('#text_bold').is(':checked')
                if(bold && italic) {
                    fontOptions = 'bold italic'
                } else if(bold) {
                    fontOptions = 'bold'
                } else if(italic) {
                    fontOptions = 'italic'
                } else {
                    fontOptions = ''
                }

                JsBarcode("#barcode", text, {
                    format,
                    fontOptions,
                    textMargin: text_margin,
                    font: text_font,
                    fontSize: font_size,
                    height,
                    width,
                    margin,
                    backgroundColor: back_color,
                    lineColor: line_color,
                    textAlign: text_align,
                    displayValue
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
                            format,
                            font: text_font,
                            fontOptions,
                            textMargin: text_margin,
                            fontSize: font_size,
                            height,
                            width,
                            margin,
                            background: back_color,
                            lineColor: line_color,
                            textAlign: text_align,
                            displayValue
                        })
                            .render();
                    }
                });

                $('body').on('input', '#barcode_height', function(ev) {
                    height = $(ev.target).val();
                    $('#barcode_height').next('.value').text(height)
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                })

                $('body').on('input', '#barcode_width', function(ev) {
                    width = $(ev.target).val();
                    $('#barcode_width').next('.value').text(width);
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                })

                $('body').on('input', '#barcode_margin', function(ev) {
                    margin = Number($(ev.target).val());
                    $('#barcode_margin').next('.value').text(margin);

                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                });

                $('#barcode_background_color').colorpicker();
                $('#barcode_line_color').colorpicker();

                $('body').on('change', '#barcode_background_color', function(ev) {
                    back_color = $(ev.target).val();

                    $('#barcode_background_color').css('background-color', back_color);
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                });

                $('body').on('change', '#barcode_line_color', function(ev) {
                    line_color = $(ev.target).val();

                    $('#barcode_line_color').css('background-color', line_color);
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                });

                $('body').on('change', '#barcode_text_switch', function(ev) {
                    displayValue = $(ev.target).is(':checked');
                    if($(ev.target).is(':checked')) {
                        $('#barcode_text_options').addClass('d-block');
                        $('#barcode_text_options').removeClass('d-none');
                    } else {
                        $('#barcode_text_options').addClass('d-none');
                        $('#barcode_text_options').removeClass('d-block');
                    }

                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                });

                $('body').on('change', '[name="text_align"]', function(ev) {
                    console.log($(ev.target).val());

                    text_align = $(ev.target).val();
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                });

                $('body').on('change', '#barcode_text_font', function(ev) {
                    console.log($(ev.target).val());

                    text_font = $(ev.target).val();
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                });

                $('body').on('change', '#barcode_format', function(ev) {
                    console.log($(ev.target).val());

                    format = $(ev.target).val();
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                });

                $('body').on('change', '#text_bold', function(ev) {
                    bold = $(ev.target).is(':checked');
                    if(bold && italic) {
                        fontOptions = 'bold italic'
                    } else if(bold) {
                        fontOptions = 'bold'
                    } else if(italic) {
                        fontOptions = 'italic'
                    } else {
                        fontOptions = ''
                    }
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                })

                $('body').on('change', '#text_italic', function(ev) {
                    italic = $(ev.target).is(':checked');
                    if(bold && italic) {
                        fontOptions = 'bold italic'
                    } else if(bold) {
                        fontOptions = 'bold'
                    } else if(italic) {
                        fontOptions = 'italic'
                    } else {
                        fontOptions = ''
                    }
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                })

                $('body').on('input', '#barcode_font_size', function(ev) {
                    font_size = $(ev.target).val();
                    $('#barcode_font_size').next('.value').text(font_size)
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                })

                $('body').on('input', '#barcode_text_margin', function(ev) {
                    text_margin = Number($(ev.target).val());
                    $('#barcode_text_margin').next('.value').text(text_margin)
                    JsBarcode("#barcode", text, {
                        format,
                        font: text_font,
                        fontOptions,
                        textMargin: text_margin,
                        fontSize: font_size,
                        height,
                        width,
                        margin,
                        background: back_color,
                        lineColor: line_color,
                        textAlign: text_align,
                        displayValue
                    })
                        .render();
                })

                $('body').on('click', '#save_barcode', function(ev) {
                    ev.preventDefault();
                    function getFormData($form){
                        var unindexed_array = $form.serializeArray();
                        var indexed_array = {};

                        $.map(unindexed_array, function(n, i){
                            indexed_array[n['name']] = n['value'];
                        });

                        return indexed_array;
                    }

                    var $form = $("#barcode_form");
                    var data = getFormData($form);

                    data = Object.assign(data, {
                        text_switch: $('#barcode_text_switch').is(':checked'),
                        bold: $('#barcode_bold').is(':checked'),
                        italic: $('#barcode_italic').is(':checked')
                    })
                    console.log(data);
                    $('#barcodeModalCenter').modal('hide');
                })


                // $('#svg').on('click', function(ev) {
                //     svgAsDataUri(document.getElementById("barcode"), {})
                //         .then(uri => console.log(uri));
                // })
                // saveSvgAsPng(document.getElementById("barcode"), "barcode.png", {scale: 10});
            };

            barcode_edit();
            $('#barcodeModalCenter').on('show.bs.modal', function() {
                // $('#barcode_background_color').css('z-index', '999999999999999')
                // $('#barcode_line_color').css('z-index', '999999999999999')
                // $('.example-content-widget').css('z-index', '999999999999999')
                // $('.example-content.well').css('z-index', '999999999999999')

                $('#barcode_background_color').colorpicker();
                $('#barcode_line_color').colorpicker();
            })
        });
    </script>
    @stop
