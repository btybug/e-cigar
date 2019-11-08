

@extends('layouts.admin')
@section('content-header')
@stop
@section('content')
    <div class="admin-find-wrapper">
        <div class="find-form">
            @include('admin.find.items.form')
        </div>

        <div class="find-wrapper-results mt-5">
            <div class="find-wrapper-results-head">
                <h3>Results</h3>
                <div class="find-wrapper-results-head-right">
                    <select class="form-control edit_selected_option mr-3 ">
                        <option value="">Action</option>
                        <option value="barcode">Print Barcode</option>
                        <option value="qr_code">Print Qr Code</option>
                        <option value="download_barcode">Download Barcode</option>
                        <option value="download_qr_code">Download Qr Code</option>
                    </select>
                    <button class="btn btn-warning btn-edit edit_selected">GO</button>
                </div>
            </div>

            <div class="find-wrapper-results-content row">
                @include('admin.find.items.results')
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="barcodeModalPrint" tabindex="-1" role="dialog" aria-labelledby="barcodeModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="barcodeModalCenterTitle">Barcode title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="printThis">
                        <ul class="barcodes_image_list" style="width: 100%; display: flex; flex-wrap: wrap">

                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="print_barcodes">Print</button>
                </div>
            </div>
        </div>
    </div>
    <div id="svg_barcode" style="display: none"></div>
    <div id="qr_codes"></div>
    <svg id="svg_barcode_print" style="display: none"></svg>



@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/public/js/DataTables/css/editor.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
    <link rel="stylesheet" href="/public/js/DataTables/css/editor.dataTables.css">
    <link rel="stylesheet" href="/public/js/DataTables/css/editor.bootstrap.css">
    <style>
        @media screen {
            #printSection {
                display: none;
            }
        }

        @media print {
            body * {
                visibility:hidden;
            }
            #printSection, #printSection * {
                visibility:visible;
            }
            #printSection {
                position:absolute;
                left:0;
                top:0;
            }
        }

    </style>
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
{{--    <script src="{{url('public/js/DataTables/js/editor.select2.js')}}"></script>--}}
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
            const shortAjax = function (URL, obj = {}, cb) {
                fetch(URL, {
                    method: "post",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": $('input[name="_token"]').val()
                    },
                    credentials: "same-origin",
                    body: JSON.stringify(obj)
                })
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (json) {
                        return cb(json);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            };

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
                        {label: "Status:", name: "status",type:'select'},
                        {label: "Price:", name: "default_price"},
                        {label: "Brand:", name: "brands",type: "select"},
                        {label: "Categories:", name: "categories_lists",type: "select",
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
                // editor.inline( this );
            } );
                // $('body').find('#items-table').on('click', 'tbody td:not(:first-child)', function (e) {
                //     editor.inline(this);
                // });
            $('#barcodeModalPrint #print_barcodes').on('click', function() {

                printElement(document.getElementById("printThis"));

                function printElement(elem) {
                    var domClone = elem.cloneNode(true);

                    var $printSection = document.getElementById("printSection");

                    if (!$printSection) {
                        var $printSection = document.createElement("div");
                        $printSection.id = "printSection";
                        document.body.appendChild($printSection);
                    }

                    $printSection.innerHTML = "";
                    $printSection.appendChild(domClone);
                    var page = new XMLSerializer().serializeToString(document.getElementById('printThis'));
                    shortAjax('/admin/find/items/html', {print: page}, function(res) {
                        console.log(res);
                        if(res.success) {
                            $('#barcodeModalPrint').modal('hide');
                        } else {
                            // alert(res.error)
                        }
                    });
                }
            });

            const barcode_settings = JSON.parse($('#barcode-settings').text());
            $('body').on('click', '.edit_selected', function(ev) {
                let width = Number(barcode_settings.width);
                let height = Number(barcode_settings.height);
                let margin = Number(barcode_settings.margin);
                let back_color = barcode_settings.background_color;
                let line_color = barcode_settings.line_color;
                let text_align = barcode_settings.text_align;
                let text_font = barcode_settings.text_font;
                let format = barcode_settings.format;
                let font_size = Number(barcode_settings.font_size);
                let text_margin = Number(barcode_settings.text_margin);
                let displayValue = Boolean(Number(barcode_settings.text_switch));
                let bold = Number(barcode_settings.bold);
                let italic = Number(barcode_settings.italic);
                let fontOptions = '';

                if(bold && italic) {
                    fontOptions = 'bold italic'
                } else if(bold) {
                    fontOptions = 'bold'
                } else if(italic) {
                    fontOptions = 'italic'
                } else {
                    fontOptions = ''
                }

                if($('.edit_selected_option').val() === 'barcode') {
                    if($('#items-table tbody tr.selected').length === 0) {
                        return false;
                    }

                    const ids = [];
                    $('#items-table tbody tr.selected').each(function() {
                        ids.push($(this).find('td.sorting_1').text());
                    });
                    shortAjax('/admin/find/items/barcodes', {ids}, function(res) {
                        $('.barcodes_image_list').empty();
                        res.barcodes.map(function(barcode, key) {
                            JsBarcode('#svg_barcode_print', barcode.value, {
                                format,
                                font: text_font,
                                fontSize: font_size,
                                textMargin: text_margin,
                                height,
                                width,
                                margin,
                                background: back_color,
                                lineColor: line_color,
                                textAlign: text_align,
                                fontOptions,
                                displayValue
                            })
                                .render();
                            $('#svg_barcode').css('display', 'none');
                            var s = new XMLSerializer().serializeToString(document.getElementById('svg_barcode_print'));
                            var encodedData = window.btoa(s);

                            var img = $(`<img id="${'barcode_'+barcode.value}">`); //Equivalent: $(document.createElement('img'))
                            var li = $('<li style="list-style-type: none; margin: 0 20px 20px 0"></li>');
                            img.attr('src', 'data:image/svg+xml;base64,' + encodedData);
                            img.appendTo(li);

                            li.appendTo('.barcodes_image_list');
                            console.log(encodedData);
                        });
                        $('#barcodeModalPrint').modal('show');
                        $('#svg_barcode_print').css('display', 'none')
                        console.log(res);
                    });
                } else if($('.edit_selected_option').val() === 'download_barcode') {
                    const ids = [];
                    $('#items-table tbody tr.selected').each(function() {
                        ids.push($(this).find('td.sorting_1').text());
                    });
                    shortAjax('/admin/find/items/barcodes', {ids}, function(res) {
                        res.barcodes.map(function(barcode) {
                            $('#svg_barcode').append(`<svg id="svg_${barcode.value}"></svg>`)
                        });
                        res.barcodes.map(function(barcode, key) {
                            JsBarcode(`#svg_${barcode.value}`, barcode.value, {
                                format,
                                font: text_font,
                                fontSize: font_size,
                                textMargin: text_margin,
                                height,
                                width,
                                margin,
                                background: back_color,
                                lineColor: line_color,
                                textAlign: text_align,
                                fontOptions,
                                displayValue,
                            })
                                .render();
                            $(`#svg_${barcode.value}`).css('display', 'none');
                            saveSvgAsPng(document.getElementById(`svg_${barcode.value}`), `${barcode.file_name.replace(/\s/g, '_').trim()}.png`, {scale: 10});

                            // var s = new XMLSerializer().serializeToString(document.getElementById('svg_barcode'));
                            // var encodedData = window.btoa(s);
                            //
                            // var img = $(`<img id="${'barcode_'+value}">`); //Equivalent: $(document.createElement('img'))
                            // var li = $('<li style="list-style-type: none; margin: 0 20px 20px 0"></li>');
                            // img.attr('src', 'data:image/svg+xml;base64,' + encodedData);
                            // img.appendTo(li);
                            //
                            // li.appendTo('.barcodes_image_list');
                            // console.log(encodedData);
                        });
                        // $('#barcodeModalPrint').modal('show');
                    });
                } else if($('.edit_selected_option').val() === 'download_qr_code') {
                    $('.loader_container').css('display', 'block');
                    $('body').css('overflow', 'hidden');
                    const ids = [];
                    $('#items-table tbody tr.selected').each(function() {
                        ids.push($(this).find('td.sorting_1').text());
                    });

                    function toDataURL(url) {
                        return fetch(url).then((response) => {
                            return response.blob();
                        }).then(blob => {
                            return URL.createObjectURL(blob);
                        });
                    }

                    async function forceDownload(url, fileName){
                        const a = document.createElement("a");
                        a.href = await toDataURL(url);
                        a.download = fileName;
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                    }
                    shortAjax('/admin/find/items/qrcodes', {ids}, function(res) {
                        console.log(res.qrcodes);
                        $('.loader_container').css('display', 'none');
                        $('body').css('overflow', 'auto');

                        res.qrcodes.map(function(arr, key) {
                            setTimeout(function() {
                                arr.map(function(er, key) {
                                    forceDownload(er.url, er.name.replace(/\s/g, '_').trim() + '.png');
                                });
                            }, key*3000);
                        });
                    });
                }
            });




            // $('body').on('change', '#items-table thead th.select-checkbox input', function(ev) {
            //     var ctrl_click = jQuery.Event("click");
            //     ctrl_click.ctrlKey = true;
            //     ctrl_click.charCode = 17;
            //
            //     console.log(ctrl_click);
            //     if($(ev.target).is(':checked')) {
            //         console.log(111111);
            //         $('#items-table tbody tr:not(.selected)').each(function() {
            //             console.log($(this).find('td.select-checkbox'));
            //             $(this).find('td.select-checkbox').trigger(ctrl_click)
            //         })
            //     }
            // });

            {{$dataTable->generateScripts()}}


        });
    </script>
@stop
