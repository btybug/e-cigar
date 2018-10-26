@extends('layouts.admin')
@section('content')
    <div class="create-or-update">
        <form action="" class="form-horizontal">
            <div class="form-group">
                <div class="">
                    <label class="col-md-3 control-label">Title</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="title">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="">
                    <label class="col-md-3 control-label">Icon</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="icon">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="">
                    <label class="col-md-3 control-label">Based on</label>
                    <div class="col-md-9">
                        <select name="" id="based-on" class="form-control">
                            <option value="create_product">Available for create product</option>
                            <option value="product">Product</option>
                            <option value="order_amount">Order Amount</option>
                            <option value="promo_code">Promo code</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="based-on-container">

            </div>

            <div class="form-group">
                <div class="">
                    <label class="col-md-3 control-label">Free Juices count</label>
                    <div class="col-md-9">
                        {!! Form::number('free_juices_count',null,['class'=>'form-control','min'=>1,'step'=>1]) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">

                </div>
                <div class="col-md-9">
                    <div class="can-selected-radio">
                        <h4>Can be selected </h4>
                        <label class="radio-inline">
                            <input type="radio" value="all_juices" name="optradio" checked>All
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="choose_juices" name="optradio">Choose
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="query_juices" name="optradio">Query
                        </label>
                        <div class="radio-wall-container"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

@stop

@section('js')
    <script>
        var HTML ={
            product: `@include('admin.settings.store.gifts.products')`,
            order_amount:  `@include('admin.settings.store.gifts.order_amount')`,
            promo_code: `@include('admin.settings.store.gifts.promo_code')`,
            all_juices:``,
            query_juices:  `@include('admin.settings.store.gifts.query_juices')`,
            query_juices_tr:  `@include('admin.settings.store.gifts.query_juices_tr')`,
            choose_juices: `@include('admin.settings.store.gifts.choose_juices')`,
        }
    </script>
    <script src="{{asset('public/js/custom/gifts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

@stop