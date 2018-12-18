@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    {!! Form::model($model,['class'=>'form-horizontal stock-form']) !!}
    {!! Form::hidden('id',null,['id' => 'stock-id']) !!}
    <section class="content-top">
        <div class="row m-0">
            <div class="col-md-4">
                <input type="text" placeholder="Product Name" class="form-control" value="{{ @$model->name }}" readonly>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder="SKU" class="form-control" value="{{ @$model->sku }}" readonly>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </section>

    <section class="content stock-page">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid p-25">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="basic-left basic-wall">
                                <div class="all-list-extra">
                                    <ul class="get-all-extra-tab">
                                        {{--@if($model)--}}
                                            {{--@foreach($model->promotions as $promotion)--}}
                                                <li style="display: flex" data-id="1" class="promotion-elm"><a
                                                            href="#">Discount Christmas</a>
                                                    <div class="buttons">
                                                        <a href="javascript:void(0)" class="remove-promotion btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                    <input type="hidden" name="promotions[1][id]" value="{{ @$promotion->id }}">
                                                    <input type="hidden" class="promotion_price" data-id="{{ @$promotion->id }}" name="promotion_prices[{{ @$promotion->id }}]" value="{{ '' }}">
                                                    <input type="hidden" class="promotion_type" data-id="{{ @$promotion->id }}" name="promotions[{{ @$promotion->id }}][type]" value="{{ @$promotion->pivot->type }}">
                                                </li>
                                            {{--@endforeach--}}
                                        {{--@endif--}}
                                    </ul>
                                </div>
                                <div class="button-add text-center">
                                    <a href="javascript:void(0)"
                                       class="btn btn-primary btn-block add-promotions"><i
                                                class="fa fa-plus mr-10"></i>Add promotion</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="basic-center basic-wall">
                                <div class="row">
                                    <div class="col-md-12 extra-variations">
                                        @include("admin.inventory._partials.promotion_item")
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.col -->
    </section>

@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <link rel="stylesheet" href="{{asset('public/admin_assets/css/nopagescroll.css?v='.rand(111,999))}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css"/>
    <style>
        .errors {
            color: red;
            font-style: italic;
        }

        .all-list-extra {
            min-height: 300px;
        }
        .get-all-extra-tab .promotion-elm{
            box-shadow: 0 0 4px #ccc;
            margin-bottom: 10px;
            align-items: center;
            cursor:pointer;
            -webkit-transition: 0.5s ease;
            -moz-transition: 0.5s ease;
            -ms-transition: 0.5s ease;
            -o-transition: 0.5s ease;
            transition: 0.5s ease;
        }
        .get-all-extra-tab .promotion-elm.active,.get-all-extra-tab .promotion-elm:hover{
            background-color: #3eb3d7;
        }
        .get-all-extra-tab .promotion-elm.active>a,.get-all-extra-tab .promotion-elm:hover>a{
            color: #ffffff;
        }
        .get-all-extra-tab .promotion-elm>a{
            padding-left:5px;
            font-size: 16px;
            color: #000000;
        }
        .get-all-extra-tab .buttons{
            margin-left: auto;
        }

    </style>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script src="/public/js/custom/stock.js?v=" .rand(111,999)></script>
    <script>
        $(document).ready(function () {
            $("body").on('click', '.select-promotions', function () {
                let id = guid();
                $(".get-all-extra-tab")
                    .append(`<li style="display: flex" data-id="${id}" class="promotion-elm"><a
                                href="#">New promotion</a>
                                <div class="buttons">
                                <a href="javascript:void(0)" class="remove-promotion btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                    <input type="hidden" name="promotions[${id}][id]" value="${id}">
                    <input type="hidden" name="promotions[${id}][va]" value="${id}">
                    <input type="hidden" class="promotion_price" data-id="${id}" name="promotions[${id}][price]" value="">
                    <input type="hidden" class="promotion_start_date" data-id="${id}" name="promotions[${id}][start_date]" value="0" />
                    <input type="hidden" class="promotion_end_date" data-id="${id}" name="promotions[${id}][end_date]" value="0" />
                    </li>`);
            });

            $("body").on('click','.add-promotions',function () {
                let stock_id = $("#stock-id").val();
                AjaxCall("/admin/inventory/stock/get-promotion", {stock_id: stock_id}, function (res) {
                    if (!res.error) {
                        $(".extra-variations").html(res.html);
                    }
                });
            });
        })
        $('#input-date-start').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            // minYear: 1901,
            // maxYear: parseInt(moment().format('YYYY'),10)
        }, function(start, end, label) {
            var years = moment().diff(start, 'years');
            // alert("You are " + years + " years old!");
        });
        $('#input-date-end').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            // minYear: 1901,
            // maxYear: parseInt(moment().format('YYYY'),10)
        }, function(start, end, label) {
            var years = moment().diff(start, 'years');
            // alert("You are " + years + " years old!");
        });

        function guid() {
            return "ss".replace(/s/g, s4);
        }

        function s4() {
            return Math.floor((1 + Math.random()) * 0x10000)
                .toString(7)
                .substring(1);
        }
    </script>
@stop