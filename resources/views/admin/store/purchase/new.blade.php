@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="coupons_new_page card panel panel-default">
        <div class="card-header panel-heading">
            <h3 class="m-0">Purchase Form</h3>
        </div>
        <div class="card-body panel-body">

            <div class="col-md-8">
                {!! Form::model($model,['url' => route('admin_inventory_purchase_save'),'id' => 'form-coupon','class' => '']) !!}
                {!! Form::hidden('id') !!}
                <div class="form-group row required">
                    <label class="col-sm-2 control-label" for="input-code">
                        <span data-toggle="tooltip" title="" data-original-title="">Item</span></label>
                    <div class="col-sm-10">
                        {!! Form::select('item_id',$items,null,[ 'class'=> 'form-control select-sku']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="input-discount">Quantity</label>
                    <div class="col-sm-10">
                        {!! Form::number('qty',null,['placeholder' => 'Purchase quantity','class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="input-discount">Price</label>
                    <div class="col-sm-10">
                        {!! Form::number('price',null,['placeholder' => 'Purchase price','class'=> 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="input-date-start">Purchase date</label>
                    <div class="col-sm-3">
                        <div class="input-group date">
                            {!! Form::text('purchase_date',null,['placeholder' => 'Purchase date',
                          'id'=>'input-date-start', 'class'=> 'form-control']) !!}
                            <span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="supplier">
                        Supplier</label>
                    <div class="col-sm-10">
                        {!! Form::select('supplier_id',$suppliers,null,[ 'class'=> 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="invoiceNumber">Invoice number</label>
                    <div class="col-sm-10">
                        {!! Form::number('invoice_number',null,['placeholder' => 'Purchase invoice number','class'=> 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="warehouse">Location</label>
                    <div class="col-sm-4">
                        {!! Form::select('warehouse_id',['' => 'Select Warehouse'] + $warehouses,null,['class'=> 'form-control','id' => 'warehouse']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::select('rack_id',['' => 'Select Rack']+$racks,null,['class'=> 'form-control','id' => 'rack']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::select('shelve_id',['' => 'Select Shelve']+$shelves,null,['class'=> 'form-control','id' => 'shelve']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="input-status"></label>
                    <div class="col-sm-10 text-right">
                        {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-4 product-box">

            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.css">
@stop
@section('js')
    <script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.js"></script>
    <script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/bootstrap-tagsinput.js"></script>
    <script>
        $('#input-date-start').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
            // minYear: 1901,
            // maxYear: parseInt(moment().format('YYYY'),10)
        });

        get_product();
        function get_product() {
            var sku = $(".select-sku").val();
            $.ajax({
                type: "post",
                url: "{!! route('admin_inventory_purchase_get_stock_by_sku') !!}",
                cache: false,
                datatype: "json",
                data: {sku: sku},
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function (data) {
                    if (!data.error) {
                        $(".product-box").html(data.html);
                    }
                }
            });
        }

        $("body").on('change','#warehouse',function () {
            let w_id = $(this).val();
            render_racks(w_id)
        })

        $("body").on('change','#rack',function () {
            let r_id = $(this).val();
            render_shelves(r_id)
        })

        function render_racks(w_id){
            $("#rack").html('<option value="0">Select Rack</option>');
            $("#shelve").html('<option value="0">Select Shelve</option>');
            if(w_id){
                AjaxCall("{{ route('admin_warehouses_rack_by_warehouse') }}", {w_id: w_id}, function (res) {
                    if (!res.error) {
                        $("#rack").empty();
                        var html = '<option value="0">Select Rack</option>';
                        for (var prop in res.data) {
                            html += '<option value="'+res.data[prop].id+'">'+res.data[prop].name+'</option>';
                        }

                        $("#rack").append(html);
                    }
                });
            }

        }

        function render_shelves(r_id){
            $("#shelve").html('<option value="0">Select Shelve</option>');
            if(r_id){
                AjaxCall("{{ route('admin_warehouses_shelve_by_rack') }}", {r_id: r_id}, function (res) {
                    if (!res.error) {
                        $("#shelve").empty();

                        var html = '<option value="0">Select Shelve</option>';
                        for (var prop in res.data) {
                            html += '<option value="'+res.data[prop].id+'">'+res.data[prop].name+'</option>';
                        }

                        $("#shelve").append(html);
                    }
                });
            }

        }


    </script>
@stop
