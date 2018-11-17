@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="coupons_new_page">
        <h3>Purchase Form</h3>
        <div class="col-md-8">
            {!! Form::model($model,['url' => route('admin_store_purchase_save'),'id' => 'form-coupon','class' => 'form-horizontal']) !!}
            {!! Form::hidden('id',null) !!}
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-code">
                    <span data-toggle="tooltip" title="" data-original-title="">SKU</span></label>
                <div class="col-sm-10">
                    {!! Form::select('sku',['' => 'Select'] + $variations,null,[ 'class'=> 'form-control select-sku']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="input-discount">Quantity</label>
                <div class="col-sm-10">
                    {!! Form::number('qty',null,['placeholder' => 'Purchase quantity','class'=> 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="input-discount">Price</label>
                <div class="col-sm-10">
                    {!! Form::number('price',null,['placeholder' => 'Purchase price','class'=> 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
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

            <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status"></label>
                <div class="col-sm-10">
                    {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-4 product-box">

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

        $("body").on('change','.select-sku',function () {
            get_product();
        });
        get_product();
        function get_product() {
            var sku = $(".select-sku").val();
            $.ajax({
                type: "post",
                url: "{!! route('admin_store_purchase_get_stock_by_sku') !!}",
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
    </script>
@stop
