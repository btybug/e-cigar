@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="coupons_new_page">
                <div class="panel panel-default coupons_page-panel">
                {!! Form::model($coupons,['url' => route('admin_store_coupons_save'),'files' => true,'id' => 'form-coupon','class' => '']) !!}
                    {!! Form::hidden('id',null) !!}
                    <div class="panel-heading">
                        <div class="left-head">
                            <h2 class="m-0 pull-left">New Coupon</h2>
                        </div>
                        <div class="right-head d-flex">
                                <div class="button-save ml-5">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group row required">
                            <label class="col-sm-2 control-label" for="input-name">Coupon Name</label>
                            <div class="col-sm-7">
                                {!! Form::text('name',null,['placeholder' => 'Coupon Name',
                                       'id'=>'input-name', 'class'=> 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row required">
                            <label class="col-sm-2 control-label" for="input-code"><span data-toggle="tooltip"
                                                                                         title=""
                                                                                         data-original-title="The code the customer enters to get the discount.">Code</span></label>
                            <div class="col-sm-7">
                                {!! Form::text('code',null,['placeholder' => 'Code',
                                   'id'=>'input-code', 'class'=> 'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-default generate-code">Generate code</button>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Application</div>
                            <div class="panel-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip"
                                                                                                  title=""
                                                                                                  data-original-title="The total amount that must be reached before the coupon is valid.">Discount Amount</span></label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!! Form::text('discount',$coupons->discount??null,['placeholder' => 'Discount',
                                                        'id'=>'input-discount', 'class'=> 'form-control']) !!}
                                            </div>
                                            <div class="col-sm-6">
                                                {!! Form::select('type',['p' => 'Percentage','f' => 'Fixed Amount'],[$coupons->type??null],[ 'id'=>'input-type', 'class'=> 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Coupon Based</label>
                                    <div class="col-sm-10">
                                        <label class="radio-inline">{!! Form::radio('based','product',true,['class' => 'coupon_type']) !!}
                                            Product base
                                        </label>
                                        <label class="radio-inline">{!! Form::radio('based','cart',false,['class' => 'coupon_type']) !!}
                                            Cart base
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row product-box {{ (isset($coupons) && $coupons->based == 'cart') ? 'hide' :'' }}">
                                    <label class="col-sm-2 control-label" for="input-product"><span
                                                data-toggle="tooltip" title=""
                                                data-original-title="Choose specific products the coupon will apply to. Select no products to apply coupon to entire cart.">Products</span></label>
                                    <div class="col-sm-4">
                                        {!! Form::select('product',['' => 'Select'] + $products,null,['class'=> 'form-control input-select2 product-select']) !!}
                                    </div>
                                </div>
                                <div class="form-group row product-box {{ (isset($coupons) && $coupons->based == 'cart') ? 'hide' :'' }}">
                                    <label class="col-sm-2 control-label" for="input-product"><span
                                                data-toggle="tooltip" title=""
                                                data-original-title="Choose specific products the coupon will apply to. Select no products to apply coupon to entire cart.">Variations</span></label>
                                    <div class="col-md-10 variations-box">
                                        @if($coupons && $coupons->stock)
                                            @foreach($coupons->stock->variations as $variation)
                                                <div class="col-md-3">
                                                    <label for="variation_{{ $variation->id }}">{{ get_stock_variation($variation->id) }}</label>
                                                    {!! Form::checkbox('variations[]',$variation->id,null,['id' => 'variation_'.$variation->id]) !!}
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Free Shipping</label>
                                    <div class="col-sm-10">
                                        <label class="radio-inline">{!! Form::radio('shipping_type',$coupons->shipping_type??null,true,['value' => 1]) !!}
                                            Yes
                                        </label>
                                        <label class="radio-inline">{!! Form::radio('shipping_type',$coupons->shipping_type??null,false,['value' => 0]) !!}
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Target</div>
                            <div class="panel-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Target</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                {!! Form::select('target',[
                                                    '0' => "All",
                                                    '1' => "Specific"
                                                ],null,['class' => 'form-control select-target']) !!}
                                            </div>
                                            <div class="col-sm-6 user-box {{ (isset($coupons) && $coupons->target) ? '' :'hide' }}">
                                                {!! Form::select('users[]',$users,null,['class'=> 'form-control input-select2','multiple' => true]) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Validity</div>
                            <div class="panel-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 control-label" for="input-date-start">Date Start</label>
                                            <div class="col-sm-8">
                                                <div class="input-group date">
                                                    {!! Form::text('start_date',$coupons->start_date??null,['placeholder' => 'Date Start',
                                                  'id'=>'input-date-start', 'class'=> 'form-control','data-date-format'=>'YYYY-MM-DD']) !!}
                                                    <span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 control-label text-right" for="input-date-end">Date
                                                End</label>
                                            <div class="col-sm-8">
                                                <div class="input-group date">
                                                    {!! Form::text('end_date',$coupons->end_date??null,['placeholder' => 'Date end',
                                                  'id'=>'input-date-end', 'class'=> 'form-control','data-date-format'=>'YYYY-MM-DD']) !!}
                                                    <span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip"
                                                                                                  title=""
                                                                                                  data-original-title="The total amount that must be reached before the coupon is valid.">Minimal order amount</span></label>
                                    <div class="col-sm-10">
                                        {!! Form::text('total_amount',$coupons->total_amount??null,['placeholder' => 'Minimal order amount',
                                           'id'=>'input-total', 'class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="input-uses-total"><span
                                                data-toggle="tooltip" title=""
                                                data-original-title="The maximum number of times the coupon can be used by any customer. Leave blank for unlimited">Total card use</span></label>
                                    <div class="col-sm-10">
                                        {!! Form::text('user_per_coupon',$coupons->user_per_coupon??null,['placeholder' => 'Total card use',
                                           'id'=>'input-uses-total', 'class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="input-uses-customer"><span
                                                data-toggle="tooltip" title=""
                                                data-original-title="The maximum number of times the coupon can be used by a single customer. Leave blank for unlimited">Each user for</span></label>
                                    <div class="col-sm-10">
                                        {!! Form::text('user_per_customer',$coupons->user_per_customer??null,['placeholder' => 'Each user for',
                                          'id'=>'input-uses-customer', 'class'=> 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-8">
                            <div class="col-md-12">
                                {{--<div class="form-group row">--}}
                                {{--<label class="col-sm-2 control-label" for="input-status">Status</label>--}}
                                {{--<div class="col-sm-10">--}}
                                {{--{!! Form::select('status',['1' => 'Enabled','0' => 'Disabled'],[$coupons->status??null],[ 'id'=>'input-status', 'class'=> 'form-control']) !!}--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select name="voucherThemeSelect" id="voucherThemeSelect" class="form-control">
                    <option value="theme 1">theme 1</option>
                    <option value="theme 2">theme 2</option>
                    <option value="theme 3">theme 3</option>
                </select>
            </div>
            <div class="voucher-card">
                <div class="d-flex">
                    <div class="col-xs-5 p-0">
                        <div class="voucher-card_left">
                            <p class="voucher-card_left_title text-uppercase mb-0">gift</p>
                            <p class="voucher-card_left_subtitle text-uppercase">voucher</p>
                            <a href="{!! url('/') !!}" class="d-block voucher-card_left-logo-holder">
                                <img src="{!! url('/public/img/vapors-logo.png') !!}" alt="logo">
                            </a>
                        </div>
                    </div>

                    <div class="col-xs-7">
                        <div class="voucher-card_right">
                            <p class="voucher-card_price"><strong>500$</strong></p>
                            <p class="voucher-card_price_info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium assumenda distinctio doloremque, eaque facere facilis id libero nihil officiis praesentium quia soluta, tempora voluptate voluptatum?</p>
                            <div class="voucher-card_footer">
                                <p><strong>Lorem ipsum dolor sit amet.</strong></p>
                                <ul class="voucher-card_footer-list d-flex">
                                    <li><a href="#">example@mail.ifo</a></li>
                                    <li><a href="#">77 88588556</a></li>
                                    <li><a href="#">sitename.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <script type="template" id="variation_template">
        <div class="col-md-3">
            <label for="variation_{id}">{name}</label>
            {!! Form::checkbox('variations[]',"{id}",null,['id' => 'variation_{id}']) !!}
        </div>
    </script>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $(".input-select2").select2();

        $("body").on('change', '.product-select', function () {
            $(".variations-box").html('');
            AjaxCall("/admin/inventory/stock/get-variations-by-id", {id: $(this).val()}, function (res) {
                if (!res.error) {
                    if (res.data.length) {
                        for (let i in res.data) {
                            var item = res.data[i];
                            let html = ` <div class="col-md-3">
                                    <label for="variation_${item.id}">${item.name}</label>
                                    <input type="checkbox" checked value='${item.id}' name="variations[]" id=variation_${item.id}" />
                                </div>`;
                            $(".variations-box").append(html)
                        }
                    }
                }
            });
        });

        $("body").on('change', '.coupon_type', function () {
            if ($(this).val() == 'product') {
                $(".product-box").removeClass('hide')
            } else {
                $(".product-box").addClass('hide')
            }
        });

        $("body").on('change', '.select-target', function () {
            if ($(this).val() == '1') {
                $(".user-box").removeClass('hide')
            } else {
                $(".user-box").addClass('hide')
            }
        });

        $('#input-date-start').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            // minYear: 1901,
            // maxYear: parseInt(moment().format('YYYY'),10)
        }, function (start, end, label) {
            var years = moment().diff(start, 'years');
            // alert("You are " + years + " years old!");
        });
        $('#input-date-end').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            // minYear: 1901,
            // maxYear: parseInt(moment().format('YYYY'),10)
        }, function (start, end, label) {
            var years = moment().diff(start, 'years');
            // alert("You are " + years + " years old!");
        });


        var userList = null;
        $.ajax({
            url: "/admin/get-categories",
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $("input[name='_token']").val()
            },
            success: function (data) {
                userList = data;
            }
        });

        $("body").on("click", ".generate-code", function () {
            console.log(4545)
            $("#input-code").val(generateCode());
        });

        function generateCode() {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (var i = 0; i < 10; i++)
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }

    </script>
@stop
