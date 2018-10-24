@extends('layouts.admin')
@section('content-header')

    <div class="list-tabs-head">
        <div class="head">
            <ul class="nav nav-tabs w-100">
                <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
                <li><a data-toggle="tab" href="#tabs_data">Tabs Data</a></li>
                <li><a data-toggle="tab" href="#stocks">Stocks</a></li>
            </ul>
        </div>
    </div>
@stop
@section('content')
    <div class="tab-content tabs_content">
        @include("admin.store.products.form")
    </div>
    <div class="modal fade" id="attributesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">modal heading</h4>
                </div>
                <div class="modal-body">
                    motal text
                </div>
            </div>
        </div>
    </div>
    <!-- Modal HTML -->
    <div id="modal_add_media" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Media</h4>
                </div>
                <div class="modal-body">
                    <p class="text-warning">
                        <small>Modal body</small>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info">Save</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    {{--<link rel="stylesheet" href="{{asset('public/admin_theme/datetimepicker/bootstrap-datetimepicker.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <style>
        .fade.in {
            opacity: 1;
            display: block;
        }

        .fade {
            display: none;
        }
    </style>
@stop
@section('js')
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="/public/js/custom/stock.js?v=" .rand(111,999)></script>
    <script type="text/javascript">
        var discount_row = 3;

        function addDiscount() {
            html = '<tr id="discount-row' + discount_row + '">';
            html += '  <td class="text-left"><select name="product_discount[' + discount_row + '][customer_group_id]" class="form-control">';
            html += '    <option value="1">Default</option>';
            html += '  </select></td>';
            html += '  <td class="text-right"><input type="text" name="product_discount[' + discount_row + '][price]" value="" placeholder="Price" class="form-control" /></td>';
            html += '  <td class="text-left" style="width: 20%;"><div class="input-group "><input type="text" name="product_discount[' + discount_row + '][date_start]" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" class="form-control date" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
            html += '  <td class="text-left" style="width: 20%;"><div class="input-group "><input type="text" name="product_discount[' + discount_row + '][date_end]" value="" placeholder="Date End" data-date-format="YYYY-MM-DD" class="form-control date" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
            html += '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' + discount_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#discount tbody').append(html);

            $('#tab-discount .date').datetimepicker({});

            discount_row++;
        }

        $('#tab-discount .date').datetimepicker({
            language: 'en-gb',
        });

        $("body").on("click", ".get-all-attributes-tab-event", function () {
            $("#attributesModal").modal();
        });

        $("body").on('change','#stock',function () {
           var stockId = $(this).val();
            if(stockId != ''){
                var form = $(this).closest('form');
                AjaxCall("/admin/store/apply-stock", form.serialize(), function(res) {
                    if (!res.error) {
                        $(".tabs_content").html(res.html);
                    }
                });
            }
        });
    </script>
@stop